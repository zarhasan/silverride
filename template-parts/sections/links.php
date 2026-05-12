<?php

if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$title       = $args['title'] ?? '';
$description = $args['description'] ?? '';
$links       = $args['links'] ?? [];

?>

<?php if (!empty($title) || !empty($description) || !empty($links)) : ?>
    <section
        id="<?php echo !empty($args['id']) ? $args['id'] : null; ?>"
        class="relative links"
        data-section-id="<?php echo esc_attr($template_part_name); ?>">
        <div class="bg-[#F6F9FF] py-16 md:py-24">
            <div class="container">
                <?php if (!empty($title)) : ?>
                    <h2 class="text-3xl md:text-4xl lg:text-[2.875rem] font-bold text-gray-900">
                        <?php echo wp_kses_post($title); ?>
                    </h2>
                <?php endif; ?>

                <?php if (!empty($description)) : ?>
                    <div class="text-lg sm:text-[1.25rem] text-gray-600 mt-4">
                        <?php echo wp_kses_post($description); ?>
                    </div>
                <?php endif; ?>

                <div class="flex flex-wrap gap-4 mt-12">
                    <?php foreach ($links as $link_item) :
                        $link_data = is_array($link_item) && isset($link_item['link']) ? $link_item['link'] : $link_item;
                        $link_title = is_array($link_data) ? ($link_data['title'] ?? '') : $link_data;
                        $link_url   = is_array($link_data) ? ($link_data['url'] ?? '#') : '#';
                        $link_target = is_array($link_data) ? ($link_data['target'] ?? '') : '';
                    ?>
                        <a
                            href="<?php echo esc_url($link_url); ?>"
                            <?php if (!empty($link_target)) : ?>target="<?php echo esc_attr($link_target); ?>"<?php endif; ?>
                            class="links__pill inline-flex items-center justify-center px-6 py-3 text-base font-semibold text-primary border-2 border-primary rounded-full hover:bg-primary hover:text-white transition-colors duration-200"
                        >
                            <?php echo esc_html($link_title); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
