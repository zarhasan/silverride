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

  <?php
    $header_logo = get_field('header_logo', 'option') ?: [];
    $header_cta_link = get_field('header_cta_link', 'option');
    $header_cta_url = ( is_array( $header_cta_link ) && ! empty( $header_cta_link['url'] ) ) ? $header_cta_link['url'] : '';
    $header_cta_text = ( is_array( $header_cta_link ) && ! empty( $header_cta_link['title'] ) ) ? $header_cta_link['title'] : '';
    $header_cta_target = ( is_array( $header_cta_link ) && ! empty( $header_cta_link['target'] ) ) ? ' target="' . esc_attr( $header_cta_link['target'] ) . '"' : '';
  ?>

  <header tabindex="-1" id="masthead" class="site-header w-full fixed top-0 h-20 lg:h-28 py-2 lg:py-4 z-[9999] flex justify-center items-center bg-primary">
    <div class="container mx-auto flex items-center justify-between relative z-10 px-4 lg:px-8">
      <!-- Logo -->
      <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo-link flex flex-col text-white no-underline" aria-label="SilverRide - There With Care">
        <?php if ( ! empty( $header_logo['url'] ) ) : ?>
          <img class="h-12 lg:h-20 w-auto" src="<?php echo esc_url( $header_logo['url'] ); ?>" alt="<?php echo esc_attr( $header_logo['alt'] ?? '' ); ?>">
        <?php endif; ?>
      </a>

      <!-- Desktop Navigation -->
      <nav class="hidden lg:flex items-center gap-8" aria-label="Primary">
        <?php
          get_template_part('template-parts/menu', null, [
            'theme_location' => 'primary',
            'menu_class' => 'primary-menu flex items-center gap-8 text-white',
            'link_class' => 'text-white text-base font-normal hover:text-blue-200 transition-colors duration-200',
          ]);
        ?>

        <?php if ( ! empty( $header_cta_text ) && ! empty( $header_cta_url ) ) : ?>
          <a href="<?php echo esc_url( $header_cta_url ); ?>" class="inline-flex items-center justify-center px-6 py-2 text-base font-semibold text-white border-2 border-white rounded-full hover:bg-white hover:text-primary transition-colors duration-200"<?php echo $header_cta_target; ?>><?php echo esc_html( $header_cta_text ); ?></a>
        <?php endif; ?>

        <!-- Search Toggle -->
        <button type="button" class="search-toggle inline-flex items-center justify-center text-white hover:text-blue-200 transition-colors duration-200 focus:outline-none" aria-controls="header-search-form" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle search', 'silverride'); ?>">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7"/><path d="m21 21-4.3-4.3"/></svg>
        </button>
      </nav>
      <!-- Mobile actions: search + menu -->
      <div class="!lg:hidden flex items-center gap-1">
        <!-- Mobile Search Toggle -->
        <button type="button" class="search-toggle inline-flex items-center justify-center p-2 text-white hover:text-blue-200 transition-colors duration-200 focus:outline-none" aria-controls="header-search-form" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle search', 'silverride'); ?>">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7"/><path d="m21 21-4.3-4.3"/></svg>
        </button>

        <!-- Mobile menu button -->
        <button type="button" class="mobile-menu-toggle inline-flex items-center justify-center p-2 text-white hover:text-blue-200 focus:outline-none" aria-controls="mobile-menu" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation menu', 'silverride'); ?>">
          <span class="hamburger-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 8l16 0" /><path d="M4 16l16 0" /></svg>
          </span>
          <span class="close-icon hidden">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
          </span>
        </button>
      </div>
    </div>

    <!-- Search Bar -->
    <div id="header-search-form" class="site-search fixed inset-x-0 top-20 lg:top-28 z-[9998] px-0 lg:px-8 hidden" aria-hidden="true" inert>
      <div class="container ml-auto p-4 lg:px-0">
        <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-search-form ml-auto max-w-4xl flex sm:items-center gap-2 sm:gap-2 bg-primary border-2 border-white rounded-full pl-4 sm:pl-6 pr-3 sm:pr-2 py-3 sm:py-2 shadow-lg">
          <div class="relative flex-1 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white/70 mr-2 flex-shrink-0" aria-hidden="true"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7"/><path d="m21 21-4.3-4.3"/></svg>
            <label for="site-search-input" class="sr-only"><?php esc_html_e('Search', 'silverride'); ?></label>
            <input id="site-search-input" type="search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php esc_attr_e('Type your search here...', 'silverride'); ?>" class="flex-1 min-w-0 bg-transparent border-0 text-white placeholder-white/80 text-base sm:text-lg focus:outline-none focus:ring-0 px-1 py-2" style="outline: none !important; box-shadow: none !important;" />
          </div>
          <div class="flex items-center justify-end gap-2 sm:flex-shrink-0">
            <button type="submit" class="inline-flex items-center justify-center px-5 py-2 text-sm sm:text-base font-semibold text-white border-2 border-white rounded-full hover:bg-white hover:text-primary transition-colors duration-200">
              <?php esc_html_e('Search', 'silverride'); ?>
            </button>
            <button type="button" class="site-search-close hidden lg:inline-flex items-center justify-center w-9 h-9 sm:w-10 sm:h-10 text-white hover:text-blue-200 transition-colors duration-200 focus:outline-none flex-shrink-0" aria-label="<?php esc_attr_e('Close search', 'silverride'); ?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12"/><path d="M6 6l12 12"/></svg>
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay fixed inset-0 bg-black/50 z-40 hidden lg:hidden" id="mobile-menu-overlay"></div>

    <!-- Mobile Menu Panel -->
    <nav id="mobile-menu" class="mobile-menu-panel fixed top-0 right-0 h-full w-80 bg-primary z-50 transform translate-x-full transition-transform duration-300 lg:hidden" aria-label="Mobile navigation" aria-hidden="true" role="dialog" aria-modal="true" inert>
      <div class="mobile-menu-content p-6 flex flex-col h-full">
        <div class="mobile-menu-header flex justify-end mb-8">
          <button type="button" class="mobile-menu-close text-white" aria-label="Close menu">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
          </button>
        </div>

        <?php
          get_template_part('template-parts/menu', null, [
            'theme_location' => 'primary',
            'menu_class' => 'mobile-menu flex flex-col gap-4 text-white',
            'link_class' => 'text-white text-lg font-medium transition-colors duration-200 py-2 border-b border-white/20 block',
            'mobile' => true,
          ]);
        ?>

        <div class="mobile-menu-footer mt-auto pt-6 flex flex-col gap-4">
          <?php if ( ! empty( $header_cta_text ) && ! empty( $header_cta_url ) ) : ?>
            <a href="<?php echo esc_url( $header_cta_url ); ?>" class="btn btn-outline"<?php echo $header_cta_target; ?>><?php echo esc_html( $header_cta_text ); ?></a>
          <?php endif; ?>
        </div>
      </div>
    </nav>
  </header>

  <main id="page" class="site pt-20 lg:pt-28">