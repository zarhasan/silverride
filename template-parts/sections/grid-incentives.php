<?php
/**
 * Grid Incentives Section Template
 */
$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$items = $args['items'] ?? [];
$background_color = $args['background_color'] ?? '';
$footer_description = $args['footer_description'] ?? '';
$cta = $args['cta'] ?? [];
$disable_margins = !empty($args['disable_margins']);

$section_class = $disable_margins ? '' : 'my-16 md:my-24';
$bg_style = $background_color ? ' style="background-color: ' . esc_attr($background_color) . ';"' : '';

if ( empty( $items ) ) {
	$items = [];
}
?>

<section class="<?php echo $section_class; ?>"<?php echo $bg_style; ?>>
	<div class="container">
		<?php if ( $title ) : ?>
            <h2 class="text-center text-3xl font-bold text-black md:text-4xl lg:text-[2.875rem]"><?php echo esc_html( $title ); ?></h2>
		<?php endif; ?>

		<?php if ( ! empty( $description ) ) : ?>
            <div class="mx-auto mt-5 max-w-5xl text-center text-xl leading-relaxed md:text-lg">
                <?php echo wp_kses_post( $description ); ?>
            </div>
		<?php endif; ?>

		<?php if ( ! empty( $items ) ) : ?>
            <div class="mt-16 grid gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-3">
                <?php foreach ( $items as $item ) :
                    $item_image = $item['image'] ?? [];
                    $item_title = $item['title'] ?? '';

                    $item_image_url = $item_image['url'] ?? '';
                    if ( $item_image_url && ! str_starts_with( $item_image_url, 'http' ) ) {
                        $item_image_url = get_template_directory_uri() . '/' . ltrim( $item_image_url, '/' );
                    }
                ?>
                <div class="flex flex-col items-center text-center">
                    <?php if ( ! empty( $item_image_url ) ) : ?>
                        <img src="<?php echo esc_url( $item_image_url ); ?>" alt="<?php echo esc_attr( $item_image['alt'] ?? '' ); ?>" class="h-44 w-auto object-contain">
                    <?php endif; ?>
                    <?php if ( ! empty( $item_title ) ) : ?>
                        <p class="mt-3 font-normal text-xl sm:text-[1.375rem] leading-relaxed text-black"><?php echo esc_html( $item_title ); ?></p>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
		<?php endif; ?>

		<?php if ( ! empty( $footer_description ) ) : ?>
		<div class="mt-12 text-center">
			<div class="text-lg text-gray-600 leading-relaxed">
				<?php echo wp_kses_post( $footer_description ); ?>
			</div>
		</div>
		<?php endif; ?>

		<?php if ( ! empty( $cta ) && ! empty( $cta['url'] ) ) : ?>
		<div class="mt-8 text-center">
			<a href="<?php echo esc_url( $cta['url'] ); ?>" class="inline-flex items-center justify-center px-8 py-3 text-lg text-white rounded-full transition-colors duration-200" style="background-color: var(--theme-primary);">
				<?php echo esc_html( $cta['title'] ?? 'Learn More' ); ?>
			</a>
		</div>
		<?php endif; ?>
	</div>
</section>
