<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wp_modern_starter_main_theme
 */

get_header();
?>

	<main id="primary" class="container site-main">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-8">
				<?php
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb( '<div id="breadcrumbs" class="breadcrumbs mb-2">','</div>' );
					}
				?>
				<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
				?>
			</div>
		</div>
	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
