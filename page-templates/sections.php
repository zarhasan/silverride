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
        'number' => '4',
        'section' => 'Grid Cities',
        'layout' => 'grid-cities.php',
        'fields' => 'title, cities (repeater: city_name, city_image, explore_link, apply_link, extra_links), other_title, other_cities'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/grid-cities', null, [
        'title' => 'Featured cities',
        'cities' => [
            [
                'city_name' => 'Los Angeles',
                'city_image' => ['url' => 'https://images.unsplash.com/photo-1534190760961-74e8c1c5c3da?w=600&q=80', 'alt' => 'Los Angeles skyline'],
                'explore_link' => ['url' => '#', 'title' => 'Explore'],
                'apply_link' => ['url' => '#', 'title' => 'Apply to Drive'],
            ],
            [
                'city_name' => 'Atlanta',
                'city_image' => ['url' => 'https://images.unsplash.com/photo-1575917649705-5b59aaa12e6b?w=600&q=80', 'alt' => 'Atlanta skyline'],
                'explore_link' => ['url' => '#', 'title' => 'Explore'],
                'apply_link' => ['url' => '#', 'title' => 'Apply to Drive'],
            ],
            [
                'city_name' => 'Las Vegas',
                'city_image' => ['url' => 'https://images.unsplash.com/photo-1605833556294-ea5c7a74f57d?w=600&q=80', 'alt' => 'Las Vegas skyline'],
                'explore_link' => ['url' => '#', 'title' => 'Explore'],
                'apply_link' => ['url' => '#', 'title' => 'Apply to Drive'],
                'extra_links' => [
                    ['url' => '#', 'title' => 'Pricing'],
                    ['url' => '#', 'title' => 'WAV Rides'],
                ],
            ],
            [
                'city_name' => 'Louisville',
                'city_image' => ['url' => 'https://images.unsplash.com/photo-1549464190-f752384166f0?w=600&q=80', 'alt' => 'Louisville skyline'],
                'explore_link' => ['url' => '#', 'title' => 'Explore'],
                'apply_link' => ['url' => '#', 'title' => 'Apply to Drive'],
            ],
            [
                'city_name' => 'Phoenix',
                'city_image' => ['url' => 'https://images.unsplash.com/photo-1558618666-fcd25c85f82e?w=600&q=80', 'alt' => 'Phoenix skyline'],
                'explore_link' => ['url' => '#', 'title' => 'Explore'],
                'apply_link' => ['url' => '#', 'title' => 'Apply to Drive'],
            ],
            [
                'city_name' => 'San Francisco',
                'city_image' => ['url' => 'https://images.unsplash.com/photo-1501594907352-04cda38ebc29?w=600&q=80', 'alt' => 'San Francisco Golden Gate Bridge'],
                'explore_link' => ['url' => '#', 'title' => 'Explore'],
                'apply_link' => ['url' => '#', 'title' => 'Apply to Drive'],
            ],
            [
                'city_name' => 'Central Florida',
                'city_image' => ['url' => 'https://images.unsplash.com/photo-1596394516093-501ba68a0ba6?w=600&q=80', 'alt' => 'Central Florida aerial view'],
                'explore_link' => ['url' => '#', 'title' => 'Explore'],
                'apply_link' => ['url' => '#', 'title' => 'Apply to Drive'],
            ],
            [
                'city_name' => 'Orange County',
                'city_image' => ['url' => 'https://images.unsplash.com/photo-1534237710431-e2fc698436d0?w=600&q=80', 'alt' => 'Orange County coastline'],
                'explore_link' => ['url' => '#', 'title' => 'Explore'],
                'apply_link' => ['url' => '#', 'title' => 'Apply to Drive'],
            ],
            [
                'city_name' => 'Seattle',
                'city_image' => ['url' => 'https://images.unsplash.com/photo-1502175353174-a7a70e73b362?w=600&q=80', 'alt' => 'Seattle skyline'],
                'explore_link' => ['url' => '#', 'title' => 'Explore'],
                'apply_link' => ['url' => '#', 'title' => 'Apply to Drive'],
            ],
        ],
        'other_title' => 'Other cities we serve',
        'other_cities' => '<p>Bakersfield, CA  ·  Covina, CA · East Boston · Fort Myers, FL · Fresno, CA · Jacksonville, FL · Lexington, KY</p><p>East Los Angeles, Huntington Park, CA · Sacramento · Greater San Jose Area · Santa Clarita</p>',
    ]);
    ?>

</main>

<?php
get_footer();