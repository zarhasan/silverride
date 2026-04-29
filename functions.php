<?php
/**
 * AccessibleMinds functions and definitions
 *
 * @package AccessibleMinds
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/json-importer.php';

if(function_exists('get_field')) {
    require_once get_template_directory() . '/inc/acf.php';
}

define('SILVERRIDE_VERSION', '__VERSION__');
define('SILVERRIDE_THEME_DIR', get_template_directory());
define('SILVERRIDE_THEME_URI', get_template_directory_uri());

function silverride_get_theme_color($color_name, $default = '') {
    if (function_exists('get_field')) {
        $color = get_field($color_name, 'option');
        if ($color) {
            return $color;
        }
    }
    return $default;
}

function silverride_primary_color($echo = false) {
    $color = silverride_get_theme_color('primary_color', '#C41E3A');
    if ($echo) {
        echo $color;
    }
    return $color;
}

function silverride_secondary_color($echo = false) {
    $color = silverride_get_theme_color('secondary_color', '#F26522');
    if ($echo) {
        echo $color;
    }
    return $color;
}

function silverride_alternate_bg_color($echo = false) {
    $color = silverride_get_theme_color('alternate_bg_color', '#FCF3F5');
    if ($echo) {
        echo $color;
    }
    return $color;
}

function silverride_output_custom_colors() {
    $primary_color = silverride_get_theme_color('primary_color', '#C41E3A');
    $secondary_color = silverride_get_theme_color('secondary_color', '#F26522');
    $alternate_bg_color = silverride_get_theme_color('alternate_bg_color', '#FCF3F5');

    $primary_rgb = sscanf($primary_color, '#%02x%02x%02x');
    $primary_rgb_str = implode(',', $primary_rgb);

    ?>
    <style>
        :root {
            --theme-primary: <?php echo esc_html($primary_color); ?>;
            --theme-primary-rgb: <?php echo esc_html($primary_rgb_str); ?>;
            --theme-secondary: <?php echo esc_html($secondary_color); ?>;
            --theme-alternate-bg: <?php echo esc_html($alternate_bg_color); ?>;
        }
    </style>
    <script>
        window.themeColors = {
            primary: '<?php echo esc_js($primary_color); ?>',
            secondary: '<?php echo esc_js($secondary_color); ?>',
            alternateBg: '<?php echo esc_js($alternate_bg_color); ?>',
            primaryRgb: [<?php echo esc_js($primary_rgb_str); ?>]
        };
    </script>
    <?php
}
add_action('wp_head', 'silverride_output_custom_colors', 100);


// ACF JSON save/load path
add_filter("acf/settings/save_json", function( $path ) {
    return get_template_directory() . '/acf-json';
});

add_filter('acf/settings/load_json', function( $paths ) {
    unset($paths[0]);

    $paths[] = get_template_directory() . '/acf-json';
    
    return $paths;
});


add_filter('excerpt_length', function($length) {
    return 14;
}, 999 );


/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function silverride_setup()
{

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');

    // Register navigation menus.
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'silverride'),
        'footer' => esc_html__('Footer Menu', 'silverride'),
        'company_locations' => esc_html__('Company Locations', 'silverride'),
    ));

    // Switch default core markup to output valid HTML5.
    add_theme_support('html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add support for core custom logo.
    add_theme_support('custom-logo', array(
        'height' => 250,
        'width' => 250,
        'flex-width' => true,
        'flex-height' => true,
    ));
}
add_action('after_setup_theme', 'silverride_setup');

function silverride_register_team_post_type() {
    $labels = array(
        'name' => __('Team Members', 'silverride'),
        'singular_name' => __('Team Member', 'silverride'),
        'menu_name' => __('Team', 'silverride'),
        'name_admin_bar' => __('Team Member', 'silverride'),
        'add_new' => __('Add New', 'silverride'),
        'add_new_item' => __('Add New Team Member', 'silverride'),
        'edit_item' => __('Edit Team Member', 'silverride'),
        'new_item' => __('New Team Member', 'silverride'),
        'view_item' => __('View Team Member', 'silverride'),
        'search_items' => __('Search Team Members', 'silverride'),
        'not_found' => __('No team members found', 'silverride'),
        'not_found_in_trash' => __('No team members found in trash', 'silverride'),
    );

    $args = array(
        'label' => __('Team Members', 'silverride'),
        'description' => __('Team member profiles', 'silverride'),
        'labels' => $labels,
        'supports' => array('title', 'thumbnail', 'excerpt'),
        'public' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-groups',
        'has_archive' => false,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'team'),
    );

    register_post_type('team_member', $args);
}
add_action('init', 'silverride_register_team_post_type');

/**
 * Enqueue scripts and styles.
 */
function silverride_scripts()
{
    wp_enqueue_style('dashicons');
    wp_enqueue_script('twind', SILVERRIDE_THEME_URI . '/js/twind.min.js', array(), SILVERRIDE_VERSION, false);
    wp_enqueue_script('cash', SILVERRIDE_THEME_URI . '/js/cash.min.js', array(), SILVERRIDE_VERSION, true);
    wp_enqueue_script('cash-utils', SILVERRIDE_THEME_URI . '/js/cash.utils.js', array(), SILVERRIDE_VERSION, true);
    wp_enqueue_script('embla-carousel', SILVERRIDE_THEME_URI . '/js/embla-carousel.umd.js', array(), '8.6.0', true);
    wp_enqueue_script('embla-autoplay', SILVERRIDE_THEME_URI . '/js/embla-carousel-autoplay.umd.js', array('embla-carousel'), '8.6.0', true);
    wp_enqueue_script('main', SILVERRIDE_THEME_URI . '/js/main.js', array('cash', 'embla-carousel', 'embla-autoplay'), SILVERRIDE_VERSION, true);
    wp_enqueue_style('prose', SILVERRIDE_THEME_URI . '/css/prose.css', array(), SILVERRIDE_VERSION, 'all');

    $load_after = array();

    if (class_exists('LearnPress')) {
        $load_after[] = 'learnpress';
        $load_after[] = 'learnpress-widgets';
    }

    wp_enqueue_style('style', SILVERRIDE_THEME_URI . '/css/style.css', $load_after, SILVERRIDE_VERSION, 'all');
    
    wp_add_inline_script('twind', file_get_contents(get_template_directory() . '/js/head.js'), "after");
}
add_action('wp_enqueue_scripts', 'silverride_scripts');

/**
 * Add async/defer attributes to scripts
 */
function silverride_script_loader_tag($tag, $handle, $src)
{
    if ('silverride-script' === $handle) {
        return str_replace('<script', '<script defer', $tag);
    }
    return $tag;
}
add_filter('script_loader_tag', 'silverride_script_loader_tag', 10, 3);


/**
 * Load theme textdomain for translations.
 */
function silverride_load_textdomain()
{
    load_theme_textdomain('silverride', SILVERRIDE_THEME_DIR . '/languages');
}
add_action('after_setup_theme', 'silverride_load_textdomain');

/**
 * Add custom fields to menu items for icons and descriptions
 */
class AccessibleMinds_Menu_Custom_Fields
{

    public function __construct()
    {
        add_action('wp_nav_menu_item_custom_fields', array($this, 'add_custom_fields'), 10, 4);
        add_action('wp_update_nav_menu_item', array($this, 'save_custom_fields'), 10, 3);
        add_filter('wp_setup_nav_menu_item', array($this, 'add_custom_fields_to_menu_item'));
    }

    /**
     * Add custom fields to menu item form
     */
    public function add_custom_fields($item_id, $item, $depth, $args)
    {
        $icon_class = get_post_meta($item_id, '_menu_item_icon_class', true);
        $description = get_post_meta($item_id, '_menu_item_description', true);
        $is_mega_menu = get_post_meta($item_id, '_menu_item_mega_menu', true);
        ?>
        <p class="field-icon-class description description-wide">
            <label for="edit-menu-item-icon-class-<?php echo $item_id; ?>">
                <?php _e('Icon CSS Class'); ?><br />
                <input type="text" id="edit-menu-item-icon-class-<?php echo $item_id; ?>" class="widefat code edit-menu-item-icon-class" name="menu-item-icon-class[<?php echo $item_id; ?>]" value="<?php echo esc_attr($icon_class); ?>" />
                <small><?php _e('e.g., fas fa-home or custom-icon-class'); ?></small>
            </label>
        </p>
        <p class="field-description description description-wide">
            <label for="edit-menu-item-description-<?php echo $item_id; ?>">
                <?php _e('Description'); ?><br />
                <textarea id="edit-menu-item-description-<?php echo $item_id; ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo $item_id; ?>]"><?php echo esc_html($description); ?></textarea>
                <small><?php _e('Optional description for mega menu items'); ?></small>
            </label>
        </p>
        <p class="field-mega-menu description description-wide">
            <label for="edit-menu-item-mega-menu-<?php echo $item_id; ?>">
                <input type="checkbox" id="edit-menu-item-mega-menu-<?php echo $item_id; ?>" value="1" name="menu-item-mega-menu[<?php echo $item_id; ?>]" <?php checked($is_mega_menu, 1); ?> />
                <?php _e('Enable Mega Menu'); ?>
                <small><?php _e('Check this to enable mega menu for this top-level item'); ?></small>
            </label>
        </p>
        <?php
    }

    /**
     * Save custom field values
     */
    public function save_custom_fields($menu_id, $menu_item_db_id, $args)
    {
        if (isset($_REQUEST['menu-item-icon-class'][$menu_item_db_id])) {
            $icon_value = sanitize_text_field($_REQUEST['menu-item-icon-class'][$menu_item_db_id]);
            update_post_meta($menu_item_db_id, '_menu_item_icon_class', $icon_value);
        }

        if (isset($_REQUEST['menu-item-description'][$menu_item_db_id])) {
            $description_value = sanitize_textarea_field($_REQUEST['menu-item-description'][$menu_item_db_id]);
            update_post_meta($menu_item_db_id, '_menu_item_description', $description_value);
        }

        $mega_menu_value = isset($_REQUEST['menu-item-mega-menu'][$menu_item_db_id]) ? 1 : 0;
        update_post_meta($menu_item_db_id, '_menu_item_mega_menu', $mega_menu_value);
    }

    /**
     * Add custom field values to menu item object
     */
    public function add_custom_fields_to_menu_item($menu_item)
    {
        $menu_item->icon_class = get_post_meta($menu_item->ID, '_menu_item_icon_class', true);
        $menu_item->description = get_post_meta($menu_item->ID, '_menu_item_description', true);
        $menu_item->is_mega_menu = get_post_meta($menu_item->ID, '_menu_item_mega_menu', true);
        return $menu_item;
    }
}

new AccessibleMinds_Menu_Custom_Fields();

/**
 * Smart Custom Fields Setup for Theme Options
 */
function silverride_setup_scf()
{
    // Register theme options page
    if (function_exists('SCF')) {
        add_action('admin_menu', 'silverride_add_theme_options_page');
        add_action('init', 'silverride_register_scf_mega_menu');
    }
}
add_action('after_setup_theme', 'silverride_setup_scf');

/**
 * Add theme options page
 */
function silverride_add_theme_options_page()
{
    add_theme_page(
        'Mega Menu Settings',
        'Mega Menu',
        'manage_options',
        'mega-menu-settings',
        'silverride_mega_menu_settings_page'
    );
}

/**
 * Theme options page callback
 */
function silverride_mega_menu_settings_page()
{
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('mega_menu_options');
            do_settings_sections('mega_menu_options');

            // SCF will automatically handle the form fields
            if (function_exists('SCF')) {
                SCF::the_field('mega_menu_sections', 'option');
            }

            submit_button();
            ?>
        </form>
    </div>
    <?php
}

/**
 * Register SCF fields for mega menu
 */
function silverride_register_scf_mega_menu()
{
    if (!function_exists('SCF')) {
        return;
    }

    SCF::add_setting('mega-menu-options', 'Mega Menu Options');
    SCF::add_options_page('mega-menu-options', 'Mega Menu', 'manage_options', 'mega-menu-settings');

    // Main mega menu sections repeater
    SCF::add_field('mega-menu-options', 'group', array(
        'name' => 'mega_menu_sections',
        'label' => 'Mega Menu Sections',
        'type' => 'group',
        'group-name' => 'mega_menu_section',
        'group-label' => 'Menu Section',
        'fields' => array(
            array(
                'name' => 'section_title',
                'label' => 'Section Title',
                'type' => 'text',
                'required' => true,
                'default' => '',
                'instruction' => 'Main navigation label (e.g., "Products", "Solutions", "Resources")'
            ),
            array(
                'name' => 'section_url',
                'label' => 'Section URL',
                'type' => 'text',
                'default' => '#',
                'instruction' => 'URL for the main section link'
            ),
            array(
                'name' => 'section_icon',
                'label' => 'Section Icon Class',
                'type' => 'text',
                'default' => '',
                'instruction' => 'Font Awesome icon class (e.g., "fas fa-cog")'
            ),
            array(
                'name' => 'section_columns',
                'label' => 'Columns',
                'type' => 'group',
                'group-name' => 'column',
                'group-label' => 'Column',
                'fields' => array(
                    array(
                        'name' => 'column_title',
                        'label' => 'Column Title',
                        'type' => 'text',
                        'required' => true,
                        'instruction' => 'Column header (e.g., "Core Platform", "Add-ons & Integrations")'
                    ),
                    array(
                        'name' => 'column_color',
                        'label' => 'Column Color',
                        'type' => 'select',
                        'choices' => array(
                            'purple' => 'Purple',
                            'blue' => 'Blue',
                            'green' => 'Green'
                        ),
                        'default' => 'purple',
                        'instruction' => 'Theme color for this column'
                    ),
                    array(
                        'name' => 'column_items',
                        'label' => 'Column Items',
                        'type' => 'group',
                        'group-name' => 'item',
                        'group-label' => 'Menu Item',
                        'fields' => array(
                            array(
                                'name' => 'item_title',
                                'label' => 'Item Title',
                                'type' => 'text',
                                'required' => true,
                                'instruction' => 'Menu item title'
                            ),
                            array(
                                'name' => 'item_description',
                                'label' => 'Item Description',
                                'type' => 'textarea',
                                'rows' => 2,
                                'instruction' => 'Short description of the item'
                            ),
                            array(
                                'name' => 'item_url',
                                'label' => 'Item URL',
                                'type' => 'text',
                                'required' => true,
                                'instruction' => 'Link URL for this item'
                            ),
                            array(
                                'name' => 'item_icon',
                                'label' => 'Item Icon Class',
                                'type' => 'text',
                                'instruction' => 'Font Awesome icon class'
                            )
                        )
                    )
                )
            )
        )
    ));
}

/**
 * Get mega menu sections from SCF
 */
function silverride_get_mega_menu_sections()
{
    if (!function_exists('SCF')) {
        return array();
    }

    $sections = SCF::get_option_meta('mega_menu_sections');
    return is_array($sections) ? $sections : array();
}

add_filter('use_block_editor_for_post', function( $use_block_editor, $post ) {
    if ( ! $post ) {
        return $use_block_editor;
    }

    // Change this to the template filename you want to check.
    
    $disabled_templates = array(
        'page-templates/home.php',
        'page-templates/service.php',
        'page-templates/services.php',
        'page-templates/contact.php',
        'page-templates/flexible.php',
        'page-templates/form.php',
    );

    // Get the page template of the current post
    $template = get_page_template_slug( $post );

    if ( in_array( $template, $disabled_templates, true ) ) {
        return false; // Disable Gutenberg for these templates
    }

    return $use_block_editor;
}, 10, 2 );

/**
 * Render SCF-based mega menu
 */
function silverride_render_scf_mega_menu()
{
    $sections = silverride_get_mega_menu_sections();

    if (empty($sections)) {
        return;
    }

    echo '<nav class="mega-menu-nav" role="navigation" aria-label="Main Navigation">';
    echo '<ul class="mega-menu-list flex items-center space-x-0">';

    foreach ($sections as $section) {
        $section_title = isset($section['section_title']) ? $section['section_title'] : '';
        $section_url = isset($section['section_url']) ? $section['section_url'] : '#';
        $section_icon = isset($section['section_icon']) ? $section['section_icon'] : '';
        $columns = isset($section['section_columns']) ? $section['section_columns'] : array();

        if (!$section_title)
            continue;

        echo '<li class="mega-menu-item relative group has-mega-menu">';
        echo '<a href="' . esc_url($section_url) . '" class="flex items-center px-4 py-6 text-gray-700 hover:text-primary-600 font-medium transition-colors duration-200 group-hover:text-primary-600">';

        if ($section_icon) {
            echo '<i class="' . esc_attr($section_icon) . ' mr-2"></i>';
        }

        echo esc_html($section_title);
        echo '<svg class="ml-2 h-4 w-4 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>';
        echo '</a>';

        // Render mega menu dropdown
        if (!empty($columns)) {
            echo '<div class="mega-menu-dropdown absolute left-0 top-full w-screen max-w-6xl bg-white shadow-xl border-t-2 border-primary-500 opacity-0 invisible transform -translate-y-2 transition-all duration-300 z-50 rounded-b-lg">';
            echo '<div class="mega-menu-content p-8">';
            echo '<div class="grid grid-cols-1 md:grid-cols-' . min(count($columns), 3) . ' gap-8">';

            foreach ($columns as $column) {
                $column_title = isset($column['column_title']) ? $column['column_title'] : '';
                $column_color = isset($column['column_color']) ? $column['column_color'] : 'purple';
                $items = isset($column['column_items']) ? $column['column_items'] : array();

                if (!$column_title)
                    continue;

                echo '<div class="mega-menu-section">';
                echo '<h3 class="text-sm font-semibold text-primary-600 uppercase tracking-wide mb-4 border-b border-gray-200 pb-2 column-' . esc_attr($column_color) . '">';
                echo esc_html($column_title);
                echo '</h3>';

                if (!empty($items)) {
                    echo '<ul class="mega-menu-section-items space-y-3">';

                    foreach ($items as $item) {
                        $item_title = isset($item['item_title']) ? $item['item_title'] : '';
                        $item_description = isset($item['item_description']) ? $item['item_description'] : '';
                        $item_url = isset($item['item_url']) ? $item['item_url'] : '#';
                        $item_icon = isset($item['item_icon']) ? $item['item_icon'] : '';

                        if (!$item_title)
                            continue;

                        echo '<li>';
                        echo '<a href="' . esc_url($item_url) . '" class="group flex items-start p-3 rounded-lg hover:bg-[#F9F9F9] transition-colors duration-200">';

                        if ($item_icon) {
                            echo '<div class="flex-shrink-0 mr-3 mt-1">';
                            echo '<i class="' . esc_attr($item_icon) . ' text-primary-500 text-lg"></i>';
                            echo '</div>';
                        }

                        echo '<div>';
                        echo '<div class="text-sm font-medium text-[#1B1B1B] group-hover:text-primary-600">' . esc_html($item_title) . '</div>';

                        if ($item_description) {
                            echo '<div class="text-xs text-gray-500 mt-1">' . esc_html($item_description) . '</div>';
                        }

                        echo '</div>';
                        echo '</a>';
                        echo '</li>';
                    }

                    echo '</ul>';
                }

                echo '</div>';
            }

            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        echo '</li>';
    }

    echo '</ul>';
    echo '</nav>';
}

add_action('tgmpa_register', 'amwordpress_register_required_plugins');

function amwordpress_register_required_plugins() {
    $plugins = array(
        array(
            'name'      => 'Secure Custom Fields',
            'slug'      => 'secure-custom-fields',
            'required'  => false,
        ),
        array(
            'name'      => 'Table Field Add-on for SCF',
            'slug'      => 'advanced-custom-fields-table-field',
            'required'  => false,
        )
    );

    $config = array(
        'id'           => 'amwordpress', // Unique ID for TGMPA
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins', // Menu slug
        'parent_slug'  => 'themes.php',
        'capability'   => 'edit_theme_options',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '', // Customize the dismissal message
        'is_automatic' => true,
        'message'      => '', // Customize the notice message
    );

    tgmpa($plugins, $config);
}

function get_template_part_as_string( $slug, $name = null, $args = [] ) {
    ob_start();
    get_template_part( $slug, $name, $args );
    return ob_get_clean();
}


class AM_Nav_Walker extends Walker_Nav_Menu {
    private $parent_has_hash = false;

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));

        $this->parent_has_hash = ($depth === 0 && !empty($item->url) && $item->url === '#');

        $is_current_archive = false;
        if (is_archive() && !empty($item->url)) {
            $current_url = untrailingslashit(remove_query_arg('paged', esc_url(home_url($GLOBALS['wp']->request))));
            $item_url = untrailingslashit(remove_query_arg('paged', $item->url));
            if ($current_url === $item_url) {
                $is_current_archive = true;
            }
        }

        if ($is_current_archive) {
            $class_names .= ' current-archive';
        }

        $output .= '<li class="' . esc_attr($class_names) . '">';

        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target)     ? $item->target     : '';
        $atts['rel']    = !empty($item->xfn)        ? $item->xfn        : '';
        $atts['href']   = !empty($item->url)        ? $item->url        : '';

        if ($is_current_archive) {
            $atts['aria-current'] = 'page';
        }

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $icon_svg = '';
        $description = '';
        if (function_exists('get_field')) {
            $icon = get_field('icon', $item->ID); // Retrieve icon field
            $description = get_field('description', $item->ID); // Retrieve description field
            if (!empty($icon)) {
                $icon_svg = get_template_part_as_string('template-parts/acf-icon', null, array('icon' => $icon));
            }
        }

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= '<span class="text-primary text-base lg:text-xl inline-flex justify-center items-center">'.$icon_svg.'</span>'; // Render icon before text
        $item_output .= '<div class="flex flex-col">';
        $item_output .= '<span class="font-semibold text-[#1B1B1B]">'.$args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after.'</span>';
        if ($description) {
            $item_output .= '<span class="menu-item-description text-sm">' . esc_html($description) . '</span>';
        }
        $item_output .= '</div>';
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    function start_lvl(&$output, $depth = 0, $args = null) {
        if ($this->parent_has_hash) {
            $output .= '<button class="menu-toggle w-6" aria-expanded="false" aria-label="">';
            $output .= '<span class="menu-toggle-icon" aria-hidden="true"><i class="fa-solid fa-chevron-down"></i></span>';
            $output .= '</button>';
        }
        
        $output .= '<ul class="sub-menu">';
    }
}

/**
 * Custom Mega Menu Walker
 */
class AccessibleMinds_Mega_Menu_Walker extends Walker_Nav_Menu
{

    // Track current mega menu parent
    private $mega_menu_parent = null;
    private $mega_menu_columns = array();

    /**
     * Starts the list of after the elements are added.
     */
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        if ($depth === 0) {
            // This is a top-level submenu (mega menu)
            $output .= '<div class="mega-menu-dropdown absolute left-0 top-full w-screen max-w-6xl bg-white shadow-xl border-t-2 border-primary-500 opacity-0 invisible transform -translate-y-2 transition-all duration-300 z-50 rounded-b-lg">';
            $output .= '<div class="mega-menu-content p-8">';
            $output .= '<div class="grid grid-cols-1 md:grid-cols-3 gap-8">';
        } else {
            // Regular submenu
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<ul class=\"mega-menu-section-items space-y-3 mt-4\">\n";
        }
    }

    /**
     * Ends the list of after the elements are added.
     */
    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        if ($depth === 0) {
            $output .= '</div></div></div>';
        } else {
            $indent = str_repeat("\t", $depth);
            $output .= "$indent</ul>\n";
        }
    }

    /**
     * Starts the element output.
     */
    public function start_el(&$output, $data_object, $depth = 0, $args = null, $current_object_id = 0)
    {
        $item = $data_object;
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // Add mega menu class if enabled
        if ($depth === 0 && $item->is_mega_menu) {
            $classes[] = 'has-mega-menu';
            $this->mega_menu_parent = $item->ID;
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));

        if ($depth === 0) {
            // Top-level menu items
            $class_names .= ' relative group';
            $output .= $indent . '<li class="' . esc_attr($class_names) . '">';

            $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
            $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
            $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
            $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

            $item_output = '<a' . $attributes . ' class="flex items-center px-4 py-6 text-gray-700 hover:text-primary-600 font-medium transition-colors duration-200 group-hover:text-primary-600">';

            // Add icon if available
            if (!empty($item->icon_class)) {
                $item_output .= '<i class="' . esc_attr($item->icon_class) . ' mr-2"></i>';
            }

            $item_output .= apply_filters('the_title', $item->title, $item->ID);

            // Add dropdown arrow for mega menu
            if ($item->is_mega_menu) {
                $item_output .= '<svg class="ml-2 h-4 w-4 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>';
            }

            $item_output .= '</a>';

        } elseif ($depth === 1 && $this->mega_menu_parent) {
            // Mega menu section headers (categories)
            $output .= $indent . '<div class="mega-menu-section">';
            $output .= '<h3 class="text-sm font-semibold text-primary-600 uppercase tracking-wide mb-4 border-b border-gray-200 pb-2">';

            // Add icon if available
            if (!empty($item->icon_class)) {
                $output .= '<i class="' . esc_attr($item->icon_class) . ' mr-2"></i>';
            }

            $output .= apply_filters('the_title', $item->title, $item->ID);
            $output .= '</h3>';

            return; // Don't close the element yet, we need to add subitems

        } else {
            // Mega menu items
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
            $output .= $indent . '<li' . $class_names . '>';

            $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
            $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
            $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
            $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

            $item_output = '<a' . $attributes . ' class="group flex items-start p-3 rounded-lg hover:bg-[#F9F9F9] transition-colors duration-200">';

            // Add icon if available
            if (!empty($item->icon_class)) {
                $item_output .= '<div class="flex-shrink-0 mr-3 mt-1">';
                $item_output .= '<i class="' . esc_attr($item->icon_class) . ' text-primary-500 text-lg"></i>';
                $item_output .= '</div>';
            }

            $item_output .= '<div>';
            $item_output .= '<div class="text-sm font-medium text-[#1B1B1B] group-hover:text-primary-600">' . apply_filters('the_title', $item->title, $item->ID) . '</div>';

            // Add description if available
            if (!empty($item->description)) {
                $item_output .= '<div class="text-xs text-gray-500 mt-1">' . esc_html($item->description) . '</div>';
            }

            $item_output .= '</div></a>';
        }

            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    /**
     * Ends the element output if $depth is equal to zero.
     */
    public function end_el(&$output, $data_object, $depth = 0, $args = null)
    {
        if ($depth === 1 && $this->mega_menu_parent) {
            // Close mega menu section
            $output .= "</div>\n";
        } else {
            $output .= "</li>\n";
        }
    }
}

class Footer_Menu_Walker extends Walker_Nav_Menu {
    private $parent_title;
    private $is_parent;

    public function __construct($parent_title = '') {
        $this->parent_title = $parent_title;
        $this->is_parent = false;
        parent::__construct();
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        if ($depth === 0 && $item->menu_item_parent == 0) {
            $this->is_parent = !empty($item->classes) && in_array('menu-item-has-children', $item->classes);
            if ($this->is_parent && $this->parent_title && $item->title !== $this->parent_title) {
                return;
            }
        }

        if ($depth === 1) {
            $output .= '<li><a href="' . esc_url($item->url) . '" class="text-base text-gray-700 hover:text-[#1B1B1B] transition-colors border-b border-gray-300 pb-1 inline-block">' . esc_html($item->title) . '</a></li>';
        }
    }

    public function start_lvl(&$output, $depth = 0, $args = null) {
        if ($depth === 0) {
            $output .= '<ul class="space-y-3">';
        }
    }

    public function end_lvl(&$output, $depth = 0, $args = null) {
        if ($depth === 0) {
            $output .= '</ul>';
        }
    }
}

class Footer_Column_Walker extends Walker_Nav_Menu {
    private $column_index;

    public function __construct($column_index = 1) {
        $this->column_index = $column_index;
        parent::__construct();
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $is_parent = !empty($item->classes) && in_array('menu-item-has-children', $item->classes);
        $current_index = $args->current_index ?? 0;

        if ($depth === 0) {
            if ($current_index + 1 === (int)$this->column_index) {
                $output .= '<h3 class="text-xl font-semibold text-[#1B1B1B]">' . esc_html($item->title) . '</h3>';
                $output .= '<ul class="space-y-3">';
            }
        } elseif ($depth === 1 && $current_index + 1 === (int)$this->column_index) {
            $output .= '<li><a href="' . esc_url($item->url) . '" class="text-base text-gray-700 hover:text-[#1B1B1B] transition-colors border-b border-gray-300 pb-1 inline-block">' . esc_html($item->title) . '</a></li>';
        }
    }

    public function end_el(&$output, $data_object, $depth = 0, $args = null) {
        $current_index = $args->current_index ?? 0;
        if ($depth === 0 && $current_index + 1 === (int)$this->column_index) {
            $output .= '</ul>';
        }
    }
}

add_filter('body_class', function($classes) {
    if (is_singular()) {
        $post = get_queried_object();
        if ($post && !empty($post->post_name)) {
            $classes[] = $post->post_type . '-' . $post->post_name;
        }
    } elseif (is_archive()) {
        $obj = get_queried_object();
        if ($obj && !empty($obj->slug)) {
            $classes[] = 'archive-' . $obj->slug;
        }
    } elseif (is_tag()) {
        $tag = get_queried_object();
        if ($tag && !empty($tag->slug)) {
            $classes[] = 'tag-' . $tag->slug;
        }
    } elseif (is_category()) {
        $category = get_queried_object();
        if ($category && !empty($category->slug)) {
            $classes[] = 'category-' . $category->slug;
        }
    } elseif (is_search()) {
        $classes[] = 'search';
    } elseif (is_404()) {
        $classes[] = 'error404';
    } elseif (is_front_page()) {
        $classes[] = 'frontpage';
    } elseif (is_home()) {
        $classes[] = 'home';
    }

    return array_filter($classes);
});

/**
 * Get a theme icon URL by its ID from the global settings icons repeater.
 *
 * @param string $icon_id The icon identifier (e.g. 'play', 'pause').
 * @return string Icon image URL, or empty string if not found.
 */
function get_theme_icon_url( $icon_id ) {
    if ( ! function_exists( 'get_field' ) ) {
        return '';
    }

    $icons = get_field( 'icons_items', 'option' );

    if ( empty( $icons ) || ! is_array( $icons ) ) {
        return '';
    }

    foreach ( $icons as $icon ) {
        if ( isset( $icon['id'] ) && $icon['id'] === $icon_id && ! empty( $icon['image']['url'] ) ) {
            return $icon['image']['url'];
        }
    }

    return '';
}
