<?php
/**
 * Template part for displaying the FAQs section
 *
 * @package Accessibility_Partners
 */

if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$args = wp_parse_args($args, array(
    'id' => '',
    'title' => 'Frequently Asked Questions',
    'description' => '',
    'items' => array(),
    'cta' => array(),
));

$section_id = $args['id'] ? 'id="' . esc_attr($args['id']) . '"' : '';
$title = $args['title'];
$description = $args['description'];
$items = $args['items'];
$footer_description = $args['footer_description'] ?? '';
$cta = $args['cta'];
?>

<section class="bg-white py-16 md:py-24">
	<div class="mx-auto max-w-3xl px-6">
		<h2 class="text-center text-3xl font-bold text-black md:text-4xl lg:text-[2.875rem]">
			<?php echo esc_html( $title ); ?>
		</h2>

		<?php if ( ! empty( $faqs ) ) : ?>
		<div class="mt-12 md:mt-16">
			<?php foreach ( $faqs as $index => $faq ) :
				$faq_question = $faq['question'] ?? '';
				$faq_answer   = $faq['answer'] ?? '';
				$faq_cta      = $faq['cta'] ?? [];
				$is_open      = ! empty( $faq['open'] );
				$faq_id       = 'driver-faq-' . $index;
			?>
			<div class="border-b border-gray-300" data-faq-item>
				<h3 class="text-lg font-bold text-black md:text-[1.375rem]">
					<button
						type="button"
						class="font-bold faq-toggle flex w-full items-center justify-between py-6 text-left transition-colors duration-200 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
						aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>"
						aria-controls="<?php echo esc_attr( $faq_id ); ?>"
					>
						<span><?php echo esc_html( $faq_question ); ?></span>
						<span class="faq-icon ml-4 shrink-0 transition-transform duration-300 <?php echo $is_open ? 'rotate-180' : ''; ?>" aria-hidden="true">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6"><path d="m6 9 6 6 6-6"/></svg>
						</span>
					</button>
				</h3>

				<div
					id="<?php echo esc_attr( $faq_id ); ?>"
					class="faq-content overflow-hidden transition-all duration-300 ease-out <?php echo $is_open ? 'max-h-96 opacity-100' : 'max-h-0 opacity-0'; ?>"
					aria-hidden="<?php echo $is_open ? 'false' : 'true'; ?>"
				>
					<?php if ( ! empty( $faq_answer ) ) : ?>
					<p class="pb-6 text-base leading-relaxed font-normal md:text-lg">
						<?php echo esc_html( $faq_answer ); ?>
					</p>
					<?php endif; ?>

					<?php if ( ! empty( $faq_cta ) ) : ?>
					<div class="pb-6">
						<a
							href="<?php echo esc_url( $faq_cta['url'] ?? '#' ); ?>"
							class="btn btn-primary"
							<?php echo ! empty( $faq_cta['target'] ) && '_blank' === $faq_cta['target'] ? 'target="_blank" rel="noopener noreferrer"' : ''; ?>
						>
							<?php echo esc_html( $faq_cta['text'] ?? '' ); ?>
						</a>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
</section>
