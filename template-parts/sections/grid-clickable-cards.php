<?php

if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$alternate_bg = function_exists('silverride_alternate_bg_color') ? silverride_alternate_bg_color() : '#FCF3F5';

?>

<section
    id="<?php echo !empty($args['id']) ? $args['id'] : null; ?>" 
    class="py-16 md:py-24 bg-gray-100"
    data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto px-4 md:px-6 lg:px-8 max-w-5xl text-center">
        <?php if(!empty($args['title'])): ?>
            <h2 class="sr-only"><?php echo wp_kses_post(strip_tags($args['title'])); ?></h2>
            <h2 aria-hidden="true" class="text-3xl md:text-4xl font-semibold text-[#1B1B1B]">
                <?php echo wp_kses_post($args['title']); ?>
            </h2>
        <?php endif; ?>
        <?php if(!empty($args['description'])): ?>
            <div class="text-lg mt-6 text-[#1B1B1B]">
                <?php echo wp_kses_post($args['description']); ?>
            </div>
        <?php endif; ?>
    </div>

    <?php
        $grid_size_classes = [
            2 => 'lg:grid-cols-2',
            3 => 'lg:grid-cols-3',
            4 => 'lg:grid-cols-4',
            5 => 'lg:grid-cols-5',
        ];
    ?>

    <ul class="flex flex-col lg:grid gap-6 mt-12 container mx-auto px-4 md:px-6 lg:px-8 <?php echo $grid_size_classes[$args['grid_size']]; ?>">
        <?php foreach ($args['items'] as $index => $item) : ?>
            <li>
                <a
                    href="<?php echo !empty($item['link']['url']) ? $item['link']['url'] : '#'; ?>"
                    class="group block w-full h-full py-12 px-8 bg-white border border-primary rounded-lg flex flex-col justify-center items-center text-center transition-colors hover:border-red-800"
                    style="--hover-bg: <?php echo esc_attr($alternate_bg); ?>;"
                    data-hover-bg="<?php echo esc_attr($alternate_bg); ?>">
                    <?php if(!empty($item['image'])): ?>
                        <img 
                            class="w-12 h-auto" 
                            src="<?php echo esc_url($item['image']['url']) ?>" 
                            alt=""
                        >
                    <?php endif; ?>
                    <span class="block text-xl font-semibold mt-4 text-[#1B1B1B]">
                        <?php echo esc_html($item['title']); ?>
                    </span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>