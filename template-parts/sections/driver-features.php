<?php
/**
 * Driver Features Section
 *
 * Expected $args:
 * - title: string
 * - subtitle: string
 * - features: array of feature arrays
 *   - icon: array (url, alt)
 *   - heading: string
 *   - description: string
 */
$title    = $args['title'] ?? 'Why Drivers Choose SilverRide';
$subtitle = $args['subtitle'] ?? 'Mission, Flexibility, And A Real Path To Higher Earnings.';
$features = $args['features'] ?? [];

if ( empty( $features ) ) {
	$features = [
		[
			'icon'        => [ 'url' => get_template_directory_uri() . '/screenshots/driving.png', 'alt' => 'Car icon' ],
			'heading'     => 'Driving With Purpose',
			'description' => 'The work our drivers do really matters. We\'re supporting the needs of our riders and the organizations we partner with. If you\'re mission driven like we are, you\'ll find your work rewarding, engaging, and enjoyable.',
		],
		[
			'icon'        => [ 'url' => get_template_directory_uri() . '/screenshots/location.png', 'alt' => 'Map icon' ],
			'heading'     => 'More Driving Opportunities',
			'description' => 'SilverRide enables drivers to get work with transit agencies and other organizations through our safety, compliance, certification and other processes that meet these organizations\' requirements. We match drivers with these opportunities.',
		],
		[
			'icon'        => [ 'url' => get_template_directory_uri() . '/screenshots/date.png', 'alt' => 'Calendar icon' ],
			'heading'     => 'Full Flexibility',
			'description' => 'Driving with SilverRide provides you the flexibility you need so that you can keep a schedule that works best for you. As an independent contractor in the gig economy, we\'ll make every effort to accommodate your needs.',
		],
		[
			'icon'        => [ 'url' => get_template_directory_uri() . '/screenshots/earn.png', 'alt' => 'Hand holding money icon' ],
			'heading'     => 'Earn More',
			'description' => 'Our drivers typically earn more than at other rideshare companies. It\'s just one more reason why SilverRide drivers absolutely love what they do.',
		],
	];
}
?>

<section class="bg-white py-16 md:py-24">
	<div class="mx-auto max-w-7xl px-6">
		<h2 class="text-center text-3xl font-bold text-black md:text-4xl lg:text-[2.875rem]">
			<?php echo esc_html( $title ); ?>
		</h2>

		<?php if ( ! empty( $subtitle ) ) : ?>
		<p class="mx-auto mt-4 max-w-4xl text-center text-[1.625rem] font-bold text-black">
			<?php echo esc_html( $subtitle ); ?>
		</p>
		<?php endif; ?>

		<?php if ( ! empty( $features ) ) : ?>
		<div class="mt-16 grid gap-12 md:grid-cols-2 lg:gap-16">
			<?php foreach ( $features as $feature ) :
				$feature_icon        = $feature['icon'] ?? [];
				$feature_heading     = $feature['heading'] ?? '';
				$feature_description = $feature['description'] ?? '';
			?>
			<div class="flex gap-6 justify-start">
				<?php if ( ! empty( $feature_icon ) ) : ?>
				<div class="shrink-0">
					<img
						src="<?php echo esc_url( $feature_icon['url'] ); ?>"
						alt="<?php echo esc_attr( $feature_icon['alt'] ?? '' ); ?>"
						class="h-20 w-20 object-contain md:h-[9.375rem] md:w-[9.375rem]"
						loading="lazy"
					>
				</div>
				<?php endif; ?>

				<div>
					<?php if ( ! empty( $feature_heading ) ) : ?>
					<h3 class="text-xl font-bold text-black md:text-[1.375rem]">
						<?php echo esc_html( $feature_heading ); ?>
					</h3>
					<?php endif; ?>

					<?php if ( ! empty( $feature_description ) ) : ?>
					<p class="mt-4 text-[1.125rem] leading-relaxed text-gray-600">
						<?php echo esc_html( $feature_description ); ?>
					</p>
					<?php endif; ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
</section>
