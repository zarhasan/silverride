<?php
/**
 * Grid Simple Section Template
 * Matches screenshots/grid-simple.png — Case Studies layout
 *
 * Light section background, centered title + optional subtitle, 2-5 column grid.
 * Each item: white logo/media box on top, bold title, muted description, pill "Read More".
 *
 * ACF fields: title, description, grid_size, items[], background_color, footer_description, cta, hide_on, margin
 *
 * Items repeater: image, subtitle, title, description, link
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$template_part_name = explode( '.', basename( __FILE__ ) )[0];

$title              = $args['title'] ?? '';
$description        = $args['description'] ?? '';
$grid_size          = intval( $args['grid_size'] ?? 4 );
$items              = $args['items'] ?? [];
$background_color   = $args['background_color'] ?? '';
$footer_description = $args['footer_description'] ?? '';
$cta                = $args['cta'] ?? [];
$hide_on            = $args['hide_on'] ?? [];
$margin             = $args['margin'] ?? 'default';
$custom_margin      = $args['custom_margin'] ?? '';
$disable_margins    = ! empty( $args['disable_margins'] );

// Hide on handling.
$hide_classes = [];
if ( in_array( 'mobile', (array) $hide_on, true ) ) {
	$hide_classes[] = 'hidden sm:block';
}
if ( in_array( 'tablet', (array) $hide_on, true ) ) {
	$hide_classes[] = 'md:hidden';
}
if ( in_array( 'desktop', (array) $hide_on, true ) ) {
	$hide_classes[] = 'lg:hidden';
}
$hide_class = implode( ' ', $hide_classes );

// Margin handling.
$margin_class = '';
$margin_style = '';
if ( ! $disable_margins ) {
	if ( $custom_margin && $margin === 'custom' ) {
		$margin_style = ' style="margin:' . esc_attr( $custom_margin ) . ';"';
	} else {
		$margins = [
			'none'    => '',
			'small'   => 'my-8 md:my-12',
			'default' => 'my-16 md:my-24',
			'medium'  => 'my-20 md:my-32',
			'large'   => 'my-28 md:my-40',
		];
		$margin_class = $margins[ $margin ] ?? $margins['default'];
	}
}

// Background handling — default pale blue from screenshot if no custom color.
if ( $background_color ) {
	$bg_style = ' style="background-color:' . esc_attr( $background_color ) . ';"';
	$bg_class = '';
} else {
	$bg_style = ' style="background-color:#F6F9FF;"';
	$bg_class = '';
}

// Grid size → Tailwind cols. Simple defaults to 4 columns (screenshot).
$grid_map = [
	2 => 'md:grid-cols-2',
	3 => 'md:grid-cols-2 lg:grid-cols-3',
	4 => 'md:grid-cols-2 lg:grid-cols-4',
	5 => 'md:grid-cols-3 lg:grid-cols-5',
];
$grid_cols = $grid_map[ $grid_size ] ?? $grid_map[4];

if ( empty( $items ) ) {
	$items = [];
}
?>

<section
	id="<?php echo ! empty( $args['id'] ) ? esc_attr( $args['id'] ) : ''; ?>"
	class="grid-simple <?php echo esc_attr( trim( $margin_class . ' ' . $hide_class ) ); ?> py-16 md:py-20 <?php echo esc_attr( $bg_class ); ?>"
	<?php echo $bg_style . $margin_style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	data-section-id="<?php echo esc_attr( $template_part_name ); ?>"
>
	<div class="container mx-auto px-4 md:px-6 lg:px-8">
		<?php if ( $title || $description ) : ?>
			<div class="text-center max-w-4xl mx-auto mb-10 md:mb-14">
				<?php if ( $title ) : ?>
					<h2 class="text-3xl md:text-4xl lg:text-[2.875rem] font-bold text-[#1B1B1B] leading-tight">
						<?php echo wp_kses_post( $title ); ?>
					</h2>
				<?php endif; ?>
				<?php if ( $description ) : ?>
					<div class="mt-3 text-xl md:text-base leading-relaxed text-[#616161] max-w-3xl mx-auto prose prose-p:my-0 [&_p]:my-0">
						<?php echo wp_kses_post( $description ); ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $items ) ) : ?>
			<div class="grid grid-cols-1 <?php echo esc_attr( $grid_cols ); ?> gap-8 lg:gap-10">
				<?php foreach ( $items as $item ) :
					$item_image       = $item['image'] ?? [];
					$item_subtitle    = $item['subtitle'] ?? '';
					$item_title       = $item['title'] ?? '';
					$item_description = $item['description'] ?? '';
					$item_link        = $item['link'] ?? [];
					$has_link         = ! empty( $item_link['url'] );
					$image_url        = $item_image['url'] ?? '';
					$image_alt        = $item_image['alt'] ?? $item_title;
				?>
					<article class="grid-simple__item flex flex-col h-full">
						<?php if ( ! empty( $image_url ) ) : ?>
							<div class="bg-white flex items-center justify-center p-6 md:p-7 min-h-[148px] md:min-h-[168px] overflow-hidden">
								<img
									src="<?php echo esc_url( $image_url ); ?>"
									alt="<?php echo esc_attr( $image_alt ); ?>"
									class="max-h-[96px] md:max-h-[112px] w-auto max-w-full object-contain"
									loading="lazy"
								>
							</div>
						<?php endif; ?>

						<div class="flex flex-col flex-1 pt-6">
							<?php if ( $item_subtitle ) : ?>
								<p class="text-xs font-semibold tracking-wide uppercase text-[#2A4187] mb-2">
									<?php echo esc_html( $item_subtitle ); ?>
								</p>
							<?php endif; ?>

							<?php if ( $item_title ) : ?>
								<h3 class="text-lg md:text-2xl font-bold text-[#1B1B1B] leading-snug">
									<?php if ( $has_link ) : ?>
										<a href="<?php echo esc_url( $item_link['url'] ); ?>" target="<?php echo ! empty( $item_link['target'] ) ? esc_attr( $item_link['target'] ) : '_self'; ?>" class="hover:underline focus:underline">
											<?php echo esc_html( $item_title ); ?>
										</a>
									<?php else : ?>
										<?php echo esc_html( $item_title ); ?>
									<?php endif; ?>
								</h3>
							<?php endif; ?>

							<?php if ( $item_description ) : ?>
								<div class="mt-3 text-[16px] leading-[1.6] text-[#616161] prose prose-p:my-0 [&_p]:my-0">
									<?php echo wp_kses_post( $item_description ); ?>
								</div>
							<?php endif; ?>

							<?php if ( $has_link ) : ?>
								<div class="mt-auto pt-6">
									<a
										href="<?php echo esc_url( $item_link['url'] ); ?>"
										target="<?php echo ! empty( $item_link['target'] ) ? esc_attr( $item_link['target'] ) : '_self'; ?>"
										class="inline-flex items-center justify-center px-6 py-2.5 text-xl font-semibold text-white rounded-full transition-colors duration-200 hover:opacity-90 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-[#2A4187]"
										style="background-color:var(--theme-primary,#2A4187);"
									>
										<?php echo esc_html( $item_link['title'] ?: 'Read More' ); ?>
									</a>
								</div>
							<?php endif; ?>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $footer_description ) ) : ?>
			<div class="mt-12 md:mt-14 text-center max-w-3xl mx-auto">
				<div class="prose text-[15px] leading-relaxed text-[#616161]">
					<?php echo wp_kses_post( $footer_description ); ?>
				</div>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $cta ) && ! empty( $cta['url'] ) ) : ?>
			<div class="mt-8 text-center">
				<a
					href="<?php echo esc_url( $cta['url'] ); ?>"
					target="<?php echo ! empty( $cta['target'] ) ? esc_attr( $cta['target'] ) : '_self'; ?>"
					class="inline-flex items-center justify-center px-8 py-3 text-sm font-semibold text-white rounded-full transition-colors duration-200 hover:opacity-90"
					style="background-color:var(--theme-primary,#2A4187);"
				>
					<?php echo esc_html( $cta['title'] ?? 'Learn More' ); ?>
				</a>
			</div>
		<?php endif; ?>
	</div>
</section>
