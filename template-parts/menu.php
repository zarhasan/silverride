<?php
/**
 * Template part for rendering a WordPress navigation menu.
 *
 * Expected $args:
 * - theme_location: The menu location registered in the theme (default: 'primary').
 * - menu_class:     CSS classes for the root <ul> element (default: '').
 * - fallback_cb:    Callback function if menu doesn't exist (default: false).
 */

$theme_location = $args['theme_location'] ?? 'primary';
$menu_class     = $args['menu_class'] ?? '';
$fallback_cb    = $args['fallback_cb'] ?? false;
$link_class     = $args['link_class'] ?? '';

$locations = get_nav_menu_locations();
$menu_id   = $locations[ $theme_location ] ?? 0;

if ( ! $menu_id && $fallback_cb && is_callable( $fallback_cb ) ) {
	call_user_func( $fallback_cb );
	return;
}

if ( ! $menu_id ) {
	return;
}

$menu_items = wp_get_nav_menu_items( $menu_id );
if ( empty( $menu_items ) ) {
	return;
}

// Build a hierarchical tree from the flat array of menu items.
$build_tree = function ( $items, $parent_id = 0 ) use ( &$build_tree ) {
	$tree = [];
	foreach ( $items as $item ) {
		if ( (int) $item->menu_item_parent === $parent_id ) {
			$item->children = $build_tree( $items, $item->ID );
			$tree[]         = $item;
		}
	}
	return $tree;
};

$menu_tree = $build_tree( $menu_items );

get_template_part( 'template-parts/menu-list', null, [
	'items'      => $menu_tree,
	'menu_class' => $menu_class,
	'depth'      => 0,
	'link_class' => $link_class,
] );
