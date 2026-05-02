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

### Grid (`grid`)
**File:** `grid-basic.php` (basic), `grid-colorful.php` (colorful), `grid-alt.php` (alt), `grid-highlight.php` (highlight), `grid-textual.php` (textual), `grid-cards.php` (cards), `grid-floating-cards.php` (floating-cards), `grid-clickable-cards.php` (clickable-cards), `grid-compliance-cards.php` (compliance-cards), `grid-information-cards.php` (information-cards), `grid-incentives.php` (incentives), `grid-service-cards.php` (service-cards)
**Visual:** Flexible card grid. Section title + description + grid of items (image + title + description + link each). Configurable grid size (2/3/4/5 columns), container width, background color, margin toggle. Footer description + CTA button available. 12 visual styles:
- **Basic:** Simple grid cards
- **Colorful:** Vibrant colored cards
- **Alt:** Alternate card design
- **Highlight:** Emphasized/accent cards
- **Textual:** Text-focused minimal cards
- **Cards:** Standard card layout
- **Floating Cards:** Elevated/shadow cards
- **Service Cards:** Service-specific card style (with limit field)
- **Clickable Cards:** Full-card clickable targets
- **Compliance Cards:** Compliance-themed card design
- **Information Cards:** Info-display card style
- **Incentives:** Incentive/promotional cards

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
