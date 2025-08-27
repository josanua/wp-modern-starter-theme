<?php
/**
 * wp_modern_starter main theme functions and definitions
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wp_modern_starter_main_theme
 */


// Fonts
// Open Sans - popularly font
// const GOOGLE_FONT_PATH = 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;700&display=swap'; //for smaller options and testing
// const GOOGLE_FONT_PATH = 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap';
 const GOOGLE_FONT_PATH = 'https://fonts.googleapis.com/css?family=Lato:100,300,400,700,90&display=swap';

// Roboto font all font-weight types
// const GOOGLE_FONT_PATH = 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap';
// const GOOGLE_FONT_PATH = 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,500;0,700;1,300;1,500;1,700&display=swap';


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wp_modern_starter_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on wp_modern_starter main theme, use a find and replace
		* to change 'wp-modern-starter' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'wp-modern-starter', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary_navigation' => __( 'Primary Navigation', 'wp-modern-starter' ),
			'footer_navigation'  => __( 'Footer Navigation', 'wp-modern-starter' )
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'wp_modern_starter_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);


}

add_action( 'after_setup_theme', 'wp_modern_starter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_modern_starter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_modern_starter_content_width', 640 );
}

add_action( 'after_setup_theme', 'wp_modern_starter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_modern_starter_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wp-modern-starter' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wp-modern-starter' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}

add_action( 'widgets_init', 'wp_modern_starter_widgets_init' );

// Vite configuration
define('VITE_SERVER', 'http://localhost:3001/');
define('VITE_ENTRY_POINT', 'src/js/main.js');

function is_vite_dev_server_running() {
	$context = stream_context_create([
		'http' => [
			'timeout' => 1,
			'ignore_errors' => true
		]
	]);
	return @file_get_contents(VITE_SERVER, false, $context) !== false;
}

/**
 * Enqueue scripts and styles.
 */
function wp_modern_starter_scripts() {
	if ( defined( 'WP_DEBUG' ) && WP_DEBUG && is_vite_dev_server_running() ) {
		// Development: Load from Vite dev server
		function vite_head_module_hook() {
			echo '<script type="module" crossorigin src="' . VITE_SERVER . VITE_ENTRY_POINT . '"></script>';
		}
		add_action('wp_head', 'vite_head_module_hook');
	} else {
		// Production: Load built assets
		$css_file = get_template_directory() . '/dist/assets/css/main.css';
		$js_file = get_template_directory() . '/dist/main.js';
		
		if ( file_exists( $css_file ) ) {
			wp_enqueue_style(
				'wp_modern_starter-style',
				get_template_directory_uri() . '/dist/assets/css/main.css',
				[],
				file_exists( $css_file ) ? filemtime( $css_file ) : _S_VERSION
			);
		}
		
		if ( file_exists( $js_file ) ) {
			wp_enqueue_script(
				'wp_modern_starter-script',
				get_template_directory_uri() . '/dist/main.js',
				[],
				filemtime( $js_file ),
				true
			);
		}
		
		// Admin and blocks assets if they exist
		$admin_js = get_template_directory() . '/dist/admin.js';
		$blocks_js = get_template_directory() . '/dist/blocks.js';
		
		if ( is_admin() && file_exists( $admin_js ) ) {
			wp_enqueue_script(
				'wp_modern_starter-admin',
				get_template_directory_uri() . '/dist/admin.js',
				[],
				filemtime( $admin_js ),
				true
			);
		}
		
		if ( file_exists( $blocks_js ) ) {
			wp_enqueue_script(
				'wp_modern_starter-blocks',
				get_template_directory_uri() . '/dist/blocks.js',
				[],
				filemtime( $blocks_js ),
				true
			);
		}
	}

	// FontAwesome 6.0.0 - matches forth-design template
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', [], '6.0.0' );

	wp_enqueue_script( 'popper-js', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js', array( 'jquery' ), '2.11.7', true );
	wp_enqueue_script( 'bs-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js', array( 'popper-js' ), '5.3.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'wp_modern_starter_scripts' );

/**
 * Load Environment Settings
 */
require get_template_directory() . '/inc/env.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Walker class
 */
require get_template_directory() . '/inc/walker-nav-class.php';

/**
 * Additionally custom functions
 */
require get_template_directory() . '/inc/custom-functions.php';


/**
 * Include main App class
 */
// require get_template_directory() . '/inc/App.php';

/**
 * Load Jetpack compatibility file.
 */
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	require get_template_directory() . '/inc/jetpack.php';
// }


// Utility functions for main plugin
function remove_jquery_migrate( $scripts ) {
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {

		$script = $scripts->registered['jquery'];

		if ( $script->deps ) {
			$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
		}
	}
}

add_action( 'wp_default_scripts', 'remove_jquery_migrate' );

/**
 * Add development mode indicator
 */
function wp_modern_starter_dev_mode_indicator() {
    if ( defined( 'WP_DEBUG' ) && WP_DEBUG && is_vite_dev_server_running() ) {
        echo '<script>console.log("🛠️ Development mode - Vite HMR active");</script>';
    }
}
add_action( 'wp_head', 'wp_modern_starter_dev_mode_indicator' );

/**
 * Site Configuration
 * Centralized configuration for all site settings, social links, and content
 */
require get_template_directory() . '/inc/site-config.php';

/**
 * SEO Enhancements
 * All SEO functions are organized in a separate modular file
 */
require get_template_directory() . '/inc/seo-functions.php';