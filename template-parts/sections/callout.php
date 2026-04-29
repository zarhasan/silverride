<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>

<?php if(!empty($args)): ?>
    <section id="<?php echo !empty($args['id']) ? $args['id'] : null; ?>" class="container my-16 sm:my-24">
        <div class="callout prose !max-w-none border-2 border-primary bg-primary/10 p-6 lg:p-8 rounded-2xl">
            <?php echo wp_kses_post($args['content']); ?>
        </div>
    </section>
<?php endif; ?>
