<?php
/**
 * The template for displaying archive posts
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wp_modern_starter
 */

get_header();
?>

    <main id="primary" class="container site-main">
        <div class="row">
            <div class="col-12">

				<?php if ( have_posts() ) : ?>

                    <header class="page-header text-center my-5">
                        <h4 class="h2">My Latest Blog Posts</h4>
                        <p>Here are more blog posts I think you'll enjoy!</p>
                    </header><!-- .page-header -->

                    <div class="row">
						<?php

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'card' );

						endwhile; ?>
                    </div>

					<?php
					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; // have_posts()
				?>
            </div>
        </div>
    </main><!-- #main -->

<?php
// get_sidebar();
get_footer();
