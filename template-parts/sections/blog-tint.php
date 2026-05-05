<?php
/**
 * Partnership / Who We Serve Section
 *
 * Expected $args:
 * - title: string
 * - subtitle: string
 * - posts: array of post arrays
 *   - image: array (url, alt)
 *   - category: string
 *   - date: string
 *   - title: string
 *   - excerpt: string
 *   - link: array (url, title, target)
 */
$title    = $args['title'] ?? 'What partnership looks like in practice.';
$subtitle = $args['subtitle'] ?? 'Real partner organizations. Real outcomes. Stories from the field.';
$posts    = $args['posts'] ?? [];

if ( empty( $posts ) ) {
	$posts = [
		[
			'image'    => ['url' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=600&q=80', 'alt' => 'Caregiver assisting senior into vehicle'],
			'category' => 'Blog Post',
			'date'     => 'Mar 11, 2026',
			'title'    => 'SilverRide Celebrates PACE Reaching 200 Programs',
			'excerpt'  => 'Celebrating a major milestone in community-based care while reinforcing SilverRide\'s commitment to accessible, coordinated transportation',
			'link'     => ['url' => '#', 'title' => 'Learn More'],
		],
		[
			'image'    => ['url' => 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=600&q=80', 'alt' => 'Driver with senior passenger in car'],
			'category' => 'press release',
			'date'     => 'Jan 15, 2026',
			'title'    => 'SilverRide Launches East Bay Paratransit Service',
			'excerpt'  => 'New deployment across California\'s Tri-Valley and Central Contra Costa regions add to SilverRide\'s growing footprint in the state',
			'link'     => ['url' => '#', 'title' => 'Learn More'],
		],
		[
			'image'    => ['url' => 'https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?w=600&q=80', 'alt' => 'Caregiver helping senior out of car'],
			'category' => 'press release',
			'date'     => 'Jan 15, 2026',
			'title'    => 'SilverRide Launches East Bay Paratransit Service',
			'excerpt'  => 'New deployment across California\'s Tri-Valley and Central Contra Costa regions add to SilverRide\'s growing footprint in the state',
			'link'     => ['url' => '#', 'title' => 'Learn More'],
		],
	];
}
?>

<section class="bg-[#F6F9FF] py-16 md:py-24">
	<div class="mx-auto max-w-7xl px-6">
		<h2 class="text-center text-3xl font-bold text-black md:text-4xl lg:text-5xl">
			<?php echo esc_html( $title ); ?>
		</h2>

		<?php if ( ! empty( $subtitle ) ) : ?>
		<p class="mx-auto mt-5 max-w-3xl text-center text-lg text-gray-600">
			<?php echo esc_html( $subtitle ); ?>
		</p>
		<?php endif; ?>

		<?php if ( ! empty( $posts ) ) : ?>
		<div class="mt-12 grid gap-8 md:grid-cols-3">
			<?php foreach ( $posts as $post ) :
				$post_image    = $post['image'] ?? [];
				$post_category = $post['category'] ?? '';
				$post_date     = $post['date'] ?? '';
				$post_title    = $post['title'] ?? '';
				$post_excerpt  = $post['excerpt'] ?? '';
				$post_link     = $post['link'] ?? [];
			?>
			<article class="flex flex-col justify-between">
				<?php if ( ! empty( $post_image ) ) : ?>
				<div class="overflow-hidden rounded-lg">
					<img
						src="<?php echo esc_url( $post_image['url'] ); ?>"
						alt="<?php echo esc_attr( $post_image['alt'] ?? $post_title ); ?>"
						class="aspect-square w-full object-cover transition-transform duration-300 hover:scale-105 h-96"
						loading="lazy"
					>
				</div>
				<?php endif; ?>

				<div class="mt-5 flex items-center gap-2 text-sm text-gray-500">
					<?php if ( ! empty( $post_category ) ) : ?>
					<span class="capitalize text-primary"><?php echo esc_html( $post_category ); ?></span>
					<?php endif; ?>
					<?php if ( ! empty( $post_category ) && ! empty( $post_date ) ) : ?>
					<span class="text-gray-400">·</span>
					<?php endif; ?>
					<?php if ( ! empty( $post_date ) ) : ?>
					<span><?php echo esc_html( $post_date ); ?></span>
					<?php endif; ?>
				</div>

				<?php if ( ! empty( $post_title ) ) : ?>
				<h3 class="mt-5 text-xl font-bold text-black leading-snug">
					<?php echo esc_html( $post_title ); ?>
				</h3>
				<?php endif; ?>

				<?php if ( ! empty( $post_excerpt ) ) : ?>
				<p class="mt-5 text-base leading-relaxed text-gray-600">
					<?php echo esc_html( $post_excerpt ); ?>
				</p>
				<?php endif; ?>

				<?php if ( ! empty( $post_link ) ) : ?>
				<a
					href="<?php echo esc_url( $post_link['url'] ?? '#' ); ?>"
					class="btn btn-primary mt-5"
				>
					<?php echo esc_html( $post_link['title'] ?? 'Learn More' ); ?>
				</a>
				<?php endif; ?>
			</article>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
</section>
