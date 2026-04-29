<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$template_part_name = explode('.', basename(__FILE__))[0];
?>

<footer class="bg-white border-t border-gray-200" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12 py-12 lg:py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
            <!-- Column 1: Logo & Tagline -->
            <div class="space-y-4">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="SilverRide Canada" class="h-12 w-auto">
                </a>
                <p class="text-base text-[#1B1B1B] leading-relaxed">
                    Trusted expertise in accessibility partners and compliance.
                </p>
                <a href="#" class="inline-block text-base text-gray-700 hover:text-[#1B1B1B] underline transition-colors">
                    Sitemap
                </a>
            </div>

            <!-- Column 2: Credentials -->
            <div class="space-y-6">
                <h3 class="text-xl font-semibold text-[#1B1B1B]">Credentials</h3>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <span class="text-[#1B1B1B] mr-2">•</span>
                        <span class="text-base text-gray-700">ISO 9001:2015 Quality Management Systems</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#1B1B1B] mr-2">•</span>
                        <span class="text-base text-gray-700">ISO 31000:2018 Risk Management Guidelines</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#1B1B1B] mr-2">•</span>
                        <span class="text-base text-gray-700">ISO 14001:2015 Environmental Management Systems</span>
                    </li>
                </ul>
            </div>

            <!-- Column 3: Services -->
            <div class="space-y-6">
                <h3 class="text-xl font-semibold text-[#1B1B1B]">Services</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="text-base text-gray-700 hover:text-[#1B1B1B] transition-colors border-b border-gray-300 pb-1 inline-block">VPAT Report</a></li>
                    <li><a href="#" class="text-base text-gray-700 hover:text-[#1B1B1B] transition-colors border-b border-gray-300 pb-1 inline-block">Accessibility Audit Report</a></li>
                    <li><a href="#" class="text-base text-gray-700 hover:text-[#1B1B1B] transition-colors border-b border-gray-300 pb-1 inline-block">Compliance Consulting and Risk Mitigation</a></li>
                    <li><a href="#" class="text-base text-gray-700 hover:text-[#1B1B1B] transition-colors border-b border-gray-300 pb-1 inline-block">Document Accessibility Remediation</a></li>
                    <li><a href="#" class="text-base text-gray-700 hover:text-[#1B1B1B] transition-colors border-b border-gray-300 pb-1 inline-block">Audits and Certification</a></li>
                    <li><a href="#" class="text-base text-gray-700 hover:text-[#1B1B1B] transition-colors border-b border-gray-300 pb-1 inline-block">Policies and Plans</a></li>
                    <li><a href="#" class="text-base text-gray-700 hover:text-[#1B1B1B] transition-colors border-b border-gray-300 pb-1 inline-block">Built Environment Services</a></li>
                    <li><a href="#" class="text-base text-gray-700 hover:text-[#1B1B1B] transition-colors border-b border-gray-300 pb-1 inline-block">Website Accessibility Remediation</a></li>
                </ul>
            </div>

            <!-- Column 4: Accessibility Training -->
            <div class="space-y-6">
                <h3 class="text-xl font-semibold text-[#1B1B1B]">Accessibility Training</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="text-base text-gray-700 hover:text-[#1B1B1B] transition-colors border-b border-gray-300 pb-1 inline-block">Web Accessibility Training</a></li>
                    <li><a href="#" class="text-base text-gray-700 hover:text-[#1B1B1B] transition-colors border-b border-gray-300 pb-1 inline-block">Document Accessibility Training</a></li>
                    <li><a href="#" class="text-base text-gray-700 hover:text-[#1B1B1B] transition-colors border-b border-gray-300 pb-1 inline-block">Adobe InDesign Accessibility Training</a></li>
                    <li><a href="#" class="text-base text-gray-700 hover:text-[#1B1B1B] transition-colors border-b border-gray-300 pb-1 inline-block">Mobile Accessibility Training</a></li>
                    <li><a href="#" class="text-base text-gray-700 hover:text-[#1B1B1B] transition-colors border-b border-gray-300 pb-1 inline-block">AMA Compliance Training</a></li>
                    <li><a href="#" class="text-base text-gray-700 hover:text-[#1B1B1B] transition-colors border-b border-gray-300 pb-1 inline-block">ACA Compliance Training</a></li>
                    <li><a href="#" class="text-base text-gray-700 hover:text-[#1B1B1B] transition-colors border-b border-gray-300 pb-1 inline-block">Achieving AODA Compliance</a></li>
                    <li><a href="#" class="text-base text-gray-700 hover:text-[#1B1B1B] transition-colors border-b border-gray-300 pb-1 inline-block">Mastering BC Accessibility Compliance</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="border-t border-gray-200 py-6">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
            <p class="text-center text-base" style="color: var(--theme-primary);">
                Copyright 2026 &copy; All Rights Reserved
            </p>
        </div>
    </div>
</footer>

</main><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>