<?php
/**
 * Resources & Guides Section
 *
 * Displays featured WordPress resource categories with cards layout.
 * Uses BEM methodology for CSS classes and semantic HTML structure.
 *
 * @package wp_modern_starter_main_theme
 * @since 1.2.0
 */

// Section configuration
const USEFUL_RESOURCES_BLOCK_TITLE = 'Useful WordPress Resources & Guides';
const USEFUL_RESOURCES_BLOCK_SUBTITLE = 'Explore our curated collections of tutorials and resources';
// Note: USEFUL_RESOURCES_BLOCK_IMGS_PATH is now defined in inc/site-config.php

// Resources data structure
$useful_resources_block_data = [
    [
        'title'         => 'Headless WP',
        'link'          => '/category/wp-programming/headless-wp/',
        'thumbnail_url' => USEFUL_RESOURCES_BLOCK_IMGS_PATH . '/headless-wp.png',
        'card_text'     => 'Explore Headless technologies in WordPress with our articles about decoupling frontend and backend for modern web applications.',
        'alt_value'     => 'Headless WordPress development and decoupled architecture icon',
        'icon'          => 'fas fa-layer-group'
    ],
    [
        'title'         => 'WP Programming',
        'link'          => '/category/wp-programming/',
        'thumbnail_url' => USEFUL_RESOURCES_BLOCK_IMGS_PATH . '/wordpress-programming.png',
        'card_text'     => 'Discover captivating articles on WordPress programming that will enhance your skills and knowledge.',
        'alt_value'     => 'WordPress programming tutorials and development guides icon',
        'icon'          => 'fab fa-wordpress'
    ],
    [
        'title'         => 'Hosting',
        'link'          => '/category/hosting/',
        'thumbnail_url' => USEFUL_RESOURCES_BLOCK_IMGS_PATH . '/hosting-for-wordpress.png',
        'card_text'     => "Discover top-notch recommendations for WordPress hosting services to optimize your website's performance",
        'alt_value'     => 'WordPress hosting services and performance optimization icon',
        'icon'          => 'fas fa-server'
    ],
];
?>

<section class="resources-section section--spacing-bottom" id="resources-and-guides" aria-labelledby="resources-heading">
	<div class="container">
		<div class="resources-section__inner">
			
				<header class="resources-section__header">
				<h2 id="resources-heading" class="resources-section__title">
					<?php echo esc_html(USEFUL_RESOURCES_BLOCK_TITLE); ?>
				</h2>
				<p class="resources-section__subtitle"><?php echo esc_html(USEFUL_RESOURCES_BLOCK_SUBTITLE); ?></p>
			</header>
			
			<!-- Featured Categories Section -->
			<div class="featured-categories">
				<div class="categories-grid row">
					<?php foreach ($useful_resources_block_data as $index => $resource) : ?>
						<div class="col-lg-4 col-md-6 mb-4">
							<div class="category-card">
								<div class="category-icon">
									<img src="<?php echo esc_url($resource['thumbnail_url']); ?>" 
										 alt="<?php echo esc_attr($resource['alt_value']); ?>"
										 width="40" 
										 height="40">
								</div>
								<h3><?php echo esc_html($resource['title']); ?></h3>
								<p><?php echo esc_html($resource['card_text']); ?></p>
								<div class="category-stats d-none">
									<span class="stat">Featured</span>
									<span class="stat">WordPress</span>
								</div>
								<a href="<?php echo esc_url(home_url() . $resource['link']); ?>" class="category-link">Explore <?php echo esc_html($resource['title']); ?> <i class="fas fa-arrow-right"></i></a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div><!-- /.resources-section__inner -->
	</div><!-- /.container -->
</section><!-- /.resources-section -->