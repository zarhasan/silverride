<?php
/**
 * Stats Alt Section
 */
$stats = !empty($args['items']) ? $args['items'] : [];
$description = !empty($args['description']) ? $args['description'] : '';
?>

<section class="bg-[#FFF1A5] py-20 md:py-24">
	<div class="mx-auto max-w-7xl px-6">
		<?php if ( ! empty( $stats ) ) : ?>
			<div class="grid grid-cols-2 gap-[5.56rem] md:grid-cols-4">
				<?php foreach ( $stats as $stat ) :
					$stat_value = $stat['value'] ?? '';
					$stat_label = $stat['label'] ?? '';
				?>
				<div class="text-center">
					<p class="text-5xl font-bold text-primary md:text-6xl lg:text-7xl"><?php echo esc_html( $stat_value ); ?></p>
					<p class="mt-5 font-normal text-base text-primary md:text-2xl"><?php echo esc_html( $stat_label ); ?></p>
				</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $description ) ) : ?>
		<div class="mx-auto mt-20 max-w-4xl text-center md:mt-12">
			<div class="text-xl leading-relaxed text-primary font-medium md:text-2xl md:leading-relaxed">
				<?php echo wp_kses_post( $description ); ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</section>
