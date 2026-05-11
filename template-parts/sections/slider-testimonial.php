<?php
/**
 * Driver Testimonial Section
 *
 * Expected $args:
 * - title: string
 * - label: string
 * - testimonials: array of testimonial arrays
 *   - image: array (url, alt)
 *   - quote: string
 *   - name: string
 *   - location: string
 */
$title        = $args['title'] ?? '';
$label        = $args['subtitle'] ?? '';
$testimonials = $args['slides'] ?? [];
$hide_on = $args['hide_on'] ?? [];
$hide_classes = [];
if (in_array('mobile', $hide_on)) $hide_classes[] = 'hidden !sm:block';
if (in_array('tablet', $hide_on)) $hide_classes[] = 'md:hidden';
if (in_array('desktop', $hide_on)) $hide_classes[] = 'lg:hidden';
$hide_class = implode(' ', $hide_classes);

if ( empty( $testimonials ) ) {
	$testimonials = [
		[
			'image'    => [ 'url' => 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?fm=jpg&q=60&w=3000&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D', 'alt' => 'Dan, SilverRide driver in San Francisco' ],
			'quote'    => 'I\'ve loved working for SilverRide. The company is incredibly focused on making its drivers part of the team. Highly recommended.',
			'name'     => 'Dan',
			'location' => 'San Francisco, CA',
		],
        [
			'image'    => [ 'url' => 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?fm=jpg&q=60&w=3000&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D', 'alt' => 'Dan, SilverRide driver in San Francisco' ],
			'quote'    => 'I\'ve loved working for SilverRide. The company is incredibly focused on making its drivers part of the team. Highly recommended.',
			'name'     => 'Dan',
			'location' => 'San Francisco, CA',
		],
        [
			'image'    => [ 'url' => 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?fm=jpg&q=60&w=3000&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D', 'alt' => 'Dan, SilverRide driver in San Francisco' ],
			'quote'    => 'I\'ve loved working for SilverRide. The company is incredibly focused on making its drivers part of the team. Highly recommended.',
			'name'     => 'Dan',
			'location' => 'San Francisco, CA',
		],
        [
			'image'    => [ 'url' => 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?fm=jpg&q=60&w=3000&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D', 'alt' => 'Dan, SilverRide driver in San Francisco' ],
			'quote'    => 'I\'ve loved working for SilverRide. The company is incredibly focused on making its drivers part of the team. Highly recommended.',
			'name'     => 'Dan',
			'location' => 'San Francisco, CA',
		],
	];
}

$carousel_id = 'driver-testimonial-carousel-' . uniqid();
?>

<section class="bg-[#98D1E6] py-16 md:py-24 <?php echo esc_attr($hide_class); ?>">
	<div class="mx-auto max-w-5xl px-6">
		<?php if(!empty($title)): ?>
			<h2 class="text-center text-3xl font-bold text-black md:text-4xl lg:text-[2.875rem]">
				<?php echo esc_html( $title ); ?>
			</h2>
		<?php endif; ?>

		<?php if (!empty($label)) : ?>
			<p class="mx-auto mt-6 max-w-5xl text-center text-lg lg:text-[1.5rem] font-bold text-black">
				<?php echo esc_html( $label ); ?>
			</p>
		<?php endif; ?>

		<?php if (!empty($testimonials)) : ?>
			<div
				id="<?php echo esc_attr( $carousel_id ); ?>"
				data-carousel
				class="mt-6 md:mt-12"
			>
				<div class="flex items-center justify-between gap-6">
					<!-- Previous Arrow -->
					<button
						type="button"
						data-carousel-prev
						aria-controls="<?php echo esc_attr( $carousel_id ); ?>"
						aria-label="Previous testimonial"
						class="shrink-0 text-black transition-colors duration-200 hover:text-gray-700"
					>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="h-14 w-14">
							<path stroke="none" d="M0 0h24v24H0z" fill="none" />
							<path d="M15 6l-6 6l6 6" />
						</svg>
					</button>

					<div class="embla__viewport w-full overflow-hidden">
						<div class="flex">
							<?php foreach ( $testimonials as $index => $testimonial ) :
								$t_image    = $testimonial['image'] ?? [];
								$t_quote    = $testimonial['content'] ?? '';
								$t_name     = $testimonial['heading'] ?? '';
								$t_location = $testimonial['location'] ?? '';
							?>
							<div
								data-carousel-slide
								tabindex="-1"
								class="w-full shrink-0"
							>
								<div class="flex flex-col items-center gap-10 md:flex-row md:gap-10">
									<?php if ( ! empty( $t_image ) ) : ?>
									<div class="shrink-0">
										<img
											src="<?php echo esc_url( $t_image['url'] ); ?>"
											alt="<?php echo esc_attr( $t_image['alt'] ?? '' ); ?>"
											class="h-40 w-40 object-cover md:h-[9.375rem] md:w-[9.375rem]"
											loading="lazy"
										>
									</div>
									<?php endif; ?>

									<div>
										<?php if ( ! empty( $t_quote ) ) : ?>
											<blockquote class="text-lg font-normal leading-relaxed text-black md:text-xl lg:text-xl">
												<?php echo wp_kses_post( $t_quote ); ?>
											</blockquote>
										<?php endif; ?>

										<?php if ( ! empty( $t_name ) || ! empty( $t_location ) ) : ?>
										<p class="mt-1 text-base font-bold text-black">
											<?php
											echo esc_html( trim( $t_name . ' in ' . $t_location, ' in ' ) );
											?>
										</p>
										<?php endif; ?>
									</div>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>

					<!-- Next Arrow -->
					<button
						type="button"
						data-carousel-next
						aria-controls="<?php echo esc_attr( $carousel_id ); ?>"
						aria-label="Next testimonial"
						class="shrink-0 text-black transition-colors duration-200 hover:text-gray-700"
					>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="h-14 w-14">
							<path stroke="none" d="M0 0h24v24H0z" fill="none" />
							<path d="M9 6l6 6l-6 6" />
						</svg>
					</button>
				</div>

				<!-- Live region for screen readers -->
				<div
					data-carousel-live-region
					aria-live="polite"
					class="sr-only"
				></div>
			</div>
		<?php endif; ?>
	</div>
</section>
