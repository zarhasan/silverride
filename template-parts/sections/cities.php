<?php
/**
 * Grid Cities Section
 *
 */
$title       = $args['title'] ?? 'Featured cities';
$cities      = $args['cities'] ?? [];
$other_title = $args['other_title'] ?? 'Other cities we serve';
$other_cities = $args['other_cities'] ?? [];
?>

<section class="bg-white py-16 md:py-24">
  <div class="container">
    <h2 class="text-4xl font-bold text-black md:text-5xl"><?php echo esc_html( $title ); ?></h2>

    <?php if ( ! empty( $cities ) ) : ?>
    <div class="mt-12 grid gap-x-6 gap-y-8 md:grid-cols-2 lg:grid-cols-3">
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
          <a href="#" class="btn btn-primary grow w-1/2 whitespace-nowrap"<?php echo $exp_target; ?>>Explore</a>
          <a href="#" class="btn btn-primary grow w-1/2 whitespace-nowrap"<?php echo $app_target; ?>>Apply to Drive</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php if ( ! empty( $other_cities ) ) : ?>
    <div class="mt-16">
      <h3 class="text-2xl font-bold text-black"><?php echo esc_html( $other_title ); ?></h3>
      <ul class="mt-8 flex flex-wrap items-center gap-2 text-lg leading-relaxed font-normal list-none p-0" role="list">
        <?php $total = count( $other_cities ); ?>
        <?php foreach ( $other_cities as $i => $city ) : ?>
        <li class="flex items-center gap-2">
          <span><?php echo esc_html( $city['city_name'] ); ?></span>
          <?php if ( $i < $total - 1 ) : ?>
          <span aria-hidden="true" class="inline-flex items-center flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
              <path d="M8 9.5C8.39782 9.5 8.77936 9.34196 9.06066 9.06066C9.34196 8.77936 9.5 8.39782 9.5 8C9.5 7.60218 9.34196 7.22064 9.06066 6.93934C8.77936 6.65804 8.39782 6.5 8 6.5C7.60218 6.5 7.22064 6.65804 6.93934 6.93934C6.65804 7.22064 6.5 7.60218 6.5 8C6.5 8.39782 6.65804 8.77936 6.93934 9.06066C7.22064 9.34196 7.60218 9.5 8 9.5Z" fill="black"/>
            </svg>
          </span>
          <?php endif; ?>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <?php endif; ?>
  </div>
</section>
