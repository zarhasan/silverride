<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$items = $args['items'] ?? [];
$footer_description = $args['footer_description'] ?? '';
$cta = $args['cta'] ?? [];
?>

<section class="bg-white my-16 md:my-24">
    <div class="mx-auto max-w-5xl px-6">
        <?php if ($title) : ?>
            <h2 class="text-center text-3xl font-bold text-black md:text-4xl lg:text-[2.875rem]">
                <?php echo esc_html($title); ?>
            </h2>
        <?php endif; ?>

        <?php if (!empty($description)) : ?>
            <div class="mt-4 text-center text-lg text-gray-600 leading-relaxed">
                <?php echo wp_kses_post($description); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($items)) : ?>
        <div class="mt-12 md:mt-16">
            <?php foreach ($items as $index => $faq) :
                $faq_question = $faq['question'] ?? '';
                $faq_answer = $faq['answer'] ?? '';
                $faq_id = 'faq-' . $index;
            ?>
            <div class="border-b border-gray-300" data-faq-item>
                <h3 class="text-lg font-bold text-black md:text-[1.375rem]">
                    <button
                        type="button"
                        class="font-bold faq-toggle text-lg lg:text-[1.375rem] flex w-full items-center justify-between py-6 text-left transition-colors duration-200 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                        aria-expanded="false"
                        aria-controls="<?php echo esc_attr($faq_id); ?>"
                    >
                        <span><?php echo esc_html($faq_question); ?></span>
                        <span class="faq-icon ml-4 shrink-0 transition-transform duration-300" aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6"><path d="m6 9 6 6 6-6"/></svg>
                        </span>
                    </button>
                </h3>

                <div
                    id="<?php echo esc_attr($faq_id); ?>"
                    class="faq-content overflow-hidden transition-all duration-300 ease-out max-h-0 opacity-0"
                    aria-hidden="true"
                >
                    <?php if (!empty($faq_answer)) : ?>
                    <div class="prose pb-6 text-base leading-relaxed font-normal lg:text-lg">
                        <?php echo wp_kses_post($faq_answer); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($footer_description)) : ?>
        <div class="mt-12 text-center text-lg text-gray-600 leading-relaxed">
            <?php echo wp_kses_post($footer_description); ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($cta) && !empty($cta['url'])) : ?>
        <div class="mt-8 text-center">
            <a href="<?php echo esc_url($cta['url']); ?>" class="btn btn-primary">
                <?php echo esc_html($cta['title'] ?? 'Learn More'); ?>
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>
