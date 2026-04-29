<?php
/**
 * Template part for rendering a menu list (<ul>).
 *
 * Expected $args:
 * - items:      Array of menu item objects (each may have a ->children property).
 * - menu_class: CSS classes for the <ul> element (default: '').
 * - depth:      Current nesting depth (default: 0).
 */

$items      = $args['items'] ?? [];
$menu_class = $args['menu_class'] ?? '';
$depth      = $args['depth'] ?? 0;

if ( empty( $items ) ) {
	return;
}
?>
<ul class="<?php echo esc_attr( $menu_class ); ?>" role="list">
	<?php foreach ( $items as $item ) : ?>
		<?php get_template_part( 'template-parts/menu-item', null, [
			'item' => $item,
			'depth' => $depth,
		] ); ?>
	<?php endforeach; ?>
</ul>
