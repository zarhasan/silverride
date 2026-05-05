<?php
/**
 * Process / Who We Serve Section
 *
 * Expected $args:
 * - title_line_1: string
 * - title_line_2: string
 * - steps: array of step arrays
 *   - number: string (e.g. '01.')
 *   - heading: string
 *   - content: string (HTML)
 */
$title_line_1 = $args['title_line_1'] ?? 'Built around your service standards.';
$title_line_2 = $args['title_line_2'] ?? 'Live where your riders are.';
$steps = $args['steps'] ?? [];

if ( empty( $steps ) ) {
	$steps = [];
}
?>

<section class="bg-white py-16 md:py-24">
	<div class="mx-auto max-w-7xl px-6">
		<h2 class="text-3xl font-bold text-primary md:text-4xl lg:text-5xl leading-normal">
			<?php echo esc_html( $title_line_1 ); ?>
			<br class="hidden md:block">
			<?php echo esc_html( $title_line_2 ); ?>
		</h2>

		<?php if ( ! empty( $steps ) ) : ?>
		<div class="mt-6 grid gap-6 md:grid-cols-2 md:gap-8">
			<?php foreach ( $steps as $step ) :
				$step_number  = $step['number'] ?? '';
				$step_heading = $step['heading'] ?? '';
				$step_content = $step['content'] ?? '';
			?>
			<article class="rounded-lg bg-primary p-8 md:p-10">
				<h3 class="text-2xl font-bold text-white md:text-3xl">
					<?php echo esc_html( $step_number . ' ' . $step_heading ); ?>
				</h3>
				<?php if ( ! empty( $step_content ) ) : ?>
				<p class="mt-3 font-normal leading-relaxed text-blue-100 text-lg">
					<?php echo esc_html( $step_content ); ?>
				</p>
				<?php endif; ?>
			</article>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
</section>
