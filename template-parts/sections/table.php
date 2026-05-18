<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$table_data = $args['table'] ?? [];
$footnote = $args['footnote'] ?? '';

$container = [
    'full'  => 'container',
    'small' => 'max-w-5xl mx-auto px-4 md:px-6 lg:px-8',
];
$container_class = $container[$args['container'] ?? 'full'] ?? $container['full'];
?>

<section class="bg-white my-16 lg:my-24" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="<?php echo esc_attr($container_class); ?>">
        <?php if ($title) : ?>
            <h2 class="text-3xl lg:text-[2.875rem] font-bold text-gray-900 mb-4">
                <?php echo esc_html($title); ?>
            </h2>
        <?php endif; ?>

        <?php if ($description) : ?>
            <div class="text-lg text-gray-600 mb-8">
                <?php echo esc_html($description); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($table_data)) : ?>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <?php if (!empty($table_data['header'])) : ?>
                    <thead>
                        <tr>
                            <?php foreach ($table_data['header'] as $header_cell) : ?>
                                <th class="border border-gray-300 px-4 py-3 text-left text-base font-semibold text-primary bg-gray-50">
                                    <?php echo esc_html($header_cell['c'] ?? ''); ?>
                                </th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <?php endif; ?>
                    <?php if (!empty($table_data['body'])) : ?>
                    <tbody>
                        <?php foreach ($table_data['body'] as $row) : ?>
                        <tr>
                            <?php foreach ($row as $cell) : ?>
                                <td class="border border-gray-300 px-4 py-3 text-base text-gray-700">
                                    <?php echo esc_html($cell['c'] ?? ''); ?>
                                </td>
                            <?php endforeach; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <?php endif; ?>
                </table>
            </div>
        <?php endif; ?>

        <?php if ($footnote) : ?>
            <div class="mt-6 text-sm text-gray-500 leading-relaxed">
                <?php echo wp_kses_post($footnote); ?>
            </div>
        <?php endif; ?>
    </div>
</section>
