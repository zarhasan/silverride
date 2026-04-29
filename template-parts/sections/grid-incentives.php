<?php

if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

?>

<?php if(!empty($args)): ?>
    <section
        id="<?php echo !empty($args['id']) ? $args['id'] : null; ?>"  
        class="grid-incentives py-16 md:py-24"
        data-section-id="<?php echo esc_attr($template_part_name); ?>">
        <div class="relative z-10">
            <div class="container mx-auto px-4 md:px-6 lg:px-8">
                <div class="max-w-5xl text-center mx-auto">
                    <?php if(!empty($args['title'])): ?>
                        <h2 class="sr-only"><?php echo wp_kses_post(strip_tags($args['title'])); ?></h2>
                        <h2 aria-hidden="true" class="text-3xl md:text-4xl font-semibold text-[#1B1B1B]">
                            <?php echo wp_kses_post($args['title']); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if(!empty($args['description'])): ?>
                        <p class="text-lg mt-6 text-[#1B1B1B]">
                            <?php echo esc_html($args['description']); ?>
                        </p>
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

                <?php if(!empty($args['items'])): ?>
                    <ul class="mt-16 flex flex-col lg:grid gap-6 <?php echo $grid_size_classes[$args['grid_size']]; ?>">
                        <?php foreach ($args['items'] as $index => $item): ?>
                            <li class="text-center flex flex-col justify-start items-center">
                                <?php if(!empty($item['image'])): ?>
                                    <img 
                                        src="<?php echo esc_url($item['image']['url']); ?>" 
                                        alt="" 
                                        class="w-10 h-auto" 
                                    />
                                <?php endif; ?>

                                <?php if(!empty($item['title'])): ?>
                                    <?php if(empty($item['description'])): ?>
                                        <div class="mt-6 text-xl font-semibold text-[#1B1B1B]"><?php echo esc_html($item['title']); ?></div>
                                    <?php else: ?>
                                        <h3 class="mt-6 text-xl font-semibold text-[#1B1B1B]"><?php echo esc_html($item['title']); ?></h3>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php if(!empty($item['description'])): ?>
                                    <div class="mt-2 text-[#1B1B1B]">
                                        <?php echo esc_html(strip_tags($item['description'])); ?>
                                    </div>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
