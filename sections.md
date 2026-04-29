# Sections Documentation

This document provides a detailed description of each flexible content section in the SilverRide WordPress theme, including its design, fields, and common use cases.

## Table of Contents

1. [Hero Sections](#hero-sections)
2. [Content Sections](#content-sections)
3. [Grid Sections](#grid-sections)
4. [Interactive Sections](#interactive-sections)
5. [Utility Sections](#utility-sections)

---

## Hero Sections

### Hero (Home)

**Layout Key:** `hero` (Type: Home)

**ACF Fields:**
- `type` (button_group): Home | Page
- `subtitle` (text)
- `title` (text)
- `description` (wysiwyg)
- `links` (repeater): Add multiple links/buttons
- `image` (image)
- `service_links` (repeater): Links shown in bottom banner section
- `media_type` (button_group): Image | Video (conditional)
- `video` (file): MP4 video file
- `transcript` (wysiwyg): Video transcript for accessibility

**Template File:** `template-parts/sections/hero-home.php`

**Design Description:**
- Full-width hero section with split layout (content left, image right)
- Large bold subtitle in theme primary color
- Call-to-action buttons with primary/secondary styling
- Bottom banner with service navigation links in theme primary background
- Responsive grid that stacks on mobile

**Common Use Cases:**
- Homepage welcome section
- Landing page hero with key services overview
- Service overview pages introducing main offerings

---

### Hero (Page)

**Layout Key:** `hero` (Type: Page)

**ACF Fields:** Same as Hero (Home) + Page-specific options

**Template File:** `template-parts/sections/hero-page.php`

**Design Description:**
- Two-column layout with content and media side by side
- Optional video support with play/pause button and transcript toggle
- Border-bottom styling for page section differentiation
- Smaller scale than home hero

**Common Use Cases:**
- Interior page headers
- Service detail page introductions
- About page hero section

---

## Content Sections

### Section Title

**Layout Key:** `section_title`

**ACF Fields:**
- `title` (text)
- `description` (textarea)

**Template File:** `template-parts/sections/section_title-default.php`

**Design Description:**
- Simple centered text section
- Large heading with optional description below
- Generous vertical margins

**Common Use Cases:**
- Section dividers between content areas
- Page section headers within longer content

---

### Text

**Layout Key:** `text`

**ACF Fields:**
- `title` (text)
- `description` (wysiwyg): Full WYSIWYG editor

**Template File:** `template-parts/sections/text.php`

**Design Description:**
- Centered title with optional WYSIWYG description
- Prose styling for rich text content
- Same visual treatment as section title but with full HTML support

**Common Use Cases:**
- Rich text content blocks within page builders
- Content sections requiring headings and paragraphs

---

### About

**Layout Key:** `about`

**ACF Fields:**
- `type` (button_group): Default | Bullet List
- `title` (text)
- `description` (wysiwyg)
- `items` (repeater): Icon, Title, Description
- `footnotes` (wysiwyg)
- `links` (repeater)
- `image` (image): Conditional - Default type only
- `bullet_list` (group): Conditional - Bullet List type only

**Design Description:**
- Default: Two-column with image and content
- Bullet List: List-based layout with icons
- Icon + text items in a structured format

**Common Use Cases:**
- Company about pages
- Service/process explanation pages
- Team capability presentations

---

### Services

**Layout Key:** `services`

**ACF Fields:**
- `title` (text)
- `description` (wysiwyg)
- `features` (repeater): List of service features
- `link` (link)
- `image` (image)

**Template File:** `template-parts/sections/services.php`

**Design Description:**
- Two-column layout (image left, content right)
- Checkmark list of features with theme primary color icons
- Call-to-action button at bottom

**Common Use Cases:**
- Service listing pages
- Capabilities overview
- What we do sections

---

### Our Mission

**Layout Key:** `our_mission`

**ACF Fields:**
- `title` (text): Default "OUR MISSION"
- `quote` (text)
- `description` (textarea)
- `services` (repeater): Icon, Image, Title, Description, Link
- `link` (link)

**Template File:** `template-parts/sections/our_mission.php`

**Design Description:**
- Centered mission statement with quote styling
- Two-column service cards with icons/images
- Bordered card containers
- Centered CTA at bottom

**Common Use Cases:**
- Company mission statement pages
- Core values sections
- Service pillars introduction

---

### Process

**Layout Key:** `process`

**ACF Fields:**
- `title` (text): Default "Our Process"
- `subtitle` (text)
- `image` (image): Process flow diagram

**Template File:** `template-parts/sections/process.php`

**Design Description:**
- Centered title and subtitle
- Full-width process image/diagram
- Clean container layout

**Common Use Cases:**
- Workflow/process visualization
- Step-by-step service delivery explanation
- Methodology展示

---

### Certificates

**Layout Key:** `certificates`

**ACF Fields:**
- `title` (text): Default "Government Accessibility Services"
- `description` (wysiwyg)
- `stats` (repeater): Label, Value
- `link` (link)
- `image` (image)

**Template File:** `template-parts/sections/certificates-default.php`

**Design Description:**
- Gray background section
- Two-column with government credentials/logos
- Stats/list of achievements
- CTA button

**Common Use Cases:**
- Government certifications display
- Accredited services sections
- Credential showcases

---

### Compliance

**Layout Key:** `compliance`

**ACF Fields:**
- `title` (text): Default "Compliance Management"
- `description` (wysiwyg)
- `items` (repeater): Compliance categories
- `score` (number): 0-100 compliance score
- `link` (link)
- `image` (image)
- `transcript` (wysiwyg)

**Template File:** `template-parts/sections/compliance.php`

**Design Description:**
- Two-column with video and content
- Default video with play/pause controls
- Transcript toggle for accessibility
- Checklist of compliance areas with checkmark icons

**Common Use Cases:**
- AODA/ADA compliance information
- Compliance score demonstrations
- Regulatory requirement pages

---

### Call To Action

**Layout Key:** `call_to_action`

**ACF Fields:**
- `type` (button_group): Default
- `title` (text)
- `description` (wysiwyg)
- `link` (link)
- `media_type` (button_group): Image | Video
- `image` (image): Conditional
- `video` (file): Conditional
- `subtitles` (file): VTT file

**Template File:** `template-parts/sections/call_to_action-default.php`

**Design Description:**
- Rounded banner with theme primary background
- White text for high contrast
- Optional image or video alongside content
- Centered content layout

**Common Use Cases:**
- Contact request CTAs
- Service inquiry prompts
- Newsletter signups

---

### Information

**Layout Key:** `information`

**ACF Fields:**
- `type` (button_group): Default | Alt
- `title` (text)
- `description` (wysiwyg)
- `items` (repeater): Checklist items
- `link` (link)
- `image` (image)

**Template Files:**
- `template-parts/sections/information.php` (Default)
- `template-parts/sections/information-alt.php` (Alt)

**Design Description:**
- Two-column with image and checklist
- Default: Content left, image right
- Alt: Image left, content right
- Checkmark list with circular icons

**Common Use Cases:**
- Feature lists
- Requirement checklists
- Plan/policy overviews

---

### Contact

**Layout Key:** `contact`

**ACF Fields:**
- `subtitle` (text): Default "CONTACT US"
- `title` (text): Default "Get Free Initial Compliance Consultation"
- `description` (textarea)
- `contact_form` (text): Shortcode for contact form

**Template File:** `template-parts/sections/contact.php`

**Design Description:**
- Gray background section
- Two-column: Contact info left, form right
- Contact details (email, phone, address)
- Social media links
- Full contact form with fields

**Common Use Cases:**
- Contact page creation
- Consultation request forms
- General inquiry pages

---

## Grid Sections

### Grid (Multiple Types)

**Layout Key:** `grid`

**ACF Fields:**
- `type` (button_group): basic, alt, highlight, textual, cards, floating-cards, service-cards, clickable-cards, compliance-cards, information-cards, incentives
- `grid_size` (button_group): 2, 3, 4, 5 columns
- `title` (text)
- `description` (wysiwyg)
- `limit` (number): Conditional for service-cards
- `background_color` (color_picker)
- `items` (repeater): Image, Title, Description, Link
- `footer_description` (wysiwyg)
- `cta` (link)
- `disable_margins` (true_false)

**Template Files:**
- `template-parts/sections/grid-basic.php`
- `template-parts/sections/grid-alt.php`
- `template-parts/sections/grid-highlight.php`
- `template-parts/sections/grid-textual.php`
- `template-parts/sections/grid-cards.php`
- `template-parts/sections/grid-floating-cards.php`
- `template-parts/sections/grid-service-cards.php`
- `template-parts/sections/grid-clickable-cards.php`
- `template-parts/sections/grid-compliance-cards.php`
- `template-parts/sections/grid-information-cards.php`
- `template-parts/sections/grid-incentives.php`

**Type Descriptions:**

| Type | Description |
|------|-------------|
| basic | Simple bordered cards with icons |
| alt | Alternative grid styling |
| highlight | Emphasized/highlighted cards |
| textual | Text-focused layout |
| cards | Standard card grid |
| floating-cards | Elevated card styling |
| service-cards | Service offering cards |
| clickable-cards | Fully clickable cards |
| compliance-cards | Compliance-related cards |
| information-cards | Information display cards |
| incentives | Incentive/offer display |

**Common Use Cases:**
- Service listings
- Feature grids
- Team member grids
- Resource card displays

---

## Interactive Sections

### Blog

**Layout Key:** `blog`

**ACF Fields:**
- `title` (text): Default "OUR LATEST NEWS & BLOGS"
- `description` (textarea)
- `post_count` (number): 1-12, default 6
- `category` (taxonomy): Filter by category
- `link` (link): View all link

**Template File:** `template-parts/sections/blog-default.php`

**Design Description:**
- White background section
- Three-column grid of post cards
- Uses template-parts/post-card.php for individual posts
- "View More" button if more posts exist

**Common Use Cases:**
- News sections
- Blog highlights
- Latest updates displays

---

### FAQs

**Layout Key:** `faqs`

**ACF Fields:**
- `title` (text)
- `description` (textarea)
- `items` (repeater): Question, Answer
- `cta` (link)

**Template File:** `template-parts/sections/faqs-default.php`

**Design Description:**
- Accordion-style expandable questions
- Plus/minus toggle indicators
- Smooth expand/collapse animations

**Common Use Cases:**
- FAQ pages
- Help/knowledge base sections
- Service question displays

---

### Testimonials

**Layout Key:** `testimonials`

**ACF Fields:**
- `title` (text)
- `description` (textarea)
- `image` (image/logo)
- `quote` (textarea)
- `company` (text)
- `position` (text)

**Template File:** `template-parts/sections/testimonials.php`

**Design Description:**
- Quote styling with large quotation marks
- Client information display
- Clean testimonial presentation

**Common Use Cases:**
- Client testimonial displays
- Case study highlights
- Customer feedback sections

---

### Team

**Layout Key:** `team`

**ACF Fields:**
- `title` (text)
- `description` (textarea)
- `members` (repeater): Photo, Name, Title, Bio, LinkedIn

**Template File:** `template-parts/sections/team.php`

**Design Description:**
- Team member cards
- Photo, name, title display
- Bio expandability option
- LinkedIn links

**Common Use Cases:**
- About page team sections
- Staff/consultant introductions
- Leadership displays

---

### Table

**Layout Key:** `table`

**ACF Fields:**
- `title` (text)
- `description` (textarea)
- `table` (table): ACF table field
- `footnote` (wysiwyg)

**Design Description:**
- Full table with headers and data
- Table caption support
- Footnote area below

**Common Use Cases:**
- Pricing tables
- Comparison tables
- Data display sections

---

## Utility Sections

### Logos

**Layout Key:** `logos`

**ACF Fields:**
- `title` (text)
- `subtitle` (text)
- `description` (textarea)
- `columns` (button_group): 3, 4, 5
- `logos` (gallery)

**Template File:** `template-parts/sections/logos.php`

**Design Description:**
- Gray background section
- Client/partner logo grid
- Column configuration support

**Common Use Cases:**
- Client logos
- Partner displays
- Certification badges

---

### Locations

**Layout Key:** `locations`

**ACF Fields:**
- `title` (text): Default "Our Offices"
- `map_embed` (url): Google Maps embed
- `map_link` (url): Link to open in maps
- `locations` (repeater): City Name, Address

**Template File:** `template-parts/sections/locations.php`

**Design Description:**
- Map integration
- Office location listings
- Address information

**Common Use Cases:**
- Office location pages
- Branch displays
- Service area maps

---

### Stats

**Layout Key:** `stats`

**ACF Fields:**
- `title` (text)
- `items` (repeater): Value, Label

**Design Description:**
- Statistics display
- Large number emphasis
- Label descriptions

**Common Use Cases:**
- Company statistics
- Performance metrics
- Achievement displays

---

### Form

**Layout Key:** `form`

**ACF Fields:**
- `shortcode` (text): Form shortcode
- `email` (email): Notification email

**Design Description:**
- Embedded form section
- Email notification configuration

**Common Use Cases:**
- Custom form sections
- Newsletter signups
- Application forms

---

### Gallery

**Layout Key:** `gallery`

**ACF Fields:**
- `title` (text)
- `description` (wysiwyg)
- `images` (gallery)

**Design Description:**
- Image gallery grid
- Lightbox functionality (theme dependent)

**Common Use Cases:**
- Image galleries
- Portfolio displays
- Event photo collections

---

### Videos Grid

**Layout Key:** `grid_videos`

**ACF Fields:**
- `title` (text)
- `description` (textarea)
- `columns` (button_group): 2, 3
- `videos` (repeater): Video Type, Video URL/File, Thumbnail, Title

**Template File:** `template-parts/sections/grid_videos.php`

**Design Description:**
- Video thumbnail grid
- Embed or upload support
- YouTube/Vimeo integration

**Common Use Cases:**
- Videoresource libraries
- Tutorial displays
- Media pages

---

### Callout

**Layout Key:** `callout`

**ACF Fields:**
- `type` (button_group): Default
- `content` (wysiwyg)

**Design Description:**
- Simple WYSIWYG content block
- Full styling capabilities
- Minimal wrapper

**Common Use Cases:**
- Custom content blocks
- Special announcements
- Custom layout needs

---

### Points

**Design:** Similar to information sections with checklist items

**Common Use Cases:**
- Bullet point lists
- Feature highlights
- Requirement lists

---

### Links

**Common Use Cases:**
- Link collections
- Resource lists
- Navigation helpers

---

### Footer

**Common Use Cases:**
- Footer content
- Site-wide information
- Legal/contact displays

---

### Leanpress Forms

**Common Use Cases:**
- LeanPress form integration
- Custom form handling

---

## Field Type Reference

| ACF Type | Description |
|---------|-------------|
| text | Single line text input |
| textarea | Multi-line text area |
| wysiwyg | Full WYSIWYG editor |
| number | Numeric input |
| email | Email input |
| url | URL input |
| image | Image upload |
| gallery | Multiple image gallery |
| file | File upload |
| link | Link field (url + title) |
| repeater | Repeater field for collections |
| button_group | Radio-style selection |
| color_picker | Color selection |
| taxonomy | Category/taxonomy selection |
| table | Table field |

---

## Best Practices

1. **Section Ordering**: Place Hero sections first, content sections in logical order, CTAs and Contact last
2. **Consistency**: Use similar grid types throughout a single page for visual consistency
3. **Accessibility**: Always include transcripts for video sections
4. **Images**: Use consistent aspect ratios for grid images
5. **Links**: Ensure all link fields have proper URLs and titles

---

## Template Naming Convention

Templates follow the pattern: `{section_name}-{variant}.php`

- Default variant: `section-name-default.php`
- Alternative variants: `section-name-alt.php`, `section-name-{type}.php`
- Grid types: `grid-{type}.php`

When rendering, the theme loads the appropriate template based on the layout type configured in ACF.