<?php
/**
 * Driver Information / Multiple CTAs Section
 *
 * Expected $args:
 * - headline: string
 * - subheadline: string
 * - body: string
 * - ctas: array of CTA arrays
 *   - text: string
 *   - url: string
 *   - target: string
 * - image: array (url, alt)
 */
$headline    = $args['headline'] ?? 'Find Your City';
$subheadline = $args['subheadline'] ?? 'Find SilverRide In Your Market.';
$body        = $args['body'] ?? 'SilverRide operates in 35+ metro areas across 15 states, with new markets added every quarter. Find your city to see the local application, the partner contracts active in your area, and the kinds of trips you can take. Questions about driving with SilverRide? Email Onboarding@SilverRide.com';
$ctas        = $args['ctas'] ?? [];
$image       = $args['image'] ?? [];

if ( empty( $ctas ) ) {
	$ctas = [
		[ 'text' => 'Find Your City', 'url' => '#', 'target' => '_self' ],
		[ 'text' => 'Apply to Drive', 'url' => '#', 'target' => '_self' ],
	];
}

if ( empty( $image ) ) {
	$image = [
		'url' => 'https://www.shutterstock.com/image-photo/stunning-view-new-york-city-600nw-2500167587.jpg',
		'alt' => 'Busy city street with pedestrians crossing and a bus in the background',
	];
}
?>

<section class="bg-white py-16 md:py-24">
	<div class="mx-auto max-w-7xl px-6">
		<div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
			<div class="flex flex-col justify-center">
				<?php if ( ! empty( $headline ) ) : ?>
				<h2 class="text-3xl font-bold text-black md:text-4xl lg:text-[2.875rem]">
					<?php echo esc_html( $headline ); ?>
				</h2>
				<?php endif; ?>

				<?php if ( ! empty( $subheadline ) ) : ?>
				<h3 class="mt-[1.19rem] text-xl font-bold text-black md:text-[1.625rem]">
					<?php echo esc_html( $subheadline ); ?>
				</h3>
				<?php endif; ?>

				<?php if ( ! empty( $body ) ) : ?>
				<p class="mt-7 text-xl leading-relaxed md:text-xl">
					<?php echo esc_html( $body ); ?>
				</p>
				<?php endif; ?>

				<?php if ( ! empty( $ctas ) ) : ?>
				<div class="mt-14 flex flex-wrap gap-4">
					<?php foreach ( $ctas as $cta ) :
						$cta_text   = $cta['text'] ?? '';
						$cta_url    = $cta['url'] ?? '#';
						$cta_target = $cta['target'] ?? '_self';
					?>
					<a
						href="<?php echo esc_url( $cta_url ); ?>"
						class="btn btn-primary"
						<?php echo '_blank' === $cta_target ? 'target="_blank" rel="noopener noreferrer"' : ''; ?>
					>
						<?php echo esc_html( $cta_text ); ?>
					</a>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>

			<?php if ( ! empty( $image ) ) : ?>
			<div class="overflow-hidden">
				<img
					src="<?php echo esc_url( $image['url'] ); ?>"
					alt="<?php echo esc_attr( $image['alt'] ?? '' ); ?>"
					class="h-full w-full object-cover"
					loading="lazy"
				>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
