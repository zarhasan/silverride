<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$overline = $args['overline'] ?? '';
$title = $args['title'] ?? '';
$tag = $args['tag'] ?? '';
$challenge = $args['challenge'] ?? '';
$approach_text = $args['approach_text'] ?? '';
$implementation = $args['implementation'] ?? '';
$industry = $args['industry'] ?? '';
$location = $args['location'] ?? '';
$compliance = $args['compliance'] ?? '';
$timeline = $args['timeline'] ?? '';
$key_result = $args['key_result'] ?? '';
$results_items = $args['results_items'] ?? '';
?>

<section class="my-16 md:my-24 bg-white" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container">
        <div class="max-w-5xl mx-auto">
            <?php if ($overline) : ?>
            <p class="text-sm font-semibold uppercase tracking-wider mb-3" style="color: var(--theme-primary);">
                <?php echo esc_html($overline); ?>
            </p>
            <?php endif; ?>

            <?php if ($title) : ?>
            <h2 class="text-3xl md:text-[2.5rem] font-semibold !leading-tight mb-4 text-[#1B1B1B] max-w-4xl">
                <?php echo wp_kses_post($title); ?>
            </h2>
            <?php endif; ?>

            <?php if ($tag) : ?>
            <span class="inline-block px-4 py-1 rounded-full text-sm font-medium mb-12 border" style="color: var(--theme-primary); border-color: var(--theme-primary); background-color: #FFF1F2;">
                <?php echo esc_html($tag); ?>
            </span>
            <?php endif; ?>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 lg:gap-16">
                <div class="lg:col-span-2 space-y-12">
                    <?php if ($challenge) : ?>
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-lg flex items-center justify-center bg-rose-50" style="color: var(--theme-primary);">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-[#1B1B1B]">Client Challenge</h3>
                        </div>
                        <div class="prose text-lg text-[#1B1B1B] leading-relaxed">
                            <?php echo wp_kses_post($challenge); ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if ($approach_text) : ?>
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-lg flex items-center justify-center bg-rose-50" style="color: var(--theme-primary);">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-[#1B1B1B]">Our Approach</h3>
                        </div>
                        <?php if ($approach_text) : ?>
                        <div class="prose text-lg text-[#1B1B1B] leading-relaxed mb-4">
                            <?php echo wp_kses_post($approach_text); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>

                    <?php if ($implementation) : ?>
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-lg flex items-center justify-center bg-rose-50" style="color: var(--theme-primary);">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-[#1B1B1B]">Implementation</h3>
                        </div>
                        <div class="prose text-lg text-[#1B1B1B] leading-relaxed">
                            <?php echo wp_kses_post($implementation); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="lg:col-span-1">
                    <div class="lg:sticky lg:top-24 bg-[#F8F9FA] rounded-2xl p-8 border border-gray-100">
                        <h4 class="text-lg font-semibold text-[#1B1B1B] mb-6 pb-4 border-b border-gray-200">Project Snapshot</h4>
                        <div class="space-y-5">
                            <?php if ($industry) : ?>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Industry</p>
                                <p class="text-base font-medium text-[#1B1B1B]"><?php echo esc_html($industry); ?></p>
                            </div>
                            <?php endif; ?>
                            <?php if ($location) : ?>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Location</p>
                                <p class="text-base font-medium text-[#1B1B1B]"><?php echo esc_html($location); ?></p>
                            </div>
                            <?php endif; ?>
                            <?php if ($compliance) : ?>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Compliance Standard</p>
                                <p class="text-base font-medium text-[#1B1B1B]"><?php echo esc_html($compliance); ?></p>
                            </div>
                            <?php endif; ?>
                            <?php if ($timeline) : ?>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Timeline</p>
                                <p class="text-base font-medium text-[#1B1B1B]"><?php echo esc_html($timeline); ?></p>
                            </div>
                            <?php endif; ?>
                            <?php if ($key_result) : ?>
                            <div class="pt-4 border-t border-gray-200">
                                <p class="text-sm text-gray-500 mb-1">Key Result</p>
                                <p class="text-base font-semibold" style="color: var(--theme-primary);"><?php echo esc_html($key_result); ?></p>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (!empty($results_items)) : ?>
            <div class="mt-16 bg-alternate-bg rounded-2xl p-8 md:p-12 border border-primary">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center bg-white" style="color: var(--theme-primary);">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold text-[#1B1B1B]">Results</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-5">
                    <?php foreach ($results_items as $item) : ?>
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 flex-shrink-0 mt-0.5" style="color: var(--theme-primary);" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-lg text-[#1B1B1B]"><?php echo wp_kses_post($item['item'] ?? ''); ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>