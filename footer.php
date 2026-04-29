

  </div>


<?php
    if (!is_page('contact-us')) {
        get_template_part('template-parts/sections/contact', null, ['context' => 'footer']);
    }
?>

<footer class="bg-white border-t border-gray-200">
    <div class="container py-12 lg:py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
            <!-- Column 1: Logo & Tagline -->
            <div class="space-y-4">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center">
                    <?php
                    $logo = get_field('field_header_logo', 'option');

                    if ($logo && isset($logo['url'])): ?>
                    <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt'] ?: 'Accessibility Innovations Canada'); ?>" class="h-12 lg:h-16 w-auto">
                    <?php endif; ?>
                </a>
                <p class="text-lg leading-relaxed mt-4">
                    Trusted expertise in accessibility partners and compliance.
                </p>

                <h2 class="text-lg font-semibold !mt-8 mb-4">Our Locations Across US</h2>
                <?php
                    $locations = get_nav_menu_locations();
                    $locations_menu_id = $locations['company_locations'] ?? 0;
                    if ($locations_menu_id) {
                        $location_items = wp_get_nav_menu_items($locations_menu_id);
                        if ($location_items) {
                            echo '<ul class="space-y-2 mt-4">';
                            foreach ($location_items as $item) {
                                echo '<li><a href="' . esc_url($item->url) . '" class="text-base text-gray-700 hover:text-[#1B1B1B] transition-colors border-b border-gray-300 pb-1 inline-block">' . esc_html($item->title) . '</a></li>';
                            }
                            echo '</ul>';
                        }
                    }
                ?>
            </div>

            <!-- Column 2: Credentials -->
            <div class="space-y-6">
                <h3 class="text-2xl font-semibold text-[#1B1B1B]">Credentials</h3>
                <ul class="space-y-3 text-xl">
                    <li class="flex items-start">
                        <span class="text-[#1B1B1B] mr-2">•</span>
                        <span class="text-lg text-gray-700">ISO 9001:2015 Quality Management Systems</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#1B1B1B] mr-2">•</span>
                        <span class="text-lg text-gray-700">ISO 31000:2018 Risk Management Guidelines</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#1B1B1B] mr-2">•</span>
                        <span class="text-lg text-gray-700">ISO 14001:2015 Environmental Management Systems</span>
                    </li>
                </ul>

                <a href="/sitemap" class="inline-block text-lg text-gray-700 hover:text-[#1B1B1B] underline transition-colors">
                    Sitemap
                </a>
            </div>

            <!-- Column 3: Services -->
            <div class="space-y-6">
                <?php
                $footer_menu = wp_get_nav_menu_object('Footer');
                if ($footer_menu) {
                    $menu_items = wp_get_nav_menu_items($footer_menu->term_id, array('hierarchical' => true));
                    $parents = array_filter($menu_items, function($item) {
                        return $item->menu_item_parent == 0;
                    });
                    
                    $col3_items = array_slice($parents, 0, 1);
                    foreach ($col3_items as $parent) {
                        $children = array_filter($menu_items, function($item) use ($parent) {
                            return $item->menu_item_parent == $parent->ID;
                        });
                        echo '<h3 class="text-2xl font-semibold text-[#1B1B1B]">' . esc_html($parent->title) . '</h3>';
                        echo '<ul class="space-y-3">';
                        foreach ($children as $child) {
                            echo '<li><a href="' . esc_url($child->url) . '" class="text-lg text-gray-700 hover:text-[#1B1B1B] transition-colors border-b border-gray-300 pb-1 inline-block">' . esc_html($child->title) . '</a></li>';
                        }
                        echo '</ul>';
                    }
                }
                ?>
            </div>

            <!-- Column 4: Accessibility Training -->
            <div class="space-y-6">
                <?php
                if ($footer_menu) {
                    $menu_items = wp_get_nav_menu_items($footer_menu->term_id, array('hierarchical' => true));
                    $parents = array_filter($menu_items, function($item) {
                        return $item->menu_item_parent == 0;
                    });
                    
                    $col4_items = array_slice($parents, 1, 1);
                    foreach ($col4_items as $parent) {
                        $children = array_filter($menu_items, function($item) use ($parent) {
                            return $item->menu_item_parent == $parent->ID;
                        });
                        echo '<h3 class="text-2xl font-semibold text-[#1B1B1B]">' . esc_html($parent->title) . '</h3>';
                        echo '<ul class="space-y-3">';
                        foreach ($children as $child) {
                            echo '<li><a href="' . esc_url($child->url) . '" class="text-lg text-gray-700 hover:text-[#1B1B1B] transition-colors border-b border-gray-300 pb-1 inline-block">' . esc_html($child->title) . '</a></li>';
                        }
                        echo '</ul>';
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="border-t border-gray-200 py-6">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
            <p class="text-center text-lg text-primary">
                Copyright 2026 &copy; All Rights Reserved
            </p>
        </div>
    </div>
</footer>

<?php /* tailwind-classes: lg:grid-cols-2 lg:grid-cols-3 lg:grid-cols-4 lg:grid-cols-5 max-w-[4rem] max-h-12 max-w-[2.5rem] max-h-8 */ ?>


  <?php wp_footer(); ?>
</body>
</html>