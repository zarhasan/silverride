<?php
/**
 * Template part for rendering a single menu item (<li>).
 *
 * Expected $args:
 * - item:  Menu item object (may have a ->children property).
 * - depth: Current nesting depth (default: 0).
 */

$item = $args['item'] ?? null;
$depth = $args['depth'] ?? 0;
$link_class = $args['link_class'] ?? '';

if ( ! $item ) {
	return;
}

$has_children = ! empty( $item->children );
$classes      = is_array( $item->classes ) ? array_filter( $item->classes ) : [];

$current_id = get_queried_object_id();

// Current page detection using path comparison (handles trailing slash differences).
if ( ! empty( $item->url ) ) {
	global $wp;
	$current_path = trailingslashit( wp_parse_url( home_url( $wp->request ), PHP_URL_PATH ) ?: '/' );
	$item_path    = trailingslashit( wp_parse_url( $item->url, PHP_URL_PATH ) ?: '' );

	if ( $item_path && $current_path === $item_path ) {
		$classes[] = 'current-menu-item';
	} elseif ( $current_id && ! empty( $item->object_id ) && $item->object === 'page' ) {
		$ancestors = get_post_ancestors( $current_id );
		if ( in_array( (int) $item->object_id, $ancestors, true ) ) {
			$classes[] = 'current-menu-ancestor';
		}
	}
}

if ( $has_children ) {
	$classes[] = 'menu-item-has-children';
}

$classes[] = 'menu-item-depth-' . absint( $depth );
?>
<li class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
    <a
        href="<?php echo esc_url( $item->url ); ?>"
        class="<?php echo esc_attr( $link_class ); ?>"
        <?php echo ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : ''; ?>
        <?php echo ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : ''; ?>
    >
        <?php echo esc_html( $item->title ); ?>
    </a>

	<?php if ( $has_children ) : ?>
		<?php get_template_part( 'template-parts/menu-list', null, [
			'items'      => $item->children,
			'menu_class' => 'sub-menu',
			'depth'      => $depth + 1,
		] ); ?>
	<?php endif; ?>
</li>
