# Section Visual Reference

## Heading & Text

### Section Title (`section_title`)
**File:** `section_title-default.php`
**Visual:** Centered heading block. Small subtitle text above → large bold heading → pill-shaped tag badge below title → WYSIWYG description. Configurable alignment, heading level (H1/H2/H3), container width, and bottom margin (default/small/none/negative).

### Text (`text`)
**File:** `text.php` (default), `text-alt.php` (alt), `text-heavy.php` (heavy), `text-with_toc.php` (with_toc)
**Visual:** Rich text content section. Title + WYSIWYG body. Types: Default (standard prose), Alt (alternate styling), Heavy (bold, prominent typography), With TOC (includes auto-generated table of contents sidebar). Configurable container width (full/small), top/bottom margin toggles.

---

## Hero

### Hero (`hero`)
**File:** `hero-home.php` (home), `hero-page.php` (page), `hero-image-below.php` (image-below), `hero-primary-background.php` (primary-background)
**Visual:** Full-width top-of-page banner. Types:
- **Home:** Large hero with title + description + CTA links + image/video + bottom service link strip
- **Page:** Standard page hero — title + description + links + image/video with transcript option
- **Image Below:** Hero with image placed below text content
- **Primary Background:** Hero on brand primary color background

### Hero Blog (`hero-blog`)
**File:** `hero-blog.php`
**Visual:** Blog-specific hero variant. (No ACF layout — likely auto-populated from post data.)

---

## Content Blocks

### About (`about`)
**File:** (no template file)
**ACF types:** Default (icon + title + desc items with image), Bullet List (icon + title + desc bullet items)
**Visual:** Info section with icon-labelled items in two layouts — default side-by-side with image, or bullet list with icon bullets.

### Callout (`callout`)
**File:** `callout.php`
**Visual:** Prominent highlighted block with WYSIWYG content. Single type (default).

### Case Study (`case_study`)
**File:** `case_study.php`
**Visual:** Detailed project showcase. Overline label → title → tag badge → Client Challenge (WYSIWYG) → Approach (WYSIWYG) → Implementation (WYSIWYG) → side panel with Industry/Location/Compliance/Timeline/Key Result → repeater list of Results items.

### Certificates (`certificates`)
**File:** `certificates-default.php`
**Visual:** Credentials display. Title + description + repeater stats (label+value pairs) + CTA link + image.

### Cities (`cities`)
**File:** `cities.php`
**Visual:** Featured cities grid. Section title → image cards for featured cities → text list of other served cities.

### Compliance (`compliance`)
**File:** `compliance.php`
**Visual:** Compliance showcase. Title + description + repeater checklist items + percentage score (0-100) + CTA link + image + video transcript.

### Gallery (`gallery`)
**File:** (no template file)
**Visual:** Image gallery section. Title + description + ACF gallery field of images.

### Help Grid (`help-grid`)
**File:** `help-grid.php`
**Visual:** Grid layout for help/resource items. (No ACF layout — likely auto-populated.)

### Information (`information`)
**File:** `information.php` (default), `information-alt.php` (alt), `information-simple.php` (simple)
**Visual:** Info section with content background color option. Title + subtitle + WYSIWYG description + checklist repeater items + CTA link + image. Types vary in layout complexity.

### Our Mission (`our_mission`)
**File:** `our_mission.php`
**Visual:** Mission statement section. Title (default "OUR MISSION") → quote text → description textarea → repeater service cards (icon/image + title + description + link) → section CTA link.

### Points (`points`)
**File:** `points.php` (default), `points-grid.php` (grid)
**Visual:** Bullet/list points section. Title + WYSIWYG description + repeater points (title + description each) + CTA text + CTA link. Grid type arranges points in a grid layout.

### Policy (`policy`)
**File:** `policy.php`
**Visual:** Policy/privacy content section. (No ACF layout — likely auto-populated from page content.)

### Process (`process`)
**File:** `process.php`
**Visual:** Process/workflow diagram section. Title + subtitle + desktop process image + optional mobile-optimized image.

### Report an Incident (`report-an-incident`)
**File:** `report-an-incident.php`
**Visual:** Incident reporting interface. (No ACF layout.)

### Services (`services`)
**File:** `services.php`
**Visual:** Services overview. Title + WYSIWYG description + repeater feature text items + CTA link + image.

---

## Grid Sections

All grid variants share: section title + description header, configurable columns (2/3/4/5), optional footer description + CTA button below grid, optional background color, margin toggles, and container width (full/small). Unique aspects per variant are detailed below.

### Grid — Basic (`grid-basic.php`)
**Visual:** White cards on white background. Each card has a **round icon circle** (primary-color filled circle, 64px, containing an `<img>` icon) → title (optional link) → description → **pill-shaped CTA button** (white text on primary bg, `rounded-full`, with hover inversion). Cards use `border-2` (primary color), `rounded-lg`, and `p-6`. Last row items evenly distribute with `grid-column: span` LCM logic to avoid orphans. Link on title is inline `<a>` inside `<h3>`; separate pill `<a>` at bottom.

### Grid — Colorful (`grid-colorful.php`)
**Visual:** Large colored blocks in a **2-column max** grid (`gap-16`). Each card is `rounded-2xl p-8 lg:p-12` with a distinct background color (`bg-[#98D1E6]` teal, `bg-[#FFF1A5]` yellow), cycling through a palette. Cards contain an **uppercase label `<span>`** and a `<ul>` bullet list using `&bull;` separators. **No images, no links, no borders** — pure informational text blocks.

### Grid — Alt (`grid-alt.php`)
**Visual:** Same grid structure as Basic but cards use `flex items-start` **horizontal layout**: icon circle on left (`flex-shrink-0 mr-4`), title beside it. No separate CTA button per card — only an inline title link with `hover:underline`. Section-level CTA link below the grid. Cards use `border-2 border-primary rounded-lg p-6`.

### Grid — Highlight (`grid-highlight.php`)
**Visual:** Fixed **3-column grid** of solid yellow-orange blocks (`bg-[#FDCC82]`). Cards are `rounded-2xl p-8 lg:p-10`. Contains only `<h3>` title and `<p>` description — **no images, no icons, no links, no borders**. Pure informational highlight cards with warm background.

### Grid — Textual (`grid-textual.php`)
**Visual:** Blog-style cards with **full-width image** (`w-full h-48 object-cover rounded-xl mb-6`) at top, then content below. Cards have `border-2 border-primary rounded-2xl p-8` with `hover:border-rose-700 transition-colors`. Features optional **uppercase subtitle** above title (primary color). Title (optional link) → description (uses `flex-grow` to push link down for equal-height cards) → **text link with arrow SVG icon** at bottom (`inline-flex items-center font-semibold`). Focus ring classes for accessibility.

### Grid — Cards (`grid-cards.php`)
**Visual:** White cards on a **full-width primary-color backplate** (the inner container has `bg-primary text-white p-8 lg:p-16`). Cards are `bg-white text-[#1B1B1B] rounded p-8 text-center`. Each card has a **small centered image** (`w-20 h-auto`), title, and description. **No per-card links** — only a single section-level pill button below the grid. Features duplicate `<h2>` for screen-reader (`sr-only`) and visual (`aria-hidden="true"`).

### Grid — Floating Cards (`grid-floating-cards.php`)
**Visual:** Cards float over a **full-bleed background image** (`absolute inset-0 object-cover`) with a primary-color overlay (`bg-primary relative z-10`). Cards are `bg-white p-6 rounded-lg` white blocks. Each card has a **small icon image** (`w-12 h-auto mb-4`), title (`<div>` if no desc, `<h3>` if has desc), and description. Uses `<ul>/<li>` semantic markup. **No links**. Features uppercase subtitle above the header.

### Grid — Service Cards (`grid-service-cards.php`)
**Visual:** Completely **transparent/borderless cards** (`bg-transparent text-left`). Each card uses `flex gap-6` with an icon circle on left and title beside it, then description below, then the same pill CTA button as Basic. Two container modes: `full` uses `.container`, `small` uses `max-w-5xl`. Supports `limit` field to cap number of items shown.

### Grid — Clickable Cards (`grid-clickable-cards.php`)
**Visual:** Entire card is a **single `<a>` tag** (block link). Cards have `py-12 px-8 border border-primary rounded-lg bg-white` with `hover:border-red-800` and custom `--hover-bg` CSS variable for background hover effect. Uses `<span>` for title (not heading tag), small icon image (`w-12 h-auto`). Cards are `flex flex-col justify-center items-center text-center`. **One clickable surface per card**, no separate buttons. Uses `<ul>/<li>` + `group` hover pattern.

### Grid — Compliance Cards (`grid-compliance-cards.php`)
**Visual:** Dynamically **pulls compliance-related WordPress pages** via `WP_Query` filtered by "compliance" taxonomy term. Renders each page using `template-parts/service-card.php` include. Header has uppercase subtitle + title + description in a `max-w-2xl` flex container. Fixed 3-column grid. Includes structure for category filter tabs.

### Grid — Information Cards (`grid-information-cards.php`)
**Visual:** Cards with **soft tinted background** (no border) using `silverride_alternate_bg_color()` (default `#FCF3F5` pink-tinted). Same structure as Basic: icon circle on left + title side-by-side in `flex gap-6`, description, pill CTA button. Cards use `rounded-lg p-6 text-left`. Has `disable_margins` toggle option. Background color set as inline `style` per card.

### Grid — Incentives (`grid-incentives.php`)
**Visual:** Completely **bare, borderless, backgroundless cards** (`text-center flex flex-col justify-start items-center`). Each card has a **small icon image** (`w-10 h-auto`), title (`<div>` or `<h3>` based on whether description exists), and description text (with `strip_tags()` applied). Uses `<ul>/<li>`. **No links, no borders, no backgrounds** — minimal layout. Custom section class `grid-incentives`.

### Grid Videos (`grid_videos`)
**File:** `grid_videos.php`
**Visual:** Video gallery grid. Title + description → 2 or 3 column grid of videos (YouTube/Vimeo embed or MP4 upload + optional thumbnail + title per video).

### Nested Grid (`nested_grid`)
**File:** `nested-grid.php`
**Visual:** Multi-column grid where each column contains a heading + WYSIWYG description + nested sub-items (image icon + label per item).

---

## Social Proof

### Logos (`logos`)
**File:** `logos.php`
**Visual:** Client/partner logo grid. Title + subtitle + description + configurable columns (1-5) + ACF gallery of logo images.

### Stats (`stats`)
**File:** `stats.php`
**Visual:** Statistics counter strip. Title + repeater of stat items (numeric value + text label).

### Team (`team`)
**File:** `team.php`
**Visual:** Team members section. Title + description + repeater of team members (photo + name + job title + bio + LinkedIn URL).

### Testimonials (`testimonials`)
**File:** `testimonials.php`
**Visual:** Single testimonial highlight. Title + description + image/logo + quote textarea + company name + position.

---

## FAQ & Table

### FAQs (`faqs`)
**File:** `faqs-default.php`
**Visual:** Accordion FAQ section. Title + description + repeater of question/answer pairs (WYSIWYG answers) + footer description + CTA button.

### Table (`table`)
**File:** (no template file)
**Visual:** Data table section. Title + description + ACF table field (with header/caption support) + WYSIWYG footnote.

---

## Calls to Action

### Call To Action (`call_to_action`)
**File:** `call_to_action-default.php` (default), `call_to_action-alt.php` (alt), `call_to_action-simple.php` (simple)
**Visual:** CTA banner. Title + description + link button + image or video (with VTT subtitle track support). Types: Default (standard CTA), Alt (alternate styling), Simple (minimal layout).

---

## Forms

### Contact (`contact`)
**File:** `contact.php`
**Visual:** Contact page section. Subtitle + title + description + form shortcode + contact details (email/phone/toll-free/address) + social media URLs (Facebook/Twitter/LinkedIn/YouTube). All fields fall back to Global Settings defaults.

### Form (`form`)
**File:** `form.php`
**Visual:** Generic form embed section. Single shortcode text field for any form plugin.

### LeanPress Forms (`leanpress_forms`)
**File:** `leanpress_forms.php`
**Visual:** LearnPress LMS auth forms. Title + login shortcode + register shortcode + activation message shortcode.

---

## Utility

### Links (`links`)
**File:** `links.php`
**Visual:** Simple link list section. Repeater of ACF link objects.

### Space (`space`)
**File:** `space.php`
**Visual:** Spacing utility. Creates vertical space (margin or padding). Types: invisible space or visible divider line. Configurable size (small/medium/large/xlarge/custom px), apply to top/bottom/both, divider style (solid/dashed/dotted/double), divider color, divider width %, full-width toggle.

### Slider (`slider`)
**File:** `slider-basic.php`
**Visual:** Content slider/carousel. Title + repeater slides (heading + WYSIWYG content + link each). Type: basic.

---

## Location

### Locations (`locations`)
**File:** `locations.php`
**Visual:** Office locations with Google Map. Title (default "Our Offices") + map embed URL + map link URL + repeater of locations (city name + WYSIWYG address).

### Locations Alt (`locations_alt`)
**File:** `locations_alt.php`
**Visual:** Alternative locations layout. Title + block-layout repeater locations (map iframe URL + city name + address + phone + email + business hours).

---

## Blog & Filters

### Blog (`blog`)
**File:** `blog-default.php` (default), `blog-alt.php` (alt)
**Visual:** Blog post listing grid. Title + description + post count (1-12) + optional category filter + view-all link. Types: Default and Alt layout variants.

### Filters Blog (`filters-blog`)
**File:** `filters-blog.php`
**Visual:** Blog post filter interface. (No ACF layout.)

---

## Global Partials (not in flexible content)

### Footer (`footer`)
**File:** `footer.php`
**Visual:** Site footer. Rendered automatically on all pages, not via flexible content. Contains tagline, credentials repeater, services links, training links, copyright. Configurable in Theme Settings.
