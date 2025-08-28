<?php
/**
 * The template for displaying the footer
 *
 * @package wp_modern_starter
 */
?>

	<footer class="footer py-5 bg-dark text-light">
		<div class="container">
			<div class="row">
				
				<div class="col-lg-4 col-md-6 mb-4">
					<h5><?php bloginfo('name'); ?></h5>
					<p class="text-muted"><?php bloginfo('description'); ?></p>
					<div class="social-links mt-3">
						<a href="#" class="text-light me-3" target="_blank" aria-label="GitHub">
							<i class="fab fa-github"></i>
						</a>
						<a href="#" class="text-light me-3" target="_blank" aria-label="LinkedIn">
							<i class="fab fa-linkedin"></i>
						</a>
						<a href="#" class="text-light" target="_blank" aria-label="Website">
							<i class="fas fa-globe"></i>
						</a>
					</div>
				</div>

				<div class="col-lg-2 col-md-6 mb-4">
					<h6 class="text-uppercase fw-bold">Links</h6>
					<ul class="list-unstyled">
						<li><a href="<?php echo esc_url(home_url('/')); ?>" class="text-muted">Home</a></li>
						<li><a href="<?php echo esc_url(home_url('/blog/')); ?>" class="text-muted">Blog</a></li>
						<li><a href="<?php echo esc_url(home_url('/about/')); ?>" class="text-muted">About</a></li>
						<li><a href="<?php echo esc_url(home_url('/contact/')); ?>" class="text-muted">Contact</a></li>
					</ul>
				</div>

				<div class="col-lg-3 col-md-6 mb-4">
					<h6 class="text-uppercase fw-bold">Services</h6>
					<ul class="list-unstyled">
						<li><a href="#" class="text-muted">Web Development</a></li>
						<li><a href="#" class="text-muted">WordPress Themes</a></li>
						<li><a href="#" class="text-muted">Consulting</a></li>
						<li><a href="#" class="text-muted">Support</a></li>
					</ul>
				</div>

				<div class="col-lg-3 col-md-6 mb-4">
					<h6 class="text-uppercase fw-bold">Contact</h6>
					<p class="text-muted small">
						<i class="fas fa-envelope me-2"></i>
						<a href="mailto:contact@example.com" class="text-muted">contact@example.com</a>
					</p>
					<p class="text-muted small">
						<i class="fas fa-globe me-2"></i>
						<a href="#" class="text-muted">www.example.com</a>
					</p>
				</div>

			</div>

			<div class="row border-top border-secondary pt-4 mt-4">
				<div class="col-md-8">
					<p class="text-muted mb-0">
						&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
					</p>
				</div>
				<div class="col-md-4 text-md-end">
					<small class="text-muted">
						Powered by <a href="https://wordpress.org/" class="text-light" target="_blank">WordPress</a>
					</small>
				</div>
			</div>

		</div>
	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>