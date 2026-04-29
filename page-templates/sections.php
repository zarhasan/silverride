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
    <?php
    // ============================================================
    // SECTION 1: Hero (Home)
    // ============================================================
    ?>
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

    // ============================================================
    // SECTION 2: Section Title
    // ============================================================
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

    // ============================================================
    // SECTION 2: Section Title
    // ============================================================
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

    // ============================================================
    // SECTION 3: Text
    // ============================================================
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
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '5',
        'section' => 'Services',
        'layout' => 'services.php',
        'fields' => 'title, description (wysiwyg), features (repeater), link, image'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/services', null, [
        'title' => 'Our Comprehensive Services',
        'description' => 'End-to-end accessibility solutions for your organization.',
        'features' => [
            ['feature' => 'Quick Strike Gap Analysis'],
            ['feature' => 'Accessibility Assessment Report'],
            ['feature' => 'Blueprint Accessibility Plan'],
            ['feature' => 'Policies & Procedures'],
            ['feature' => 'Compliance Implementation'],
            ['feature' => 'Continuous Improvement']
        ],
        'link' => ['url' => '#', 'title' => 'Discover All Services'],
        'image' => ['url' => 'https://images.unsplash.com/photo-1551434678-e076c223a692?w=800&q=80', 'alt' => 'Services']
    ]);

    // ============================================================
    // SECTION 6: Our Mission
    // ============================================================
    ?>
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '6',
        'section' => 'Our Mission',
        'layout' => 'our_mission.php',
        'fields' => 'title, quote, description (textarea), services (repeater), link'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/our_mission', null, [
        'title' => 'OUR MISSION',
        'quote' => '"To make the digital world accessible to everyone"',
        'description' => 'We believe accessibility is a fundamental right.',
        'services' => [
            ['icon' => ['value' => 'dashicons-desktop'], 'image' => ['url' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&q=80'], 'title' => 'Web Accessibility', 'description' => 'WCAG compliance', 'link' => ['url' => '#', 'title' => 'Learn More']],
            ['icon' => ['value' => 'dashicons-format-aside'], 'image' => ['url' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400&q=80'], 'title' => 'Document Remediation', 'description' => 'PDF accessibility', 'link' => ['url' => '#', 'title' => 'Learn More']]
        ],
        'link' => ['url' => '#', 'title' => 'View Our Approach']
    ]);

    // ============================================================
    // SECTION 7: Process
    // ============================================================
    ?>
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '7',
        'section' => 'Process',
        'layout' => 'process.php',
        'fields' => 'title, subtitle, image'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/process', null, [
        'title' => 'Our Process',
        'subtitle' => 'A proven methodology for achieving compliance',
        'image' => ['url' => 'https://images.unsplash.com/photo-1552664730-d30777b10547?w=1200&q=80', 'alt' => 'Process']
    ]);

    // ============================================================
    // SECTION 8: Certificates
    // ============================================================
    ?>
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '8',
        'section' => 'Certificates',
        'layout' => 'certificates-default.php',
        'fields' => 'title, description (wysiwyg), stats (repeater), link, image'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/certificates-default', null, [
        'title' => 'Government Accessibility Services',
        'description' => '<p>Serving government agencies at all levels.</p>',
        'stats' => [
            ['label' => 'Contracts', 'value' => '150+'],
            ['label' => 'Agencies', 'value' => '50+'],
            ['label' => 'Years', 'value' => '14'],
            ['label' => 'Success', 'value' => '100%']
        ],
        'link' => ['url' => '#', 'title' => 'View Credentials'],
        'image' => ['url' => 'https://images.unsplash.com/photo-1569974507005-6dc61f97fb5c?w=600&q=80', 'alt' => 'Government']
    ]);

    // ============================================================
    // SECTION 9: Compliance
    // ============================================================
    ?>
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '9',
        'section' => 'Compliance',
        'layout' => 'compliance.php',
        'fields' => 'title, description (wysiwyg), items (repeater), score (number), link, image, transcript'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/compliance', null, [
        'title' => 'Compliance Management',
        'description' => '<p>Stay ahead of accessibility regulations.</p>',
        'items' => [
            ['item' => 'AODA'],
            ['item' => 'ADA'],
            ['item' => 'WCAG 2.1 AA'],
            ['item' => 'Section 508']
        ],
        'score' => 98,
        'link' => ['url' => '#', 'title' => 'Learn More'],
        'image' => ['url' => 'https://images.unsplash.com/photo-1454165804606-e3e48fa0faf9?w=600&q=80', 'alt' => 'Compliance']
    ]);

    // ============================================================
    // SECTION 10-14: Various Grid Types
    // ============================================================
    ?>
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '10',
        'section' => 'Grid',
        'layout' => 'grid-basic.php',
        'type' => 'Basic',
        'fields' => 'type, grid_size, title, description (wysiwyg), limit, background_color, items (repeater), footer_description, cta, disable_margins'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/grid-basic', null, [
        'title' => 'Core Services',
        'description' => 'Our main service offerings',
        'grid_size' => 3,
        'items' => [
            ['image' => ['url' => 'https://images.unsplash.com/photo-1517292987719-0369a794ec0f?w=100&q=80'], 'title' => 'Web Accessibility', 'description' => '<p>WCAG compliance</p>', 'link' => ['url' => '#', 'title' => 'Learn More']],
            ['image' => ['url' => 'https://images.unsplash.com/photo-1586281380349-632531db7ed4?w=100&q=80'], 'title' => 'Document Remediation', 'description' => '<p>PDF conversion</p>', 'link' => ['url' => '#', 'title' => 'Learn More']],
            ['image' => ['url' => 'https://images.unsplash.com/photo-1531065206490-491f0d62cf3e?w=100&q=80'], 'title' => 'Training', 'description' => '<p>Certified programs</p>', 'link' => ['url' => '#', 'title' => 'Learn More']]
        ]
    ]);
    ?>
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '11',
        'section' => 'Grid',
        'layout' => 'grid-alt.php',
        'type' => 'Alt'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/grid-alt', null, [
        'title' => 'Specialized Solutions',
        'description' => 'Industry-specific solutions',
        'grid_size' => 2,
        'items' => [
            ['image' => ['url' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=100&q=80'], 'title' => 'Financial', 'description' => '<p>Banking compliance</p>', 'link' => ['url' => '#', 'title' => 'Explore']],
            ['image' => ['url' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=100&q=80'], 'title' => 'Healthcare', 'description' => '<p>Patient accessibility</p>', 'link' => ['url' => '#', 'title' => 'Explore']]
        ]
    ]);
    ?>
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '12',
        'section' => 'Grid',
        'layout' => 'grid-cards.php',
        'type' => 'Cards'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/grid-cards', null, [
        'title' => 'Service Categories',
        'description' => 'Comprehensive solutions',
        'grid_size' => 3,
        'items' => [
            ['image' => ['url' => 'https://images.unsplash.com/photo-1432888498266-38ffec3eaf65?w=400&q=80'], 'title' => 'Digital', 'description' => '<p>Web & mobile</p>', 'link' => ['url' => '#', 'title' => 'View Details']],
            ['image' => ['url' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=400&q=80'], 'title' => 'Physical', 'description' => '<p>Environmental</p>', 'link' => ['url' => '#', 'title' => 'View Details']],
            ['image' => ['url' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=400&q=80'], 'title' => 'Training', 'description' => '<p>Education</p>', 'link' => ['url' => '#', 'title' => 'View Details']]
        ]
    ]);
    ?>
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '13',
        'section' => 'Grid',
        'layout' => 'grid-service-cards.php',
        'type' => 'Service Cards'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/grid-service-cards', null, [
        'title' => 'Our Services',
        'description' => 'Professional services',
        'grid_size' => 3,
        'items' => [
            ['image' => ['url' => 'https://images.unsplash.com/photo-1551434678-e076c223a692?w=400&q=80'], 'title' => 'Audits', 'description' => '<p>Comprehensive evaluations</p>', 'link' => ['url' => '#', 'title' => 'Get Started']],
            ['image' => ['url' => 'https://images.unsplash.com/photo-1552664730-d30777b10547?w=400&q=80'], 'title' => 'Remediation', 'description' => '<p>Fix barriers</p>', 'link' => ['url' => '#', 'title' => 'Get Started']],
            ['image' => ['url' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=400&q=80'], 'title' => 'Support', 'description' => '<p>Continuous monitoring</p>', 'link' => ['url' => '#', 'title' => 'Get Started']]
        ]
    ]);
    ?>
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '14',
        'section' => 'Grid',
        'layout' => 'grid-clickable-cards.php',
        'type' => 'Clickable Cards'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/grid-clickable-cards', null, [
        'title' => 'Explore Our Expertise',
        'description' => 'Click to learn more',
        'grid_size' => 3,
        'items' => [
            ['image' => ['url' => 'https://images.unsplash.com/photo-1522542550221-31fd8575f3f5?w=400&q=80'], 'title' => 'WCAG', 'description' => '<p>Web Guidelines</p>', 'link' => ['url' => '#', 'title' => '']],
            ['image' => ['url' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?w=400&q=80'], 'title' => 'ADA', 'description' => '<p>American Disabilities</p>', 'link' => ['url' => '#', 'title' => '']],
            ['image' => ['url' => 'https://images.unsplash.com/photo-1504868584859-b724b5c89ba1?w=400&q=80'], 'title' => 'AODA', 'description' => '<p>Ontario Act</p>', 'link' => ['url' => '#', 'title' => '']]
        ]
    ]);

    // ============================================================
    // SECTION 15-16: Information
    // ============================================================
    ?>
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '15',
        'section' => 'Information',
        'layout' => 'information.php',
        'type' => 'Default',
        'fields' => 'type, background_color, title, description (wysiwyg), items (repeater), link, image'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/information', null, [
        'type' => 'default',
        'title' => 'What\'s Included in Our Audits',
        'description' => 'Complete accessibility coverage',
        'items' => [
            ['item' => 'Automated testing'],
            ['item' => 'Screen reader testing'],
            ['item' => 'Keyboard navigation'],
            ['item' => 'Color contrast'],
            ['item' => 'Form elements'],
            ['item' => 'Multimedia']
        ],
        'link' => ['url' => '#', 'title' => 'Schedule Audit'],
        'image' => ['url' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&q=80', 'alt' => 'Audits']
    ]);
    ?>
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '16',
        'section' => 'Information',
        'layout' => 'information-alt.php',
        'type' => 'Alt'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/information-alt', null, [
        'type' => 'alt',
        'title' => 'What\'s Included in Our Audits',
        'description' => 'Complete accessibility coverage',
        'items' => [
            ['item' => 'Consultation'],
            ['item' => 'Barrier identification'],
            ['item' => 'Remediation plan'],
            ['item' => 'Implementation'],
            ['item' => 'Verification'],
            ['item' => 'Monitoring']
        ],
        'link' => ['url' => '#', 'title' => 'Contact Us'],
        'image' => ['url' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&q=80', 'alt' => 'Approach']
    ]);

    // ============================================================
    // SECTION 17-20: CTA, Blog, FAQs, Contact
    // ============================================================
    ?>
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '17',
        'section' => 'Call To Action',
        'layout' => 'call_to_action-default.php',
        'type' => 'Default',
        'fields' => 'type, title, description (wysiwyg), link, media_type, image, video, subtitles'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/call_to_action-default', null, [
        'type' => 'default',
        'title' => 'Ready to Improve Your Accessibility?',
        'description' => '<p>Start your journey to full compliance today.</p>',
        'link' => ['url' => '#', 'title' => 'Get Started Today'],
        'media_type' => 'image',
        'image' => ['url' => 'https://images.unsplash.com/photo-1557804506-669a67965ce0?w=800&q=80', 'alt' => 'Team']
    ]);
    ?>
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '17',
        'section' => 'Call To Action',
        'layout' => 'call_to_action-simple.php',
        'type' => 'Simple',
        'fields' => 'type, title, description (wysiwyg), link, media_type, image, video, subtitles'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/call_to_action-simple', null, [
        'type' => 'simple',
        'title' => 'Ready to Improve Your Accessibility?',
        'description' => '<p>Start your journey to full compliance today.</p>',
        'link' => ['url' => '#', 'title' => 'Get Started Today'],
        'media_type' => 'image',
        'image' => ['url' => 'https://images.unsplash.com/photo-1557804506-669a67965ce0?w=800&q=80', 'alt' => 'Team']
    ]);
    ?>
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '18',
        'section' => 'Blog',
        'layout' => 'blog-default.php',
        'fields' => 'title, description (textarea), post_count (number), category (taxonomy), link'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/blog-default', null, [
        'title' => 'OUR LATEST NEWS & BLOGS',
        'description' => 'Stay updated with latest insights',
        'post_count' => 6,
        'link' => ['url' => '#', 'title' => 'View All Posts']
    ]);
    ?>
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '19',
        'section' => 'FAQs',
        'layout' => 'faqs-default.php',
        'fields' => 'title, description (textarea), items (repeater), cta'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/faqs-default', null, [
        'title' => 'Frequently Asked Questions',
        'description' => 'Common questions about accessibility',
        'items' => [
            ['question' => 'What is WCAG?', 'answer' => '<p>Web Content Accessibility Guidelines</p>'],
            ['question' => 'What is AODA?', 'answer' => '<p>Accessibility for Ontarians with Disabilities Act</p>'],
            ['question' => 'How long does audit take?', 'answer' => '<p>2-4 weeks typically</p>'],
            ['question' => 'Ongoing support?', 'answer' => '<p>Yes, we offer support packages</p>']
        ],
        'footer_description' => '<p>Still have questions? <a href="#" class="text-primary hover:underline">Contact us</a>.</p>',
        'cta' => ['url' => '#', 'title' => 'Contact Us']
    ]);
    ?>
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '20',
        'section' => 'Contact',
        'layout' => 'contact.php',
        'fields' => 'subtitle, title, description (textarea), contact_form'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/contact', null, [
        'subtitle' => 'CONTACT US',
        'title' => 'Get Free Initial Consultation',
        'description' => 'Let us handle your accessibility needs efficiently.',
        'contact_form' => '[contact-form-7 id="1" title="Contact Form"]'
    ]);

// ============================================================
    // SECTION 21-28: More Grid Types + Logos
    // ============================================================
    ?>
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '22',
        'section' => 'Logos',
        'layout' => 'logos.php',
        'fields' => 'title, subtitle, description, columns (3/4/5), logos (gallery)'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/hero-page', null, [
        'type' => 'page',
        'subtitle' => 'Web Accessibility Services',
        'title' => 'Make Your Website Accessible',
        'description' => '<p>Comprehensive solutions for WCAG compliance.</p>',
        'links' => [['link' => ['url' => '#', 'title' => 'Request Quote']]],
        'image' => ['url' => 'https://images.unsplash.com/photo-1522071820081-009f0329d878?w=800&q=80', 'alt' => 'Hero'],
        'media_type' => 'image'
    ]);
    ?>

    <?php get_template_part('template-parts/section-label', null, [
        'number' => '21',
        'section' => 'Logos',
        'layout' => 'logos.php',
        'fields' => 'title, subtitle, description, columns (3/4/5), logos (gallery)'
    ]); ?>
   
    <?php
    get_template_part('template-parts/sections/logos', null, [
        'title' => 'Trusted By Leading Organizations',
        'subtitle' => 'Our Clients',
        'description' => 'Organizations across sectors',
        'columns' => 4
    ]);
    ?>
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '23',
        'section' => 'Grid',
        'layout' => 'grid-highlight.php',
        'type' => 'Highlight'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/grid-highlight', null, [
        'title' => 'Why Work With Us',
        'description' => 'The SilverRide difference',
        'grid_size' => 2,
        'items' => [
            ['image' => ['url' => 'https://images.unsplash.com/photo-1600880292203-75729762b986?w=100&q=80'], 'title' => 'Certified', 'description' => '<p>IAAP professionals</p>', 'link' => ['url' => '#', 'title' => '']],
            ['image' => ['url' => 'https://images.unsplash.com/photo-1553877522-43269d4a984f?w=100&q=80'], 'title' => 'Track Record', 'description' => '<p>100% success</p>', 'link' => ['url' => '#', 'title' => '']]
        ]
    ]);
    ?>
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '24',
        'section' => 'Grid',
        'layout' => 'grid-textual.php',
        'type' => 'Textual'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/grid-textual', null, [
        'title' => 'Standards We Cover',
        'description' => 'Comprehensive coverage',
        'grid_size' => 2,
        'items' => [
            ['title' => 'WCAG 2.1', 'description' => '<p>International standard</p>', 'link' => ['url' => '#', 'title' => 'Learn More']],
            ['title' => 'ADA & 508', 'description' => '<p>US requirements</p>', 'link' => ['url' => '#', 'title' => 'Learn More']]
        ]
    ]);
    ?>
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '25',
        'section' => 'Grid',
        'layout' => 'grid-floating-cards.php',
        'type' => 'Floating Cards'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/grid-floating-cards', null, [
        'title' => 'Service Highlights',
        'description' => 'Elevated solutions',
        'grid_size' => 3,
        'items' => [
            ['image' => ['url' => 'https://images.unsplash.com/photo-1551434678-e076c223a692?w=400&q=80'], 'title' => 'Quick', 'description' => '<p>Fast turnaround</p>', 'link' => ['url' => '#', 'title' => 'Learn More']],
            ['image' => ['url' => 'https://images.unsplash.com/photo-1552664730-d30777b10547?w=400&q=80'], 'title' => 'Detailed', 'description' => '<p>Comprehensive</p>', 'link' => ['url' => '#', 'title' => 'Learn More']],
            ['image' => ['url' => 'https://images.unsplash.com/photo-1531403009284-440f080d1e12?w=400&q=80'], 'title' => 'Priority', 'description' => '<p>Dedicated support</p>', 'link' => ['url' => '#', 'title' => 'Learn More']]
        ]
    ]);
    ?>
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '26',
        'section' => 'Grid',
        'layout' => 'grid-compliance-cards.php',
        'type' => 'Compliance Cards'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/grid-compliance-cards', null, [
        'title' => 'Compliance Areas',
        'description' => 'All areas covered',
        'grid_size' => 3,
        'items' => [
            ['image' => ['url' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&q=80'], 'title' => 'Digital', 'description' => '<p>Web & mobile</p>', 'link' => ['url' => '#', 'title' => '']],
            ['image' => ['url' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400&q=80'], 'title' => 'Document', 'description' => '<p>PDF standards</p>', 'link' => ['url' => '#', 'title' => '']],
            ['image' => ['url' => 'https://images.unsplash.com/photo-1569982177971-6bce49f9795a?w=400&q=80'], 'title' => 'Physical', 'description' => '<p>Environmental</p>', 'link' => ['url' => '#', 'title' => '']]
        ]
    ]);
    ?>
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '27',
        'section' => 'Grid',
        'layout' => 'grid-information-cards.php',
        'type' => 'Information Cards'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/grid-information-cards', null, [
        'title' => 'Key Information',
        'description' => 'Important details',
        'grid_size' => 3,
        'items' => [
            ['title' => 'Response Time', 'description' => '<p>24-48 hours</p>', 'link' => ['url' => '#', 'title' => '']],
            ['title' => 'Duration', 'description' => '<p>2-8 weeks</p>', 'link' => ['url' => '#', 'title' => '']],
            ['title' => 'Guarantee', 'description' => '<p>100% success</p>', 'link' => ['url' => '#', 'title' => '']]
        ]
    ]);
    ?>
    <?php get_template_part('template-parts/section-label', null, [
        'number' => '28',
        'section' => 'Grid',
        'layout' => 'grid-incentives.php',
        'type' => 'Incentives'
    ]); ?>
    <?php
    get_template_part('template-parts/sections/grid-incentives', null, [
        'title' => 'Special Offers',
        'description' => 'Current promotions',
        'grid_size' => 2,
        'items' => [
            ['image' => ['url' => 'https://images.unsplash.com/photo-1553729459-efe14ef6055d?w=100&q=80'], 'title' => 'Free Consultation', 'description' => '<p>30-minute call</p>', 'link' => ['url' => '#', 'title' => 'Claim Offer']],
            ['image' => ['url' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=100&q=80'], 'title' => '10% Off', 'description' => '<p>First project</p>', 'link' => ['url' => '#', 'title' => 'Claim Offer']]
        ]
    ]);
    ?>

    <?php get_template_part('template-parts/section-label', null, [
        'number' => '29',
        'section' => 'Text',
        'layout' => 'text-alt.php',
        'type' => 'Text'
    ]); ?>

    <?php
    get_template_part('template-parts/sections/text-alt', null, [
        'title' => 'Our Accessibility Commitment',
        'description' => '<p>At SilverRide, we are dedicated to making the digital world accessible to everyone. We believe that accessibility is not just a legal requirement, but a moral imperative and a business opportunity. Our team of certified accessibility experts has helped hundreds of organizations across North America achieve compliance and create truly inclusive digital experiences. We are committed to providing comprehensive, end-to-end accessibility solutions that empower our clients to reach a wider audience and foster inclusivity.</p>'
    ]);
    ?>

    <?php get_template_part('template-parts/section-label', null, [
        'number' => '30',
        'section' => 'Points Grid',
        'layout' => 'points-grid.php',
        'type' => 'Points Grid'
    ]); ?>

    <?php
        get_template_part('template-parts/sections/points-grid', null, [
            'title' => 'Our Accessibility Commitment',
            'description' => '<p>At SilverRide, we are dedicated to making the digital world accessible to everyone. We believe that accessibility is not just a legal requirement, but a moral imperative and a business opportunity. Our team of certified accessibility experts has helped hundreds of organizations across North America achieve compliance and create truly inclusive digital experiences. We are committed to providing comprehensive, end-to-end accessibility solutions that empower our clients to reach a wider audience and foster inclusivity.</p>',
            'items' => [
                ['title' => 'Compliance', 'description' => '<p>Ensure legal adherence</p>'],
                ['title' => 'Inclusivity', 'description' => '<p>Reach a wider audience</p>'],
                ['title' => 'Expertise', 'description' => '<p>Benefit from certified professionals</p>'],
                ['title' => 'Compliance', 'description' => '<p>Ensure legal adherence</p>'],
                ['title' => 'Inclusivity', 'description' => '<p>Reach a wider audience</p>'],
                ['title' => 'Expertise', 'description' => '<p>Benefit from certified professionals</p>']
            ]
        ]);
    ?>

    <?php get_template_part('template-parts/section-label', null, [
        'number' => '30',
        'section' => 'Locations Alt',
        'layout' => 'locations-alt.php',
        'fields' => 'title, locations (repeater: map_iframe, name, address, phone, email, hours)'
    ]); ?>

    <?php
        get_template_part('template-parts/sections/locations_alt', null, [
            'title' => 'Our Office Locations',
            'locations' => [
                [
                    'map_iframe' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3025.0!2d-74.0!3d40.7!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDDCsDQwJzAwLjAiTiA3NMKwMDAnMDAuMCJX!5e0!3m2!1sen!2sus!4v1234567890',
                    'name' => 'New York',
                    'address' => '<p>Suite 934-H16</p><p>New York, NY 10004</p>',
                    'phone' => '(332) 529-1228',
                    'email' => 'info@accessibilityinnovations.com',
                    'hours' => '<span>Monday-Friday : 08:30 A.M. – 5:00 P.M.</span><p>Saturday – Closed</p><p>Sunday – Closed</p>'
                ],
                [
                    'map_iframe' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3025.0!2d-82.6!3d27.8!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjfCsDQ4JzAwLjAiTiA4MsKwMzcnMjguMCJX!5e0!3m2!1sen!2sus!4v1234567890',
                    'name' => 'Florida',
                    'address' => '<p>1661 Central Ave. St. Petersburg, FL 33713</p><p>Florida, United States</p>',
                    'phone' => '1-866-245-A11Y',
                    'email' => 'info@accessibilityinnovations.com',
                    'hours' => '<span>Monday-Friday : 08:30 A.M. – 5:00 P.M.</span><p>Saturday – Closed</p><p>Sunday – Closed</p>'
                ]
            ]
        ]);
    ?>

    <?php
        get_template_part('template-parts/sections/slider-basic', null, [
            'slides' => [
                [
                    'heading' => 'Accessibility Consulting',
                    'content' => 'We help organizations achieve AODA, ACA, and WCAG compliance through expert auditing and strategic guidance tailored to your needs.'
                ],
                [
                    'heading' => 'Document Remediation',
                    'content' => 'Transform your PDFs, Word documents, and presentations into fully accessible formats that meet rigorous compliance standards.'
                ],
                [
                    'heading' => 'Training & Education',
                    'content' => 'Empower your team with practical, hands-on accessibility training tailored to your workflow and organizational goals.'
                ]
            ]
        ]);
    ?>


    <?php
        get_template_part('template-parts/sections/grid_videos', null, [
            'title' => 'Accessibility Resources',
            'description' => 'Educational videos on key topics',
            'grid_size' => 3,
            'videos' => [
                ['embed_url' => 'https://www.youtube.com/watch?v=ggKq19-LbRY', 'title' => 'What is Accessibility?', 'description' => '<p>An introduction to digital accessibility.</p>'],
                ['embed_url' => 'https://www.youtube.com/watch?v=ggKq19-LbRY', 'title' => 'WCAG Guidelines', 'description' => '<p>Overview of WCAG standards.</p>'],
                ['embed_url' => 'https://www.youtube.com/watch?v=ggKq19-LbRY', 'title' => 'Accessibility Testing', 'description' => '<p>How to test for accessibility.</p>']
            ]
        ]);
    ?>

</main>

<?php
get_footer();