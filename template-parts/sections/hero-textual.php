<?php
if (!defined('ABSPATH')) {
    exit;
}

$title = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$links = $args['links'] ?? [];
$cta = !empty($links) ? ($links[0]['link'] ?? []) : [];
?>
<div class="container my-12 lg:mt-20 lg:-mb-16">
    <?php if ($title) : ?>
    <h1 class="text-4xl lg:text-[2.875rem] font-bold text-gray-900 mb-8">
        <?php echo esc_html($title); ?>
    </h1>
    <?php endif; ?>

    <?php if (!empty($cta) && !empty($cta['url'])) : ?>
    <a href="<?php echo esc_url($cta['url']); ?>" class="btn btn-primary mb-8">
        <?php echo esc_html($cta['title'] ?? ''); ?>
    </a>
    <?php endif; ?>

    <?php if ($subtitle) : ?>
    <h2 class="text-[1.625rem] font-bold text-gray-900 mb-4">
        <?php echo esc_html($subtitle); ?>
    </h2>
    <?php endif; ?>

    <div class="flex flex-wrap gap-x-3 gap-y-2 text-sm text-primary mb-12" role="list">
            <span role="listitem">
                <a href="#arizona" class="hover:text-primary hover:underline transition-colors">AZ</a>
                <span class="text-gray-400">&middot;</span>
            </span>
            <span role="listitem">
                <a href="#california" class="hover:text-primary hover:underline transition-colors">CA</a>
                <span class="text-gray-400">&middot;</span>
            </span>
            <span role="listitem">
                <a href="#florida" class="hover:text-primary hover:underline transition-colors">FL</a>
                <span class="text-gray-400">&middot;</span>
            </span>
            <span role="listitem">
                <a href="#georgia" class="hover:text-primary hover:underline transition-colors">GA</a>
                <span class="text-gray-400">&middot;</span>
            </span>
            <span role="listitem">
                <a href="#kentucky" class="hover:text-primary hover:underline transition-colors">KY</a>
                <span class="text-gray-400">&middot;</span>
            </span>
            <span role="listitem">
                <a href="#massachusetts" class="hover:text-primary hover:underline transition-colors">MA</a>
                <span class="text-gray-400">&middot;</span>
            </span>
            <span role="listitem">
                <a href="#maryland" class="hover:text-primary hover:underline transition-colors">MD</a>
                <span class="text-gray-400">&middot;</span>
            </span>
            <span role="listitem">
                <a href="#nevada" class="hover:text-primary hover:underline transition-colors">NV</a>
                <span class="text-gray-400">&middot;</span>
            </span>
            <span role="listitem">
                <a href="#new-jersey" class="hover:text-primary hover:underline transition-colors">NJ</a>
                <span class="text-gray-400">&middot;</span>
            </span>
            <span role="listitem">
                <a href="#new-mexico" class="hover:text-primary hover:underline transition-colors">NM</a>
                <span class="text-gray-400">&middot;</span>
            </span>
            <span role="listitem">
                <a href="#pennsylvania" class="hover:text-primary hover:underline transition-colors">PA</a>
                <span class="text-gray-400">&middot;</span>
            </span>
            <span role="listitem">
                <a href="#texas" class="hover:text-primary hover:underline transition-colors">TX</a>
                <span class="text-gray-400">&middot;</span>
            </span>
            <span role="listitem"> 
                <a href="#virginia" class="hover:text-primary hover:underline transition-colors">VA</a>
                <span class="text-gray-400">&middot;</span>
            </span>
            <span role="listitem">
                <a href="#washington" class="hover:text-primary hover:underline transition-colors">WA</a>
            </span>
        </div>
</div>
