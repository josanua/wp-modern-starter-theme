<?php
/**
 * Front Page Template
 *
 * Simple homepage template for the starter framework.
 * Developers: Customize this template to match your design needs.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package wp_modern_starter
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="homepage">

    <!-- Hero Section -->
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

    <!-- Recent Posts Section -->
    <?php 
    $recent_posts_file = get_template_directory() . '/template-blocks/recent-posts.php';
    if (file_exists($recent_posts_file)) {
        include $recent_posts_file;
    }
    ?>

    <!-- Developer Note -->
    <section class="developer-note py-4 bg-light">
        <div class="container">
            <div class="alert alert-info">
                <h5><i class="fas fa-info-circle me-2"></i>WP Modern Starter Framework</h5>
                <p class="mb-0">This is the default homepage. <strong>Developers:</strong> Customize this template in <code>front-page.php</code> to match your design requirements.</p>
            </div>
        </div>
    </section>

</main><!-- /.homepage -->

<?php
get_footer();
