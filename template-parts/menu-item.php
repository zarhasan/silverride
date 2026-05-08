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
$mobile = $args['mobile'] ?? false;

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
	<?php if ( $mobile && $has_children ) : ?>
		<div class="mobile-menu-item-row">
			<a
				href="<?php echo esc_url( $item->url ); ?>"
				class="flex-1 py-2 text-white text-lg font-medium no-underline hover:text-blue-200 transition-colors duration-200"
				<?php echo ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : ''; ?>
				<?php echo ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : ''; ?>
			>
				<?php echo esc_html( $item->title ); ?>
			</a>
			<button
				type="button"
				class="menu-toggle"
				aria-expanded="false"
				aria-controls="submenu-<?php echo absint( $item->ID ); ?>"
				aria-label="<?php echo esc_attr( sprintf( __( 'Toggle submenu for %s', 'silverride' ), $item->title ) ); ?>"
			>
				<span class="menu-toggle-icon" aria-hidden="true">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
				</span>
			</button>
		</div>
	<?php else : ?>
		<a
			href="<?php echo esc_url( $item->url ); ?>"
			class="<?php echo esc_attr( $link_class ); ?>"
			<?php echo ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : ''; ?>
			<?php echo ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : ''; ?>
		>
			<?php echo esc_html( $item->title ); ?>
		</a>
	<?php endif; ?>

	<?php if ( $has_children ) : ?>
		<?php
		$sub_menu_class = 'sub-menu';
		$submenu_ul_attrs = '';
		if ( $mobile ) {
			$sub_menu_class .= ' hidden';
			$submenu_ul_attrs = 'id="submenu-' . absint( $item->ID ) . '" aria-hidden="true"';
		}
		?>
		<?php get_template_part( 'template-parts/menu-list', null, [
			'items'      => $item->children,
			'menu_class' => $sub_menu_class,
			'depth'      => $depth + 1,
			'link_class' => $link_class,
			'mobile'     => $mobile,
			'ul_attrs'   => $submenu_ul_attrs,
		] ); ?>
	<?php endif; ?>
</li>
