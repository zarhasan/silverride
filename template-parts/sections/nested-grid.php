<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? 'How We Serve: Door-to-Door And Door-Through-Door';
$columns = $args['columns'] ?? [];
$features = $args['features'] ?? [];

if (empty($columns)) {
    $columns = [
        [
            'heading' => 'Door-To-Door',
            'description' => "Your driver meets riders at the curb or front door, assists them into the vehicle, and delivers them to the door of their destination. A hands-on but light-touch experience for riders who walk independently.",
        ],
        [
            'heading' => 'Door-Through-Door',
            'description' => "Your driver escorts riders from inside the pickup location, through the door, into the vehicle, and all the way into the destination. Built for riders who use wheelchairs or walkers, riders with low vision and guide dogs, and riders heading to clinical appointments or multi-stop errands.",
        ],
    ];
}

if (empty($features)) {
    $features = [
        [
            'icon' => 'wheelchair',
            'label' => 'Skilled assistance with mobility devices and transfers',
        ],
        [
            'icon' => 'guide-dog',
            'label' => 'Guide dog and service animal accommodation',
        ],
        [
            'icon' => 'compassion',
            'label' => 'Patient and compassionate service',
        ],
        [
            'icon' => 'multilingual',
            'label' => 'English, Spanish, and multilingual driver options in most markets',
        ],
    ];
}
?>

<section class="bg-white my-16 lg:my-24" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
        <!-- Title -->
        <h2 class="text-3xl lg:text-[2.875rem] font-bold text-gray-900 text-center mb-12 lg:mb-16 max-w-3xl mx-auto leading-tight">
            <?php echo esc_html($title); ?>
        </h2>

        <!-- Two Column Descriptions -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 mb-16 lg:mb-20">
            <?php foreach ($columns as $column) : ?>
                <div>
                    <h3 class="text-xl lg:text-[1.625rem] font-bold text-gray-900 mb-4">
                        <?php echo esc_html($column['heading'] ?? ''); ?>
                    </h3>
                    <p class="text-lg text-gray-700 leading-relaxed">
                        <?php echo esc_html($column['description'] ?? ''); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Feature Grid -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-10">
            <?php foreach ($features as $feature) :
                $icon_type = $feature['icon'] ?? 'wheelchair';
            ?>
                <div class="flex flex-col items-center text-center">
                    <div class="w-[11.25rem] h-auto flex items-center justify-center mb-4">
                        <?php if ($icon_type === 'wheelchair') : ?>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/media/icon-wheelchair.png'); ?>" alt="Wheelchair icon">
                        <?php elseif ($icon_type === 'guide-dog') : ?>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/media/icon-guide-dog.png'); ?>" alt="Guide dog icon">
                        <?php elseif ($icon_type === 'compassion') : ?>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/media/icon-compassion.png'); ?>" alt="Compassion icon">
                        <?php elseif ($icon_type === 'multilingual') : ?>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/media/icon-multilingual.png'); ?>" alt="Multilingual icon">
                        <?php else : ?>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/media/icon-chair.png'); ?>" alt="Wheelchair icon">
                        <?php endif; ?>
                    </div>
                    <p class="text-[1.375rem] text-gray-800 leading-snug max-w-[14rem]">
                        <?php echo esc_html($feature['label'] ?? ''); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
