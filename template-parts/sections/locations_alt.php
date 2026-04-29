<?php

extract($args);
?>

<section class="bg-white my-16 md:my-20">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16 md:space-y-20">

    <?php
    $is_acf = isset( $args ) && empty( $args );
    $title = $is_acf ? get_sub_field( 'title' ) : ( isset( $args['title'] ) ? $args['title'] : '' );
    $locations = $is_acf ? get_sub_field( 'locations' ) : ( isset( $args['locations'] ) ? $args['locations'] : [] );

    if ( $title ) : ?>
      <div class="text-center mb-12">
        <h2 class="text-3xl sm:text-[2.5rem] font-semibold text-[#1B1B1B]"><?php echo esc_html( $title ); ?></h2>
      </div>
    <?php endif; ?>

    <?php if ( ! empty( $locations ) ) : ?>
      <?php foreach ( $locations as $location ) : ?>
        <?php
          $map_iframe = $is_acf ? esc_url( get_sub_field( 'map_iframe' ) ) : ( isset( $location['map_iframe'] ) ? esc_url( $location['map_iframe'] ) : '' );
          $name = $is_acf ? esc_html( get_sub_field( 'name' ) ) : ( isset( $location['name'] ) ? esc_html( $location['name'] ) : '' );
          $address = $is_acf ? get_sub_field( 'address' ) : ( isset( $location['address'] ) ? $location['address'] : '' );
          $phone = $is_acf ? esc_html( get_sub_field( 'phone' ) ) : ( isset( $location['phone'] ) ? esc_html( $location['phone'] ) : '' );
          $email = $is_acf ? esc_html( get_sub_field( 'email' ) ) : ( isset( $location['email'] ) ? esc_html( $location['email'] ) : '' );
          $hours = $is_acf ? get_sub_field( 'hours' ) : ( isset( $location['hours'] ) ? $location['hours'] : '' );
        ?>
        <div class="grid md:grid-cols-2 gap-8 lg:gap-12 items-center">
          <div class="overflow-hidden rounded-2xl shadow-lg mx-auto w-96">
            <?php if ( $map_iframe ) : ?>
              <iframe src="<?php echo $map_iframe; ?>" width="100%" height="384" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full h-96"></iframe>
            <?php endif; ?>
          </div>
          <div class="pt-2">
            <?php if ( $name ) : ?>
              <h2 class="text-3xl font-bold text-[#1B1B1B] mb-6">
                <?php echo $name; ?>
              </h2>
            <?php endif; ?>
            <div class="text-lg text-gray-700 space-y-1">
              <?php if ( $address ) : ?>
                <?php echo $address; ?>
              <?php endif; ?>

              <?php if ( $phone ) : ?>
                <p class="mt-4">
                  <span class="text-[#1B1B1B]">Phone:</span>
                  <a href="tel:<?php echo preg_replace( '/[^0-9]/', '', $phone ); ?>" class="text-primary  transition-colors duration-200"><?php echo $phone; ?></a>
                </p>
              <?php endif; ?>

              <?php if ( $email ) : ?>
                <p>
                  <span class="text-[#1B1B1B]">Email:</span>
                  <a href="mailto:<?php echo esc_attr( $email ); ?>" class="text-primary  transition-colors duration-200"><?php echo $email; ?></a>
                </p>
              <?php endif; ?>

              <?php if ( $hours ) : ?>
                <div class="mt-4">
                  <span class="font-bold text-[#1B1B1B]">Business Hours:</span>
                  <?php echo $hours; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>