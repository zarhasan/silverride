<?php
/**
 * Template Name: Demo Sections
 * Description: Showcase of all section types with demo content - ordered by importance
 * Images: Unsplash (https://images.unsplash.com) | Icons: svgapi.com via Iconify Heroicons/Lucide (https://svgapi.com/documentation)
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$sections = get_field('sections');
?>

<main class="demo-sections-page">
    <?php if (!empty($sections)) : ?>
        <?php foreach ($sections as $index => $section) :
            $id     = 'section-' . ($index + 1);
            $layout = $section['acf_fc_layout'];
            $type   = $section['type'] ?? 'default';
        ?>
            <?php get_template_part('template-parts/section-label', null, [
                'number'  => (string) ($index + 1),
                'section' => ucwords(str_replace(['-', '_'], ' ', $layout)),
                'layout'  => $layout . '-' . $type . '.php',
                'fields'  => '',
            ]); ?>
            <div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
              <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none"><?php echo esc_html($layout . ' - ' . $type); ?></div>
              <div class="pt-8">
                <?php get_template_part('template-parts/sections/' . $layout, $type, array_merge($section, ['id' => $id])); ?>
              </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <?php // ========================================================
            // TIER 1 - HERO (first impression, highest importance)
            // ======================================================== ?>
        <?php get_template_part('template-parts/section-label', null, ['number' => '1', 'section' => 'Hero Home', 'layout' => 'hero-home.php', 'fields' => 'type, subtitle, title, description, links, image, service_links']); ?>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">hero - home</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/hero', 'home', [
            'type' => 'home',
            'subtitle' => 'SilverRide Canada',
            'title' => 'Your Center of Excellence for Accessibility Compliance',
            'description' => '<p>We help organizations achieve and maintain compliance with AODA, ADA, and WCAG. Comprehensive assessments, implementations, and ongoing support for inclusive digital and physical spaces.</p>',
            'links' => [['link' => ['url' => '#', 'title' => 'Get Started']], ['link' => ['url' => '#services', 'title' => 'Our Services']]],
            'image' => ['url' => 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=1200&q=80', 'alt' => 'Professional accessibility consultation'],
            'service_links' => [['title' => 'Web Accessibility', 'link' => ['url' => '#', 'title' => 'Web']], ['title' => 'Document Remediation', 'link' => ['url' => '#', 'title' => 'Docs']], ['title' => 'Training Programs', 'link' => ['url' => '#', 'title' => 'Training']], ['title' => 'Compliance Audits', 'link' => ['url' => '#', 'title' => 'Audits']]]
        ]); ?>
  </div>
</div>
        <?php get_template_part('template-parts/section-label', null, ['number' => '2', 'section' => 'Hero Page', 'layout' => 'hero-page.php', 'fields' => 'type, subtitle, title, description, links, image']); ?>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">hero - page</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/hero', 'page', [
            'type' => 'page',
            'subtitle' => 'Trusted by Transit Agencies',
            'title' => 'Paratransit That Performs',
            'description' => '<p>35+ major metros, 95% OTP, flexible driver network for complementary, overflow and premium tiers.</p>',
            'links' => [['link' => ['url' => '#', 'title' => 'Partner With Us']]],
            'image' => ['url' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=1200&q=80', 'alt' => 'Wheelchair accessible vehicle'],
        ]); ?>
  </div>
</div>
        <?php get_template_part('template-parts/section-label', null, ['number' => '3', 'section' => 'Hero Overlay', 'layout' => 'hero-overlay.php', 'fields' => 'type, title, description, image']); ?>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">hero - overlay</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/hero', 'overlay', ['type' => 'overlay', 'title' => 'There With Care', 'description' => '<p>Bringing joy, dignity and community to the people who need it most.</p>', 'image' => ['url' => 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=1200&q=80', 'alt' => 'Driver assisting rider']]); ?>
  </div>
</div>
        <?php get_template_part('template-parts/section-label', null, ['number' => '4', 'section' => 'Hero Centered / Textual / Primary Background', 'layout' => 'hero-centered.php + hero-textual.php + hero-primary-background.php', 'fields' => 'title, subtitle, description']); ?>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">hero - centered</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/hero', 'centered', ['type' => 'centered', 'title' => 'Accessibility Is Our Mission', 'subtitle' => 'Since 2018', 'description' => '<p>Centered storytelling for impact pages.</p>']); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">hero - textual</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/hero', 'textual', ['type' => 'textual', 'title' => 'Our Method', 'description' => '<p>Textual hero for long-form narrative with no media.</p>']); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">hero - primary-background</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/hero', 'primary-background', ['type' => 'primary-background', 'title' => 'Primary Background Hero', 'description' => '<p>Deep navy hero for high-contrast announcements.</p>']); ?>
  </div>
</div>
        <?php get_template_part('template-parts/section-label', null, ['number' => '5', 'section' => 'Hero Variants', 'layout' => 'hero-image-below.php / hero-title-below.php / hero-blog.php', 'fields' => 'title, image']); ?>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">hero - image-below</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/hero', 'image-below', ['type' => 'image-below', 'title' => 'Hero Image Below', 'image' => ['url' => 'https://images.unsplash.com/photo-1551836022-deb4988cc6c0?w=1200&q=80', 'alt' => 'Healthcare team']]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">hero - title-below</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/hero', 'title-below', ['type' => 'title-below', 'title' => 'Hero Title Below']); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">hero - blog</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/hero', 'blog', ['type' => 'blog', 'title' => 'Newsroom', 'description' => '<p>Latest insights on accessibility and transportation.</p>']); ?>
  </div>
</div>

        <?php // TIER 2 - SECTION TITLE & TEXT (narrative foundation) ?>
        <?php get_template_part('template-parts/section-label', null, ['number' => '6', 'section' => 'Section Title', 'layout' => 'section_title-default.php', 'fields' => 'subtitle, title, tag, description, alignment, container']); ?>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">section_title - default</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/section_title', 'default', ['title' => 'Why Choose SilverRide', 'subtitle' => 'A Center of Excellence', 'tag' => 'Trusted Nationwide', 'description' => '<p>Leading the industry in accessibility compliance solutions</p>', 'alignment' => 'center', 'container' => 'full']); ?>
  </div>
</div>
        <?php get_template_part('template-parts/section-label', null, ['number' => '7', 'section' => 'Text Variants', 'layout' => 'text.php / text-alt.php / text-heavy.php / text-columns.php / text-with_toc.php', 'fields' => 'title, description']); ?>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">text</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/text', null, ['title' => 'Our Commitment to Accessibility', 'description' => '<p>An accessible website expands your market to the 15% of the global population living with disabilities. Our certified experts have helped hundreds of organizations achieve compliance.</p>']); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">text - alt</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/text', 'alt', ['title' => 'Alt Text', 'description' => '<p>Alternate styling for emphasis blocks with tighter measure.</p>']); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">text - heavy</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/text', 'heavy', ['title' => 'Heavy Text', 'description' => '<p>Bolder typographic weight for mission statements.</p>']); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">text - columns</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/text', 'columns', ['title' => 'Columns Text', 'description' => '<p>Two-column narrative for comparison or parallel storytelling. Left column introduces challenge, right column presents solution and outcomes.</p>']); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">text - with_toc</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/text', 'with_toc', ['title' => 'With Table of Contents', 'description' => '<h2 id="overview">Overview</h2><p>Long-form content with anchor navigation.</p><h2 id="approach">Approach</h2><p>Structured methodology.</p>']); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">callout</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/callout', null, ['content' => '<p><strong>Callout:</strong> Accessibility is not a feature - it is a core brand value.</p>']); ?>
  </div>
</div>

        <?php // TIER 3 - INFORMATION / SERVICES / MISSION (core value props) ?>
        <?php get_template_part('template-parts/section-label', null, ['number' => '8', 'section' => 'Information', 'layout' => 'information.php + variants', 'fields' => 'title, subtitle, description, items, link, secondary_link, image, image_position']); ?>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">information</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/information', null, [
            'title' => 'Transportation Your Members Can Count On',
            'subtitle' => 'For PACE and Healthcare',
            'description' => '<p>Door-through-door assisted transportation built for complex rider needs, with HIPAA-aware operations and credentialed drivers.</p>',
            'items' => [['item' => 'Credentialed drivers'], ['item' => 'Door-through-door as standard'], ['item' => 'Integrated booking and live tracking']],
            'link' => ['url' => '#', 'title' => 'Partner With Our PACE Team'],
            'secondary_link' => ['url' => '#', 'title' => 'Learn More'],
            'image' => ['url' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=600&q=80', 'alt' => 'Care team'],
            'image_position' => 'right'
        ]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">information - alt</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/information', 'alt', ['title' => 'Information Alt', 'description' => '<p>Alternate card styling.</p>', 'image' => ['url' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=600&q=80', 'alt' => 'Alt'], 'image_position' => 'left']); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">information - simple</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/information', 'simple', ['title' => 'Information Simple', 'description' => '<p>Minimal treatment for dense copy.</p>']); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">information - staggered</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/information', 'staggered', ['title' => 'Staggered Information', 'description' => '<p>Staggered imagery for visual rhythm.</p>', 'image' => ['url' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=600&q=80', 'alt' => 'Staggered']]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">information - tint</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/information', 'tint', ['title' => 'Information Tint', 'description' => '<p>Tinted background for separation.</p>', 'image' => ['url' => 'https://images.unsplash.com/photo-1499952127939-9bbf5af6c51c?w=600&q=80', 'alt' => 'Tint']]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">our_mission</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/our_mission', null, [
            'title' => 'OUR MISSION',
            'quote' => 'Bringing joy, dignity and community',
            'description' => 'To the people who need it most - with reliable, compassionate transportation.',
            'services' => [
                ['icon' => ['url' => 'https://api.iconify.design/mdi:shield-check.svg?color=%232A4187'], 'title' => 'Compliance', 'description' => 'FTA and ADA aligned', 'link' => ['url' => '#', 'title' => 'Learn More']],
                ['icon' => ['url' => 'https://api.iconify.design/lucide:heart-handshake.svg?color=%232A4187'], 'title' => 'Care', 'description' => 'Door-through-door assistance', 'link' => ['url' => '#', 'title' => 'Learn More']],
                ['icon' => ['url' => 'https://api.iconify.design/heroicons:academic-cap.svg?color=%232A4187'], 'title' => 'Training', 'description' => 'Credentialed drivers', 'link' => ['url' => '#', 'title' => 'Learn More']],
            ],
            'link' => ['url' => '#', 'title' => 'Our Story']
        ]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">services</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/services', null, ['title' => 'Comprehensive Accessibility', 'description' => '<p>From audits to remediation and training.</p>', 'features' => [['feature' => 'WCAG 2.2 AA Audits'], ['feature' => 'Document Remediation'], ['feature' => 'Training'], ['feature' => 'Ongoing Monitoring']], 'link' => ['url' => '#', 'title' => 'Explore Services'], 'image' => ['url' => 'https://images.unsplash.com/photo-1551836022-deb4988cc6c0?w=600&q=80', 'alt' => 'Services']]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">cities</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/cities', null, ['title' => 'Where We Serve', 'description' => '<p>35+ major metros and growing.</p>', 'cities' => [['name' => 'Seattle'], ['name' => 'Portland'], ['name' => 'Vancouver']], 'other_title' => 'More Cities', 'other_cities' => [['name' => 'Toronto']]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">locations</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/locations', null, ['title' => 'Locations', 'description' => '<p>Find your market.</p>']); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">locations_alt</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/locations_alt', null, ['title' => 'Locations Alt']); ?>
  </div>
</div>

        <?php // TIER 4 - PROCESS / POINTS (how it works) ?>
        <?php get_template_part('template-parts/section-label', null, ['number' => '9', 'section' => 'Process', 'layout' => 'process.php + avenues + points', 'fields' => 'title, steps, points']); ?>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">process</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/process', null, ['title' => 'Our Process', 'subtitle' => 'From discovery to ongoing performance']); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">avenues-who-we-serve</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/avenues-who-we-serve', null, [
            'title' => 'Three Avenues. One Platform.', 'background_color' => '#F0F5FF',
            'avenues' => [
                ['overline' => 'FOR TRANSIT', 'heading' => 'Paratransit That Performs', 'content' => '<p>Scalable capacity for peak demand.</p>', 'bullets' => ['ADA-compliant'], 'cta' => ['url' => '#', 'title' => 'Partner'], 'image' => ['url' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=600&q=80', 'alt' => 'Transit'], 'image_position' => 'right'],
                ['overline' => 'FOR PACE', 'heading' => 'Transportation You Can Count On', 'content' => '<p>Door-through-door for complex needs.</p>', 'bullets' => ['Door-through-door'], 'cta' => ['url' => '#', 'title' => 'Partner'], 'image' => ['url' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=600&q=80', 'alt' => 'Healthcare'], 'image_position' => 'left'],
            ]
        ]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">process-who-we-serve</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/process-who-we-serve', null, ['title_line_1' => 'Built around your service standards.', 'title_line_2' => 'Live where your riders are.', 'steps' => [['number' => '01.', 'heading' => 'Discovery', 'content' => 'Understand your service area and gaps.'], ['number' => '02.', 'heading' => 'Contract Design', 'content' => 'Tailored to service standards.'], ['number' => '03.', 'heading' => 'Activation', 'content' => 'Credentialed driver network ready.']]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">points</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/points', null, ['title' => 'Why SilverRide', 'points' => [['title' => 'Scale'], ['title' => 'Care']]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">points - grid</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/points', 'grid', ['title' => 'Points Grid', 'points' => [['title' => '95% OTP']]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">nested_grid</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/nested_grid', null, []); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">help-grid</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/help-grid', null, []); ?>
  </div>
</div>

        <?php // TIER 5 - CALL TO ACTION ?>
        <?php get_template_part('template-parts/section-label', null, ['number' => '10', 'section' => 'Call To Action', 'layout' => 'call_to_action-*.php', 'fields' => 'title, description, link, media_type, image']); ?>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">call_to_action - default</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/call_to_action', 'default', ['title' => 'Ready to Get Started?', 'description' => '<p>Let us streamline your transportation logistics.</p>', 'link' => ['url' => '#', 'title' => 'Request a Demo']]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">call_to_action - alt</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/call_to_action', 'alt', ['title' => 'Still Have Questions?', 'description' => '<p>We are here to help.</p>', 'link' => ['url' => '#', 'title' => 'Contact Us']]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">call_to_action - horizontal</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/call_to_action', 'horizontal', ['title' => 'Get In Touch', 'description' => '<p>Horizontal variant for narrow bands.</p>', 'link' => ['url' => '#', 'title' => 'Contact']]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">call_to_action - simple</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/call_to_action', 'simple', ['title' => 'Simple CTA', 'link' => ['url' => '#', 'title' => 'Learn More']]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">call_to_action - with-image</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/call_to_action', 'with-image', ['title' => 'CTA With Image', 'description' => '<p>Visual emphasis.</p>', 'link' => ['url' => '#', 'title' => 'Explore'], 'image' => ['url' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=800&q=80', 'alt' => 'CTA'], 'media_type' => 'image']); ?>
  </div>
</div>

        <?php // TIER 6 - GRIDS (core content blocks) - ordered: service-focused first ?>
        <?php get_template_part('template-parts/section-label', null, ['number' => '11', 'section' => 'Grids', 'layout' => 'grid-*.php', 'fields' => 'Grid family']); ?>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">grid - service-cards</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/grid', 'service-cards', ['title' => 'Service Models', 'description' => '<p>Flexible configurations.</p>', 'grid_size' => 2, 'items' => [
            ['image' => ['url' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=300&q=80', 'alt' => ''], 'title' => 'Complementary Paratransit', 'description' => '<p>ADA origin-to-destination.</p>', 'link' => ['url' => '#', 'title' => 'Explore']],
            ['image' => ['url' => 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=300&q=80', 'alt' => ''], 'title' => 'Overflow', 'description' => '<p>Peak demand capacity.</p>', 'link' => ['url' => '#', 'title' => 'Explore']],
        ]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">grid - alt</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/grid', 'alt', ['title' => 'Flexible Support', 'description' => '<p>Adapts to operational requirements.</p>', 'grid_size' => 3, 'items' => [
            ['image' => ['url' => 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=400&q=80', 'alt' => ''], 'title' => 'Complementary', 'description' => '<p>ADA-compliant with reporting.</p>', 'link' => ['url' => '#', 'title' => 'Learn More']],
            ['image' => ['url' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=400&q=80', 'alt' => ''], 'title' => 'Overflow', 'description' => '<p>Scalable network.</p>', 'link' => ['url' => '#', 'title' => 'Learn More']],
            ['image' => ['url' => 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=400&q=80', 'alt' => ''], 'title' => 'Premium', 'description' => '<p>Elevated experience.</p>', 'link' => ['url' => '#', 'title' => 'Learn More']],
        ]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">grid - basic</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/grid', 'basic', ['title' => 'Why Agencies Choose Us', 'description' => '<p>Proven across 35+ metros.</p>', 'grid_size' => 3, 'items' => [
            ['image' => ['url' => 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=400&q=80', 'alt' => ''], 'title' => 'Scale', 'description' => '<p>35+ metros, 15 states.</p>', 'link' => ['url' => '#', 'title' => 'Explore']],
            ['image' => ['url' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=400&q=80', 'alt' => ''], 'title' => 'Network', 'description' => '<p>Credentialed drivers.</p>', 'link' => ['url' => '#', 'title' => 'Explore']],
            ['image' => ['url' => 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=400&q=80', 'alt' => ''], 'title' => 'Reliability', 'description' => '<p>95% OTP tracking.</p>', 'link' => ['url' => '#', 'title' => 'Explore']],
        ]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">grid - colorful</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/grid', 'colorful', ['title' => 'Three Avenues. One Platform.', 'items' => [
            ['subtitle' => 'FOR TRANSIT', 'title' => 'Paratransit That Performs', 'description' => '<p>Flexible, technology-enabled network.</p><ul><li>ADA service</li><li>95% OTP</li></ul>', 'link' => ['url' => '#', 'title' => 'Partner With Our Agency Team']],
            ['subtitle' => 'FOR HEALTHCARE', 'title' => 'PACE and Healthcare', 'description' => '<p>Door-through-door with tracking.</p><ul><li>Door-through-door</li><li>HIPAA-aware</li></ul>', 'link' => ['url' => '#', 'title' => 'Partner With Our PACE Team']],
        ]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">grid - floating-cards</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/grid', 'floating-cards', ['title' => 'Built for Scale', 'description' => '<p>Scale that never loses sight of rider.</p>', 'grid_size' => 3, 'items' => [
            ['image' => ['url' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=300&q=80', 'alt' => ''], 'title' => 'Driver Network That Cares', 'description' => '<p>Professionals who treat riders like family.</p>', 'link' => ['url' => '#', 'title' => 'Learn More'], 'secondary_link' => ['url' => '#', 'title' => 'Contact']],
            ['image' => ['url' => 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=300&q=80', 'alt' => ''], 'title' => 'Compliance First', 'description' => '<p>FTA reporting built in.</p>', 'link' => ['url' => '#', 'title' => 'Learn More'], 'secondary_link' => ['url' => '#', 'title' => 'Contact']],
            ['image' => ['url' => 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=300&q=80', 'alt' => ''], 'title' => 'Reliable Operations', 'description' => '<p>95% OTP at scale.</p>', 'link' => ['url' => '#', 'title' => 'Learn More'], 'secondary_link' => ['url' => '#', 'title' => 'Contact']],
        ]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">grid - simple</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/grid', 'simple', ['title' => 'Case Studies', 'description' => '<p>(Optional Subtitle)</p>', 'grid_size' => 4, 'items' => [
            ['image' => ['url' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=300&q=80', 'alt' => ''], 'title' => 'RideCo', 'description' => '<p>Microtransit in Milpitas.</p>', 'link' => ['url' => '#', 'title' => 'Read More']],
            ['image' => ['url' => 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=300&q=80', 'alt' => ''], 'title' => 'IndyGo', 'description' => '<p>Scaled 3x to 95% OTP.</p>', 'link' => ['url' => '#', 'title' => 'Read More']],
            ['image' => ['url' => 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=300&q=80', 'alt' => ''], 'title' => 'GoDurham', 'description' => '<p>Unified operations.</p>', 'link' => ['url' => '#', 'title' => 'Read More']],
            ['image' => ['url' => 'https://via.placeholder.com/300x150?text=Transdev', 'alt' => ''], 'title' => 'Transdev', 'description' => '<p>Peak-hour capacity.</p>', 'link' => ['url' => '#', 'title' => 'Read More']],
        ]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">grid - cardless</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/grid', 'cardless', ['title' => 'Whitepapers', 'description' => '<p>Insights on aging and ADA.</p>', 'grid_size' => 2, 'items' => [
            ['image' => ['url' => 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=600&q=80', 'alt' => ''], 'subtitle' => 'October 2025 | By Jeff Maltz', 'title' => 'ADA@35: Now Let\'s Finish What We Started', 'description' => '<p>35 years reflection.</p>', 'link' => ['url' => '#', 'title' => 'Read More']],
            ['image' => ['url' => 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=600&q=80', 'alt' => ''], 'subtitle' => 'September 2025', 'title' => 'The Crucial Link Of Aging In Place', 'description' => '<p>Transportation linchpin.</p>', 'link' => ['url' => '#', 'title' => 'Read More']],
        ]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">grid - cards</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/grid', 'cards', ['title' => 'Commitment', 'description' => '<p>Built for demanding requirements.</p>', 'grid_size' => 3, 'items' => [
            ['image' => ['url' => 'https://api.iconify.design/mdi:shield-check.svg?color=%232A4187', 'alt' => ''], 'title' => 'ADA', 'description' => '<p>Origin-to-destination.</p>'],
            ['image' => ['url' => 'https://api.iconify.design/mdi:file-document-check.svg?color=%232A4187', 'alt' => ''], 'title' => 'FTA', 'description' => '<p>Reporting built in.</p>'],
            ['image' => ['url' => 'https://api.iconify.design/mdi:account-heart.svg?color=%232A4187', 'alt' => ''], 'title' => 'Drivers', 'description' => '<p>Compassionate professionals.</p>'],
        ]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">grid - clickable-cards</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/grid', 'clickable-cards', ['title' => 'Solutions by Need', 'description' => '<p>Click an option.</p>', 'grid_size' => 3, 'items' => [
            ['image' => ['url' => 'https://api.iconify.design/lucide:bus.svg?color=%232A4187', 'alt' => ''], 'title' => 'Complementary', 'link' => ['url' => '#', 'title' => 'Explore']],
            ['image' => ['url' => 'https://api.iconify.design/lucide:users.svg?color=%232A4187', 'alt' => ''], 'title' => 'Overflow', 'link' => ['url' => '#', 'title' => 'Explore']],
            ['image' => ['url' => 'https://api.iconify.design/lucide:crown.svg?color=%232A4187', 'alt' => ''], 'title' => 'Premium', 'link' => ['url' => '#', 'title' => 'Explore']],
        ]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">grid - compliance-cards</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/grid', 'compliance-cards', ['title' => 'Compliance', 'items' => [
            ['image' => ['url' => 'https://api.iconify.design/mdi:shield-check.svg?color=%232A4187', 'alt' => ''], 'title' => 'ADA', 'description' => '<p>Origin-to-destination support.</p>'],
            ['image' => ['url' => 'https://api.iconify.design/mdi:lock-check.svg?color=%232A4187', 'alt' => ''], 'title' => 'HIPAA', 'description' => '<p>Privacy-conscious handling.</p>'],
        ]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">grid - highlight</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/grid', 'highlight', ['title' => 'Why SilverRide', 'items' => [
            ['title' => 'Built For Scale', 'description' => '<p>Scale others cannot match.</p>'],
            ['title' => 'Driver Network That Cares', 'description' => '<p>Skills expected in assisted transport.</p>'],
            ['title' => 'Compliance Is The Floor', 'description' => '<p>Exceed, document, grow.</p>'],
        ]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">grid - info</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/grid', 'info', ['title' => 'Program Information', 'description' => '<p>Key details.</p>', 'items' => [
            ['title' => '95% On-Time', 'description' => '<p>Live tracking.</p>'],
            ['title' => 'Door-Through-Door', 'description' => '<p>Beyond curb-to-curb.</p>'],
        ]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">grid - textual</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/grid', 'textual', ['title' => 'Service Standards', 'subtitle' => 'Built around compliance', 'description' => '<p>Flexible and auditable.</p>', 'grid_size' => 3, 'items' => [
            ['title' => 'ADA Paratransit', 'description' => '<p>Compliant service</p>', 'link' => ['url' => '#', 'title' => 'Learn More']],
            ['title' => 'FTA Reporting', 'description' => '<p>Grade reporting</p>', 'link' => ['url' => '#', 'title' => 'Learn More']],
            ['title' => 'Door-Through-Door', 'description' => '<p>Curb assistance</p>', 'link' => ['url' => '#', 'title' => 'Learn More']],
        ]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">grid - incentives</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/grid', 'incentives', ['title' => 'Compliance is the floor.', 'description' => '<p>Flexible network for ADA paratransit.</p>', 'items' => [
            ['icon' => ['url' => 'https://api.iconify.design/mdi:wheelchair-accessibility.svg?color=%232A4187'], 'image' => ['url' => 'https://images.unsplash.com/photo-1573497620053-ea5300f94f21?w=400&q=80', 'alt' => ''], 'label' => 'ADA-compliant operations'],
            ['icon' => ['url' => 'https://api.iconify.design/mdi:shield-lock.svg?color=%232A4187'], 'image' => ['url' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=400&q=80', 'alt' => ''], 'label' => 'HIPAA workflows'],
            ['icon' => ['url' => 'https://api.iconify.design/mdi:file-chart.svg?color=%232A4187'], 'image' => ['url' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400&q=80', 'alt' => ''], 'label' => 'FTA reporting'],
            ['icon' => ['url' => 'https://api.iconify.design/mdi:shield-car.svg?color=%232A4187'], 'image' => ['url' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400&q=80', 'alt' => ''], 'label' => 'Insurance coverage'],
        ]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">grid_videos</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/grid_videos', null, ['title' => 'Hear From Our Partners', 'description' => 'Real stories.', 'columns' => 3, 'videos' => [
            ['video_type' => 'embed', 'embed_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 'title' => 'Overview'],
            ['video_type' => 'embed', 'embed_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 'title' => 'Rider Story'],
            ['video_type' => 'embed', 'embed_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 'title' => 'Agency Testimonial'],
        ]]); ?>
  </div>
</div>

        <?php // TIER 7 - SOCIAL PROOF / STATS / LOGOS ?>
        <?php get_template_part('template-parts/section-label', null, ['number' => '21', 'section' => 'Stats', 'layout' => 'stats.php / stats-alt.php']); ?>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">stats</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/stats', null, ['items' => [['value' => '1M+', 'label' => 'Rides/Year'], ['value' => '35+', 'label' => 'Metros'], ['value' => '15', 'label' => 'States'], ['value' => '95%', 'label' => 'OTP']]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">stats - alt</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/stats', 'alt', ['items' => [['value' => '1M+', 'label' => 'Rides'], ['value' => '95%', 'label' => 'On-Time']], 'description' => '<p>Scale enabling reliability.</p>']); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">logos</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/logos', null, ['title' => 'Trusted By', 'logos' => [['url' => 'https://images.unsplash.com/photo-1560179707-f14e90ef3623?w=200&q=80', 'alt' => 'Logo 1'], ['url' => 'https://images.unsplash.com/photo-1572021335469-31706a17aaef?w=200&q=80', 'alt' => 'Logo 2']]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">testimonials</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/testimonials', null, ['title' => 'What Partners Say', 'testimonials' => [['quote' => 'SilverRide transformed our overflow capacity.', 'author' => 'Transit Director, IndyGo'], ['quote' => 'Door-through-door standard is game-changing.', 'author' => 'PACE Director']]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">slider - testimonial</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/slider', 'testimonial', ['title' => 'Rider Stories', 'items' => [['quote' => 'They treat me like family.', 'author' => 'Martha, 78'], ['quote' => 'On time every time.', 'author' => 'James, Rider']]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">slider - basic</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/slider', 'basic', ['title' => 'Featured Stories', 'slides' => [['image' => ['url' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=800&q=80', 'alt' => 'Slide'], 'title' => 'Slide 1', 'description' => '<p>Caption</p>', 'link' => ['url' => '#', 'title' => 'Explore']]]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">team</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/team', null, ['title' => 'Leadership', 'members' => [['name' => 'Jeff Maltz', 'role' => 'CEO', 'image' => ['url' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400&q=80', 'alt' => 'Jeff'], 'bio' => 'Founder'], ['name' => 'Tanya Castle', 'role' => 'VP Growth', 'image' => ['url' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&q=80', 'alt' => 'Tanya'], 'bio' => 'Growth']]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">certificates - default</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/certificates', 'default', ['title' => 'Government Accessibility Services', 'description' => '<p>Certified at the highest levels.</p>', 'stats' => [['label' => 'WCAG', 'value' => 'AA'], ['label' => 'AODA', 'value' => 'Compliant']], 'link' => ['url' => '#', 'title' => 'View Certificates'], 'image' => ['url' => 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?w=600&q=80', 'alt' => 'Certificate']]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">compliance</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/compliance', null, ['title' => 'Compliance Management', 'description' => '<p>100/100 score.</p>', 'items' => ['WCAG 2.2', 'ADA', 'AODA'], 'score' => 100, 'link' => ['url' => '#', 'title' => 'Details'], 'image' => ['url' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=600&q=80', 'alt' => 'Compliance'], 'transcript' => '<p>Transcript</p>']); ?>
  </div>
</div>

        <?php // TIER 8 - CONTACT / FORMS / SPLIT (conversion) ?>
        <?php get_template_part('template-parts/section-label', null, ['number' => '22', 'section' => 'Contact & Forms', 'layout' => 'contact.php / form.php / split-default.php']); ?>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">contact</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/contact', null, [
            'title' => 'Empower Your Organization',
            'description' => '<p>Discover how SilverRide streamlines logistics.</p>',
            'features' => [['feature' => '95% on-time performance'], ['feature' => 'Door-through-door service'], ['feature' => 'HIPAA-aware']],
            'logos' => [['url' => 'https://images.unsplash.com/photo-1572021335469-31706a17aaef?w=100&q=80', 'alt' => 'Logo']],
            'form_heading' => 'Request a Demo', 'form_subheading' => 'Learn what we can do', 'contact_form' => '[contact-form-7 id="123" title="Contact form 1"]'
        ]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">form</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/form', null, ['title' => 'Get In Touch', 'description' => '<p>We respond within one business day.</p>', 'shortcode' => '[contact-form-7 id="123" title="Contact form 1"]']); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">form - alt</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/form', 'alt', ['title' => 'Alt Form', 'description' => '<p>Alternate styling.</p>', 'shortcode' => '[contact-form-7 id="123" title="Alt"]']); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">split - default</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/split', 'default', [
            'image' => ['url' => 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=800&q=80', 'alt' => 'Man with guide dog'],
            'content' => '<h3><strong>The Challenge</strong></h3><p>Milpitas SMART had everything going for it: best-in-class technology and strong ridership. Inconsistent operator performance undermined experience.</p><h3><strong>The Result</strong></h3><p>After assuming operations in September 2024, SilverRide delivered measurable improvements: higher ridership, greater efficiency.</p>',
            'logos' => [['url' => 'https://via.placeholder.com/120x40?text=RIDECO', 'alt' => 'RideCo'], ['url' => 'https://via.placeholder.com/120x40?text=Milpitas', 'alt' => 'Milpitas']],
            'form_title' => 'Fill out this form to download case study', 'form_shortcode' => '[contact-form-7 id="123" title="Case study"]'
        ]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">leanpress_forms</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/leanpress_forms', null, []); ?>
  </div>
</div>

        <?php // TIER 9 - CONTENT LISTS / FAQs / DATALIST / TABLE ?>
        <?php get_template_part('template-parts/section-label', null, ['number' => '23', 'section' => 'Content Lists', 'layout' => 'faqs.php / datalist.php / points.php / table.php']); ?>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">faqs - default</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/faqs', 'default', ['title' => 'Frequently Asked Questions', 'description' => '<p>Common questions about paratransit partnerships.</p>', 'items' => [
            ['question' => 'What markets do you serve?', 'answer' => '<p>35+ major metros in 15 states.</p>'],
            ['question' => 'Do you provide wheelchair-accessible vehicles?', 'answer' => '<p>Yes, sedan, SUV and WAV options.</p>'],
        ], 'cta' => ['url' => '#', 'title' => 'Contact Support']]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">faqs - alt</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/faqs', 'alt', ['title' => 'Alt FAQs', 'items' => [['question' => 'How does dispatch work?', 'answer' => '<p>Centralized platform with live tracking.</p>']]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">datalist</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/datalist', null, ['title' => 'Service Standards', 'description' => '<p>Rigorous standards across operations.</p>', 'items' => [
            ['title' => 'On-Time Performance', 'description' => '<p>95% average with agency reporting.</p>'],
            ['title' => 'Driver Credentialing', 'description' => '<p>Background checks and accessibility training.</p>'],
        ]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">points</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/points', null, ['title' => 'Key Points', 'points' => [['title' => '95% OTP'], ['title' => 'Door-through-door']]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">points - grid</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/points', 'grid', ['title' => 'Points Grid', 'points' => [['title' => 'Scale'], ['title' => 'Care']]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">table</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/table', null, ['title' => 'Service Comparison', 'description' => 'SilverRide vs traditional providers', 'table' => ['header' => [['c' => 'Feature'], ['c' => 'SilverRide'], ['c' => 'Traditional']], 'body' => [[['c' => 'On-time'], ['c' => '95%'], ['c' => '85%']], [['c' => 'Coverage'], ['c' => '35+ metros'], ['c' => 'Limited']]]], 'footnote' => '<p>* Data as of 2024</p>']); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">links</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/links', null, ['title' => 'Quick Links', 'links' => [['title' => 'Schedule a Ride', 'url' => '#'], ['title' => 'Partner Portal', 'url' => '#']]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">links - alt</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/links', 'alt', ['title' => 'Resources', 'links' => [['title' => 'Accessibility Guide', 'url' => '#']]]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">nested_grid</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/nested_grid', null, []); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">help-grid</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/help-grid', null, []); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">services</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/services', null, ['title' => 'Our Services', 'description' => '<p>Comprehensive solutions.</p>', 'features' => [['feature' => 'Assessments']], 'image' => ['url' => 'https://images.unsplash.com/photo-1551836022-deb4988cc6c0?w=600&q=80', 'alt' => 'Services']]); ?>
  </div>
</div>

        <?php // TIER 10 - BLOG / FILTERS / POLICY / MISC ?>
        <?php get_template_part('template-parts/section-label', null, ['number' => '24', 'section' => 'Blog', 'layout' => 'blog-*.php']); ?>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">blog - default</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/blog', 'default', ['title' => 'OUR LATEST NEWS & BLOGS', 'post_count' => 3, 'link' => ['url' => '#', 'title' => 'View All']]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">blog - alt</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/blog', 'alt', ['title' => 'Innovations in Accessibility', 'post_count' => 3]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">blog - tint</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/blog', 'tint', ['title' => 'Insights', 'description' => '<p>Latest from SilverRide.</p>', 'post_count' => 3]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">filters-blog</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/filters-blog', null, []); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">policy</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/policy', null, []); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">report-an-incident</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/report-an-incident', null, []); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">cities</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/cities', null, []); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">locations</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/locations', null, []); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">locations_alt</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/locations_alt', null, []); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">case_study</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/case_study', null, [
            'overline' => 'CASE STUDY', 'title' => 'Milpitas SMART: Platform Quality Meets Service Quality', 'tag' => 'Microtransit', 'challenge' => '<p>Inconsistent operator performance undermining excellent technology and ridership.</p>', 'approach_text' => '<p>SilverRide assumed operations of seven-vehicle fleet in September 2024.</p>', 'implementation' => '<p>Seven vehicles, expanded capacity, improved reliability.</p>', 'industry' => 'Microtransit', 'location' => 'Milpitas, CA', 'compliance' => 'ADA', 'timeline' => 'Sept 2024 - Present', 'key_result' => 'Higher ridership + efficiency', 'results_items' => [['item' => '95% OTP'], ['item' => 'Capacity +40%']]
        ]); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">driver-faqs</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/driver-faqs', null, []); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">driver-features</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/driver-features', null, []); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">driver-information-multiple-ctas</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/driver-information-multiple-ctas', null, []); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">logos</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/logos', null, []); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">space</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/space', null, ['size' => 'medium', 'space_type' => 'invisible']); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">callout</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/callout', null, ['content' => '<p><strong>Callout:</strong> Transportation that works - for riders, agencies, and PACE.</p>']); ?>
  </div>
</div>
<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">testimonials</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/testimonials', null, []); ?>
  </div>
</div>

<div class="demo-frame relative border border-gray-200 rounded-xl overflow-hidden my-10 shadow-sm">
  <div class="absolute top-0 left-0 z-10 bg-gray-900 text-white text-[11px] font-mono tracking-widest uppercase px-3 py-1.5 rounded-br-lg leading-none">footer</div>
  <div class="pt-8">
        <?php get_template_part('template-parts/sections/footer', null, []); ?>
  </div>
</div>

    <?php endif; ?>
</main>

<?php
get_footer();
