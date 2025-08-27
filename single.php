<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wp_modern_starter_main_theme
 */

get_header();
?>

	<main class="main-content">
		<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/post-content' );

				// If comments are open or we have at least one comment, load up the comment template.
				// if ( comments_open() || get_comments_number() ) :
				// 	comments_template();
				// endif;

			endwhile; // End of the loop.
		?>
	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
