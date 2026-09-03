<?php
/**
 * Split Default Section Template
 * Matches screenshots/split-default.webp — Case study split layout
 *
 * Left: image on top, content (wysiwyg with H3 headings) + logos
 * Right: light card with form (title + shortcode or placeholder fields)
 *
 * ACF fields: image, content, logos (gallery), form_title, form_shortcode,
 *             background_color, container, hide_on, margin, custom_margin, disable_margins
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$template_part_name = explode( '.', basename( __FILE__ ) )[0];

$image            = $args['image'] ?? [];
$content          = $args['content'] ?? '';
$logos            = $args['logos'] ?? [];
$form_title       = $args['form_title'] ?? '';
$form_shortcode    = $args['form_shortcode'] ?? '';
$background_color = $args['background_color'] ?? '';
$container        = $args['container'] ?? 'full';
$hide_on          = $args['hide_on'] ?? [];
$margin           = $args['margin'] ?? 'default';
$custom_margin    = $args['custom_margin'] ?? '';
$disable_margins  = ! empty( $args['disable_margins'] );

$container_classes = [
	'full'  => 'container mx-auto px-4 md:px-6 lg:px-8',
	'small' => 'max-w-5xl mx-auto px-4 md:px-6 lg:px-8',
];
$container_class = $container_classes[ $container ] ?? $container_classes['full'];

// Hide on.
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

// Margin.
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

// Background.
$bg_style = $background_color ? ' style="background-color:' . esc_attr( $background_color ) . ';"' : '';
$bg_class = $background_color ? '' : 'bg-white';

// Demo fallbacks when fields are empty (matches screenshot).
if ( empty( $image ) || empty( $image['url'] ) ) {
	// Keep empty so template still renders without image; no hard fallback URL to avoid broken image.
	$has_image = false;
} else {
	$has_image = true;
}
if ( empty( $content ) ) {
	$content = '<h3><strong>The Challenge</strong></h3><p>Milpitas SMART had everything going for it: RideCo\'s best-in-class technology, strong ridership, and excellent ratings.</p><p>The problem? Inconsistent operator performance was undermining the experience. RideCo turned to SilverRide to close the gap between platform quality and service quality.</p><h3><strong>The Result</strong></h3><p>After assuming operations of Milpitas SMART\'s seven-vehicle fleet in September 2024, SilverRide delivered measurable improvements across every metric.</p><p>Reliability increased, capacity expanded, service quality rose. The result: higher ridership, greater efficiency, and a rider experience that finally matched the platform\'s technology.</p>';
}
if ( empty( $form_title ) ) {
	$form_title = 'Fill out this form to download case study';
}
if ( empty( $logos ) && empty( $form_shortcode ) ) {
	// Keep logos empty by default; screenshot logos will be provided via ACF gallery in production.
}
$image_url = $image['url'] ?? '';
$image_alt = $image['alt'] ?? '';
?>

<section
	id="<?php echo ! empty( $args['id'] ) ? esc_attr( $args['id'] ) : ''; ?>"
	class="split-default <?php echo esc_attr( trim( $margin_class . ' ' . $hide_class ) ); ?> <?php echo esc_attr( $bg_class ); ?> py-12 md:py-16"
	<?php echo $bg_style . $margin_style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	data-section-id="<?php echo esc_attr( $template_part_name ); ?>"
>
	<div class="<?php echo esc_attr( $container_class ); ?>">
		<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-20 items-start">
			<!-- Left column -->
			<div class="lg:col-span-6 xl:col-span-6">
				<?php if ( $has_image ) : ?>
					<div class="w-full overflow-hidden mb-8">
						<img
							src="<?php echo esc_url( $image_url ); ?>"
							alt="<?php echo esc_attr( $image_alt ); ?>"
							class="w-full h-auto object-cover"
							loading="lazy"
						>
					</div>
				<?php endif; ?>

				<?php if ( $content ) : ?>
					<div class="split-default__content prose prose-headings:font-bold prose-h3:text-[1.0625rem] prose-h3:md:text-[1.125rem] prose-h3:text-[#1B1B1B] prose-h3:mb-3 prose-h3:mt-8 prose-h3:first:mt-0 prose-p:text-[13px] md:prose-p:text-[14px] prose-p:leading-[1.65] prose-p:text-[#333] prose-p:mb-4 max-w-none">
						<?php echo wp_kses_post( $content ); ?>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $logos ) ) : ?>
					<div class="mt-8 flex flex-wrap items-center gap-6">
						<?php foreach ( $logos as $logo ) :
							$logo_url = $logo['url'] ?? '';
							$logo_alt = $logo['alt'] ?? 'Logo';
							if ( empty( $logo_url ) ) continue;
						?>
							<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $logo_alt ); ?>" class="h-[100px] w-auto object-contain" loading="lazy">
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>

			<!-- Right column: form card -->
			<div class="lg:col-span-6 xl:col-span-6">
				<div class="bg-[#4255631A] p-6 md:p-7 lg:p-8">
					<?php if ( $form_title ) : ?>
						<h3 class="text-[26px] font-bold text-[#1B1B1B] leading-snug mb-6">
							<?php echo esc_html( $form_title ); ?>
						</h3>
					<?php endif; ?>

					<?php if ( ! empty( $form_shortcode ) ) : ?>
						<div class="split-default__form">
							<?php echo do_shortcode( $form_shortcode ); ?>
						</div>
					<?php else : ?>

					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
