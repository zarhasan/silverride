<?php
if (!defined('ABSPATH')) {
    exit;
}

$title = $args['title'] ?? '';
$subtitle = $args['description'] ?? '';
$features = $args['items'] ?? [];
?>

<section class="bg-white py-16 md:py-24">
    <div class="mx-auto max-w-7xl px-6">
        <?php if ($title) : ?>
        <h2 class="text-center text-3xl font-bold text-black md:text-4xl lg:text-[2.875rem]">
            <?php echo wp_kses_post($title); ?>
        </h2>
        <?php endif; ?>

        <?php if (!empty($subtitle)) : ?>
            <div class="mx-auto mt-4 max-w-5xl text-center lg:text-[1.25rem] font-normal text-black">
                <?php echo wp_kses_post($subtitle); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($features)) : ?>
        <div class="mt-16 grid gap-12 md:grid-cols-2 lg:gap-16">
            <?php foreach ($features as $feature) :
                $feature_icon = $feature['image'] ?? [];
                $feature_heading = $feature['title'] ?? '';
                $feature_description = $feature['description'] ?? '';
            ?>
            <div class="flex gap-6 justify-start">
                <?php if (!empty($feature_icon)) : ?>
                <div class="shrink-0">
                    <img
                        src="<?php echo esc_url($feature_icon['url']); ?>"
                        alt="<?php echo esc_attr($feature_icon['alt'] ?? ''); ?>"
                        class="h-20 w-20 object-contain md:h-[9.375rem] md:w-[9.375rem]"
                        loading="lazy"
                    >
                </div>
                <?php endif; ?>

                <div>
                    <?php if (!empty($feature_heading)) : ?>
                    <h3 class="text-xl font-bold text-black md:text-[1.375rem]">
                        <?php echo esc_html($feature_heading); ?>
                    </h3>
                    <?php endif; ?>

                    <?php if (!empty($feature_description)) : ?>
                    <div class="mt-4 text-[1.125rem] leading-relaxed text-gray-600">
                        <?php echo wp_kses_post($feature_description); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
