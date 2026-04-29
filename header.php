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

</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <a class="skip-to-main-content" href="#page"><?php esc_html_e('Skip to main content', 'silverride'); ?></a>

  <header tabindex="-1" id="masthead" class="site-header w-full fixed h-24 z-[9999] flex justify-center items-center bg-white top-0">
    <div class="container mx-auto flex items-center justify-between relative z-10">
      <!-- Logo -->
      <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center">
        <?php
        $logo = get_field('field_header_logo', 'option');

        if ($logo && isset($logo['url'])): ?>
          <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt'] ?: ''); ?>" class="h-12 lg:h-16 w-auto">
        <?php endif; ?>
      </a>

      <!-- Desktop Navigation -->
      <nav class="hidden lg:block desktop ml-auto mr-8" aria-label="Primary navigation">
        <?php get_template_part('template-parts/menu', null, [
          'theme_location' => 'primary',
          'menu_class' => 'hidden lg:flex items-center gap-8 ml-auto mr-4 primary-menu',
        ]); ?>
      </nav>

      <!-- Right Section -->
      <div class="hidden lg:flex items-center gap-6">
        <a href="/contact-us" class="inline-flex items-center justify-center px-6 py-2 text-base font-semibold text-white rounded-full transition-colors duration-200" style="background-color: var(--theme-primary);">
          Contact Us
        </a>

        <?php if(class_exists('LearnPress')) : ?>
          <?php if (is_user_logged_in()): ?>
            <a href="/lp-profile" class="text-base font-medium text-gray-700 hover:text-gray-900 transition-colors">
              My Profile
            </a>
          <?php else: ?>
            <a href="/login" class="text-base font-medium text-gray-700 hover:text-gray-900 transition-colors">
              Login
            </a>
          <?php endif; ?>
        <?php endif; ?>
      </div>


      <!-- Mobile menu button -->
      <button type="button" class="mobile-menu-toggle !lg:hidden inline-flex items-center justify-center p-2 !bg-primary !text-white focus:outline-none" aria-controls="mobile-menu" aria-expanded="false" aria-label="Toggle navigation menu">
        <span class="hamburger-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-menu" aria-hidden="true"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 8l16 0" /><path d="M4 16l16 0" /></svg>
        </span>
        <span class="close-icon hidden">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-x" aria-hidden="true"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
        </span>
      </button>
    </div>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay" id="mobile-menu-overlay"></div>

    <!-- Mobile Menu Panel -->
    <nav id="mobile-menu" class="mobile-menu-panel !lg:hidden" aria-label="Mobile navigation" aria-hidden="true" role="dialog" aria-modal="true">

      <div class="mobile-menu-content">
        <div class="mobile-menu-header">
          <button type="button" class="mobile-menu-close" aria-label="Close menu">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
          </button>
        </div>

        <?php get_template_part('template-parts/menu', null, [
          'theme_location' => 'primary',
          'menu_class' => 'mobile-nav-list',
        ]); ?>

        <div class="mobile-menu-footer">
          <a href="/contact-us" class="mobile-contact-btn">
            Contact Us
          </a>

          <?php if(class_exists('LearnPress')) : ?>
            <?php if (is_user_logged_in()): ?>
              <a href="/lp-profile" class="mobile-login-link">
                My Profile
              </a>
            <?php else: ?>
              <a href="/login" class="mobile-login-link">
                Login
              </a>
            <?php endif; ?>
          <?php endif; ?>
        </div>
      </div>
    </nav>

  </header>

  <main id="page" class="site mt-24">
