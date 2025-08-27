<?php
/**
 * Front Page Template
 *
 * Displays the homepage with hero section, resources, and recent posts.
 * Uses BEM methodology and semantic HTML5 structure for optimal accessibility
 * and maintainability.
 *
 * Template Hierarchy:
 * - front-page.php (this file)
 * - home.php
 * - index.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package wp_modern_starter
 * @since 1.2.0
 */

get_header();
?>

<main id="primary" class="homepage">
    <?php include get_template_directory() . '/template-blocks/site-description.php'; ?>
    <?php include get_template_directory() . '/template-blocks/resources-and-guides.php'; ?>
    <?php include get_template_directory() . '/template-blocks/recent-posts.php'; ?>
    <?php include get_template_directory() . '/template-blocks/hosting-selection.php'; ?>
    <?php include get_template_directory() . '/template-blocks/about-author.php'; ?>
</main><!-- /.homepage -->

<?php
get_footer();
