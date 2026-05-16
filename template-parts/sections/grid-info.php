<?php
/**
 * Template part for displaying the Grid Info section
 *
 * @package Accessibility_Partners
 */

if (!defined('ABSPATH')) {
    exit;
}

$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$items = $args['items'] ?? [];
$background_color = $args['background_color'] ?? '';
$footer_description = $args['footer_description'] ?? '';
$cta = $args['cta'] ?? [];
$disable_margins = !empty($args['disable_margins']);

$bg_style = $background_color ? 'style="background-color: ' . esc_attr($background_color) . ';"' : '';
$section_class = $disable_margins ? '' : 'my-16 md:my-24';
?>

<section class="bg-white my-16 md:my-24 <?php echo $section_class; ?>" <?php echo $bg_style; ?>>
    <div class="container">
        <?php if ($title || $description) : ?>
			<div class="mb-8 md:mb-12 text-left">
				<?php if ($title) : ?>
					<h2 class="text-3xl font-bold text-primary md:text-4xl lg:text-[2.875rem] !leading-tight">
						<?php echo wp_kses_post($title); ?>
					</h2>
				<?php endif; ?>
				<?php if ($description) : ?>
					<p class="mt-4 text-lg text-gray-600"><?php echo esc_html($description); ?></p>
				<?php endif; ?>
			</div>
        <?php endif; ?>

        <?php if (!empty($items)) : ?>
        <div class="mt-6 grid gap-6 md:grid-cols-2 md:gap-8">
            <?php foreach ($items as $item) :
                $item_title = $item['title'] ?? '';
                $item_description = $item['description'] ?? '';
            ?>
            <article class="rounded-lg bg-primary p-8 md:p-10">
                <h3 class="text-2xl font-bold text-white md:text-[2rem]">
                    <?php echo esc_html($item_title); ?>
                </h3>
                <?php if (!empty($item_description)) : ?>
					<div class="prose mt-4 font-normal leading-relaxed text-blue-100 text-lg">
						<?php echo wp_kses_post($item_description); ?>
					</div>
                <?php endif; ?>
            </article>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($footer_description)) : ?>
        <div class="mt-12 text-center">
            <div class="text-lg text-gray-600 leading-relaxed">
                <?php echo wp_kses_post($footer_description); ?>
            </div>
        </div>
        <?php endif; ?>

        <?php if (!empty($cta) && !empty($cta['url'])) : ?>
        <div class="mt-8 text-center">
            <a href="<?php echo esc_url($cta['url']); ?>" class="inline-flex items-center justify-center px-8 py-3 text-lg text-white rounded-full transition-colors duration-200" style="background-color: var(--theme-primary);">
                <?php echo esc_html($cta['title'] ?? 'Learn More'); ?>
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>
