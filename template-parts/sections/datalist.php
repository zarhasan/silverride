<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$items = $args['items'] ?? [];
?>

<section class="bg-white py-16 md:py-24" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
        <?php if ($title) : ?>
        <h2 class="text-3xl md:text-[2.5rem] font-semibold !leading-tight text-[#1B1B1B] mb-4 md:mb-6">
            <?php echo esc_html($title); ?>
        </h2>
        <?php endif; ?>

        <?php if ($description) : ?>
        <div class="prose prose-lg max-w-none text-lg sm:text-[1.125rem] text-[#1B1B1B] leading-relaxed mb-8 md:mb-12">
            <?php echo wp_kses_post($description); ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($items)) : ?>
        <div class="space-y-6 md:space-y-12">
            <?php foreach ($items as $item) :
                $item_title = $item['title'] ?? '';
                $item_description = $item['description'] ?? '';
            ?>
            <div class="prose prose-lg max-w-none pb-6 text-[#1B1B1B] leading-relaxed border-b border-gray-300 last:border-0">
                <?php if ($item_title) : ?>
                <h3 class="text-xl !md:text-[1.625rem] font-semibold mb-3"><?php echo esc_html($item_title); ?></h3>
                <?php endif; ?>
                <?php if ($item_description) : ?>
                <div class=" text-lg sm:text-[1.125rem] text-gray-700">
                    <?php echo wp_kses_post($item_description); ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
