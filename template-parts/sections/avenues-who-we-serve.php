<?php
/**
 * Avenues / Who We Serve Section
 *
 * Expected $args:
 * - title: string
 * - background_color: string (hex color, default #F0F5FF)
 * - avenues: array of avenue arrays
 *   - overline: string
 *   - heading: string
 *   - content: string (HTML)
 *   - bullets: array of strings or array of ['bullet' => string]
 *   - cta: array (url, title, target)
 *   - image: array (url, alt)
 *   - image_position: string ('left' | 'right')
 */
$title            = $args['title'] ?? 'Three Avenues. One Platform.';
$background_color = $args['background_color'] ?? '#F0F5FF';
$avenues          = $args['avenues'] ?? [];

if ( empty( $avenues ) ) {
    $avenues = [];
}
?>

<section class="py-16 md:py-24" style="background-color: <?php echo esc_attr( $background_color ); ?>;">
	<div class="mx-auto max-w-7xl px-6">
		<h2 class="text-center text-3xl font-bold text-gray-900 md:text-4xl"><?php echo esc_html( $title ); ?></h2>

		<div class="mt-16 space-y-20 md:mt-24 md:space-y-32">
			<?php foreach ( $avenues as $avenue ) :
				$overline       = $avenue['overline'] ?? '';
				$heading        = $avenue['heading'] ?? '';
				$content        = $avenue['content'] ?? '';
				$bullets        = $avenue['bullets'] ?? [];
				$cta            = $avenue['cta'] ?? [];
				$image          = $avenue['image'] ?? [];
				$image_position = $avenue['image_position'] ?? 'right';

				$is_image_left  = $image_position === 'left';
				$text_order     = $is_image_left ? 'order-2' : 'order-1';
				$image_order    = $is_image_left ? 'order-1' : 'order-2';
			?>
			<article class="flex flex-col items-stretch gap-10 md:flex-row md:gap-24">
				<!-- Text -->
				<div class="flex flex-1 flex-col justify-center <?php echo esc_attr( $text_order ); ?>">
					<?php if ( ! empty( $overline ) ) : ?>
					<p class="text-sm font-semibold uppercase tracking-wide text-primary"><?php echo esc_html( $overline ); ?></p>
					<?php endif; ?>

					<?php if ( ! empty( $heading ) ) : ?>
					<h3 class="mt-2 text-2xl font-bold text-gray-900 md:text-4xl"><?php echo esc_html( $heading ); ?></h3>
					<?php endif; ?>

					<?php if ( ! empty( $content ) ) : ?>
					<div class="mt-5 text-base leading-relaxed text-gray-700">
						<?php echo wp_kses_post( $content ); ?>
					</div>
					<?php endif; ?>

					<?php if ( ! empty( $bullets ) ) : ?>
					<ul class="mt-4 space-y-2">
						<?php foreach ( $bullets as $bullet ) :
							$bullet_text = is_array( $bullet ) ? ( $bullet['bullet'] ?? '' ) : $bullet;
							if ( empty( $bullet_text ) ) {
								continue;
							}
						?>
						<li class="flex items-start gap-2 text-base text-gray-700">
							<span class="mt-2 block h-1 w-1 flex-shrink-0 rounded-full bg-gray-700"></span>
							<?php echo esc_html( $bullet_text ); ?>
						</li>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>

					<?php if ( ! empty( $cta ) ) : ?>
					<div class="mt-8">
						<a href="<?php echo esc_url( $cta['url'] ?? '#' ); ?>" class="btn btn-primary">
							<?php echo esc_html( $cta['title'] ?? 'Learn More' ); ?>
						</a>
					</div>
					<?php endif; ?>
				</div>

				<!-- Image -->
				<?php if ( ! empty( $image ) ) : ?>
				<div class="flex-1 <?php echo esc_attr( $image_order ); ?> min-h-[24rem] md:min-h-[50rem]">
					<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ?? $heading ); ?>" class="h-full w-full rounded-lg object-cover">
				</div>
				<?php endif; ?>
			</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
