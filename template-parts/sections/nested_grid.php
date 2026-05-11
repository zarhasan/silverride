<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? '';
$columns = $args['columns'] ?? [];
$hide_on = $args['hide_on'] ?? [];

$hide_classes = [];
if (in_array('mobile', $hide_on)) {
    $hide_classes[] = 'hidden !sm:block';
}
if (in_array('tablet', $hide_on)) {
    $hide_classes[] = 'md:hidden';
}
if (in_array('desktop', $hide_on)) {
    $hide_classes[] = 'lg:hidden';
}
$hide_class = implode(' ', $hide_classes);
?>

<section class="bg-white my-16 lg:my-24 <?php echo esc_attr($hide_class); ?>" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
        <?php if ($title) : ?>
        <h2 class="text-3xl lg:text-[2.875rem] font-bold text-gray-900 text-center mb-12 lg:mb-16 max-w-3xl mx-auto leading-tight">
            <?php echo esc_html($title); ?>
        </h2>
        <?php endif; ?>

        <?php if (!empty($columns)) : ?>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 mb-16 lg:mb-20">
            <?php foreach ($columns as $column) :
                $col_heading = $column['heading'] ?? '';
                $col_description = $column['description'] ?? '';
                $col_items = $column['items'] ?? [];
            ?>
                <div>
                    <h3 class="text-xl lg:text-[1.625rem] font-bold text-gray-900 mb-4">
                        <?php echo esc_html($col_heading); ?>
                    </h3>
                    <div class="text-lg text-gray-700 leading-relaxed mb-8">
                        <?php echo wp_kses_post($col_description); ?>
                    </div>

                    <?php if (!empty($col_items)) : ?>
                    <div class="grid grid-cols-2 gap-6">
                        <?php foreach ($col_items as $item) :
                            $item_icon = $item['icon'] ?? [];
                            $item_label = $item['label'] ?? '';
                        ?>
                        <div class="flex flex-col items-center text-center">
                            <?php if (!empty($item_icon) && !empty($item_icon['url'])) : ?>
                            <div class="w-[11.25rem] h-auto flex items-center justify-center mb-4">
                                <img src="<?php echo esc_url($item_icon['url']); ?>" alt="<?php echo esc_attr($item_icon['alt'] ?? ''); ?>" class="max-w-full h-auto">
                            </div>
                            <?php endif; ?>
                            <?php if ($item_label) : ?>
                            <p class="text-lg lg:text-[1.375rem] text-gray-800 leading-snug">
                                <?php echo esc_html($item_label); ?>
                            </p>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
