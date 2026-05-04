<?php
/**
 * Template Name: Demo Sections
 * Description: Showcase of all section types with demo content
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
            <?php get_template_part('template-parts/sections/' . $layout, $type, array_merge($section, ['id' => $id])); ?>
        <?php endforeach; ?>
    <?php else : ?>
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

        <?php get_template_part('template-parts/sections/navigation-who-we-serve', null, [
            'stats' => [
                ['value' => '1M+', 'label' => 'Rides Delivered Each Year'],
                ['value' => '35+', 'label' => 'Major Metro Areas Served'],
                ['value' => '15', 'label' => 'States And Counting'],
                ['value' => '95%', 'label' => 'On-Time Performance'],
            ],
            'description' => '<p>Scale matters, but only because of what it enables: reliable transportation. For partners, that means stronger service outcomes, greater rider satisfaction, and transportation programs people can depend on.</p>',
        ]); ?>

        <?php get_template_part('template-parts/sections/avenues-who-we-serve', null, [
            'title'            => 'Three Avenues. One Platform.',
            'background_color' => '#F0F5FF',
            'avenues'          => [
                [
                    'overline'       => 'FOR TRANSIT AGENCIES',
                    'heading'        => 'Paratransit That Performs.',
                    'content'        => '<p>SilverRide is the partner of choice for transit agencies that need ADA-compliant paratransit at scale. We support complementary paratransit, overflow service, premium tiers, and same-day trips through a flexible independent driver network and an accessibility-focused vehicle mix, including sedans, SUVs, and wheelchair-accessible vehicles.</p><p class="mt-4">Our model offers operational flexibility that many traditional providers struggle to match: scalable capacity for peak demand, premium service without dedicated fleet costs, and agency-grade reporting built for performance oversight and FTA readiness. When service standards matter, SilverRide helps agencies meet them with greater flexibility and cost control.</p>',
                    'bullets'        => [
                        'ADA-compliant service across 35+ major metros in 15 states',
                        '95% on-time performance with agency-grade reporting',
                        'Sedan, SUV, and wheelchair-accessible vehicles on demand',
                        'Door-to-door, door-through-door, and hand-to-hand service',
                        'Insurance levels matched to your contract requirements (typically $1M+, up to $5M+)',
                    ],
                    'cta'            => ['url' => '#', 'title' => 'Partner With Our Agency Team'],
                    'image'          => ['url' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=600&q=80', 'alt' => 'Wheelchair accessible vehicle with ramp'],
                    'image_position' => 'right',
                ],
                [
                    'overline'       => 'FOR PACE AND HEALTHCARE',
                    'heading'        => 'Transportation your members can count on.',
                    'content'        => '<p>SilverRide supports PACE programs, health plans, and healthcare systems with door-through-door assisted transportation built for more complex rider needs. Designed for participants who may need additional support before, during, or after a ride, SilverRide helps create a more reliable and connected transportation experience from pickup through arrival and return home.</p><p class="mt-4">With operational coordination, SilverRide helps organizations improve rider access, support compliance needs, and deliver a transportation experience aligned with the level of care their members expect.</p>',
                    'bullets'        => [
                        'Credentialed drivers experienced with medically complex riders',
                        'Door-through-door service as the baseline, not an upgrade',
                        'Integrated booking, live tracking, and compliance-ready reporting',
                        'HIPAA-aware operations and credentialing',
                        'ADA-compliant service across 35+ major metros in 15 states',
                    ],
                    'cta'            => ['url' => '#', 'title' => 'Partner With Our PACE Team'],
                    'image'          => ['url' => 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=600&q=80', 'alt' => 'Smiling driver assisting passenger into vehicle'],
                    'image_position' => 'left',
                ],
                [
                    'overline'       => 'FOR RIDERS',
                    'heading'        => 'Direct booking for the people who need it most.',
                    'content'        => '<p>SilverRide is direct-bookable in most of our service areas. Schedule online, by phone, or through your local transit agency or PACE care team. Door-to-door or door-through-door assistance, an experienced and credentialed driver, and the patience that cannot be rushed.</p>',
                    'bullets'        => [],
                    'cta'            => ['url' => '#', 'title' => 'Book a Ride'],
                    'image'          => ['url' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=600&q=80', 'alt' => 'Hand holding smartphone with ride booking app'],
                    'image_position' => 'right',
                ],
            ],
        ]); ?>

        <?php get_template_part('template-parts/sections/process-who-we-serve', null, [
            'title_line_1' => 'Built around your service standards.',
            'title_line_2' => 'Live where your riders are.',
            'steps'        => [
                [
                    'number'  => '01.',
                    'heading' => 'Discovery',
                    'content' => 'We start by understanding your service area, your rider population, your existing operations, and the gaps you need filled. Same-day capacity. Premium tiers. Door-through-door for clinical trips. Overflow for peak demand. The conversation is specific and the proposals are tailored.',
                ],
                [
                    'number'  => '02.',
                    'heading' => 'Contract Design',
                    'content' => 'We design partnership terms around your service standards, compliance requirements, and reporting needs. Vehicle mix, insurance levels, credentialing requirements, and reporting cadence are all customized. Where regulations or rider needs require something specific, we build to it.',
                ],
                [
                    'number'  => '03.',
                    'heading' => 'Driver Network Activation',
                    'content' => 'Drivers in your market who meet the contract\'s credentialing and compliance requirements are made available for your trips. Where additional credentialing is required, SilverRide assists drivers in meeting those requirements so the network is ready when you are.',
                ],
                [
                    'number'  => '04.',
                    'heading' => 'Operational Launch',
                    'content' => 'After launch, trip requests can begin moving through the SilverRide platform. SilverRide supports dispatch workflows, care coordination needs, and rider-facing scheduling experiences through centralized tools designed for operational visibility. Live tracking, compliance reporting, and operational dashboards are available as part of implementation.',
                ],
                [
                    'number'  => '05.',
                    'heading' => 'Ongoing Performance',
                    'content' => 'On-time performance, ride volume, rider satisfaction, and compliance reporting are continuously monitored. When service standards require attention, we act early to maintain performance. When there are opportunities to improve or scale service, we surface those insights as well.',
                ],
            ],
        ]); ?>
        
        <?php
        get_template_part('template-parts/sections/functionalities-who-we-serve', null, [
            'title' => 'Compliance is the floor, not the ceiling.',
            'description' => '<p>SilverRide is the partner of choice for transit agencies that need ADA-compliant paratransit at scale. We support complementary paratransit, overflow service, premium tiers, and same-day trips through a flexible independent driver network and an accessibility-focused vehicle mix, including sedans, SUVs, and wheelchair-accessible vehicles.</p>',
            'items' => [
                ['icon' => ['url' => 'https://via.placeholder.com/48?text=ADA', 'alt' => 'Wheelchair accessible icon'], 'image' => ['url' => 'https://images.unsplash.com/photo-1573497620053-ea5300f94f21?w=400&q=80', 'alt' => 'Accessible transportation'], 'label' => 'ADA-compliant operations supported across markets and contract types'],
                ['icon' => ['url' => 'https://via.placeholder.com/48?text=HIPAA', 'alt' => 'HIPAA compliant icon'], 'image' => ['url' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=400&q=80', 'alt' => 'Healthcare compliance'], 'label' => 'HIPAA-compliant workflows for healthcare and PACE partners'],
                ['icon' => ['url' => 'https://via.placeholder.com/48?text=FTA', 'alt' => 'FTA reporting icon'], 'image' => ['url' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400&q=80', 'alt' => 'Transit agency reporting'], 'label' => 'FTA-aligned reporting designed for transit agency oversight and compliance'],
                ['icon' => ['url' => 'https://via.placeholder.com/48?text=INS', 'alt' => 'Insurance coverage icon'], 'image' => ['url' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400&q=80', 'alt' => 'Insurance coverage'], 'label' => 'Insurance coverage aligned with contract requirements'],
                ['icon' => ['url' => 'https://via.placeholder.com/48?text=DRV', 'alt' => 'Credentialed drivers icon'], 'image' => ['url' => 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=400&q=80', 'alt' => 'Credentialed drivers'], 'label' => 'Credentialed drivers'],
                ['icon' => ['url' => 'https://via.placeholder.com/48?text=AUD', 'alt' => 'Audit trails icon'], 'image' => ['url' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=400&q=80', 'alt' => 'Audit trails and reporting'], 'label' => 'Trip-level audit trails, performance dashboards, and contract-specific reporting tools'],
            ],
        ]);
        ?>

        <?php get_template_part('template-parts/sections/partnership-who-we-serve', null, []) ?>

    <?php endif; ?>
</main>

<?php
get_footer();
