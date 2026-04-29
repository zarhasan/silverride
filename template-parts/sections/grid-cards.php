<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$template_part_name = explode('.', basename(__FILE__))[0];

?>

<?php if(!empty($args)): ?>
    <section 
        id="<?php echo !empty($args['id']) ? $args['id'] : null; ?>" 
        class="w-full my-16 sm:my-24"
        data-section-id="<?php echo esc_attr($template_part_name); ?>">
        <div class="w-full bg-primary text-white p-8 lg:p-16">
            <div class="max-w-5xl text-center mx-auto">
                <?php if(!empty($args['title'])): ?>
                    <h2 class="sr-only"><?php echo wp_kses_post(strip_tags($args['title'])); ?></h2>
                    <h2 aria-hidden="true" class="text-4xl lg:text-[2.5rem] font-semibold text-inherit">
                        <?php echo wp_kses_post($args['title']); ?>
                    </h2>
                <?php endif; ?>

                <?php if(!empty($args['description'])): ?>
                    <div class="mt-6">
                        <?php echo wp_kses_post($args['description']); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div>
                <?php
                    $grid_size_classes = [
                        2 => 'lg:grid-cols-2',
                        3 => 'lg:grid-cols-3',
                        4 => 'lg:grid-cols-4',
                        5 => 'lg:grid-cols-5',
                    ];
                ?>

                <?php if(!empty($args['items'])): ?>
                    <div class="flex flex-col lg:grid gap-8 mt-12 <?php echo $grid_size_classes[$args['grid_size']]; ?>">
                        <?php foreach ($args['items'] as $index => $item): ?>
                            <div class="p-8 flex justify-start items-center flex-col text-center bg-white text-[#1B1B1B] rounded gap-4">
                                <img 
                                    class="w-20 h-auto" 
                                    src="<?php echo esc_url($item['image']['url']) ?>" 
                                    alt=""
                                >
                                <div>
                                    <h3 class="font-semibold mb-1 text-lg"><?php echo esc_html($item['title']); ?></h3>
                                    <p><?php echo esc_html(strip_tags($item['description'])); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if(!empty($args['link'])): ?>
                    <div class="flex justify-start items-center gap-8 mt-12 flex-col lg:flex-row">
                        <a href="<?php echo esc_url($args['link']['url']); ?>" class="button--primary text-base">
                            <?php echo esc_html($args['link']['title']); ?> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none"><path d="M13.3545 17.5C13.3545 14.5 16.1545 10.5 19.3545 10.5M19.3545 10.5C17.5212 10.5 13.3545 9.5 13.3545 3.5M19.3545 10.5H0.354492" stroke="currentColor" stroke-width="2"></path></svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
