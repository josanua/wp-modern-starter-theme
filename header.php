<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp_modern_starter
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<?php
	// SEO Meta Tags
	$page_title = wp_get_document_title();
	$page_description = '';
	$page_image = '';
	$page_url = get_permalink();
	
	// Generate meta description
	if (is_home() || is_front_page()) {
		$page_description = get_bloginfo('description') ?: 'Professional WordPress development tutorials, guides and resources for full-stack developers.';
		$page_image = get_theme_mod('custom_logo') ? wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'large') : get_template_directory_uri() . '/assets/images/og-default.png';
	} elseif (is_single() || is_page()) {
		$excerpt = get_the_excerpt();
		$page_description = $excerpt ?: wp_trim_words(get_the_content(), 25, '...');
		$page_image = get_the_post_thumbnail_url(null, 'large') ?: get_template_directory_uri() . '/assets/images/og-default.png';
	} elseif (is_category()) {
		$page_description = category_description() ?: 'Browse ' . single_cat_title('', false) . ' articles on wp_modern_starter.com';
	} elseif (is_tag()) {
		$page_description = tag_description() ?: 'Articles tagged with ' . single_tag_title('', false) . ' on wp_modern_starter.com';
	}
	?>
	
	<!-- SEO Meta Tags -->
	<?php if ($page_description): ?>
	<meta name="description" content="<?php echo esc_attr($page_description); ?>">
	<?php endif; ?>
	<?php // Note: Robots meta, canonical URLs, Open Graph, Twitter Cards, and Article meta tags are handled by Yoast SEO plugin ?>

	<?php // Note: JSON-LD structured data is handled by Yoast SEO plugin ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary">
		<?php esc_html_e( 'Skip to content', 'wp-modern-starter' ); ?>
	</a>

	<?php 
    // include main-nav
    require get_template_directory() . '/template-parts/main-nav.php'; 
  ?>

