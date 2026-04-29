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

<section <?php echo $section_id; ?> class="my-16 md:my-24 bg-white" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container">
        <div class="mb-12">
            <?php if ($title) : ?>
                <div class="text-center">
                    <h2 class="text-3xl md:text-[2.5rem] font-semibold text-[#1B1B1B]"><?php echo esc_html($title); ?></h2>
                </div>
            <?php endif; ?>

            <?php if ($description) : ?>
                <div class="text-center mt-8 text-lg text-[#1B1B1B] leading-relaxed">
                    <p><?php echo esc_html($description); ?></p>
                </div>
            <?php endif; ?>
        </div>

        <?php if (!empty($items)) : ?>
            <div class="border border-gray-300 overflow-hidden">
                <?php foreach ($items as $index => $item) : ?>
                    <details class="border-b border-gray-300<?php echo ($index === 0 && !empty($item['open'])) ? ' open' : ''; ?>"<?php echo ($index === 0 && !empty($item['open'])) ? ' open' : ''; ?>>
                        <summary class="flex items-center gap-4 p-4 cursor-pointer list-none hover:bg-[#F9F9F9] transition-colors">
                            <span class="text-primary text-2xl font-semibold"><?php echo ($index === 0 && !empty($item['open'])) ? '-' : '+'; ?></span>
                            <h3 class="text-primary font-poppins text-lg !font-bold"><?php echo esc_html($item['question']); ?></h3>
                        </summary>
                        <div class="px-5 pb-5 pt-0">
                            <div class="text-lg prose pl-8">
                                <?php echo !empty($item['answer']) ? wp_kses_post($item['answer']) : ''; ?>
                            </div>
                        </div>
                    </details>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($footer_description)) : ?>
            <div class="w-full text-center mx-auto mt-12">
                <div class="prose text-lg leading-relaxed">
                    <?php echo wp_kses_post($footer_description); ?>
                </div>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($cta) && !empty($cta['url'] && !empty($cta['title']))) : ?>
            <div class="text-center mt-8">
                <a href="<?php echo esc_url($cta['url']); ?>" class="inline-flex items-center justify-center px-8 py-3 text-lg text-white rounded-full transition-colors duration-200" style="background-color: var(--theme-primary);">
                    <?php echo esc_html($cta['title'] ?? ''); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>
