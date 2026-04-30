<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$template_part_name = explode('.', basename(__FILE__))[0];
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
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex flex-col text-blue-900 no-underline">
                    <span class="text-5xl font-bold tracking-tight leading-none">SilverRide</span>
                    <span class="text-sm font-semibold tracking-[0.25em] mt-2 uppercase text-blue-900">There With Care</span>
                </a>
                
                <p class="text-base text-gray-700 leading-relaxed max-w-lg">
                    SilverRide is America's leading assisted transportation platform for older adults and people with disabilities. A licensed TNC operating in more than 35 major metro areas across 15 states, we deliver ADA-compliant assisted transportation through paratransit partnerships, PACE and healthcare contracts, and direct-to-consumer service. Over one million rides a year. 95% on-time. Always with care.
                </p>

                <div class="flex items-center gap-4">
                    <img src="yelp-logo.png" alt="Yelp logo" class="h-10 w-auto">
                    <img src="american-society-on-aging-logo.png" alt="American Society on Aging logo" class="h-10 w-auto">
                    <img src="transportation-alliance-logo.png" alt="The Transportation Alliance logo" class="h-10 w-auto">
                </div>
            </div>

            <!-- Right Columns: Link Columns -->
            <div class="lg:col-span-7 grid grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Who We Serve -->
                <div class="space-y-4">
                    <h3 class="text-base font-bold text-gray-900">Who We Serve</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">Paratransit</a></li>
                        <li><a href="#" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">PACE</a></li>
                        <li><a href="#" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">Riders</a></li>
                    </ul>
                </div>

                <!-- Drivers -->
                <div class="space-y-4">
                    <h3 class="text-base font-bold text-gray-900">Drivers</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">Join Our Platform</a></li>
                        <li><a href="#" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">Cities</a></li>
                    </ul>
                </div>

                <!-- Company -->
                <div class="space-y-4">
                    <h3 class="text-base font-bold text-gray-900">Company</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">About</a></li>
                        <li><a href="#" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">Leadership</a></li>
                        <li><a href="#" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">Careers</a></li>
                        <li><a href="#" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">Contact</a></li>
                        <li><a href="#" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">News</a></li>
                    </ul>
                </div>

                <!-- Help and Compliance -->
                <div class="space-y-4">
                    <h3 class="text-base font-bold text-gray-900">Help and Compliance</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">Help</a></li>
                        <li><a href="#" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">Safety</a></li>
                        <li><a href="#" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">Report an Incident</a></li>
                        <li><a href="#" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">Accessibility</a></li>
                        <li><a href="#" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">Privacy</a></li>
                        <li><a href="#" class="text-base text-gray-600 hover:text-gray-900 transition-colors duration-200">Terms</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-gray-200 py-6">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12 flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex flex-col sm:flex-row items-center gap-4 sm:gap-6 text-sm text-gray-600">
                <span>&copy; 2026 SilverRide Inc.</span>
                <div class="flex items-center gap-4">
                    <a href="#" class="hover:text-gray-900 transition-colors duration-200">Privacy</a>
                    <span class="text-gray-400">|</span>
                    <a href="#" class="hover:text-gray-900 transition-colors duration-200">Terms</a>
                    <span class="text-gray-400">|</span>
                    <a href="#" class="hover:text-gray-900 transition-colors duration-200">Accessibility</a>
                </div>
            </div>

            <div class="flex items-center gap-6">
                <a href="#" class="inline-flex items-center justify-center px-6 py-2 text-sm font-semibold text-white bg-blue-900 rounded-full hover:bg-primary transition-colors duration-200">
                    Partner Login
                </a>
                
                <div class="flex items-center gap-4">
                    <a href="#" class="text-primary hover:text-blue-900 transition-colors duration-200" aria-label="LinkedIn">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                    <a href="#" class="text-blue-600 hover:text-primary transition-colors duration-200" aria-label="Facebook">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/></svg>
                    </a>
                    <a href="#" class="text-pink-600 hover:text-pink-800 transition-colors duration-200" aria-label="Instagram">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.468 2.373c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

</main><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
