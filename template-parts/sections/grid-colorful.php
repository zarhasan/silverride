<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? '';
$cards = $args['cards'] ?? [];
$colors = [
    '#98D1E6',
    '#FFF1A5'
];
?>

<section class="bg-white my-16 lg:my-24" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 text-center mb-12 lg:mb-16">
            <?php echo esc_html($title); ?>
        </h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <?php if (!empty($cards)) : ?>
                <?php foreach ($cards as $card) :
                    $card_label = $card['subtitle'] ?? '';
                    $card_title = $card['title'] ?? '';
                    $card_description = $card['description'] ?? '';
                    $card_items = $card['items'] ?? [];
                    $card_bg = $card['background_color'] ?? 'bg-[#98D1E6]';
                ?>
                <div class="<?php echo esc_attr($card_bg); ?> rounded-2xl p-8 lg:p-12">
                    <span class="text-sm font-bold text-gray-900 uppercase tracking-wide mb-4 block">
                        <?php echo esc_html($card_label); ?>
                    </span>

                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight mb-6">
                        <?php echo esc_html($card_title); ?>
                    </h3>

                    <?php if ($card_description) : ?>
                        <div class="prose text-lg text-gray-800 leading-relaxed mb-8">
                            <?php echo wp_kses_post($card_description); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($card_items)) : ?>
                        <ul class="space-y-3">
                            <?php foreach ($card_items as $item) : ?>
                                <li class="flex items-start gap-3 text-base text-gray-800">
                                    <span class="text-gray-900">&bull;</span>
                                    <span><?php echo wp_kses_post($item['item'] ?? $item); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
