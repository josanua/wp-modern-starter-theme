<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp_modern_starter_main_theme
 */

?>

	<footer class="footer">
		<div class="container">
			<div class="footer-content">
				
				<!-- Brand Section -->
				<div class="footer-section footer-brand">
					<h4 class="text-uppercase"><?php bloginfo('name'); ?></h4>
					<p><?php echo esc_html(site_config('site.description')); ?></p>
					<div class="social-links">
						<?php
                        $social_links = site_config('social');
$social_icons = [
    'github' => 'fab fa-github',
    'portfolio' => 'fas fa-user',
    'linkedin' => 'fab fa-linkedin'
];

foreach ($social_links as $platform => $url):
    if (!empty($url) && isset($social_icons[$platform])): ?>
								<a href="<?php echo esc_url($url); ?>" target="_blank" aria-label="<?php echo ucfirst($platform); ?>">
									<i class="<?php echo esc_attr($social_icons[$platform]); ?>"></i>
								</a>
							<?php endif;
endforeach; ?>
					</div>
				</div>

				<!-- Services Section -->
				<div class="footer-section">
					<h4>Services</h4>
					<ul>
						<li><a href="/hosting-services/">Hosting Services</a></li>
						<li><a href="/category/wp-programming/">WordPress Development</a></li>
						<li><a href="/category/wp-programming/headless-wp/">Headless WordPress</a></li>
						<li><a href="/microservices/">Project support</a></li>
						<li><a href="/consulting/">Development Consulting</a></li>
					</ul>
				</div>

				<!-- Projects Section -->
				<div class="footer-section">
					<h4>Projects</h4>
					<ul>
						<li><a href="/themeforest-projects/" class="inactive-link">ThemeForest Projects <span class="badge">Soon</span></a></li>
						<li><a href="/category/tutorials/">Tutorials</a></li>
						<li><a href="/resources/">Developer Tools</a></li>
						<li><a href="/code-snippets/">Code Snippets</a></li>
						<li><a href="/github-projects/">GitHub Projects</a></li>
					</ul>
				</div>

				<!-- About Section -->
				<div class="footer-section">
					<h4>About</h4>
					<ul>
						<li><a href="/about-me/">About Me</a></li>
						<li><a href="/cv/">CV & Portfolio</a></li>
						<li><a href="/contact/">Contact</a></li>
						<li><a href="/sitemap/">Sitemap</a></li>
						<li><a href="/privacy-policy/">Privacy Policy</a></li>
					</ul>
				</div>

			</div>

			<div class="footer-bottom">
				<div class="footer-bottom-content">
					<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
					<div class="footer-credits">
						<span>Powered by <a href="https://wordpress.org/" target="_blank">WordPress</a></span>
						<span class="sep">•</span>
						<span>Theme by <a href="<?php echo esc_url(site_config('social.portfolio')); ?>" target="_blank"><?php echo esc_html(site_config('site.author')); ?></a></span>
						<span class="sep">•</span>
						<span>Based on my<a href="<?php echo esc_url(site_config('site.theme_repository')); ?>" target="_blank"> Custom theme</a></span>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- .footer -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
