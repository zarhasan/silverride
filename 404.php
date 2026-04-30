<?php
/**
 * 404 Template - Page Not Found
 */
get_header();
?>

<main id="main-content" class="bg-primary min-h-screen flex flex-col items-center justify-center relative overflow-hidden" role="main" aria-label="<?php esc_attr_e('Page not found', 'silverride'); ?>">

    <!-- Content -->
    <div class="relative z-10 text-center px-4 sm:px-6 pt-20 pb-48 md:pb-56 lg:pb-64">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4">
            404 Error
        </h1>

        <p class="text-lg md:text-xl text-blue-100 mb-8">
            Looks like we've hit a dead end
        </p>

        <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center justify-center px-8 py-3 text-base font-semibold text-primary bg-white rounded-full hover:bg-blue-50 transition-colors duration-200">
            Go Home
        </a>
    </div>

    <!-- Illustration -->
    <div class="absolute bottom-0 left-0 right-0 pointer-events-none" aria-hidden="true">
        <img src="404-illustration.svg" alt="Illustration of accessible transportation vehicles, a person in a wheelchair, and a person with a guide dog" class="w-full max-w-6xl mx-auto h-auto">
    </div>

</main>

<?php get_footer(); ?>
