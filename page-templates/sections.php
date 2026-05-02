<?php
/**
 * Template Name: Demo Sections
 * Description: Showcase of all section types with demo content
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main class="demo-sections-page">
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '1',
        'section' => 'Hero',
        'layout' => 'hero-home.php',
        'type' => 'Home',
        'fields' => 'type (Home | Page), subtitle, title, description (wysiwyg), links (repeater), image, service_links (repeater), media_type, video, transcript'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/hero-home', null, [
        'type' => 'home',
        'subtitle' => 'SilverRide Canada',
        'title' => 'Your Center of Excellence for Accessibility Compliance',
        'description' => '<p>We help organizations achieve and maintain compliance with accessibility standards including AODA, ADA, and WCAG. Our expert team provides comprehensive assessments, implementations, and ongoing support to ensure your digital and physical spaces are accessible to everyone.</p>',
        'links' => [
            ['link' => ['url' => '#', 'title' => 'Get Started']],
            ['link' => ['url' => '#services', 'title' => 'Our Services']]
        ],
        'image' => ['url' => 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=800&q=80', 'alt' => 'Professional accessibility consultation'],
        'service_links' => [
            ['title' => 'Web Accessibility', 'link' => ['url' => '#', 'title' => 'Web Accessibility']],
            ['title' => 'Document Remediation', 'link' => ['url' => '#', 'title' => 'Document Remediation']],
            ['title' => 'Training Programs', 'link' => ['url' => '#', 'title' => 'Training Programs']],
            ['title' => 'Compliance Audits', 'link' => ['url' => '#', 'title' => 'Compliance Audits']]
        ]
    ]);
    ?>

    <?php
    get_template_part('template-parts/sections/hero-page', null, [
        'type' => 'home',
        'subtitle' => 'SilverRide Canada',
        'title' => 'Your Center of Excellence for Accessibility Compliance',
        'description' => '<p>We help organizations achieve and maintain compliance with accessibility standards including AODA, ADA, and WCAG. Our expert team provides comprehensive assessments, implementations, and ongoing support to ensure your digital and physical spaces are accessible to everyone.</p>',
        'links' => [
            ['link' => ['url' => '#', 'title' => 'Get Started']],
            ['link' => ['url' => '#services', 'title' => 'Our Services']]
        ],
        'image' => ['url' => 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=800&q=80', 'alt' => 'Professional accessibility consultation'],
        'service_links' => [
            ['title' => 'Web Accessibility', 'link' => ['url' => '#', 'title' => 'Web Accessibility']],
            ['title' => 'Document Remediation', 'link' => ['url' => '#', 'title' => 'Document Remediation']],
            ['title' => 'Training Programs', 'link' => ['url' => '#', 'title' => 'Training Programs']],
            ['title' => 'Compliance Audits', 'link' => ['url' => '#', 'title' => 'Compliance Audits']]
        ]
    ]);
    ?>
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '2',
        'section' => 'Section Title',
        'layout' => 'section_title-default.php',
        'fields' => 'title, description (textarea)'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/section_title-default', null, [
        'title' => 'Why Choose SilverRide',
        'description' => '<p>Leading the industry in accessibility compliance solutions</p>',
    ]);

    ?>
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '3',
        'section' => 'Text',
        'layout' => 'text.php',
        'fields' => 'title, description (wysiwyg)'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/text', null, [
        'title' => 'Our Commitment to Accessibility',
        'description' => '<p>At SilverRide, we believe that accessibility is not just a legal requirement—it\'s a moral imperative and good business practice. An accessible website expands your market reach to include the 15% of the global population living with disabilities.</p><p>Our team of certified accessibility experts has helped hundreds of organizations across North America achieve compliance and create truly inclusive digital experiences.</p>'
    ]);
    ?>

    <?php get_template_part('template-parts/sections/hero-cities', null, []) ?>
    
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '5',
        'section' => 'Policy',
        'layout' => 'policy.php',
        'fields' => 'title, image, effective_date, toc_title, sections (repeater: heading, id, content), other_title, other_cities'
    ]); ?>
    <?php get_template_part('template-parts/sections/policy', null, []); ?>

</main>

<?php
get_footer();