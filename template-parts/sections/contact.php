<?php
if (!defined('ABSPATH')) {
    exit;
}

if(is_page('lp-profile')) {
    return; // Don't render this section on the "Profile" landing page
}

$context = $args['context'] ?? 'default';

// If this contact section is rendered in the footer, check whether the current page
// already contains a contact section in its flexible content. If so, skip rendering.
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
$subtitle = !empty($args['subtitle']) ? $args['subtitle'] : (get_field('contact_subtitle', 'option') ?: 'CONTACT US');
$title = !empty($args['title']) ? $args['title'] : (get_field('contact_title', 'option') ?: 'Get started with your <span class="text-primary !font-normal">Compliance Consultation</span>');
$description = !empty($args['description']) ? $args['description'] : (get_field('contact_description', 'option') ?: '<p>At <a href="https://accessibilityinnovations.com/">Accessibility Innovations</a>, we specialize in ensuring compliance with accessibility standards. Let us handle all your accessibility needs efficiently, so you can focus on your core business. Trust our expertise to keep your organization accessible to all.</p>');

$flexible_contact_form = !empty($args['contact_form']) ? $args['contact_form'] : '';
$global_contact_form = get_field('contact_form', 'option');
$contact_form_shortcode = $flexible_contact_form ?: $global_contact_form ?: '';

$contact_email = !empty($args['contact_email']) ? $args['contact_email'] : (get_field('contact_email', 'option') ?: '');
$contact_phone = !empty($args['contact_phone']) ? $args['contact_phone'] : (get_field('contact_phone', 'option') ?: '');
$contact_toll_free_phone = !empty($args['contact_toll_free_phone']) ? $args['contact_toll_free_phone'] : (get_field('contact_toll_free_phone', 'option') ?: '');
$contact_address = !empty($args['contact_address']) ? $args['contact_address'] : (get_field('contact_address', 'option') ?: '');
$site_name = get_bloginfo('name') ?: 'Accessibility Innovations';
$site_url = home_url('/');

$social_facebook = !empty($args['social_facebook']) ? $args['social_facebook'] : (get_field('social_facebook', 'option') ?: '');
$social_twitter = !empty($args['social_twitter']) ? $args['social_twitter'] : (get_field('social_twitter', 'option') ?: '');
$social_linkedin = !empty($args['social_linkedin']) ? $args['social_linkedin'] : (get_field('social_linkedin', 'option') ?: '');
$social_youtube = !empty($args['social_youtube']) ? $args['social_youtube'] : (get_field('social_youtube', 'option') ?: '');
?>

<section class="bg-[#F9F9F9] py-16 lg:py-24" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container">
        <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
            <!-- Left: Contact Info -->
            <div>
                <?php if ($subtitle) : ?>
                    <span class="text-[1.375rem] font-medium tracking-wider uppercase mb-4 block" style="color: var(--theme-primary);">
                        <?php echo esc_html($subtitle); ?>
                    </span>
                <?php endif; ?>

                <?php if(is_page('contact-us')) : ?>
                    <h1 class="text-4xl md:text-[2.5rem] !font-normal !leading-tight text-[#1B1B1B] mb-6">
                        <?php echo wp_kses_post($title); ?>
                    </h1>
                <?php else : ?>
                    <h2 class="text-4xl md:text-[2.5rem] !font-normal !leading-tight text-[#1B1B1B] mb-6">
                        <?php echo wp_kses_post($title); ?>
                    </h2>
                <?php endif; ?>
                
                <div class="prose text-lg text-[#1B1B1B] mb-8 leading-relaxed">
                    <?php echo wp_kses_post($description); ?>
                </div>
                
                <div class="space-y-6">
                    <?php if ($contact_email) : ?>
                    <div>
                        <?php if(is_page('contact-us')) : ?>
                            <h2 class="text-xl font-semibold text-[#1B1B1B] mb-2">Email Address</h2>
                        <?php else : ?>
                            <h3 class="text-xl font-semibold text-[#1B1B1B] mb-2">Email Address</h3>
                        <?php endif; ?>
                        <a href="mailto:<?php echo esc_attr($contact_email); ?>" class="text-lg transition-colors" style="color: var(--theme-primary);">
                            <?php echo esc_html($contact_email); ?>
                        </a>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($contact_phone) : ?>
                    <div>
                        <?php if(is_page('contact-us')) : ?>
                            <h2 class="text-xl font-semibold text-[#1B1B1B] mb-2">Phone Number</h2>
                        <?php else : ?>
                            <h3 class="text-xl font-semibold text-[#1B1B1B] mb-2">Phone Number</h3>
                        <?php endif; ?>
                        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $contact_phone)); ?>" class="text-lg transition-colors" style="color: var(--theme-primary);">
                            <?php echo esc_html($contact_phone); ?>
                        </a>
                    </div>
                    <?php endif; ?>

                    <?php if ($contact_toll_free_phone) : ?>
                    <div>
                        <?php if(is_page('contact-us')) : ?>
                            <h2 class="text-xl font-semibold text-[#1B1B1B] mb-2">Toll Free</h2>
                        <?php else : ?>
                            <h3 class="text-xl font-semibold text-[#1B1B1B] mb-2">Toll Free</h3>
                        <?php endif; ?>
                        <a href="tel:<?php echo esc_attr($contact_toll_free_phone); ?>" class="text-lg transition-colors" style="color: var(--theme-primary);">
                            <?php echo esc_html($contact_toll_free_phone); ?>
                        </a>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($contact_address) : ?>
                    <div>
                        <?php if(is_page('contact-us')) : ?>
                            <h2 class="text-xl font-semibold text-[#1B1B1B] mb-2">Address</h2>
                        <?php else : ?>
                            <h3 class="text-xl font-semibold text-[#1B1B1B] mb-2">Address</h3>
                        <?php endif; ?>
                        <p class="text-lg" style="color: var(--theme-primary);">
                            <?php echo nl2br(esc_html($contact_address)); ?>
                        </p>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($social_facebook || $social_twitter || $social_linkedin || $social_youtube) : ?>
                    <div>
                        <?php if(is_page('contact-us')) : ?>
                            <h2 class="text-xl font-semibold text-[#1B1B1B] mb-4">Follow Us</h2>
                        <?php else : ?>
                            <h3 class="text-xl font-semibold text-[#1B1B1B] mb-4">Follow Us</h3>
                        <?php endif; ?>
                        <div class="flex space-x-3">
                            <?php if ($social_facebook) : ?>
                            <a href="<?php echo esc_url($social_facebook); ?>" class="w-10 h-10 flex items-center justify-center rounded transition-colors" style="background-color: var(--theme-primary);" aria-label="Facebook" target="_blank" rel="noopener noreferrer">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <?php endif; ?>
                            
                            <?php if ($social_twitter) : ?>
                            <a href="<?php echo esc_url($social_twitter); ?>" class="w-10 h-10 flex items-center justify-center rounded transition-colors" style="background-color: var(--theme-primary);" aria-label="Twitter" target="_blank" rel="noopener noreferrer">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.84 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                            </a>
                            <?php endif; ?>
                            
                            <?php if ($social_linkedin) : ?>
                            <a href="<?php echo esc_url($social_linkedin); ?>" class="w-10 h-10 flex items-center justify-center rounded transition-colors" style="background-color: var(--theme-primary);" aria-label="LinkedIn" target="_blank" rel="noopener noreferrer">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                            <?php endif; ?>
                            
                            <?php if ($social_youtube) : ?>
                                <a href="<?php echo esc_url($social_youtube); ?>" class="w-10 h-10 flex items-center justify-center rounded transition-colors" style="background-color: var(--theme-primary);" aria-label="Instagram" target="_blank" rel="noopener noreferrer">
                                    <svg aria-hidden="true" class="w-5 h-5 text-white" fill="currentColor" class="e-font-icon-svg e-fab-youtube" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg"><path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path></svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Right: Contact Form -->
            <div>
                <p class="text-lg font-medium text-[#1B1B1B] mb-6">
                    Fields marked with asterisk (<span style="color: var(--theme-primary);">*</span>) are mandatory.
                </p>
                
                <?php if ($contact_form_shortcode) : ?>
                    <?php echo do_shortcode($contact_form_shortcode); ?>
                <?php else : ?>
                <form class="space-y-6">
                    <div>
                        <label class="block text-base font-medium text-gray-700 mb-2">
                            First Name <span style="color: var(--theme-primary);">*</span>
                        </label>
                        <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2" style="--tw-ring-color: var(--theme-primary);" placeholder="Enter Your First Name" required>
                    </div>
                    
                    <div>
                        <label class="block text-base font-medium text-gray-700 mb-2">
                            Last Name <span style="color: var(--theme-primary);">*</span>
                        </label>
                        <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2" style="--tw-ring-color: var(--theme-primary);" placeholder="Enter Your Last Name" required>
                    </div>
                    
                    <div>
                        <label class="block text-base font-semibold text-[#1B1B1B] mb-3">
                            Preferred Method of Contact <span style="color: var(--theme-primary);">*</span>
                        </label>
                        <div class="flex space-x-6">
                            <label class="flex items-center">
                                <input type="radio" name="contact_method" value="email" class="w-4 h-4 border-gray-300" style="accent-color: var(--theme-primary);" required>
                                <span class="ml-2 text-base font-medium text-gray-700">Email Address</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="contact_method" value="phone" class="w-4 h-4 border-gray-300" style="accent-color: var(--theme-primary);">
                                <span class="ml-2 text-base font-medium text-gray-700">Phone Number</span>
                            </label>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-base font-medium text-gray-700 mb-2">
                            Email Address <span style="color: var(--theme-primary);">*</span>
                        </label>
                        <input type="email" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2" style="--tw-ring-color: var(--theme-primary);" placeholder="Enter Your Email Address" required>
                    </div>
                    
                    <div>
                        <label class="block text-base font-medium text-gray-700 mb-2">
                            Job Title <span style="color: var(--theme-primary);">*</span>
                        </label>
                        <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2" style="--tw-ring-color: var(--theme-primary);" placeholder="Enter Your Job title" required>
                    </div>
                    
                    <div>
                        <label class="block text-base font-medium text-gray-700 mb-2">
                            Custom Captcha <span style="color: var(--theme-primary);">*</span>
                        </label>
                        <div class="flex items-center">
                            <span class="text-base font-semibold text-[#1B1B1B] mr-3">6 * 9 =</span>
                            <input type="text" class="w-24 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2" style="--tw-ring-color: var(--theme-primary);" required>
                        </div>
                    </div>
                    
                    <button type="submit" class="w-full inline-flex items-center justify-center px-8 py-4 text-base font-semibold text-white rounded-full transition-colors duration-200" style="background-color: var(--theme-primary);">
                        Book Free Consultation
                    </button>
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
