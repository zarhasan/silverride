<?php

if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

?>

<?php if(!empty($args)): ?>
    <section
        id="<?php echo !empty($args['id']) ? $args['id'] : null; ?>" 
        class="relative grid-floating-cards"
        data-section-id="<?php echo esc_attr($template_part_name); ?>">

        <img class="w-full h-full absolute left-0 right-0 top-0 bottom-0 object-cover" src="<?php echo get_template_directory_uri() . '/media/Our-Philosophy.png' ?>" alt="">

        <div class="relative z-10 bg-primary py-16 md:py-24">
            <div class="container mx-auto px-4 md:px-6 lg:px-8">
                <div>
                    <?php if(!empty($args['subtitle'])): ?>
                        <p class="text-lg uppercase text-white font-semibold mb-4">
                            <?php echo esc_html($args['subtitle']); ?>
                        </p>
                    <?php endif; ?>
                        
                    <?php if(!empty($args['title'])): ?>
                        <h2 class="sr-only"><?php echo wp_kses_post(strip_tags($args['title'])); ?></h2>
                        <h2 aria-hidden="true" class="text-3xl md:text-4xl font-semibold mt-2 text-center text-white">
                            <?php echo wp_kses_post($args['title']); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if(!empty($args['description'])): ?>
                        <div class="text-white text-lg mt-6 leading-relaxed">
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
                        <ul class="flex flex-col lg:grid gap-6 mt-12 <?php echo $grid_size_classes[$args['grid_size']]; ?>">
                            <?php foreach ($args['items'] as $index => $item): ?>
                                <li class="flex justify-start items-start flex-col bg-white p-6 rounded-lg">
                                    <?php if(!empty($item['image'])): ?>
                                        <img 
                                            class="w-12 h-auto mb-4" 
                                            src="<?php echo esc_url($item['image']['url']); ?>" 
                                            alt="" 
                                        />
                                    <?php endif; ?>

                                    <?php if(!empty($item['title'])): ?>
                                        <?php if(empty($item['description'])): ?>
                                            <div class="text-xl font-semibold mb-2 text-primary"><?php echo esc_html($item['title']); ?></div>
                                        <?php else: ?>
                                            <h3 class="text-xl font-semibold mb-2 text-primary"><?php echo esc_html($item['title']); ?></h3>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    
                                    <?php if(!empty($item['description'])): ?>
                                        <div class="text-[#1B1B1B] leading-relaxed">
                                            <?php echo wp_kses_post($item['description']); ?>
                                        </div>
                                    <?php endif; ?>

                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
