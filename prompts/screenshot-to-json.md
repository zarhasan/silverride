# Screenshot to JSON Conversion Prompt

Convert a screenshot of a webpage into an ACF flexible content JSON file for import into WordPress via the JSON Page Importer.

## Workflow

When given a screenshot:

1.  **Visually analyze** the screenshot from top to bottom, identifying distinct content sections
2.  **Extract ALL visible text** — headings, paragraphs, list items, button labels, link text, FAQ questions/answers, table content, captions, labels, values, addresses, etc.
3.  **Identify section boundaries** — where one section ends and the next begins (look for whitespace gaps, background color changes, dividers, or layout shifts)
4.  **Classify each section** using the Section Type Cheat Sheet below
5.  **Describe all images** with descriptive alt text (since actual image files cannot be extracted from a screenshot)
6.  **Create the JSON file** following the structure and rules documented here
7.  **Save** to `src/json/{slug}.json`

---

## Content Fidelity — CRITICAL

> **NEVER add, remove, rephrase, summarize, reorder, or otherwise alter ANY content visible in the screenshot.**

The JSON must be a **1:1 faithful representation** of what you see. The only transformation is structural — mapping what you see into ACF flexible content format. Every word must be preserved verbatim.

1.  **Do not add content** — No invented headings, descriptions, list items, FAQ answers, or any text not visible in the screenshot
2.  **Do not remove content** — Every visible piece of content must appear in the JSON
3.  **Do not rephrase or rewrite** — Copy text exactly as it appears. Do not fix grammar or "improve" copy
4.  **Do not summarize or condense** — Five visible paragraphs means five paragraphs in the JSON
5.  **Do not reorder content** — Sections and items must appear in the same top-to-bottom order as the screenshot
6.  **Preserve inline formatting** — Bold, italic, underlined, and linked text must be represented with `<strong>`, `<em>`, `<u>`, and `<a>` tags in the appropriate fields

---

## Image Handling — IMPORTANT

Since actual image files cannot be extracted from a screenshot, follow these rules:

1.  **Describe what you see** — For any image, write a detailed alt text describing the visible content (e.g., `"alt": "Three people collaborating around a laptop in a modern office"`)
2.  **Use placeholder URLs** — For the `url` field, use a descriptive filename based on the alt text:
    - Format: `/wp-content/uploads/{year}/{month}/{slugified-description}.jpg`
    - Example: `/wp-content/uploads/2025/01/three-people-collaborating-around-laptop.jpg`
    - Use current year and `01` as the month
3.  **Do NOT include `source_url`** in the top-level JSON — there is no source to download images from
4.  **Mark images as needing replacement** — Add a comment field or note that actual images will need to be manually uploaded
5.  **Logos and icons** — Describe them as specifically as possible (e.g., "Nike swoosh logo", "Blue shield icon with checkmark")
6.  **If no image is visible** for a section, omit the image field entirely (do not use empty strings or empty objects)

---

## Top-Level JSON Structure

```json
{
  "page_title": "Page Title",
  "page_template": "page-templates/flexible.php",
  "sections": [ ... ]
}
```

| Field | Required | Description |
|-------|----------|-------------|
| `page_title` | Yes | The H1 heading of the page (or the most prominent heading if no H1 is visually distinguishable) |
| `page_template` | Yes | Always `"page-templates/flexible.php"` (use this exact value) |
| `source_url` | **No** | Do NOT include this field for screenshot imports — there is no source URL for image downloads |
| `sections` | Yes | Array of ACF flexible content sections |

---

## Section Type Cheat Sheet — Visual Cues

Use this guide to identify sections visually. Look at layout, composition, and content patterns.

| What You See in the Screenshot | ACF Layout | `type` Value |
|--------------------------------|------------|--------------|
| **Full-width banner** at the top with a large heading, subtitle/description, one or more buttons, and often a large image or background | `hero` | `"home"` for homepage-style, `"page"` for interior pages |
| **Simple centered heading** section — just a title and possibly a short subtitle, no other content | `section_title` | — |
| **Rich text content** — one or more paragraphs of body text, possibly with inline formatting, lists, or links inside | `text` | `"default"` or, if visually distinct from other text sections, `"alt"` or `"heavy"` |
| **Checklist or info blocks** with a heading, multiple items each having a title + description, and an image on one side | `information` | `"default"` (image right) or `"alt"` (image left) |
| **Grid of cards** — repeating visual blocks (with or without images, titles, descriptions) arranged in columns | `grid` | Match appearance: `"cards"`, `"service-cards"`, `"clickable-cards"`, `"floating-cards"`, `"compliance-cards"`, `"information-cards"`, `"incentives"`, `"basic"`, `"alt"`, `"highlight"`, `"textual"` |
| **Banner section** with a heading, description, and a prominent button (often with a background color or image) | `call_to_action` | `"default"` or `"simple"` |
| **Accordion-style FAQ** — expandable questions with answers visible or collapsed | `faqs` | — |
| **About section** — image, descriptive text, feature items, and links | `about` | `"default"` or `"bullet-list"` |
| **Contact section** — heading, description, and a visible form | `contact` | — |
| **Simple bulleted/checked point list** without an image — heading followed by bullet points | `points` | `"default"` or `"grid"` |
| **Row of link buttons** or cards linking to other pages | `links` | — |
| **Service features** — heading, checkmark list, and an image | `services` | — |
| **Mission or values statement** — a quote block, descriptive text, and service/feature cards | `our_mission` | — |
| **Process flow** — heading, subtitle, and a diagram/flowchart image | `process` | — |
| **Stats section** — heading, description, and statistics with large numbers + labels; often with a certificate/image | `certificates` | — |
| **Compliance section** — checklist items, a score (percentage or number), and an image or video | `compliance` | — |
| **Testimonial** — a quote, attribution (name, company, title), and sometimes a logo/client image | `testimonials` | — |
| **Team member cards** — photos, names, job titles, bios arranged in a grid | `team` | — |
| **Client/partner logo grid** — company logos arranged in columns | `logos` | — |
| **Statistics display** — large numbers with labels in a grid or row | `stats` | — |
| **Data table** — rows and columns with headers | `table` | — |
| **Video grid** — video thumbnails with titles in a grid | `grid_videos` | — |
| **Blog post listing** — post cards with images, titles, dates, and a "View All" link | `blog` | — |
| **Image gallery** — rows of photos/images | `gallery` | — |
| **Location/office cards** — addresses, possibly with a map | `locations` | — |
| **Embedded form** — a visible form without contact context | `form` | — |
| **Freeform WYSIWYG block** — rich text or HTML content that doesn't fit other patterns | `callout` | — |
| **Empty space / divider** — a visible gap between sections with no content | `space` | — |

### Grid Type Selection by Appearance

| Visual Appearance | Grid `type` |
|-------------------|-------------|
| Cards with images, title, description — standard card layout | `"cards"` |
| Cards with title + description only (no images) — often for service offerings | `"service-cards"` |
| Entire card is a click target | `"clickable-cards"` |
| Cards have a floating/elevated look with shadows | `"floating-cards"` |
| Cards related to compliance/accessibility topics | `"compliance-cards"` |
| Informational cards with icons | `"information-cards"` |
| Incentive/offer cards | `"incentives"` |
| Simple bordered cards, often with icons | `"basic"` |
| Alternative visual styling | `"alt"` |
| Emphasized or highlighted cards | `"highlight"` |
| Text-focused cards with minimal visual elements | `"textual"` |

### Estimating grid_size

Count the number of cards visible per row in the screenshot:
-   If 2 cards per row → `"grid_size": 2`
-   If 3 cards per row → `"grid_size": 3`
-   If 4 cards per row → `"grid_size": 4`
-   If 5 cards per row → `"grid_size": 5`
-   If the grid is on a single card → `"grid_size": 1` (not typical, but possible)
-   If you cannot determine → default to `3` or omit the field

---

## Section Reference — Complete Field Schemas

### hero

```json
{
  "acf_fc_layout": "hero",
  "type": "page",
  "subtitle": "Small label above the title",
  "title": "Main Hero Heading",
  "description": "<p>Hero description text with <strong>bold</strong> and <a href=\"#\">links</a>.</p>",
  "image": {
    "url": "/wp-content/uploads/2025/01/hero-banner-image.jpg",
    "alt": "Description of what the hero image shows"
  },
  "links": [
    {
      "link": {
        "title": "Button Text",
        "url": "#",
        "target": ""
      }
    }
  ],
  "media_type": "image",
  "video": "",
  "transcript": ""
}
```

| Field | Type | Required | Notes |
|-------|------|----------|-------|
| `type` | string | Yes | `"home"` or `"page"` |
| `subtitle` | string | No | Small label above the title |
| `title` | string | Yes | Main heading |
| `description` | wysiwyg | Yes | Body text, can contain HTML formatting |
| `image` | image | No | Hero image (use placeholder — see Image Handling rules) |
| `links` | repeater | No | Array of link objects, each with `{link: {title, url, target}}` |
| `media_type` | string | No | `"image"` or `"video"` |
| `video` | string | No | Video file URL when media_type is video |
| `transcript` | wysiwyg | No | Video transcript |

**Hero type decision:**
-   Use `"home"` if the hero has a video background, animated elements, search bar, or home-page-specific content
-   Use `"page"` for interior page heroes (standard banner with breadcrumb-like feel)

**Link URLs:** Since the actual URL destinations are not visible in a screenshot, use `"#"` for all link URLs. The `title` text must be the exact button/link label visible in the screenshot.

### section_title

```json
{
  "acf_fc_layout": "section_title",
  "title": "Section Heading Text",
  "description": "Optional subtitle or description below the heading"
}
```

| Field | Type | Required | Notes |
|-------|------|----------|-------|
| `title` | string | Yes | Section heading |
| `description` | textarea | No | Subtitle or description below heading |

Use this when you see a standalone section heading **without** body text, cards, lists, or other complex content. If there is body text that follows, use `text` instead.

### text

```json
{
  "acf_fc_layout": "text",
  "type": "default",
  "title": "Optional Section Title",
  "description": "<p>Paragraph text with <strong>bold</strong> and <em>italic</em> formatting preserved. May contain <a href=\"#\">links</a>.</p><ul><li>List item one</li><li>List item two</li></ul>"
}
```

| Field | Type | Required | Notes |
|-------|------|----------|-------|
| `type` | string | No | `"default"`, `"alt"`, or `"heavy"` |
| `title` | string | No | Section heading (omit if the section starts directly with body text) |
| `description` | wysiwyg | Yes | Full HTML body content |

**Type guidance:**
-   `"default"` — standard text section
-   `"alt"` — visually distinct (different background, wider, or styled differently)
-   `"heavy"` — text-heavy section with lots of content

**IMPORTANT:** Always use `description` (never `content`) for the text body field. All paragraphs, lists, blockquotes, inline formatting, and links visible in the screenshot must be captured in the `description` field as HTML.

### information

```json
{
  "acf_fc_layout": "information",
  "type": "default",
  "title": "Section Title",
  "description": "<p>Optional intro text before the items</p>",
  "items": [
    {
      "title": "Item Heading",
      "description": "Item description text"
    },
    {
      "item": "Simple checkmark point without a heading"
    }
  ],
  "link": {
    "title": "Link Text",
    "url": "#",
    "target": ""
  },
  "image": {
    "url": "/wp-content/uploads/2025/01/information-section-image.jpg",
    "alt": "Description of the side image"
  }
}
```

| Field | Type | Required | Notes |
|-------|------|----------|-------|
| `type` | string | Yes | `"default"` (image right) or `"alt"` (image left) |
| `title` | string | Yes | Section heading |
| `description` | wysiwyg | No | Intro text above items |
| `items` | repeater | No | Checklist items |
| `link` | link | No | Single CTA link |
| `image` | image | No | Side image (use placeholder) |

**Item format rules:**
-   Use `{"title": "...", "description": "..."}` when items have a bold heading + description text
-   Use `{"item": "..."}` when items are simple bullet/checkmark points without a heading
-   Do NOT mix formats in the same section — use one format for all items

### grid

```json
{
  "acf_fc_layout": "grid",
  "type": "cards",
  "grid_size": 3,
  "title": "Grid Section Title",
  "description": "<p>Optional intro text above the grid</p>",
  "items": [
    {
      "image": {
        "url": "/wp-content/uploads/2025/01/card-image-description.jpg",
        "alt": "Description of the card image"
      },
      "title": "Card Title",
      "description": "<p>Card description text with <a href=\"#\">links</a> if any.</p>",
      "link": "#"
    }
  ],
  "footer_description": "<p>Optional text below the grid</p>",
  "cta": {
    "title": "View All Button",
    "url": "#",
    "target": ""
  },
  "background_color": "",
  "disable_margins": false
}
```

| Field | Type | Required | Notes |
|-------|------|----------|-------|
| `type` | string | Yes | Grid type — see Grid Type Selection table |
| `grid_size` | number | No | Column count: 2, 3, 4, or 5 |
| `title` | string | No | Section heading |
| `description` | wysiwyg | No | Intro text |
| `items` | repeater | Yes | Grid cards |
| `footer_description` | wysiwyg | No | Text below grid |
| `cta` | link | No | Call-to-action link below grid |
| `background_color` | string | No | Approximate hex color if section has a distinct background |
| `disable_margins` | boolean | No | Set `true` if the grid section has no visible top/bottom spacing |

**Grid item fields:**
-   `image` — card image (use placeholder with descriptive alt text). Omit if no image is visible.
-   `title` — card heading text
-   `description` — card body text (can contain HTML). Omit if empty.
-   `link` — if the card appears clickable and has visible link text, use that URL text (or `"#"` if URL is not visible). Omit if the card is not clickable.

### call_to_action

```json
{
  "acf_fc_layout": "call_to_action",
  "type": "default",
  "title": "CTA Heading",
  "subtitle": "Optional smaller heading above the main title",
  "description": "<p>CTA description text</p>",
  "link": {
    "title": "Button Text",
    "url": "#",
    "target": ""
  },
  "image": {
    "url": "/wp-content/uploads/2025/01/cta-section-image.jpg",
    "alt": "Description of the CTA image"
  },
  "media_type": "image",
  "video": ""
}
```

| Field | Type | Required | Notes |
|-------|------|----------|-------|
| `type` | string | No | `"default"` or `"simple"` |
| `title` | string | Yes | CTA heading |
| `subtitle` | string | No | Secondary heading |
| `description` | wysiwyg | No | Body text |
| `link` | link | No | Single CTA button |
| `links` | repeater | No | Multiple CTA buttons (use instead of `link` for multiple buttons) |
| `image` | image | No | CTA image (use placeholder) |
| `media_type` | string | No | `"image"` or `"video"` |

**IMPORTANT:** Use `link` (singular, an object) for a single button. Use `links` (plural, a repeater array) only when you see multiple distinct buttons.

### faqs

```json
{
  "acf_fc_layout": "faqs",
  "title": "Frequently Asked Questions",
  "description": "Optional intro text above the questions",
  "items": [
    {
      "question": "What is the exact question text?",
      "answer": "<p>The exact answer text, may contain <a href=\"#\">links</a>.</p>"
    }
  ],
  "cta": {
    "title": "Still Have Questions?",
    "url": "#",
    "target": ""
  }
}
```

| Field | Type | Required | Notes |
|-------|------|----------|-------|
| `title` | string | Yes | Section heading |
| `description` | textarea | No | Intro text |
| `items` | repeater | Yes | FAQ items with `question` and `answer` (answer can contain HTML) |
| `cta` | link | No | Call-to-action link below the FAQs |

**Identifying FAQs visually:**
-   Accordion-style with +/- icons next to each question
-   Bold questions followed by regular-weight answers
-   Sometimes numbered, sometimes not
-   Often have "Frequently Asked Questions" or similar as the section heading

### about

```json
{
  "acf_fc_layout": "about",
  "type": "default",
  "title": "About Section Title",
  "description": "<p>Descriptive body text about the company/product.</p>",
  "items": [
    {
      "title": "Feature or value title",
      "description": "Description of the feature or value",
      "icon": ""
    }
  ],
  "footnotes": "<p>Optional footnote or small print</p>",
  "links": [
    {
      "link": {
        "title": "Learn More",
        "url": "#",
        "target": ""
      }
    }
  ],
  "image": {
    "url": "/wp-content/uploads/2025/01/about-section-image.jpg",
    "alt": "Description of the about section image"
  }
}
```

| Field | Type | Required | Notes |
|-------|------|----------|-------|
| `type` | string | Yes | `"default"` (with image) or `"bullet-list"` (image replaced by bulleted items) |
| `title` | string | Yes | Section heading |
| `description` | wysiwyg | No | Main body text |
| `items` | repeater | No | Each has `title` and `description` |
| `footnotes` | wysiwyg | No | Footnote text at the bottom |
| `links` | repeater | No | Array of link objects |
| `image` | image | No | Only when type is `"default"` |

### services

```json
{
  "acf_fc_layout": "services",
  "title": "Our Services",
  "description": "<p>Section description text</p>",
  "features": [
    "Feature or capability text",
    "Another feature"
  ],
  "link": {
    "title": "Learn More",
    "url": "#",
    "target": ""
  },
  "image": {
    "url": "/wp-content/uploads/2025/01/services-section-image.jpg",
    "alt": "Description of the services image"
  }
}
```

| Field | Type | Required | Notes |
|-------|------|----------|-------|
| `title` | string | Yes | Section heading |
| `description` | wysiwyg | No | Body text |
| `features` | string array | No | Each is a simple string — one per checkmark/bullet point visible |
| `link` | link | No | CTA link |
| `image` | image | No | Side image (use placeholder) |

### points

```json
{
  "acf_fc_layout": "points",
  "type": "default",
  "title": "Key Points",
  "description": "<p>Optional intro text</p>",
  "items": [
    {"title": "Point Title", "description": "Point description text"}
  ]
}
```

| Field | Type | Required | Notes |
|-------|------|----------|-------|
| `type` | string | No | `"default"` or `"grid"` |
| `title` | string | Yes | Section heading |
| `description` | wysiwyg | No | Intro text |
| `items` | repeater | Yes | Each has `title` and `description` |

Use this for a simple list of points (each with a title and description) when there is no associated image.

### callout

```json
{
  "acf_fc_layout": "callout",
  "type": "default",
  "content": "<p>Freeform HTML content that doesn't fit other section types.</p><ul><li>Item 1</li><li>Item 2</li></ul>"
}
```

Use this as a fallback when the screenshot content doesn't clearly match any other section type.

### space

```json
{
  "acf_fc_layout": "space"
}
```

Use this to represent a deliberate empty gap between sections. Only include if there is a clearly intentional spacing gap (not just normal section margins).

### Other Sections — Quick Reference

| Layout | Key Fields | Notes |
|--------|-----------|-------|
| `process` | `title`, `subtitle`, `image` | Diagram/flowchart image |
| `certificates` | `title`, `description`, `stats[{label, value}]`, `link`, `image` | Stats + certificate image |
| `compliance` | `title`, `description`, `items[{title, description}]`, `score`, `link`, `image` | Include `score` as a number if a percentage is visible |
| `contact` | `subtitle`, `title`, `description`, `contact_form` | Use `"[contact-form-7 id=\"abc123\" title=\"Contact Form\"]"` as placeholder |
| `links` | `links[{link: {title, url, target}}]` | Row of link buttons |
| `our_mission` | `title`, `quote`, `description`, `services[{icon, image, title, description, link}]`, `link` | Quote + service cards |
| `testimonials` | `title`, `description`, `image`, `quote`, `company`, `position` | Quote block with attribution |
| `team` | `title`, `description`, `members[{photo, name, title, bio, linkedin}]` | Team member grid |
| `logos` | `title`, `subtitle`, `description`, `columns`, `logos[{url, alt}]` | Logo grid — count columns for the `columns` field |
| `stats` | `title`, `items[{value, label}]` | Large numbers with labels |
| `table` | `title`, `description`, `table`, `footnote` | Data table — preserve all rows, columns, and headers |
| `blog` | `title`, `description`, `post_count`, `category`, `link` | Blog post listing |
| `gallery` | `title`, `description`, `images[{url, alt}]` | Image gallery |
| `locations` | `title`, `map_embed`, `map_link`, `locations[{name, address}]` | Office addresses |
| `form` | `shortcode`, `email` | Use placeholder shortcode |
| `grid_videos` | `title`, `description`, `columns`, `videos[{video_type, video_url, thumbnail, title}]` | Video grid |

---

## Link Object Format

All link URLs should use `"#"` since actual destinations are not visible in a screenshot.

**Single link** (used in `call_to_action.link`, `information.link`, etc.):
```json
"link": {
  "title": "Button Text",
  "url": "#",
  "target": ""
}
```

**Link repeater** (used in `hero.links`, `call_to_action.links`, `about.links`):
```json
"links": [
  {
    "link": {
      "title": "Button Text",
      "url": "#",
      "target": ""
    }
  }
]
```

---

## Image Format

Always use the object format with `url` and `alt`:

```json
"image": {
  "url": "/wp-content/uploads/2025/01/descriptive-filename.jpg",
  "alt": "Detailed description of what is visible in the image"
}
```

### Image rules for screenshots

1.  **Generate descriptive alt text** — Be specific and useful for accessibility (e.g., "Silver minivan with wheelchair ramp deployed in a suburban driveway" not "A car")
2.  **Use placeholder URLs** — Format: `/wp-content/uploads/YYYY/01/short-kebab-case-description.jpg`
3.  **Do NOT include `source_url`** at the top level — it serves no purpose for screenshots
4.  **File extension** — Use `.jpg` for photos, `.png` for graphics/logos with transparency, `.svg` for icons/logos that appear to be vector
5.  **Omit image field entirely** if no image is present — never use empty `""` or `{}` for the image field

---

## Visual Analysis Guide

### Identifying Heading Levels

-   **Largest, most prominent text** on the page → `<h1>` (this becomes `page_title`)
-   **Major section dividers** with large bold text → `<h2>`
-   **Subsections** with medium bold text → `<h3>`
-   Never skip heading levels (no `<h1>` to `<h3>` without an `<h2>` in between)

### Identifying Lists

-   Bullet points (•, -, *, etc.) → `<ul>`
-   Numbered items (1., 2., 3.) → `<ol>`
-   Checkmark icons (✓, ✔, or styled checkmark graphics) → `<ul>` (the theme handles checkmark styling)
-   Count items exactly — a list with 5 visible bullets must have exactly 5 `<li>` entries

### Identifying Tables

-   Grid-like layout with clear header row (bold text, different background)
-   Equal-width columns with aligned content
-   Count rows and columns exactly

### Identifying FAQs

-   Bold questions followed by lighter-weight answers
-   Collapsible accordion patterns (+/- toggle icons)
-   Often preceded by "FAQ" or "Frequently Asked Questions" heading

### Identifying CTAs / Buttons

-   Rounded rectangles with short text
-   Filled background color (distinct from page background)
-   Often at the bottom of sections or in hero areas

### Identifying Background Colors

-   If a section has a distinct background color (grey, brand color, etc.) that is clearly different from the page background, approximate the hex value and include `"background_color": "#f5f5f5"` in applicable sections (grid, text, etc.)
-   Use `#f5f5f5` for light grey, `#ffffff` for white, attempt to identify brand colors

---

## Section Identification — Step by Step

When analyzing a screenshot, follow this process for each section you identify:

1.  **Draw an invisible horizontal line** across the screenshot at each clear section boundary
2.  **List what you see** in the section: heading? image? paragraphs? cards? buttons? form? faqs?
3.  **Match to the Cheat Sheet** above — which layout most closely matches the content pattern?
4.  **Extract all text** — heading text, body text, button labels, list items, etc.
5.  **Build the JSON** for that section following the field schema
6.  **Move to the next section** — repeat until you reach the bottom of the screenshot

---

## Common Mistakes to Avoid

1.  **Using `"content"` instead of `"description"`** — The body text field is always `description`, never `content` (except in `callout` which uses `content`)
2.  **Using `"flexible.php"` for `page_template`** — The correct value is `"page-templates/flexible.php"`
3.  **Omitting the `type` field** on sections that require it — `hero`, `information`, `grid`, `call_to_action`, and `about` need a `type`
4.  **Stripping inline HTML from descriptions** — Bold (`<strong>`), italic (`<em>`), links (`<a>`), and lists must be preserved in WYSIWYG fields
5.  **Using `links` (plural) for a single button** — Use `link` (singular object) for one button, `links` (plural array) for multiple
6.  **Inconsistent item formats** — In `information.items`, don't mix `{title, description}` with `{item}` formats
7.  **Missing `grid_size`** when the grid column count is visible
8.  **Forgetting image alt text** — Every placeholder image must have descriptive alt text
9.  **Including `source_url`** — Screenshots have no source URL; omit this field
10. **Paraphrasing text** — Always copy text exactly as it appears in the screenshot
11. **Using `{item}` format in `grid.items`** — Grid items always use `{title, description, image, link}` keys

---

## Output Format

-   Output **only the complete JSON** — no code fences (no ```json), no preamble, no explanation, no "Here is the JSON"
-   The JSON must be valid and parseable (proper commas between array items and object keys, no trailing commas)
-   Use 2-space indentation for readability
-   The output file should be saved to `src/json/{slug}.json` where `{slug}` is a kebab-case version of the `page_title`

---

## Example

**Screenshot description:** A simple interior page with:
1.  A hero section: "Contact Us" heading, "We'd love to hear from you" description, a "Get Started" button, and a photo of a customer service representative
2.  A section title: "Our Office Locations"
3.  Two text sections: office addresses with contact info
4.  A contact form section with a visible form

**Expected JSON output:**

```json
{
  "page_title": "Contact Us",
  "page_template": "page-templates/flexible.php",
  "sections": [
    {
      "acf_fc_layout": "hero",
      "type": "page",
      "subtitle": "",
      "title": "Contact Us",
      "description": "<p>We'd love to hear from you</p>",
      "image": {
        "url": "/wp-content/uploads/2025/01/customer-service-representative-at-desk.jpg",
        "alt": "Customer service representative smiling at a desk with a headset"
      },
      "links": [
        {
          "link": {
            "title": "Get Started",
            "url": "#",
            "target": ""
          }
        }
      ],
      "media_type": "image",
      "video": "",
      "transcript": ""
    },
    {
      "acf_fc_layout": "section_title",
      "title": "Our Office Locations",
      "description": ""
    },
    {
      "acf_fc_layout": "text",
      "type": "default",
      "title": "Toronto Office",
      "description": "<p>123 King Street West<br>Toronto, ON M5V 1M4<br>Phone: (416) 555-0123</p>"
    },
    {
      "acf_fc_layout": "text",
      "type": "default",
      "title": "Vancouver Office",
      "description": "<p>456 Granville Street<br>Vancouver, BC V6C 1S4<br>Phone: (604) 555-0456</p>"
    },
    {
      "acf_fc_layout": "contact",
      "subtitle": "SEND US A MESSAGE",
      "title": "Get in Touch",
      "description": "Fill out the form below and our team will get back to you within 24 hours.",
      "contact_form": "[contact-form-7 id=\"abc123\" title=\"Contact Form\"]"
    }
  ]
}
```
