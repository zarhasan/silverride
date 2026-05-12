

  </div>


<?php
    $template_part_name = explode('.', basename(__FILE__))[0];
    
    $social_facebook = !empty($args['social_facebook']) ? $args['social_facebook'] : (get_field('social_facebook', 'option') ?: '');
    $social_twitter = !empty($args['social_twitter']) ? $args['social_twitter'] : (get_field('social_twitter', 'option') ?: '');
    $social_linkedin = !empty($args['social_linkedin']) ? $args['social_linkedin'] : (get_field('social_linkedin', 'option') ?: '');
    $social_youtube = !empty($args['social_youtube']) ? $args['social_youtube'] : (get_field('social_youtube', 'option') ?: '');
    $social_instagram = !empty($args['social_instagram']) ? $args['social_instagram'] : (get_field('social_instagram', 'option') ?: '');
?>

<footer class="bg-white" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <!-- Tagline -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12 pt-16 pb-12">
        <h2 class="text-3xl lg:text-4xl font-bold text-primary text-center leading-tight">
            Bringing joy, dignity, and community to the people<br class="hidden lg:block">
            who need it most.
        </h2>
    </div>

    <!-- Main Footer Content -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12 py-12 lg:py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            <!-- Left Column: Logo, Description, Partner Logos -->
            <div class="lg:col-span-5 space-y-8">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex flex-col no-underline">
                    <img class="h-16 lg:h-28 w-auto" src="<?php echo get_template_directory_uri(); ?>/media/logo-blue.png" alt="SilverRide Logo">
                </a>
                
                <p class="text-lg leading-relaxed max-w-lg">
                    SilverRide is America's leading assisted transportation platform for older adults and people with disabilities. A licensed TNC operating in more than 35 major metro areas across 15 states, we deliver ADA-compliant assisted transportation through paratransit partnerships, PACE and healthcare contracts, and direct-to-consumer service. Over one million rides a year. 95% on-time. Always with care.
                </p>

                <div class="flex items-center gap-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/media/footer-logos.png" alt="" class="h-20 w-auto">
                </div>
            </div>

            <!-- Right Columns: Link Columns -->
            <div class="lg:col-span-7 grid grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Who We Serve -->
                <div class="space-y-4">
                    <h3 class="text-base font-bold text-gray-900">Who We Serve</h3>
                    <ul class="space-y-3">
                        <li><a href="/paratransit" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">Paratransit</a></li>
                        <li><a href="/pace" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">PACE</a></li>
                        <li><a href="/riders" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">Riders</a></li>
                    </ul>
                </div>

                <!-- Drivers -->
                <div class="space-y-4">
                    <h3 class="text-base font-bold text-gray-900">Drivers</h3>
                    <ul class="space-y-3">
                        <li><a href="/join" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">Join Our Platform</a></li>
                        <li><a href="/cities" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">Cities</a></li>
                    </ul>
                </div>

                <!-- Company -->
                <div class="space-y-4">
                    <h3 class="text-base font-bold text-gray-900">Company</h3>
                    <ul class="space-y-3">
                        <li><a href="/company" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">About</a></li>
                        <li><a href="/leadership" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">Leadership</a></li>
                        <li><a href="/careers" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">Careers</a></li>
                        <li><a href="/contact" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">Contact</a></li>
                        <li><a href="/newsroom" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">News</a></li>
                    </ul>
                </div>

                <!-- Help and Compliance -->
                <div class="space-y-4">
                    <h3 class="text-base font-bold text-gray-900">Help and Compliance</h3>
                    <ul class="space-y-3">
                        <li><a href="/help" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">Help</a></li>
                        <li><a href="/safety" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">Safety</a></li>
                        <li><a href="/report-an-incident" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">Report an Incident</a></li>
                        <li><a href="/accessibility" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">Accessibility</a></li>
                        <li><a href="/privacy" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">Privacy</a></li>
                        <li><a href="/terms" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">Terms</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-gray-200 py-6">
        <div class="container !max-w-5xl flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex flex-col sm:flex-row items-center gap-4 sm:gap-6 text-base">
                <span>&copy; 2026 SilverRide Inc.</span>
                <div class="flex items-center gap-4">
                    <a href="/privacy" class="hover:text-gray-900 transition-colors duration-200">Privacy</a>
                    <span>|</span>
                    <a href="/terms" class="hover:text-gray-900 transition-colors duration-200">Terms</a>
                    <span>|</span>
                    <a href="/accessibility" class="hover:text-gray-900 transition-colors duration-200">Accessibility</a>
                </div>
            </div>

            <div class="flex items-center gap-6">
                <a href="/partner-login" class="inline-flex items-center justify-center px-6 py-2 text-sm font-semibold text-white bg-primary rounded-full hover:bg-primary transition-colors duration-200">
                    Partner Login
                </a>
                
                <div class="flex items-center gap-4">
                    <a href="<?php echo esc_url($social_linkedin); ?>" class="text-primary hover:text-primary transition-colors duration-200" aria-label="LinkedIn">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" fill="currentColor">
                            <path d="M29.787 0H4.70321C3.45584 0 2.25956 0.495516 1.37754 1.37754C0.495516 2.25956 0 3.45584 0 4.70321L0 29.787C0 31.0344 0.495516 32.2307 1.37754 33.1127C2.25956 33.9947 3.45584 34.4902 4.70321 34.4902H29.787C31.0344 34.4902 32.2307 33.9947 33.1127 33.1127C33.9947 32.2307 34.4902 31.0344 34.4902 29.787V4.70321C34.4902 3.45584 33.9947 2.25956 33.1127 1.37754C32.2307 0.495516 31.0344 0 29.787 0ZM11.758 27.2943C11.7583 27.39 11.7397 27.4847 11.7033 27.5731C11.6668 27.6616 11.6133 27.742 11.5458 27.8097C11.4782 27.8774 11.398 27.9311 11.3097 27.9678C11.2213 28.0044 11.1266 28.0233 11.031 28.0233H7.93275C7.83695 28.0236 7.74204 28.0049 7.65347 27.9683C7.56491 27.9318 7.48444 27.8781 7.4167 27.8104C7.34895 27.7426 7.29527 27.6622 7.25872 27.5736C7.22218 27.485 7.2035 27.3901 7.20376 27.2943V14.3056C7.20376 14.1123 7.28056 13.9268 7.41727 13.7901C7.55399 13.6534 7.73941 13.5766 7.93275 13.5766H11.031C11.224 13.5771 11.4089 13.6542 11.5452 13.7908C11.6815 13.9275 11.758 14.1126 11.758 14.3056V27.2943ZM9.4809 12.3459C8.89952 12.3459 8.33119 12.1735 7.84779 11.8505C7.36439 11.5275 6.98763 11.0685 6.76514 10.5313C6.54266 9.9942 6.48445 9.40317 6.59787 8.83296C6.71129 8.26275 6.99125 7.73898 7.40235 7.32788C7.81345 6.91678 8.33722 6.63682 8.90742 6.5234C9.47763 6.40998 10.0687 6.46819 10.6058 6.69068C11.1429 6.91316 11.602 7.28992 11.925 7.77332C12.248 8.25672 12.4204 8.82505 12.4204 9.40643C12.4204 10.186 12.1107 10.9337 11.5594 11.485C11.0082 12.0362 10.2605 12.3459 9.4809 12.3459ZM27.9528 27.3453C27.953 27.4334 27.9359 27.5206 27.9023 27.6021C27.8687 27.6835 27.8193 27.7575 27.757 27.8198C27.6948 27.882 27.6208 27.9314 27.5393 27.965C27.4579 27.9986 27.3706 28.0157 27.2826 28.0155H23.9511C23.863 28.0157 23.7758 27.9986 23.6943 27.965C23.6129 27.9314 23.5389 27.882 23.4766 27.8198C23.4143 27.7575 23.365 27.6835 23.3314 27.6021C23.2978 27.5206 23.2807 27.4334 23.2809 27.3453V21.2605C23.2809 20.3512 23.5474 17.2784 20.9038 17.2784C18.856 17.2784 18.4386 19.3812 18.3563 20.3257V27.3531C18.3563 27.5292 18.287 27.6982 18.1634 27.8236C18.0399 27.949 17.8719 28.0207 17.6958 28.0233H14.4781C14.3901 28.0233 14.3031 28.006 14.2219 27.9723C14.1407 27.9386 14.0669 27.8892 14.0048 27.8269C13.9428 27.7646 13.8936 27.6907 13.8601 27.6094C13.8266 27.5281 13.8096 27.441 13.8098 27.3531V14.2488C13.8096 14.1609 13.8266 14.0738 13.8601 13.9924C13.8936 13.9111 13.9428 13.8372 14.0048 13.775C14.0669 13.7127 14.1407 13.6633 14.2219 13.6296C14.3031 13.5959 14.3901 13.5786 14.4781 13.5786H17.6958C17.8736 13.5786 18.0441 13.6492 18.1698 13.7749C18.2954 13.9006 18.3661 14.071 18.3661 14.2488V15.3815C19.1264 14.239 20.2532 13.361 22.6577 13.361C27.9841 13.361 27.9488 18.3347 27.9488 21.0665L27.9528 27.3453Z" fill="#254196"/>
                        </svg>
                    </a>
                    <a href="<?php echo esc_url($social_facebook); ?>" class="text-primary hover:text-primary transition-colors duration-200" aria-label="Facebook">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" fill="currentColor">
                            <g clip-path="url(#clip0_3200_1027)">
                                <path d="M29.438 0H5.05228C2.26668 0 0 2.26668 0 5.05228V29.438C0 32.2235 2.26668 34.4902 5.05228 34.4902H15.2242V22.2974H11.1824V16.2347H15.2242V12.1255C15.2242 8.78228 17.9438 6.06274 21.2869 6.06274H27.417V12.1255H21.2869V16.2347H27.417L26.4066 22.2974H21.2869V34.4902H29.438C32.2235 34.4902 34.4902 32.2235 34.4902 29.438V5.05228C34.4902 2.26668 32.2235 0 29.438 0Z" fill="#254196"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_3200_1027">
                                    <rect width="34.4902" height="34.4902" rx="9" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                    <a href="<?php echo esc_url($social_instagram); ?>" class="text-primary hover:text-primary transition-colors duration-200" aria-label="Instagram">
                        <svg class="w-6 h-6"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" fill="currentColor">
                            <g clip-path="url(#clip0_3200_1029)">
                                <path d="M25.3315 6.12988H9.16418C7.49272 6.12988 6.13281 7.48979 6.13281 9.16125V25.3285C6.13281 27 7.49272 28.3599 9.16418 28.3599H25.3315C27.0029 28.3599 28.3628 27 28.3628 25.3285V9.16125C28.3628 7.48979 27.0029 6.12988 25.3315 6.12988ZM17.2478 24.3181C13.3481 24.3181 10.1746 21.1446 10.1746 17.2449C10.1746 13.3452 13.3481 10.1717 17.2478 10.1717C21.1476 10.1717 24.321 13.3452 24.321 17.2449C24.321 21.1446 21.1476 24.3181 17.2478 24.3181ZM24.321 12.1926C23.2069 12.1926 22.3001 11.2858 22.3001 10.1717C22.3001 9.05757 23.2069 8.15079 24.321 8.15079C25.4352 8.15079 26.3419 9.05757 26.3419 10.1717C26.3419 11.2858 25.4352 12.1926 24.321 12.1926Z" fill="#254196"/>
                                <path d="M17.2476 12.1934C14.462 12.1934 12.1953 14.46 12.1953 17.2456C12.1953 20.0312 14.462 22.2979 17.2476 22.2979C20.0332 22.2979 22.2999 20.0312 22.2999 17.2456C22.2999 14.46 20.0332 12.1934 17.2476 12.1934Z" fill="#254196"/>
                                <path d="M29.3706 0H5.11964C2.33405 0 0 2.33405 0 5.11964V29.3706C0 32.1562 2.33405 34.4902 5.11964 34.4902H29.3706C32.1562 34.4902 34.4902 32.1562 34.4902 29.3706V5.11964C34.4902 2.33405 32.1562 0 29.3706 0ZM30.381 25.3288C30.381 28.1144 28.1144 30.381 25.3288 30.381H9.16147C6.37587 30.381 4.10919 28.1144 4.10919 25.3288V9.16147C4.10919 6.37587 6.37587 4.10919 9.16147 4.10919H25.3288C28.1144 4.10919 30.381 6.37587 30.381 9.16147V25.3288Z" fill="#254196"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_3200_1029">
                                <rect width="34.4902" height="34.4902" rx="9" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php /* tailwind-classes: lg:grid-cols-2 lg:grid-cols-3 lg:grid-cols-4 lg:grid-cols-5 max-w-[4rem] max-h-12 max-w-[2.5rem] max-h-8 */ ?>


  <?php wp_footer(); ?>
</body>
</html>