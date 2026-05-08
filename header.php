<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <a class="skip-to-main-content" href="#page"><?php esc_html_e('Skip to main content', 'silverride'); ?></a>

  <header tabindex="-1" id="masthead" class="site-header w-full fixed top-0 h-20 lg:h-28 py-2 lg:py-4 z-[9999] flex justify-center items-center bg-primary">
    <div class="container mx-auto flex items-center justify-between relative z-10 px-4 lg:px-8">
      <!-- Logo -->
      <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo-link flex flex-col text-white no-underline" aria-label="SilverRide - There With Care">
        <img class="h-12 lg:h-20 w-auto" src="<?php echo get_template_directory_uri(); ?>/media/silverride-logo.png" alt="">
      </a>

      <!-- Desktop Navigation -->
      <nav class="hidden lg:flex items-center gap-8" aria-label="Primary navigation">
        <?php 
          get_template_part('template-parts/menu', null, [
            'theme_location' => 'primary',
            'menu_class' => 'primary-menu flex items-center gap-8 text-white',
            'link_class' => 'text-white text-base font-normal hover:text-blue-200 transition-colors duration-200',
          ]); 
        ?>
        <a href="/request-demo" class="inline-flex items-center justify-center px-6 py-2 text-base font-semibold text-white border-2 border-white rounded-full hover:bg-white hover:text-primary transition-colors duration-200">Request Demo</a>
      </nav>

      <!-- Mobile menu button -->
      <button type="button" class="mobile-menu-toggle !lg:hidden inline-flex items-center justify-center p-2 text-white hover:text-blue-200 focus:outline-none" aria-controls="mobile-menu" aria-expanded="false" aria-label="Toggle navigation menu">
        <span class="hamburger-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 8l16 0" /><path d="M4 16l16 0" /></svg>
        </span>
        <span class="close-icon hidden">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
        </span>
      </button>
    </div>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay fixed inset-0 bg-black/50 z-40 hidden lg:hidden" id="mobile-menu-overlay"></div>

    <!-- Mobile Menu Panel -->
    <nav id="mobile-menu" class="mobile-menu-panel fixed top-0 right-0 h-full w-80 bg-primary z-50 transform translate-x-full transition-transform duration-300 lg:hidden" aria-label="Mobile navigation" aria-hidden="true" role="dialog" aria-modal="true">
      <div class="mobile-menu-content p-6 flex flex-col h-full">
        <div class="mobile-menu-header flex justify-end mb-8">
          <button type="button" class="mobile-menu-close text-white hover:text-blue-200" aria-label="Close menu">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
          </button>
        </div>

        <?php 
          get_template_part('template-parts/menu', null, [
            'theme_location' => 'primary',
            'menu_class' => 'mobile-menu flex flex-col gap-4 text-white',
            'link_class' => 'text-white text-lg font-medium hover:text-blue-200 transition-colors duration-200 py-2 border-b border-white/20 block',
            'mobile' => true,
          ]); 
        ?>

        <div class="mobile-menu-footer mt-auto pt-6 flex flex-col gap-4">
          <a href="/request-demo" class="btn btn-outline">
            Request Demo
          </a>
        </div>
      </div>
    </nav>
  </header>

  <main id="page" class="site pt-20 lg:pt-28">
