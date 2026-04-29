<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];


$title = $args['title'] ?? 'Minds At Work';
$description = $args['description'] ?? '';
$members = $args['members'] ?? [];

if (!empty($members)) {
    $display_members = $members;
} else {
    $team_query = new WP_Query(array(
        'post_type' => 'team_member',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'orderby' => 'menu_order',
        'order' => 'ASC',
    ));

    $display_members = [];
    if ($team_query->have_posts()) {
        while ($team_query->have_posts()) {
            $team_query->the_post();
            $photo = get_field('photo');
            $job_title = get_field('job_title');
            $bio = get_field('bio');
            $linkedin = get_field('linkedin');
            
            $display_members[] = array(
                'photo' => $photo,
                'name' => get_the_title(),
                'title' => $job_title,
                'bio' => $bio,
                'linkedin' => $linkedin,
                'profile_url' => get_permalink(),
            );
        }
        wp_reset_postdata();
    }
}

if (empty($display_members)) {
    $display_members = [];
}
?>

<section class="my-16 md:my-24 bg-white" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container">
        <div class="text-center mb-12 md:mb-16">
            <h2 class="text-3xl md:text-[2.5rem] font-semibold mb-4" style="color: var(--theme-primary);"><?php echo esc_html($title); ?></h2>
            <?php if ($description) : ?>
                <p class="text-lg text-[#1B1B1B] leading-relaxed">
                    <?php echo wp_kses_post($description); ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12">
            <?php foreach ($display_members as $member) : 
                $photo = $member['photo'] ?? [];
                $name = $member['name'] ?? '';
                $member_title = $member['title'] ?? '';
            ?>

            <div class="text-center">
                <div class="mb-4">
                    <?php if (!empty($photo['url'])) : ?>
                        <img src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($name); ?>" class="w-96 h-auto mx-auto rounded-lg object-cover">
                    <?php endif; ?>
                </div>

                <h3 class="text-2xl font-semibold text-[#1B1B1B] mb-2"><?php echo esc_html($name); ?></h3>
                <p class="font-semibold text-lg mb-6" style="color: var(--theme-primary);"><?php echo esc_html($member_title); ?></p>

                <?php if(!empty($name) && !empty($member['profile_url'])) : ?>
                    <a href="<?php echo esc_url($member['profile_url']); ?>" class="inline-block text-white px-6 py-2 rounded-full font-normal transition-colors text-lg" style="background-color: var(--theme-primary);">
                        <?php
                            $first_name = explode(' ', $name)[0];
                            echo sprintf(__('Explore %s\'s Profile', 'text-domain'), esc_html($first_name));
                        ?>
                    </a>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
