import { join, relative, dirname, fromFileUrl } from "jsr:@std/path@^1.0.0";
import JSZip from "npm:jszip@^3.10.1";

// Extensions treated as text files that can be processed
const TEXT_EXTENSIONS = new Set([
  "js",
  "ts",
  "css",
  "html",
  "php",
  "txt",
  "pot",
  "json",
  "md",
  "xml",
  "scss",
  "less",
  "jsx",
  "tsx",
  "vue",
]);

// Files that should never be included in the distribution
const EXCLUDED_FILES = new Set([
  ".gitignore",
  ".env",
  "README.md",
  ".rsyncignore",
  "build.json",
  "composer.lock",
  "package-lock.json",
  "yarn.lock",
  "pnpm-lock.yaml",
]);

// Directories that should never be traversed
const EXCLUDED_DIRS = new Set([
  ".git",
  ".playwright-cli",
  "node_modules",
  ".svn",
  ".hg",
  ".github",
  "vendor",
]);

// Walk up the directory tree looking for a build.json file
async function findBuildJsonDir(startDir) {
  let current = startDir;
  while (true) {
    try {
      const info = await Deno.stat(join(current, "build.json"));
      if (info.isFile) return current;
    } catch {
      // not found, keep walking up
    }
    const parent = dirname(current);
    if (parent === current) break;
    current = parent;
  }
  return null;
}

// Parse a version string like "1.0.0" into { major, sub, build }
function parseVersion(versionStr) {
  const parts = String(versionStr).split(".").map(Number);
  return {
    major: Number.isFinite(parts[0]) ? parts[0] : 0,
    sub: Number.isFinite(parts[1]) ? parts[1] : 0,
    build: Number.isFinite(parts[2]) ? parts[2] : 0,
  };
}

// Increment version: build 0-10, sub 0-10, major 0-∞
// When build exceeds 10 → reset to 0 and increment sub
// When sub exceeds 10 → reset to 0 and increment major
function incrementVersion(versionStr) {
  const v = parseVersion(versionStr);
  v.build += 1;
  if (v.build > 10) {
    v.build = 0;
    v.sub += 1;
  }
  if (v.sub > 10) {
    v.sub = 0;
    v.major += 1;
  }
  return `${v.major}.${v.sub}.${v.build}`;
}

// Update the VERSION field in build.json for all version configs
async function bumpBuildJsonVersion(themeDir) {
  const buildConfigPath = join(themeDir, "build.json");
  const buildConfig = await getBuildConfig(themeDir);

  // Grab the current version from the first available config
  const firstKey = Object.keys(buildConfig).find(
    (k) => buildConfig[k] && buildConfig[k].VERSION
  );
  if (!firstKey) {
    console.warn("No VERSION found in build.json; skipping auto-increment.");
    return buildConfig;
  }

  const oldVersion = buildConfig[firstKey].VERSION;
  const newVersion = incrementVersion(oldVersion);

  // Sync the new version into every version block
  for (const key of Object.keys(buildConfig)) {
    if (buildConfig[key] && typeof buildConfig[key] === "object") {
      buildConfig[key].VERSION = newVersion;
    }
  }

  await Deno.writeTextFile(
    buildConfigPath,
    JSON.stringify(buildConfig, null, 2) + "\n"
  );
  console.log(`Version bumped: ${oldVersion} → ${newVersion}`);

  return buildConfig;
}

// Helper function to read build.json from the theme/plugin directory
async function getBuildConfig(themeDir) {
  const buildConfigPath = join(themeDir, "build.json");
  try {
    const configContent = await Deno.readTextFile(buildConfigPath);
    return JSON.parse(configContent);
  } catch (error) {
    throw new Error(
      `Failed to read build.json from ${buildConfigPath}: ${error.message}`
    );
  }
}

// Helper function to replace placeholders with build.json values
function replacePlaceholders(content, buildInfo) {
  return content
    .replace(/__NAME__/g, buildInfo.NAME ?? "NAME")
    .replace(/__SLUG__/g, buildInfo.SLUG ?? "SLUG")
    .replace(/__PREFIX__/g, buildInfo.PREFIX ?? "PREFIX")
    .replace(/__VERSION__/g, buildInfo.VERSION ?? "0.0.0");
}

// Helper function to remove code blocks within the remove markers
function removeVersionSpecificCode(content, fileExtension, versionType) {
  const marker = `REMOVE_IN_${versionType.toUpperCase()}_VERSION`;
  let removePattern;

  switch (fileExtension) {
    case "js":
    case "ts":
      removePattern = new RegExp(
        `\\/\\/\\s*<${marker}>[\\s\\S]*?<\\/${marker}>`,
        "g"
      );
      break;
    case "css":
    case "scss":
    case "less":
      removePattern = new RegExp(
        `\\/\\*\\s*<${marker}>[\\s\\S]*?<\\/${marker}>\\s*\\*\\/`,
        "g"
      );
      break;
    case "html":
    case "vue":
      removePattern = new RegExp(
        `<!--\\s*<${marker}>\\s*-->[\\s\\S]*?<!--\\s*<\\/${marker}>\\s*-->`,
        "g"
      );
      break;
    case "php": {
      // Handles //, #, /*, and <!-- --> style markers in PHP
      const singleLine = `(?:\\/\\/|#)\\s*<${marker}>[\\s\\S]*?<\\/${marker}>`;
      const multiLine = `\\/\\*\\s*<${marker}>[\\s\\S]*?<\\/${marker}>\\s*\\*\\/`;
      const htmlStyle = `<!--\\s*<${marker}>\\s*-->[\\s\\S]*?<!--\\s*<\\/${marker}>\\s*-->`;
      removePattern = new RegExp(
        `${singleLine}|${multiLine}|${htmlStyle}`,
        "g"
      );
      break;
    }
    case "txt":
    case "pot":
    case "json":
    case "md":
    case "xml":
      // No marker removal for plain text / data files
      return content;
    default:
      return content;
  }

  return content.replace(removePattern, "");
}

// Helper function to check if a file should be removed for a version
async function shouldRemoveFileForVersion(fullPath, versionType) {
  const ext = fullPath.split(".").pop()?.toLowerCase() ?? "";
  if (!TEXT_EXTENSIONS.has(ext)) {
    // Skip binary files — a marker can only exist in text files
    return false;
  }

  const marker = versionType === "free"
    ? "<REMOVE_FILE_IN_FREE_VERSION>"
    : "<REMOVE_FILE_IN_PRO_VERSION>";

  try {
    const content = await Deno.readTextFile(fullPath);
    return content.includes(marker);
  } catch {
    return false;
  }
}

// Helper to generate POT file using wp i18n make-pot
async function generatePotFileWithWPCLI(themeDir, potFilePath, buildInfo) {
  const isWindows = Deno.build.os === "windows";

  const args = [
    "i18n",
    "make-pot",
    themeDir,
    potFilePath,
    `--domain=${buildInfo.SLUG}`,
    `--package-name=${buildInfo.NAME}`,
  ];

  const command = isWindows
    ? new Deno.Command("cmd", {
        args: ["/c", "wp", ...args],
        stdout: "piped",
        stderr: "piped",
      })
    : new Deno.Command("wp", {
        args,
        stdout: "piped",
        stderr: "piped",
      });

  const { success, stderr } = await command.output();
  if (!success) {
    const errorText = new TextDecoder().decode(stderr);
    throw new Error(`wp i18n make-pot failed: ${errorText}`);
  }
}

// Function to create the distribution ZIP
async function createThemeZip(themeDir, outputDir, versionType, generatePot, buildConfig) {
  if (!buildConfig) {
    buildConfig = await getBuildConfig(themeDir);
  }
  const buildInfo = buildConfig[versionType];

  if (!buildInfo) {
    throw new Error(
      `No build configuration found for version type: ${versionType}`
    );
  }
  if (!buildInfo.SLUG) {
    throw new Error(
      `Missing required field "SLUG" in build configuration for ${versionType}`
    );
  }

  const zipFileName = `${buildInfo.SLUG}.zip`;
  const zip = new JSZip();

  async function walkDirectory(currentPath) {
    for await (const entry of Deno.readDir(currentPath)) {
      const fullPath = join(currentPath, entry.name);

      if (entry.isDirectory) {
        if (!EXCLUDED_DIRS.has(entry.name)) {
          await walkDirectory(fullPath);
        }
        continue;
      }

      if (!entry.isFile || EXCLUDED_FILES.has(entry.name)) {
        continue;
      }

      // Skip file if it contains the remove marker for this version
      if (await shouldRemoveFileForVersion(fullPath, versionType)) {
        continue;
      }

      await processFile(fullPath, entry.name);
    }
  }

  async function processFile(fullPath, file) {
    const fileExtension = file.split(".").pop()?.toLowerCase() ?? "";
    // Ensure forward slashes for ZIP entries
    const zipPath = relative(themeDir, fullPath).replace(/\\/g, "/");

    // If file is .min.js or .min.css, add without text processing
    if (file.endsWith(".min.js") || file.endsWith(".min.css")) {
      const fileContent = await Deno.readFile(fullPath);
      zip.file(zipPath, fileContent);
      return;
    }

    const isTextFile = TEXT_EXTENSIONS.has(fileExtension);
    const isPotFile = fileExtension === "pot";
    const potFileName = `${buildInfo.SLUG}.pot`;
    const isCurrentVersionPot =
      isPotFile &&
      file === potFileName &&
      zipPath.endsWith(`languages/${potFileName}`);

    // Only include the POT file for the current version
    if (isPotFile && !isCurrentVersionPot) {
      return;
    }

    if (isTextFile) {
      let fileContent = await Deno.readTextFile(fullPath);
      fileContent = removeVersionSpecificCode(fileContent, fileExtension, versionType);
      fileContent = replacePlaceholders(fileContent, buildInfo);
      zip.file(zipPath, fileContent);
    } else {
      const fileContent = await Deno.readFile(fullPath);
      zip.file(zipPath, fileContent);
    }
  }

  // Generate POT file before zipping using wp-cli
  if (generatePot) {
    const potFilePath = join(themeDir, "languages", `${buildInfo.SLUG}.pot`);
    await Deno.mkdir(dirname(potFilePath), { recursive: true });
    await generatePotFileWithWPCLI(themeDir, potFilePath, buildInfo);
  }

  await walkDirectory(themeDir);

  const zipContent = await zip.generateAsync({
    type: "uint8array",
    compression: "DEFLATE",
    compressionOptions: { level: 9 },
  });

  const outputPath = join(outputDir, zipFileName);
  await Deno.writeFile(outputPath, zipContent);
  console.log(
    `${versionType} version created: ${zipContent.length} bytes -> ${outputPath}`
  );
}

// Command line entry point
async function main() {
  let themeDir = Deno.args[0];
  let outputDir = Deno.args[1];

  // Auto-detect if no source directory was provided
  if (!themeDir) {
    // 1. Try from the current working directory
    let detected = await findBuildJsonDir(Deno.cwd());

    // 2. Fallback to the script's own directory (e.g. run from another cwd)
    if (!detected) {
      const scriptDir = dirname(fromFileUrl(import.meta.url));
      detected = await findBuildJsonDir(scriptDir);
    }

    if (detected) {
      themeDir = detected;
      // Default output to the parent of the detected theme/plugin folder
      outputDir = outputDir || dirname(themeDir);
      console.log(`Auto-detected source : ${themeDir}`);
      console.log(`Auto-detected output : ${outputDir}`);
    }
  }

  if (!themeDir) {
    console.error(
      "Usage: deno run --allow-read --allow-write --allow-run index.js <theme-dir> [output-dir]"
    );
    console.error(
      "Or run from inside a theme/plugin directory that contains build.json"
    );
    Deno.exit(1);
  }

  outputDir = outputDir || "./";
  const generatePot = true;

  try {
    // Bump the version once before building both variants
    const buildConfig = await bumpBuildJsonVersion(themeDir);

    console.log("Creating Pro version…");
    await createThemeZip(themeDir, outputDir, "pro", generatePot, buildConfig);

    console.log("Creating Free version…");
    await createThemeZip(themeDir, outputDir, "free", generatePot, buildConfig);
  } catch (error) {
    console.error("Error occurred:", error);
    Deno.exit(1);
  }
}

main();
