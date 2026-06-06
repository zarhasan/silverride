<?php
/**
 * Template part for rendering a footer menu item.
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

if ( $has_children && $depth === 0 ) : ?>
    <nav aria-label="<?php echo esc_attr( $item->title ); ?>" class="space-y-4">
        <h2 class="text-base font-bold text-gray-900"><?php echo esc_html( $item->title ); ?></h2>
        <?php get_template_part( 'template-parts/menu-list', null, [
            'items'      => $item->children,
            'menu_class' => 'space-y-3',
            'depth'      => $depth + 1,
            'link_class' => $link_class,
            'footer'     => true,
        ] ); ?>
    </nav>

<?php else : ?>
    <li>
        <a
            href="<?php echo esc_url( $item->url ); ?>"
            class="<?php echo esc_attr( $link_class ); ?>"
            <?php echo $has_children ? ' aria-haspopup="true"' : ''; ?>
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
                'link_class' => $link_class,
                'footer'     => true,
            ] ); ?>
        <?php endif; ?>
    </li>
<?php endif; ?>
