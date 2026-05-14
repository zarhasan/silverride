<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$title              = $args['title'] ?? '';
$description        = $args['description'] ?? '';
$items              = $args['items'] ?? [];
$footer_description = $args['footer_description'] ?? '';
$cta                = $args['cta'] ?? [];

// Group FAQ items by tag
$grouped = [];
foreach ($items as $item) {
    $tag = !empty($item['tag']) ? trim($item['tag']) : '';
    if (!isset($grouped[$tag])) {
        $grouped[$tag] = [];
    }
    $grouped[$tag][] = $item;
}
?>

<section class="faqs-alt my-16 md:my-24 bg-white" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="mx-auto max-w-5xl px-6">
        <?php if ($title || $description) : ?>
            <div class="text-center mb-10 md:mb-12">
                <?php if ($title) : ?>
                    <h2 class="text-3xl md:text-4xl lg:text-[2.875rem] font-bold text-[#1B1B1B] mb-6">
                        <?php echo wp_kses_post($title); ?>
                    </h2>
                <?php endif; ?>
                <?php if ($description) : ?>
                    <p class="text-lg lg:text-xl text-gray-600 leading-relaxed">
                        <?php echo wp_kses_post($description); ?>
                    </p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($grouped)) : ?>
            <div class="faqs-alt__accordion mt-8 lg:mt-12">
                <?php foreach ($grouped as $tag => $group_items) : ?>
                    <?php if ($tag !== '') : ?>
                        <h3 class="text-xl font-bold text-primary mt-8 lg:mt-12 mb-4 first:mt-0">
                            <?php echo esc_html($tag); ?>
                        </h3>
                    <?php endif; ?>

                    <div class="divide-y divide-gray-200">
                        <?php foreach ($group_items as $index => $item) :
                            $question = $item['question'] ?? '';
                            $answer   = $item['answer'] ?? '';
                            $item_id  = sanitize_title($question) . '-' . $index;
                        ?>
                            <div class="faqs-alt__item" data-faq-item>
                                <button
                                    type="button"
                                    class="faq-toggle w-full flex items-center justify-between py-5 text-left group"
                                    aria-expanded="false"
                                    aria-controls="faqs-alt-answer-<?php echo esc_attr($item_id); ?>">
                                    <span class="text-base md:text-lg lg:text-xl font-bold text-[#1B1B1B] pr-4 group-hover:text-primary transition-colors">
                                        <?php echo esc_html($question); ?>
                                    </span>
                                    <span class="faq-icon shrink-0 text-[#1B1B1B] transition-transform duration-200" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="m6 9 6 6 6-6"/>
                                        </svg>
                                    </span>
                                </button>

                                <div
                                    id="faqs-alt-answer-<?php echo esc_attr($item_id); ?>"
                                    class="faq-content overflow-hidden transition-all duration-300 ease-out max-h-0 opacity-0"
                                    aria-hidden="true"
                                >
                                    <?php if (!empty($answer)) : ?>
                                        <div class="prose text-base text-gray-700 leading-relaxed pb-5">
                                            <?php echo wp_kses_post($answer); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($footer_description)) : ?>
            <div class="text-center mt-12 text-lg text-gray-600 leading-relaxed">
                <?php echo wp_kses_post($footer_description); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($cta) && !empty($cta['url'])) : ?>
            <div class="text-center mt-8">
                <a href="<?php echo esc_url($cta['url']); ?>" target="<?php echo !empty($cta['target']) ? esc_attr($cta['target']) : '_self'; ?>" class="btn btn--primary">
                    <?php echo esc_html($cta['title'] ?? 'Learn More'); ?>
                </a>
            </div>
        <?php endif; ?>

    </div>
</section>
