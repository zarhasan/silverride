<?php
/**
 * Information Staggered Section Template
 *
 */
$title            = $args['title'] ?? '';
$background_color = $args['background_color'] ?? '';
$subtitle         = $args['subtitle'] ?? '';
$description      = $args['description'] ?? '';
$items            = $args['items'] ?? [];
$link             = $args['link'] ?? [];
$secondary_link   = $args['secondary_link'] ?? [];
$image            = $args['image'] ?? [];
$image_position   = $args['image_position'] ?? 'right';
$hide_on = $args['hide_on'] ?? [];
$hide_classes = [];
if (in_array('mobile', $hide_on)) $hide_classes[] = 'hidden !sm:block';
if (in_array('tablet', $hide_on)) $hide_classes[] = 'md:hidden';
if (in_array('desktop', $hide_on)) $hide_classes[] = 'lg:hidden';
$hide_class = implode(' ', $hide_classes);
$is_image_left    = $image_position === 'left';
$template_part_name = explode('.', basename(__FILE__))[0];

?>
<section 
	class="<?php echo !empty($background_color) ? 'py-8 md:py-16' : 'my-16 md:my-24'; ?> <?php echo esc_attr($hide_class); ?>"
	<?php if (!empty($background_color)) : ?>
		style="background-color: <?php echo esc_attr( $background_color ); ?>;"
	<?php endif; ?>
	data-section-id="<?php echo esc_attr($template_part_name); ?>"
	>
	<div class="container">
		<article class="flex flex-col items-stretch gap-10 md:flex-row md:gap-24">
			<div class="flex flex-1 flex-col justify-center <?php echo $is_image_left ? 'order-2' : 'order-1'; ?>">
				<?php if ( ! empty( $subtitle ) ) : ?>
					<p class="text-base md:text-[1.25rem] font-medium uppercase tracking-wide text-primary"><?php echo esc_html( $subtitle ); ?></p>
				<?php endif; ?>

				<?php if ( ! empty( $title ) ) : ?>
					<h2 class="mt-3 text-2xl md:text-[2.25rem] leading-tight font-bold text-gray-900"><?php echo esc_html( $title ); ?></h2>
				<?php endif; ?>

				<?php if ( ! empty( $description ) ) : ?>
					<div class="prose mt-6 text-[1.125rem] leading-relaxed text-gray-700"><?php echo wp_kses_post( $description ); ?></div>
				<?php endif; ?>

				<?php if ( ! empty( $items ) ) : ?>
					<ul class="mt-4 space-y-2">
						<?php foreach ( $items as $item ) :
							$item_text = is_array( $item ) ? ( $item['item'] ?? '' ) : $item;
							if ( empty( $item_text ) ) {
								continue;
							}
						?>
						<li class="flex items-start gap-2 text-base text-gray-700">
							<span class="mt-2 block h-1 w-1 flex-shrink-0 rounded-full bg-gray-700"></span>
							<?php echo esc_html( $item_text ); ?>
						</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>

				<?php if ( ! empty( $link ) ) : ?>
				<div class="flex justify-start items-start gap-4 mt-8">
					<a href="<?php echo esc_url( $link['url'] ?? '#' ); ?>" class="btn btn-primary">
						<?php echo esc_html( $link['title'] ?? '' ); ?>
					</a>

					<a href="<?php echo esc_url( $secondary_link['url'] ?? '#' ); ?>" class="btn btn-outline">
						<?php echo esc_html( $secondary_link['title'] ?? '' ); ?>
					</a>
				</div>
				<?php endif; ?>
			</div>

			<?php if ( ! empty( $image ) ) : ?>
				<div class="flex-1 <?php echo $is_image_left ? 'order-1' : 'order-2'; ?> min-h-[24rem]">
					<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ?? $title ); ?>" class="h-full w-full object-cover">
				</div>
			<?php endif; ?>
		</article>
	</div>
</section>
