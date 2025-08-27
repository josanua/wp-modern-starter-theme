<?php
/**
 * Hosting Selection Section
 *
 * Professional hosting recommendations section for WordPress developers.
 * Features curated hosting providers with comparison link.
 *
 * @package wp_modern_starter_main_theme
 * @since 1.2.0
 */

// Section configuration
const HOSTING_SECTION_TITLE       = 'WordPress Hosting for Professionals';
const HOSTING_SECTION_SUBTITLE    = 'Curated hosting solutions tested by developers, for developers';
const HOSTING_COMPARISON_LINK_TEXT = 'Compare All Hosting Options';
const HOSTING_COMPARISON_POST_SLUG = 'wordpress-hosting-comparison-2024'; // Update with actual post slug

// Featured hosting providers data
$featured_hosting_providers = array(
	array(
		'name'         => 'SiteGround',
		'tagline'      => 'Developer-Friendly',
		'highlight'    => 'Best for WordPress Performance',
		'features'     => array(
			'Free SSL & Daily Backups',
			'WordPress Staging Tool',
			'Expert WordPress Support',
			'99.9% Uptime Guarantee'
		),
		'price_from'   => '$2.99',
		'badge'        => 'Recommended',
		'badge_color'  => 'success',
		'affiliate_url' => '#', // Add affiliate link
		'logo_class'   => 'hosting-logo--siteground'
	),
	array(
		'name'         => 'WP Engine',
		'tagline'      => 'Managed WordPress',
		'highlight'    => 'Premium Performance & Security',
		'features'     => array(
			'Automatic WordPress Updates',
			'Advanced Security Features',
			'Developer Tools & Git',
			'CDN & Performance Optimization'
		),
		'price_from'   => '$20',
		'badge'        => 'Premium',
		'badge_color'  => 'primary',
		'affiliate_url' => '#', // Add affiliate link
		'logo_class'   => 'hosting-logo--wpengine'
	),
	array(
		'name'         => 'Cloudways',
		'tagline'      => 'Cloud Hosting',
		'highlight'    => 'Scalable Cloud Infrastructure',
		'features'     => array(
			'Multiple Cloud Providers',
			'Easy Server Management',
			'Advanced Caching',
			'Team Collaboration Tools'
		),
		'price_from'   => '$10',
		'badge'        => 'Flexible',
		'badge_color'  => 'info',
		'affiliate_url' => '#', // Add affiliate link
		'logo_class'   => 'hosting-logo--cloudways'
	)
);
?>

<section class="hosting-section section--spacing-bottom" id="hosting-selection" aria-labelledby="hosting-heading">
	<div class="container">
		<div class="hosting-section__inner">
			
			<!-- Section Header -->
			<header class="hosting-section__header text-center ds-mb-lg">
				<div class="hosting-section__badge">
					<span class="badge bg-primary">
						<i class="fas fa-server me-2"></i>Hosting Recommendations
					</span>
				</div>
				<h2 id="hosting-heading" class="hosting-section__title text-4xl font-bold ds-mt-md ds-mb-md">
					<?php echo esc_html( HOSTING_SECTION_TITLE ); ?>
				</h2>
				<p class="hosting-section__subtitle text-lg text-muted">
					<?php echo esc_html( HOSTING_SECTION_SUBTITLE ); ?>
				</p>
			</header>

			<!-- Comparison Link -->
			<div class="hosting-section__comparison text-center ds-mt-xl">
				<div class="hosting-section__comparison-content bg-secondary ds-p-lg rounded-card">
					<h3 class="text-xl font-semibold ds-mb-md">Need Help Choosing?</h3>
					<p class="text-muted ds-mb-lg">
						Detailed comparison of features, performance, pricing, and developer tools 
						across 12+ WordPress hosting providers.
					</p>
					<a href="<?php echo esc_url( home_url( '/' . HOSTING_COMPARISON_POST_SLUG ) ); ?>" 
					   class="hosting-section__comparison-link btn btn-primary btn-lg">
						<i class="fas fa-chart-bar me-2"></i>
						<?php echo esc_html( HOSTING_COMPARISON_LINK_TEXT ); ?>
					</a>
					<div class="hosting-section__updated ds-mt-md">
						<small class="text-muted">
							<i class="fas fa-clock me-1"></i>
							Last updated: December 2024 • Independent testing
						</small>
					</div>
				</div>
			</div>

			<!-- Trust Indicators -->
			<div class="hosting-section__trust text-center ds-mt-lg">
				<div class="row justify-content-center">
					<div class="col-md-8">
						<div class="hosting-trust">
							<div class="hosting-trust__indicators d-flex justify-content-center align-items-center gap-4 flex-wrap">
								<div class="hosting-trust__indicator">
									<i class="fas fa-shield-alt text-success me-2"></i>
									<span class="text-sm">Tested for Security</span>
								</div>
								<div class="hosting-trust__indicator">
									<i class="fas fa-tachometer-alt text-primary me-2"></i>
									<span class="text-sm">Performance Verified</span>
								</div>
								<div class="hosting-trust__indicator">
									<i class="fas fa-users text-info me-2"></i>
									<span class="text-sm">Developer Approved</span>
								</div>
								<div class="hosting-trust__indicator">
									<i class="fas fa-hand-holding-heart text-warning me-2"></i>
									<span class="text-sm">No Paid Placements</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div><!-- /.hosting-section__inner -->
	</div><!-- /.container -->
</section><!-- /.hosting-section -->