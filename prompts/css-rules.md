# CSS Rules & Style Guide

Use these rules when writing or modifying CSS in this theme. The theme uses a **hybrid CSS architecture**: Tailwind utility classes (runtime via Twind) in PHP templates, and hand-written component CSS in static stylesheets.

---

## 1. CSS Architecture Overview

| Layer | Where | Purpose |
|---|---|---|
| **Utility** | PHP templates (inline `class=""`) | Layout, spacing, responsive behavior via Tailwind classes |
| **Component** | `css/style.css` | Custom website components (navigation, buttons, forms, containers) |
| **Prose** | `css/prose.css` | Rich text / WYSIWYG content styling (headings, lists, code, tables, blockquotes) |
| **Third-party** | `css/plyr.min.css`, `css/animxyz.min.css` | External library styles (do not edit) |
| **Theme variables** | Inline `<style>` in `<head>` | Dynamic ACF colors (`--theme-primary`, `--theme-secondary`, `--theme-alternate-bg`) |

**No preprocessor** — CSS is written directly. No SCSS, Less, or PostCSS. No npm build step for stylesheets.

### When to Use Each Layer

| Situation | Use |
|---|---|
| Page layout, spacing, responsive grid | Tailwind utility classes in PHP templates |
| Custom component that can't be expressed with utilities alone | `css/style.css` with BEM naming |
| Styling WYSIWYG / rich text output | `css/prose.css` |
| Dynamic theme colors | `var(--theme-primary)` referencing ACF-generated custom properties |
| Form styling | `css/style.css` (overrides for Forminator, WPForms, Contact Form 7) |

---

## 2. BEM Naming Convention — REQUIRED

All custom CSS class names **must** follow BEM (Block Element Modifier) methodology.

### Syntax

```
.block {}
.block__element {}
.block--modifier {}
.block__element--modifier {}
```

### Rules

1.  **Block** — A standalone component. Uses `kebab-case`.
2.  **Element** — A child of a block. Separated by double underscore `__`.
3.  **Modifier** — A variant or state. Separated by double hyphen `--`.
4.  **Never** nest BEM selectors deeper than 2 levels in CSS.
5.  **Never** use ID selectors (`#id`) for styling.
6.  **Never** use element selectors alone for component styling (e.g., no bare `h2 {}` inside a component — scope it to a BEM class).
7.  **Chain modifiers** on the same block rather than creating descendant selectors.

### Examples

```css
/* Good — BEM */
.site-header {}
.site-header__logo {}
.site-header__nav {}
.site-header__menu-toggle {}
.site-header--transparent {}
.site-header__menu-toggle--active {}

/* Bad — descendant chaining, no BEM */
.site-header a { }
.site-header .logo { }
.site-header .menu .item .link { }
.header-transparent { }
```

### WordPress-Generated Classes

WordPress outputs its own class names (`.current-menu-item`, `.menu-item-has-children`, `.sub-menu`, `.current_page_parent`, etc.). **Do not rename these.** Style them as BEM elements:

```css
/* Good — target WordPress classes as BEM elements */
.primary-menu {}
.primary-menu__item { /* targets <li> with .menu-item */ }
.primary-menu__item--current { /* .current-menu-item */ }
.primary-menu__sub-menu { /* .sub-menu */ }

/* Acceptable — WordPress classes directly */
.primary-menu .current-menu-item > a {}
.primary-menu .sub-menu {}
```

### BEM + Tailwind Coexistence

In PHP templates, BEM classes and Tailwind utilities coexist:

```html
<!-- BEM block class for custom styling + Tailwind utilities for layout/spacing -->
<nav class="primary-menu flex items-center gap-6">
  <ul class="primary-menu__list flex list-none m-0 p-0">
    <li class="primary-menu__item relative">
      <a class="primary-menu__link block py-2 text-white hover:text-primary transition-colors" href="#">
        About
      </a>
    </li>
  </ul>
</nav>
```

**Rule:** BEM classes carry custom CSS (colors, hover effects, transitions, complex interactions). Tailwind classes carry layout, spacing, and responsive behavior. **Do not use `@apply` or mix BEM with Tailwind in the CSS files** — keep Tailwind in the templates and custom styles in the stylesheets.

---

## 3. File Organization

### `css/style.css`

Primary component stylesheet. Contains:

-   CSS reset / normalize
-   Typography defaults (body, heading base sizes)
-   Site header / navigation (desktop + mobile)
-   Button system (`.btn`, `.btn--primary`, `.btn--outline`, etc.)
-   Form overrides (Forminator, WPForms, Contact Form 7)
-   Container utility (`.x-container`)
-   Skip-to-content link
-   Utility classes (`.scrollbar`, `.sr-only`)
-   Animations / transitions

**Order within the file:**
1.  Custom properties (`:root`)
2.  Reset / normalize
3.  Base typography (`body`, `h1`–`h6`, `a`, `p`)
4.  Layout components (header, footer, container)
5.  Navigation (desktop, mobile)
6.  Reusable components (buttons, forms)
7.  Third-party overrides
8.  Utility classes
9.  Media queries (mobile-first overrides at the bottom)

### `css/prose.css`

Rich text / WYSIWYG content styling. Applies to `.prose` wrapper class.

-   Typography scale for content headings
-   Paragraph spacing and line-height
-   List styling (unordered, ordered, nested)
-   Blockquote styling
-   Code blocks and inline code (including highlight.js syntax themes)
-   Table styling
-   Image / figure / video embeds
-   Link styling
-   Dark mode support (`[data-color-scheme="dark"]`)
-   High contrast mode (`@media (prefers-contrast: high)`)
-   Reduced motion (`@media (prefers-reduced-motion: reduce)`)
-   Print styles (`@media print`)

### `css/custom.inline.css`

Reserved for critical inline styles or small custom overrides. Currently empty.

### Do NOT create additional CSS files without a corresponding enqueue in `functions.php`.

---

## 4. CSS Custom Properties (Design Tokens)

### Dynamic Theme Colors (ACF)

Defined inline by `functions.php` — **never hardcode these values in CSS files:**

```css
--theme-primary
--theme-primary-rgb
--theme-secondary
--theme-alternate-bg
```

Usage:
```css
.site-header {
    background-color: var(--theme-primary);
}

.btn--primary {
    background-color: var(--theme-primary);
    color: #ffffff;
}

.section-title {
    color: var(--theme-primary);
}
```

### Static Design Tokens

Defined at the top of `css/style.css` or `css/prose.css`:

| Variable | Value | Usage |
|---|---|---|
| `--font-family-heading` | `'Poppins', sans-serif` | All headings |
| `--font-family-body` | `'Work Sans', sans-serif` | Body text |
| `--font-family-code` | `'Fira Code', 'Courier New', monospace` | Code blocks |
| `--color-text-primary` | `var(--theme-primary)` | Primary text color |
| `--color-text-secondary` | `#4B5563` | Secondary text |
| `--color-text-tertiary` | `#9CA3AF` | Muted text |
| `--color-bg-base` | `#FFFFFF` | Page background |
| `--color-bg-app` | `#FAFAFA` | Alternate surface |
| `--color-border-input` | `#E5E7EB` | Form input borders |
| `--color-border-subtle` | `#F3F4F6` | Subtle dividers |
| `--ease-out-expo` | `cubic-bezier(0.19, 1, 0.22, 1)` | Smooth transitions |

**Rule:** Always define new reusable values as custom properties. Don't repeat hardcoded colors or values.

---

## 5. Responsive Design

### Tailwind Breakpoints (PHP Templates)

| Prefix | Width | Usage |
|---|---|---|
| _(none)_ | 0px+ | Base / mobile |
| `sm:` | 640px+ | Small tablets |
| `md:` | 768px+ | Tablets |
| `lg:` | 1024px+ | Desktop |
| `xl:` | 1280px+ | Large desktop |
| `2xl:` | 1536px+ | Extra large |
| `ml:` | 1249px+ | "Medium-large" (custom) |
| `sl:` | 1028px+ | "Small-large" (custom) |

### Media Queries (CSS Files)

Use **mobile-first** approach in CSS files:

```css
/* Base — mobile */
.nav {
    display: none;
}

/* Desktop — override */
@media screen and (min-width: 1024px) {
    .nav {
        display: flex;
    }
}
```

**Exception:** For complex desktop components that need to be simplified on mobile, use `max-width`:

```css
@media screen and (max-width: 1024px) {
    .nav {
        /* Mobile-specific overrides */
    }
}
```

### Container Width

The standard container uses Tailwind's `container` class:

```html
<div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
```

Custom `.x-container` for max-width 1440px with responsive padding. Use this when the Tailwind container's max-width is insufficient.

---

## 6. Typography

### Font Families

```css
body {
    font-family: 'Work Sans', sans-serif;
}

h1, h2, h3, h4, h5, h6 {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
}

code, pre {
    font-family: 'Fira Code', 'Courier New', monospace;
}
```

### Type Scale (Base)

| Element | Size | Weight |
|---|---|---|
| `body` | 16px (1rem) | 400 |
| `h1` | 3rem (48px) | 700 |
| `h2` | 2.25rem (36px) | 700 |
| `h3` | 1.5rem (24px) | 700 |
| `h4` | 1.25rem (20px) | 700 |
| `small` | 0.875rem (14px) | 400 |

### Prose Type Scale (`.prose` wrapper)

| Element | Default | Mobile (`<768px`) |
|---|---|---|
| `h1` | 2.25rem | 1.875rem |
| `h2` | 1.75rem | 1.5rem |
| `h3` | 1.375rem | 1.25rem |
| `h4` | 1.125rem | 1.125rem |
| `p` | 1.125rem | 1rem |
| `li` | 1.125rem | 1rem |

**Rule:** Never set raw `font-size` on individual components. Use the type scale above or Tailwind utility classes.

---

## 7. Spacing

### Tailwind Spacing Scale (Used in PHP Templates)

Based on Tailwind's default rem scale. Common section spacing patterns:

```html
<!-- Standard section vertical padding -->
<section class="py-16 lg:py-24">

<!-- Tight section spacing -->
<section class="py-12 lg:py-16">

<!-- Large hero spacing -->
<section class="py-20 lg:py-28">

<!-- No padding (full-bleed) -->
<section class="">
```

### Consistent Section Margins

Sections use `my-` (margin-y) for separation:

```html
<section class="my-16 lg:my-24">
```

### Custom CSS Spacing

In CSS files, use `rem` units for spacing:

```css
.section {
    padding-block: 4rem;    /* 64px */
}
```

**Rule:** Never use `px` for spacing. Use `rem` (or Tailwind utilities, which are rem-based).

---

## 8. Buttons

### Button System

Base class `.btn` with modifier variants:

```css
.btn {}                    /* Base button */
.btn--primary {}           /* Solid brand color */
.btn--secondary {}         /* Secondary color */
.btn--outline {}           /* Transparent with border */
.btn--white-outline {}     /* White border for dark backgrounds */
.btn--sm {}                /* Small size */
.btn--lg {}                /* Large size */
```

### Button HTML Pattern

```html
<a href="/contact/" class="btn btn--primary">
  Get Started
</a>
```

### Button States

Every button variant must define:
-   `:hover`
-   `:focus-visible` (accessibility)
-   `:active`
-   Transition on `background-color`, `color`, `border-color`, `transform`

```css
.btn--primary {
    background-color: var(--theme-primary);
    color: #ffffff;
    padding: 0.75rem 1.5rem;
    border-radius: 0.375rem;
    font-weight: 600;
    transition: background-color 0.2s ease, transform 0.15s ease;
}

.btn--primary:hover {
    filter: brightness(1.1);
    transform: translateY(-1px);
}

.btn--primary:focus-visible {
    outline: 2px solid var(--theme-primary);
    outline-offset: 2px;
}

.btn--primary:active {
    transform: translateY(0);
}
```

---

## 9. Forms

### Third-Party Form Plugins

The theme supports Forminator, WPForms, and Contact Form 7. **Do not** write generic form styles — scope them to the plugin's selector prefix.

```css
/* Forminator — scoped overrides */
.forminator-ui.forminator-custom-form {}
.forminator-ui .forminator-field {}
.forminator-ui .forminator-input {}

/* WPForms — scoped overrides */
.wpforms-form {}
.wpforms-form .wpforms-field {}
.wpforms-form .wpforms-submit-container {}

/* Contact Form 7 — scoped overrides */
.wpcf7-form {}
.wpcf7-form .wpcf7-form-control {}
```

### Form Field States

All form inputs must define:
-   `:focus` — visible focus ring using `var(--theme-primary)`
-   `:hover` — subtle border change
-   `.wpcf7-not-valid` / `:invalid` / error states (use plugin-specific classes)
-   `[disabled]` — reduced opacity, no pointer events

### Form Layout

```css
.form-group {
    margin-bottom: 1.5rem;
}

.form-group__label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
}

.form-group__input {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid var(--color-border-input);
    border-radius: 0.375rem;
    font-size: 1rem;
    transition: border-color 0.2s ease;
}

.form-group__input:focus {
    border-color: var(--theme-primary);
    outline: none;
    box-shadow: 0 0 0 3px rgba(var(--theme-primary-rgb), 0.15);
}
```

---

## 10. Navigation

### Desktop Navigation

```css
.primary-menu {}                    /* Block — the <nav> or <ul> */
.primary-menu__item {}              /* List items */
.primary-menu__link {}              /* Anchor tags */
.primary-menu__link--active {}      /* Current page */
.primary-menu__link--has-children {} /* Parent menu items */
.primary-menu__sub-menu {}          /* Dropdown container */
.primary-menu__sub-menu__item {}    /* Dropdown items — note: deep BEM only when necessary */
.primary-menu__sub-menu__link {}    /* Dropdown links */

/* States */
.primary-menu__link:hover {}
.primary-menu__link:focus-visible {}
```

### Mobile Navigation

```css
.mobile-menu {}                     /* Block — the slide-out panel */
.mobile-menu__overlay {}            /* Full-screen backdrop */
.mobile-menu__panel {}              /* Slide-in panel */
.mobile-menu__toggle {}             /* Hamburger button */
.mobile-menu__toggle--active {}     /* Open state */
.mobile-menu__item {}               /* Mobile nav items */
.mobile-menu__link {}               /* Mobile nav links */
.mobile-menu__link--active {}       /* Current mobile page */
.mobile-menu__sub-toggle {}         /* Sub-menu expand button */
.mobile-menu__sub-toggle--open {}   /* Expanded state */
.mobile-menu__sub-menu {}           /* Nested sub-menu */
```

### Navigation States

All interactive navigation elements must support keyboard navigation:
-   `:focus-visible` outline on all links and toggles
-   `:hover` visual feedback
-   `aria-expanded` styling for dropdown toggles (via `[aria-expanded="true"]` selector)

---

## 11. Accessibility

### Focus Indicators

Every interactive element must have a visible focus style:

```css
:focus-visible {
    outline: 2px solid var(--theme-primary);
    outline-offset: 2px;
}
```

**Never** use `outline: none` without providing an alternative focus indicator.

### Skip Navigation

```css
.skip-link {
    position: absolute;
    top: -100%;
    left: 1rem;
    z-index: 10000;
    padding: 0.5rem 1rem;
    background-color: var(--theme-primary);
    color: #ffffff;
    font-weight: 600;
}

.skip-link:focus {
    top: 1rem;
}
```

### Screen Reader Only

Use Tailwind's `sr-only` class or the equivalent CSS:

```css
.sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border: 0;
}
```

### Reduced Motion

Respect user motion preferences:

```css
@media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}
```

### High Contrast Mode

```css
@media (prefers-contrast: high) {
    /* Increase contrast for readability */
}
```

### Color Contrast

All text must meet WCAG 2.1 AA contrast ratios:
-   Normal text: 4.5:1 minimum
-   Large text (18px+ bold, 24px+ regular): 3:1 minimum

---

## 12. Dark Mode

Dark mode is controlled via a `data-color-scheme` attribute on `<html>`:

```css
[data-color-scheme='dark'] {
    --color-bg-base: #1a1a2e;
    --color-text-primary: #e0e0e0;
}

[data-color-scheme='dark'] .btn--primary {
    /* Dark mode button overrides */
}
```

All new components should include dark mode variants where the design calls for it.

---

## 13. Print Styles

Print styles go in `css/prose.css` inside a `@media print {}` block:

```css
@media print {
    .site-header,
    .site-footer,
    .btn {
        display: none !important;
    }

    body {
        font-size: 12pt;
        color: #000;
        background: #fff;
    }

    a[href]::after {
        content: " (" attr(href) ")";
        font-size: 0.8em;
    }
}
```

---

## 14. Third-Party Overrides

### Rules for Overriding Third-Party CSS

1.  **Always** scope overrides to the third-party component's base selector.
2.  **Do NOT** edit third-party files directly — overrides go in `css/style.css`.
3.  **Use `!important` sparingly** — only when the third-party library uses inline styles or equally specific selectors.
4.  **Document which plugin/version** the override targets with a comment.

```css
/* Override Forminator submit button (v1.29+) */
.forminator-ui.forminator-custom-form .forminator-button-submit {
    background-color: var(--theme-primary);
    font-family: var(--font-family-heading);
    font-weight: 600;
}
```

### Currently Integrated Third-Party Styles

| Library | File | Override Location |
|---|---|---|
| Plyr (media player) | `css/plyr.min.css` | `css/style.css` — scoped overrides |
| AnimXYZ (animations) | `css/animxyz.min.css` | Used via Tailwind utility classes |
| Twind (Tailwind runtime) | `js/twind.min.js` | Config: `tailwind.config.js` + `js/head.js` |
| highlight.js (syntax) | `css/prose.css` | Inline theme definitions |

---

## 15. CSS Rules — Quick Reference

### DO

-   Use BEM naming for all custom CSS classes
-   Use CSS custom properties for colors, fonts, and repeated values
-   Use `rem` for spacing and `em` for component-relative sizing
-   Write mobile-first media queries (`min-width`)
-   Scope all form styles to the plugin's prefix
-   Include `:focus-visible` styles on every interactive element
-   Include `prefers-reduced-motion` support
-   Keep CSS files organized with clear section comments
-   Use Tailwind utilities in PHP templates for layout/spacing
-   Group related rules inside a single BEM block
-   Sort properties consistently: positioning → display → box-model → typography → visual → misc

### DON'T

-   Don't use ID selectors for styling
-   Don't nest selectors deeper than 2 levels
-   Don't use `!important` unless overriding third-party inline styles
-   Don't write bare element selectors inside components (scope them)
-   Don't use `px` for font sizes or spacing
-   Don't create new CSS files without enqueueing them in `functions.php`
-   Don't edit `plyr.min.css` or `animxyz.min.css` directly
-   Don't use `@apply` or mix Tailwind with custom CSS
-   Don't hardcode theme colors — use `var(--theme-primary)`
-   Don't leave commented-out code in production CSS
-   Don't use `all: unset` — be explicit about what you're resetting
-   Don't use `float` for layout
-   Don't use `<br>` for spacing in WYSIWYG content

### Property Order

Properties within a rule should follow this order:

1.  **Positioning:** `position`, `top`, `right`, `bottom`, `left`, `z-index`, `transform`, `translate`
2.  **Display:** `display`, `flex`, `grid`, `flex-direction`, `align-items`, `justify-content`, `gap`
3.  **Box Model:** `width`, `height`, `max-width`, `padding`, `margin`, `border`, `border-radius`
4.  **Typography:** `font-family`, `font-size`, `font-weight`, `line-height`, `text-align`, `color`
5.  **Visual:** `background`, `background-color`, `box-shadow`, `opacity`, `filter`
6.  **Misc:** `transition`, `animation`, `cursor`, `pointer-events`, `user-select`

```css
.component {
    position: relative;
    z-index: 10;

    display: flex;
    align-items: center;
    gap: 1rem;

    width: 100%;
    padding: 1.5rem;

    font-size: 1rem;
    font-weight: 600;
    color: var(--color-text-primary);

    background-color: var(--color-bg-base);
    border-radius: 0.5rem;

    transition: transform 0.2s ease;
}
```

---

## 16. CSS Delivery & Enqueueing

CSS files are enqueued in `functions.php`. When adding a new stylesheet:

```php
wp_enqueue_style(
    'silverride-my-styles',                                   // Handle (unique, prefixed)
    get_template_directory_uri() . '/css/my-styles.css',       // Path
    array(),                                                   // Dependencies
    wp_get_theme()->get('Version'),                            // Version (cache bust)
    'all'                                                      // Media
);
```

### Loading Order

1.  Third-party CSS (Plyr, AnimXYZ)
2.  `css/prose.css` — rich text styling
3.  `css/style.css` — component styles (last, so it can override)

### Critical CSS / Inline Styles

Dynamic theme colors are output inline in `<head>` by `silverride_output_custom_colors()`. This is the **only** acceptable use of inline styles. Do not add other inline styles or `<style>` blocks in PHP templates.

---

## 17. Tailwind Configuration

### `tailwind.config.js` / `js/head.js`

The Tailwind runtime (Twind) configuration lives in two files:

-   `tailwind.config.js` — static fallback values for build/design reference
-   `js/head.js` — **active runtime configuration** (reads ACF values dynamically)

When modifying the Tailwind configuration:

1.  Update both `tailwind.config.js` AND `js/head.js` to keep them in sync.
2.  **Custom colors** that reference theme values must use Twind's dynamic config pattern in `head.js`:

```js
const primaryColor = document.documentElement.style.getPropertyValue('--theme-primary').trim() || '#633E99';
```

3.  **Custom font sizes** must use `rem` units.
4.  **Custom breakpoints** must be named consistently across both files.
5.  **Custom variants** (e.g., `when-sm`, `touch`, `dark`) only need to be defined in `head.js`.

---

## 18. Performance

1.  **Minimize CSS file size** — remove unused rules. This theme uses Twind for Tailwind utilities, so static CSS files should only contain component-level styles.
2.  **Avoid expensive selectors** — no deeply nested descendant selectors, no universal selectors except in resets.
3.  **Use `will-change` sparingly** — only on elements that actually animate, and remove it after animation ends.
4.  **Prefer `transform` and `opacity`** for animations — they trigger compositing, not layout/paint.
5.  **Cache Tailwind's shim** — the Twind runtime generates CSS in-browser. It's cached in a `<style>` shim element inserted by `head.js`.
6.  **No `@import`** in CSS files — use WordPress `wp_enqueue_style()` for dependency management.

---

## Checklist Before Writing CSS

-   [ ] Class names follow BEM convention (`.block__element--modifier`)
-   [ ] No ID selectors used for styling
-   [ ] No `!important` unless overriding third-party inline styles
-   [ ] Colors use `var(--theme-primary)` or other CSS custom properties, not hardcoded hex
-   [ ] Spacing uses `rem` (not `px`)
-   [ ] Media queries are mobile-first (`min-width`)
-   [ ] `:focus-visible` defined for all interactive elements
-   [ ] `prefers-reduced-motion` respected
-   [ ] New CSS file is enqueued in `functions.php` (if applicable)
-   [ ] No bare element selectors used inside components
-   [ ] Properties ordered correctly (positioning → display → box-model → typography → visual → misc)
-   [ ] Tailwind utility classes used for layout/spacing in templates (not duplicated in CSS)
-   [ ] Form overrides scoped to plugin prefix
-   [ ] Dark mode considered where applicable
-   [ ] Print styles included where applicable
