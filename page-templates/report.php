<?php
/**
 * Template Name: Report an Incident
 *
 */

get_header();

get_template_part('template-parts/sections/report');
get_template_part('template-parts/sections/call_to_action-default', null, [
    'title' => 'Still have questions?',
    'description' => 'Get in touch with us',
    'links' => [
        ['link' => ['url' => '#', 'title' => 'Contact Us']]
    ]
]);

get_footer();
