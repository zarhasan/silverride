<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$categories = get_categories(array(
    'orderby' => 'name',
    'order'   => 'ASC',
    'hide_empty' => true,
));
?>

<section class="bg-white my-8 lg:my-12" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
            <!-- Title -->
            <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">Newsroom</h1>

            <!-- Filters -->
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 lg:gap-6 w-full lg:w-auto">
                <!-- Search -->
                <div class="relative flex-1 sm:flex-none sm:w-80 lg:w-96">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-5 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input
                        type="search"
                        name="s"
                        placeholder="Search Newsroom..."
                        class="w-full pl-14 pr-6 py-4 text-base text-gray-900 bg-white border border-gray-300 rounded-full placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-shadow duration-200"
                        aria-label="Search Newsroom"
                    >
                </div>

                <!-- Category Filter -->
                <div class="relative sm:w-48 lg:w-56">
                    <select
                        name="category"
                        class="w-full appearance-none pl-6 pr-12 py-4 text-base font-medium text-gray-900 bg-white border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-shadow duration-200 cursor-pointer"
                        aria-label="Filter by category"
                    >
                        <option value="">All News</option>
                        <?php foreach ($categories as $cat) : ?>
                            <option value="<?php echo esc_attr($cat->slug); ?>"><?php echo esc_html($cat->name); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-5 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>

                <!-- Sort -->
                <div class="relative sm:w-48 lg:w-56">
                    <select
                        name="sort"
                        class="w-full appearance-none pl-6 pr-12 py-4 text-base font-medium text-gray-900 bg-white border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-shadow duration-200 cursor-pointer"
                        aria-label="Sort posts"
                    >
                        <option value="newest">Newest First</option>
                        <option value="oldest">Oldest First</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-5 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
