<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$args = wp_parse_args($args, array(
    'id' => '',
    'title' => '',
    'description' => '',
    'image' => '',
    'container' => 'full',
    'disable_top_margin' => 0,
    'disable_bottom_margin' => 0,
));

$title = $args['title'];
$description = $args['description'];
$image = $args['image'];
$section_id = $args['id'] ? 'id="' . esc_attr($args['id']) . '"' : '';

$margin_top = $args['disable_top_margin'] ? '' : 'mt-16 sm:mt-24';
$margin_bottom = $args['disable_bottom_margin'] ? '' : 'mb-12';

$container = [
    'full' => 'container',
    'small' => 'max-w-5xl mx-auto px-4 md:px-6 lg:px-8',
];

$container_class = $container[$args['container'] ?? 'full'] ?? $container['full'];

$toc_items = [];
$modified_description = '';

if (!empty($description)) {
    $html = mb_convert_encoding($description, 'HTML-ENTITIES', 'UTF-8');

    $dom = new DOMDocument();
    $dom->encoding = 'UTF-8';
    libxml_use_internal_errors(true);
    @$dom->loadHTML('<?xml encoding="UTF-8">' . $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_clear_errors();

    $xpath = new DOMXPath($dom);
    $headings = $xpath->query('//h2');

    foreach ($headings as $index => $heading) {
        $text = trim($heading->textContent);
        if (!empty($text)) {
            $id = $heading->getAttribute('id');
            if (empty($id)) {
                $id = 'section-' . ($index + 1);
                $heading->setAttribute('id', $id);
            }
            $toc_items[] = [
                'text' => $text,
                'id'   => $id,
            ];
        }
    }

    $modified_description = $dom->saveHTML();
}
?>

<div <?php echo $section_id; ?> class="<?php echo esc_attr($container_class); ?> <?php echo esc_attr($margin_top); ?> <?php echo esc_attr($margin_bottom); ?>" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <?php if (!empty($title)) : ?>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
            <?php echo wp_kses_post($title); ?>
        </h2>
    <?php endif; ?>

    <?php if (!empty($image)) : ?>
        <div class="mb-8">
            <img src="<?php echo esc_url($image); ?>" alt="" class="w-full h-auto">
        </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
        <!-- Main Content -->
        <div class="lg:col-span-8">
            <?php if (!empty($modified_description)) : ?>
                <div class="prose text-lg leading-relaxed">
                    <?php echo wp_kses_post($modified_description); ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Table of Contents -->
        <?php if (!empty($toc_items)) : ?>
            <aside class="lg:col-span-4 self-start">
                <div class="lg:sticky lg:top-8 bg-gray-50 border border-gray-200 rounded-lg p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Table of Contents</h3>
                    <nav aria-label="Table of contents">
                        <ul class="space-y-3">
                            <?php foreach ($toc_items as $item) : ?>
                                <li>
                                    <a href="#<?php echo esc_attr($item['id']); ?>" class="text-sm text-gray-600 hover:text-blue-700 transition-colors">
                                        <?php echo esc_html($item['text']); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                </div>
            </aside>
        <?php endif; ?>
    </div>
</div>
