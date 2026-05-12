<?php

if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$hide_on = $args['hide_on'] ?? [];
$hide_classes = [];
if (in_array('mobile', $hide_on)) $hide_classes[] = 'hidden !sm:block';
if (in_array('tablet', $hide_on)) $hide_classes[] = 'md:hidden';
if (in_array('desktop', $hide_on)) $hide_classes[] = 'lg:hidden';
$hide_class = implode(' ', $hide_classes);

$margin_class = '';
$margin = $args['margin'] ?? 'default';
$custom_margin = $args['custom_margin'] ?? '';
if ($custom_margin && $margin === 'custom') {
    $margin_style = ' style="margin: ' . esc_attr($custom_margin) . ';"';
} else {
    $margins = [
        'none'    => '',
        'small'   => 'my-8 md:my-12',
        'default' => 'my-16 md:my-24',
        'medium'  => 'my-20 md:my-32',
        'large'   => 'my-28 md:my-40',
    ];
    $margin_class = $margins[$margin] ?? $margins['default'];
    $margin_style = '';
}

?>

<?php if(!empty($args)): ?>
    <section
        id="<?php echo !empty($args['id']) ? $args['id'] : null; ?>" 
        class="relative grid-floating-cards <?php echo esc_attr($margin_class . ' ' . $hide_class); ?>"<?php echo $margin_style; ?>
        data-section-id="<?php echo esc_attr($template_part_name); ?>">

        <?php if(!empty($args['background_image'])): ?>
            <img class="w-full h-full absolute left-0 right-0 top-0 bottom-0 object-cover" src="<?php echo esc_url($args['background_image']['url']); ?>" alt="<?php echo esc_attr($args['background_image']['alt']); ?>">
        <?php endif; ?>

        <div class="relative z-10 bg-primary py-16 md:py-24">
            <div class="container mx-auto px-4 md:px-6 lg:px-8">
                <div>
                    <?php if(!empty($args['title'])): ?>
                        <h2 class="text-3xl md:text-4xl lg:text-[2.875rem] font-semibold text-center text-white">
                            <?php echo wp_kses_post($args['title']); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if(!empty($args['description'])): ?>
                        <div class="text-white text-lg lg:text-[1.25rem] mt-6 leading-relaxed text-center max-w-2xl mx-auto">
                            <?php echo wp_kses_post($args['description']); ?>
                        </div>
                    <?php endif; ?>

                    <?php
                        $grid_size_classes = [
                            2 => 'lg:grid-cols-2',
                            3 => 'lg:grid-cols-3',
                            4 => 'lg:grid-cols-4',
                            5 => 'lg:grid-cols-5',
                        ];
                    ?>

                    <?php if(!empty($args['items'])): ?>
                        <div class="grid grid-cols-1 gap-6 mt-12 <?php echo $grid_size_classes[$args['grid_size']]; ?>">
                            <?php foreach ($args['items'] as $index => $item): ?>
                                <div class="flex flex-col items-center text-center bg-white p-8 rounded-lg">
                                    <?php if(!empty($item['image'])): ?>
                                        <img 
                                            class="w-28 h-auto mb-6" 
                                            src="<?php echo esc_url($item['image']['url']); ?>" 
                                            alt="<?php echo esc_attr($item['image']['alt']); ?>" 
                                        />
                                    <?php endif; ?>

                                    <?php if(!empty($item['title'])): ?>
                                        <h3 class="text-2xl font-semibold mb-3 text-primary">
                                            <?php echo esc_html($item['title']); ?>
                                        </h3>
                                    <?php endif; ?>
                                    
                                    <?php if(!empty($item['description'])): ?>
                                        <div class="text-primary leading-relaxed mb-6">
                                            <?php echo wp_kses_post($item['description']); ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(!empty($item['link'])): ?>
                                        <a 
                                            href="<?php echo esc_url($item['link']['url']); ?>" 
                                            target="<?php echo !empty($item['link']['target']) ? esc_attr($item['link']['target']) : '_self'; ?>"
                                            class="btn btn-outline mt-auto"
                                        >
                                            <?php echo esc_html($item['link']['title']); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
