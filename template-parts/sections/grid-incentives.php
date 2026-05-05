<?php
/**
    * Grid Incentives Section Template
 */
$title       = $args['title'] ?? 'Compliance is the floor, not the ceiling.';
$description = $args['description'] ?? '<p>SilverRide is the partner of choice for transit agencies that need ADA-compliant paratransit at scale. We support complementary paratransit, overflow service, premium tiers, and same-day trips through a flexible independent driver network and an accessibility-focused vehicle mix, including sedans, SUVs, and wheelchair-accessible vehicles.</p>';
$items       = $args['items'] ?? [];

if ( empty( $items ) ) {
	$items = [];
}
?>

<section class="my-16 md:my-24">
	<div class="container">
		<h2 class="text-center text-3xl font-bold text-black md:text-4xl lg:text-5xl"><?php echo esc_html( $title ); ?></h2>

		<?php if ( ! empty( $description ) ) : ?>
		<div class="mx-auto mt-5 max-w-4xl text-center text-xl leading-relaxed md:text-lg">
			<?php echo wp_kses_post( $description ); ?>
		</div>
		<?php endif; ?>

		<?php if ( ! empty( $items ) ) : ?>
		<div class="mt-16 grid gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-3">
			<?php foreach ( $items as $item ) :
				$item_icon  = $item['icon'] ?? [];
				$item_label = $item['label'] ?? '';

				// Resolve relative icon URLs to absolute theme paths.
				$item_icon_url = $item_icon['url'] ?? '';
				if ( $item_icon_url && ! str_starts_with( $item_icon_url, 'http' ) ) {
					$item_icon_url = get_template_directory_uri() . '/' . ltrim( $item_icon_url, '/' );
				}
			?>
			<div class="flex flex-col items-center text-center">
				<?php if ( ! empty( $item_icon_url ) ) : ?>
				<div class="flex h-24 w-24 items-center justify-center relative">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="140" height="110" viewBox="0 0 140 110" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.33808 15.686C7.00463 3.20108 25.1424 -0.319565 42.4167 0.0217222C57.6913 0.323496 72.2487 9.92467 87.3543 17.3854C105.057 26.129 128.384 30.9273 136.475 46.4774C144.645 62.1807 131.355 74.2608 123.026 85.9424C115.503 96.4926 107.272 107.145 91.8373 109.08C76.0397 111.06 57.224 106.355 41.9019 96.1113C27.6164 86.5604 22.7882 71.9059 15.9469 58.3417C8.57718 43.7298 -4.16762 27.8165 1.33808 15.686Z" fill="#FFF1A5"/>
                        </svg>
                    </span>
					<img src="<?php echo esc_url( $item_icon_url ); ?>" alt="<?php echo esc_attr( $item_icon['alt'] ?? '' ); ?>" class="h-12 w-12 object-contain absolute top-0">
				</div>
				<?php endif; ?>
				<?php if ( ! empty( $item_label ) ) : ?>
				<p class="mt-4 font-normal text-xl leading-relaxed text-black"><?php echo esc_html( $item_label ); ?></p>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
</section>
