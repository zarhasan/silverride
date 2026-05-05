<?php
/**
 * Template Name: Home
 *
 */

get_header();

get_template_part('template-parts/sections/hero-home');
get_template_part('template-parts/sections/information', null, [
    'title' => 'Who We Are',
    'subtitle' => 'More Than A Ride. A Lifeline.',
    'description' => '<p>For millions of older adults and people with disabilities, a reliable ride is the difference between staying connected and being left behind. Rideshare apps often cannot accommodate a wheelchair. Traditional non-emergency medical services only cover medical trips. Public transit can be out of reach. SilverRide was built to close that gap, every day, at scale.</p><p>We are a licensed Transportation Network Company delivering ADA-compliant assisted transportation, powered by a purpose-built technology platform and an experienced, credentialed driver network. We work three ways: paratransit partnerships with transit agencies, contract services for PACE and healthcare organizations, and direct booking for riders and their families. One platform. Three audiences. The same standard of care on every ride.</p><p>The result: greater independence, greater dignity, more joy. For the people who need it most.</p><p>The result: greater independence, greater dignity, more joy. For the people who need it most.</p>',
    'image' => [
        'url' => get_template_directory_uri() . '/media/information.png',
        'alt' => 'A smiling senior',
    ],
    'link' => [
        'url' => '#',
        'title' => 'Learn More About SilverRide',
    ],
    'image_position' => 'right',
]);
get_template_part('template-parts/sections/stats');
get_template_part('template-parts/sections/grid-colorful');
get_template_part('template-parts/sections/nested-grid');
get_template_part('template-parts/sections/grid-highlight');
get_template_part('template-parts/sections/logos');
get_template_part('template-parts/sections/information-alt');
get_template_part('template-parts/sections/information-simple');
get_template_part('template-parts/sections/slider-basic');
get_template_part('template-parts/sections/call_to_action-alt');
get_template_part('template-parts/sections/blog-alt');
get_template_part('template-parts/sections/call_to_action-default');

get_footer();
