<?php
/**
 * WP Modern Starter theme functions and definitions
 *
 * @package wp_modern_starter
 */

// Theme setup
function wp_modern_starter_setup() {
	load_theme_textdomain( 'wp-modern-starter', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'wp-modern-starter' ),
	) );

	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'
	) );

	add_theme_support( 'custom-background' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'custom-logo' );
}
add_action( 'after_setup_theme', 'wp_modern_starter_setup' );

// Content width
function wp_modern_starter_content_width() {
	$GLOBALS['content_width'] = 1200;
}
add_action( 'after_setup_theme', 'wp_modern_starter_content_width', 0 );

// Widget areas
function wp_modern_starter_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'wp-modern-starter' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'wp_modern_starter_widgets_init' );

// Vite configuration
define('VITE_SERVER', 'http://localhost:3001/');
define('VITE_ENTRY_POINT', 'src/js/main.js');

function is_vite_dev_server_running() {
	$context = stream_context_create([
		'http' => ['timeout' => 1, 'ignore_errors' => true]
	]);
	return @file_get_contents(VITE_SERVER, false, $context) !== false;
}

// Enqueue scripts and styles
function wp_modern_starter_scripts() {
	$wp_debug = defined( 'WP_DEBUG' ) && WP_DEBUG;
	$vite_running = is_vite_dev_server_running();
	
	// Debug information
	add_action('wp_head', function() use ( $wp_debug, $vite_running ) {
		echo '<script>';
		echo 'console.log("WP_DEBUG: ' . ($wp_debug ? 'true' : 'false') . '");';
		echo 'console.log("Vite server running: ' . ($vite_running ? 'true' : 'false') . '");';
		echo '</script>';
	});
	
	if ( $wp_debug && $vite_running ) {
		// Development: Load from Vite dev server
		function vite_head_module_hook() {
			echo '<script type="module" crossorigin src="' . VITE_SERVER . '@vite/client"></script>';
			echo '<script type="module" crossorigin src="' . VITE_SERVER . VITE_ENTRY_POINT . '"></script>';
			echo '<script>console.log("Vite dev server connected - live reload enabled");</script>';
		}
		add_action('wp_head', 'vite_head_module_hook');
	} else {
		// Production: Load built assets
		$css_file = get_template_directory() . '/dist/assets/css/main.css';
		$js_file = get_template_directory() . '/dist/main.js';
		
		add_action('wp_head', function() {
			echo '<script>console.log("Loading production assets");</script>';
		});
		
		if ( file_exists( $css_file ) ) {
			wp_enqueue_style( 'wp-modern-starter-style', get_template_directory_uri() . '/dist/assets/css/main.css', [], filemtime( $css_file ) );
		}
		
		if ( file_exists( $js_file ) ) {
			wp_enqueue_script( 'wp-modern-starter-script', get_template_directory_uri() . '/dist/main.js', [], filemtime( $js_file ), true );
		}
	}

	// External dependencies
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', [], '6.0.0' );
	wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', [], '5.3.3', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_modern_starter_scripts' );

// Remove jQuery Migrate
function wp_modern_starter_remove_jquery_migrate( $scripts ) {
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
		$script = $scripts->registered['jquery'];
		if ( $script->deps ) {
			$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
		}
	}
}
add_action( 'wp_default_scripts', 'wp_modern_starter_remove_jquery_migrate' );

// Required theme files
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/walker-nav-class.php';