<?php
/**
 * Hosting Providers Grid (Future Use)
 *
 * Full hosting provider cards layout with detailed information.
 * Saved for future implementation when detailed hosting recommendations are needed.
 *
 * @package wp_modern_starter_main_theme
 * @since 1.2.0
 */

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

<!-- Hosting Providers Grid (For Future Use) -->
<div class="hosting-section__grid row g-4">
	<?php foreach ( $featured_hosting_providers as $index => $provider ) : ?>
		<div class="col-lg-4 col-md-6">
			<article class="hosting-card" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
				
				<!-- Card Header -->
				<div class="hosting-card__header">
					<?php if ( ! empty( $provider['badge'] ) ) : ?>
						<div class="hosting-card__badge">
							<span class="badge bg-<?php echo esc_attr( $provider['badge_color'] ); ?>">
								<?php echo esc_html( $provider['badge'] ); ?>
							</span>
						</div>
					<?php endif; ?>
					
					<div class="hosting-card__logo <?php echo esc_attr( $provider['logo_class'] ); ?>">
						<!-- Logo placeholder - replace with actual logos -->
						<div class="hosting-logo">
							<i class="fas fa-server"></i>
						</div>
					</div>
					
					<h3 class="hosting-card__name text-xl font-semibold">
						<?php echo esc_html( $provider['name'] ); ?>
					</h3>
					<p class="hosting-card__tagline text-sm text-muted">
						<?php echo esc_html( $provider['tagline'] ); ?>
					</p>
				</div>

				<!-- Card Content -->
				<div class="hosting-card__content">
					<div class="hosting-card__highlight">
						<h4 class="text-md font-medium text-primary ds-mb-sm">
							<?php echo esc_html( $provider['highlight'] ); ?>
						</h4>
					</div>

					<ul class="hosting-card__features list-unstyled">
						<?php foreach ( $provider['features'] as $feature ) : ?>
							<li class="hosting-card__feature">
								<i class="fas fa-check-circle text-success me-2"></i>
								<?php echo esc_html( $feature ); ?>
							</li>
						<?php endforeach; ?>
					</ul>

					<div class="hosting-card__pricing">
						<span class="hosting-card__price-label text-sm text-muted">Starting from</span>
						<div class="hosting-card__price">
							<span class="hosting-card__price-amount text-2xl font-bold text-primary">
								<?php echo esc_html( $provider['price_from'] ); ?>
							</span>
							<span class="hosting-card__price-period text-sm text-muted">/month</span>
						</div>
					</div>
				</div>

				<!-- Card Footer -->
				<div class="hosting-card__footer">
					<a href="<?php echo esc_url( $provider['affiliate_url'] ); ?>" 
					   class="hosting-card__cta btn btn-outline-primary w-100"
					   target="_blank"
					   rel="nofollow noopener">
						View Plans <i class="fas fa-external-link-alt ms-2"></i>
					</a>
				</div>

			</article>
		</div>
	<?php endforeach; ?>
</div>