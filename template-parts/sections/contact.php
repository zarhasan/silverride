<?php
if (!defined('ABSPATH')) {
    exit;
}

$context = $args['context'] ?? 'default';

if ($context === 'footer') {
    $sections = get_field('sections');
    if (!empty($sections)) {
        foreach ($sections as $section) {
            if (($section['acf_fc_layout'] ?? '') === 'contact') {
                return;
            }
        }
    }
}

$template_part_name = explode('.', basename(__FILE__))[0];

/* Left side content */
$title = !empty($args['title']) ? $args['title'] : (get_field('contact_title', 'option') ?: 'Empower Your Organization with the Nation\'s Leading Assisted Transportation Platform');
$description = !empty($args['description']) ? $args['description'] : (get_field('contact_description', 'option') ?: 'Discover how SilverRide can streamline your transportation logistics, reduce costs, and provide safe, reliable mobility solutions for the people you serve.');

$features = !empty($args['features']) ? $args['features'] : (get_field('contact_features', 'option') ?: []);
if (empty($features)) {
    $features = [
        'Specialized network of trained drivers',
        'Door-through-door service tracking and analytics',
        'End-to-end transportation management system',
    ];
}

$logos_image = !empty($args['logos_image']) ? $args['logos_image'] : (get_field('contact_logos', 'option') ?: '');
if (empty($logos_image)) {
    $logos_image = get_template_directory_uri() . '/media/logos-1.png';
}

/* Right side form */
$form_heading = !empty($args['form_heading']) ? $args['form_heading'] : (get_field('contact_form_heading', 'option') ?: 'Request a Demo');
$form_subheading = !empty($args['form_subheading']) ? $args['form_subheading'] : (get_field('contact_form_subheading', 'option') ?: 'Learn what SilverRide can do for your organization');
$contact_form_shortcode = !empty($args['contact_form']) ? $args['contact_form'] : (get_field('contact_form', 'option') ?: '');
?>

<section class="bg-primary py-16 lg:py-24" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-start">
            <!-- Left: Content -->
            <div class="text-white">
                <?php if ($title) : ?>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-6 leading-tight" style="font-family: 'Poppins', sans-serif !important;">
                        <?php echo wp_kses_post($title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <p class="text-lg text-blue-100 mb-10 leading-relaxed">
                        <?php echo wp_kses_post($description); ?>
                    </p>
                <?php endif; ?>

                <?php if (!empty($features)) : ?>
                    <ul class="space-y-4 mb-12">
                        <?php foreach ($features as $feature) : ?>
                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-[#F8952D] flex-shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg"viewBox="0 0 22 21" fill="none">
                                    <path d="M2.1875 9.36917C1.77329 9.37034 1.36788 9.48874 1.01816 9.7107C0.668437 9.93266 0.388706 10.2491 0.211325 10.6234C0.0339446 10.9977 -0.0338363 11.4146 0.0158243 11.8258C0.0654848 12.237 0.230557 12.6258 0.491944 12.9471L6.0641 19.773C6.26277 20.0197 6.51744 20.2154 6.80695 20.3439C7.09646 20.4724 7.41245 20.53 7.72868 20.5119C8.40502 20.4755 9.01564 20.1137 9.40494 19.5189L20.9797 0.877698C20.9816 0.874605 20.9836 0.871513 20.9856 0.868467C21.0942 0.701713 21.059 0.371252 20.8349 0.163652C20.7733 0.106642 20.7007 0.062843 20.6215 0.0349516C20.5424 0.00706011 20.4584 -0.00433314 20.3746 0.00147372C20.2909 0.00728058 20.2093 0.0301646 20.1347 0.0687162C20.0602 0.107268 19.9943 0.160671 19.9412 0.225636C19.9371 0.230744 19.9328 0.235775 19.9284 0.240729L8.25507 13.4298C8.21065 13.48 8.1567 13.5209 8.09636 13.5501C8.03601 13.5792 7.97047 13.5961 7.90355 13.5997C7.83663 13.6033 7.76965 13.5936 7.70651 13.5711C7.64337 13.5487 7.58533 13.5138 7.53576 13.4687L3.66161 9.94324C3.25924 9.57439 2.73334 9.36959 2.1875 9.36917Z" fill="#F8952D"/>
                                </svg>
                                <span class="text-lg text-white"><?php echo esc_html(is_array($feature) ? ($feature['feature'] ?? $feature['text'] ?? '') : $feature); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <?php if ($logos_image) : ?>
                    <div class="mt-auto">
                        <?php if (is_array($logos_image)) : ?>
                            <img src="<?php echo esc_url($logos_image['url'] ?? ''); ?>" alt="<?php echo esc_attr($logos_image['alt'] ?? 'Partner logos'); ?>" class="max-w-full h-auto" loading="lazy">
                        <?php else : ?>
                            <img src="<?php echo esc_url($logos_image); ?>" alt="Partner logos" class="max-w-full h-auto" loading="lazy">
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Right: Form Card -->
            <div class="bg-white rounded-lg shadow-xl p-8 lg:p-10">
                <?php if ($form_heading) : ?>
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2" style="font-family: 'Poppins', sans-serif !important;">
                        <?php echo esc_html($form_heading); ?>
                    </h3>
                <?php endif; ?>

                <?php if ($form_subheading) : ?>
                    <p class="text-base text-gray-600 mb-8">
                        <?php echo esc_html($form_subheading); ?>
                    </p>
                <?php endif; ?>

                <p class="text-sm text-gray-500 mb-6">
                    Fields marked with asterisk (<span class="text-primary">*</span>) are mandatory.
                </p>

                <div class="contact-forminator">
                    <?php if ($contact_form_shortcode) : ?>
                        <?php echo do_shortcode($contact_form_shortcode); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
