<?php
/**
 * Front Page Template
 *
 * @package wp_modern_starter
 */

get_header();
?>

<main id="primary" class="homepage">

    <section class="hero-section py-5">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="display-4 mb-4"><?php bloginfo('name'); ?></h1>
                    <p class="lead mb-4"><?php bloginfo('description'); ?></p>
                    <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="btn btn-primary btn-lg">
                        View Blog <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php 
    $recent_posts_file = get_template_directory() . '/template-blocks/recent-posts.php';
    if (file_exists($recent_posts_file)) {
        include $recent_posts_file;
    }
    ?>

</main>

<?php
get_footer();