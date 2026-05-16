<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? 'Why SilverRide';
$cards = $args['cards'] ?? [];
?>

<section class="bg-white my-16 lg:my-24" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
        <h2 class="text-3xl md:text-4xl lg:text-[2.875rem] font-bold text-gray-900 text-center mb-8 lg:mb-12">
            <?php echo esc_html($title); ?>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
            <?php if (!empty($cards)) : ?>
                <?php foreach ($cards as $card) :
                    $card_title = $card['title'] ?? '';
                    $card_description = $card['description'] ?? '';
                ?>
                <div class="bg-[#FDCC82] rounded-2xl p-8 lg:p-10">
                    <h3 class="text-[1.625rem] font-bold text-gray-900 leading-snug mb-6">
                        <?php echo esc_html($card_title); ?>
                    </h3>

                    <?php if ($card_description) : ?>
                        <p class="text-lg text-gray-800 leading-relaxed">
                            <?php echo wp_kses_post($card_description); ?>
                        </p>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
