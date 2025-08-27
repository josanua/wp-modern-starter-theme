<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package wp_modern_starter
 */

?>

	<footer class="footer py-5 bg-dark text-light">
		<div class="container">
			<div class="row">
				
				<!-- Brand Section -->
				<div class="col-lg-4 col-md-6 mb-4">
					<h5><?php bloginfo('name'); ?></h5>
					<p class="text-muted">
						<?php 
						$description = site_config('site.description', get_bloginfo('description'));
						echo esc_html($description);
						?>
					</p>
					
					<!-- Simple Social Links Example -->
					<div class="social-links mt-3">
						<a href="https://github.com/yourusername" class="text-light me-3" target="_blank" aria-label="GitHub">
							<i class="fab fa-github"></i>
						</a>
						<a href="https://linkedin.com/in/yourprofile" class="text-light me-3" target="_blank" aria-label="LinkedIn">
							<i class="fab fa-linkedin"></i>
						</a>
						<a href="https://yourwebsite.com" class="text-light" target="_blank" aria-label="Portfolio">
							<i class="fas fa-globe"></i>
						</a>
					</div>
					<small class="text-muted d-block mt-2">
						<strong>Developers:</strong> Customize links in footer.php
					</small>
				</div>

				<!-- Quick Links -->
				<div class="col-lg-2 col-md-6 mb-4">
					<h6 class="text-uppercase fw-bold">Quick Links</h6>
					<ul class="list-unstyled">
						<li><a href="<?php echo esc_url(home_url('/')); ?>" class="text-muted">Home</a></li>
						<li><a href="<?php echo esc_url(home_url('/blog/')); ?>" class="text-muted">Blog</a></li>
						<li><a href="<?php echo esc_url(home_url('/about/')); ?>" class="text-muted">About</a></li>
						<li><a href="<?php echo esc_url(home_url('/contact/')); ?>" class="text-muted">Contact</a></li>
					</ul>
				</div>

				<!-- Services Example -->
				<div class="col-lg-3 col-md-6 mb-4">
					<h6 class="text-uppercase fw-bold">Services</h6>
					<ul class="list-unstyled">
						<li><a href="#" class="text-muted">Web Development</a></li>
						<li><a href="#" class="text-muted">WordPress Themes</a></li>
						<li><a href="#" class="text-muted">Consulting</a></li>
						<li><a href="#" class="text-muted">Support</a></li>
					</ul>
					<small class="text-muted">
						<em>Example links - customize as needed</em>
					</small>
				</div>

				<!-- Contact Info -->
				<div class="col-lg-3 col-md-6 mb-4">
					<h6 class="text-uppercase fw-bold">Contact</h6>
					<p class="text-muted small">
						<i class="fas fa-envelope me-2"></i>
						<a href="mailto:your@email.com" class="text-muted">your@email.com</a>
					</p>
					<p class="text-muted small">
						<i class="fas fa-globe me-2"></i>
						<a href="https://yourwebsite.com" class="text-muted">yourwebsite.com</a>
					</p>
					<small class="text-muted">
						<em>Update contact info in footer.php</em>
					</small>
				</div>

			</div>

			<!-- Footer Bottom -->
			<div class="row border-top border-secondary pt-4 mt-4">
				<div class="col-md-8">
					<p class="text-muted mb-0">
						&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
					</p>
				</div>
				<div class="col-md-4 text-md-end">
					<small class="text-muted">
						Powered by <a href="https://wordpress.org/" class="text-light" target="_blank">WordPress</a> 
						& <strong>WP Modern Starter</strong>
					</small>
				</div>
			</div>

			<!-- Developer Note -->
			<div class="row mt-3">
				<div class="col-12">
					<div class="alert alert-dark border-secondary">
						<small>
							<i class="fas fa-code me-2"></i>
							<strong>Framework Note:</strong> This footer is a basic example. 
							Developers should customize the layout, links, and content in 
							<code>footer.php</code> to match their project requirements.
						</small>
					</div>
				</div>
			</div>

		</div>
	</footer><!-- .footer -->

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>