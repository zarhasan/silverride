<?php
/**
 * Grid Cities Section
 *
 */
$title       = $args['title'] ?? '';
$description = $args['description'] ?? '';
$cities      = $args['cities'] ?? [];
$other_title = $args['other_title'] ?? 'Other cities we serve';
$other_cities = $args['other_cities'] ?? [];
?>

<section class="bg-white py-16 md:py-24">
  <div class="container">

    <?php if(!empty($title)): ?>
      <h2 class="text-4xl lg:text-[2.875rem] font-bold text-black"><?php echo esc_html( $title ); ?></h2>
    <?php endif; ?>

    <?php if(!empty($description)): ?>
      <p class="text-xl text-black mt-6"><?php echo esc_html( $description ); ?></p>
    <?php endif; ?>


    <?php if ( ! empty( $cities ) ) : ?>
    <div class="mt-12 grid gap-x-6 gap-y-12 md:grid-cols-2 lg:grid-cols-3">
      <?php foreach ( $cities as $city ) :
        $city_name     = $city['city_name'] ?? '';
        $city_image    = $city['city_image'] ?? [];
        $explore_link  = $city['explore_link'] ?? [];
        $apply_link    = $city['apply_link'] ?? [];
        $extra_links   = $city['extra_links'] ?? [];
      ?>
      <article>
        <div class="flex items-center justify-between">
          <h3 class="text-[1.625 rem] font-bold text-black"><?php echo esc_html( $city_name ); ?></h3>
          <?php if ( ! empty( $extra_links ) ) : ?>
          <div class="flex gap-4 text-sm">
            <?php foreach ( $extra_links as $link ) :
              $link_url    = $link['url'] ?? '#';
              $link_title  = $link['title'] ?? '';
              $link_target = ! empty( $link['target'] ) ? ' target="' . esc_attr( $link['target'] ) . '"' : '';
            ?>
            <a href="<?php echo esc_url( $link_url ); ?>" class="text-primary text-lg font-bold"<?php echo $link_target; ?>><?php echo esc_html( $link_title ); ?></a>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
        </div>
        
        <?php if ( ! empty( $city_image ) ) : ?>
          <img src="<?php echo esc_url( $city_image['url'] ); ?>" alt="<?php echo esc_attr( $city_image['alt'] ?? $city_name ); ?>" class="mt-5 h-72 aspect-video w-full object-cover">
        <?php endif; ?>

        <div class="mt-5 flex gap-4">
          <a href="#" class="btn btn-primary w-1/2 grow">Apply to Drive</a>
          <a href="#" class="btn btn-outline w-1/2 grow">Visit City Page</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>
