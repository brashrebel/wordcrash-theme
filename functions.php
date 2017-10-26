<?php
/**
 * The theme's functions file that loads on EVERY page, used for uniform functionality.
 *
 * @since   0.1.0
 * @package WordCrash
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

// Make sure PHP version is correct
if ( ! version_compare( PHP_VERSION, '5.3.0', '>=' ) ) {
	wp_die( 'ERROR in WordCrash theme: PHP version 5.3 or greater is required.' );
}

// Make sure no theme constants are already defined (realistically, there should be no conflicts)
if ( defined( 'THEME_VERSION' ) || defined( 'THEME_ID' ) || isset( $wordcrash_fonts ) ) {
	wp_die( 'ERROR in WordCrash theme: There is a conflicting constant. Please either find the conflict or rename the constant.' );
}

/**
 * The theme's current version (make sure to keep this up to date!)
 */
define( 'THEME_VERSION', '1.0.1' );

/**
 * The theme's ID (used in handlers).
 */
define( 'THEME_ID', 'wordcrash' );

// Base actions
add_action( 'after_setup_theme', '_wordcrash_setup_theme' );
add_action( 'init', '_wordcrash_register_scripts' );
add_action( 'wp_enqueue_scripts', '_wordcrash_load_scripts' );
add_action( 'after_setup_theme', '_wordcrash_load_nav_menus' );
// add_action( 'widgets_init', '_wordcrash_load_sidebars' );
add_action( 'wp_head', '_wordcrash_load_favicon' );

function wordcrash_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wordcrash_content_width', 900 );
}
add_action( 'after_setup_theme', 'wordcrash_content_width', 0 );

/**
 * Setup theme properties and stuff.
 *
 * @since 0.1.0
 */
function _wordcrash_setup_theme() {

	// Add theme support
	require_once __DIR__ . '/includes/theme-support.php';

	// Allow shortcodes in text widget
	add_filter( 'widget_text', 'do_shortcode' );
}

/**
 * Register theme files.
 *
 * @since 0.1.0
 */
function _wordcrash_register_scripts() {

	// Theme styles
	wp_register_style(
		THEME_ID,
		get_template_directory_uri() . '/style.css',
		array( 'foundation' ),
		defined( 'WP_DEBUG' ) && WP_DEBUG ? time() : THEME_VERSION
	);

	// Theme script
	wp_register_script(
		THEME_ID,
		get_template_directory_uri() . '/script.js',
		array( 'jquery', 'foundation' ),
		defined( 'WP_DEBUG' ) && WP_DEBUG ? time() : THEME_VERSION,
		true
	);

	// Shuffle
	wp_register_script(
		'shuffle',
		get_template_directory_uri() . '/assets/vendor/js/jquery.shuffle.min.js',
		array(),
		defined( 'WP_DEBUG' ) && WP_DEBUG ? time() : '3.0.0'
	);

	// FOUNDATION
	wp_register_style(
		'foundation',
		get_template_directory_uri() . '/assets/vendor/css/foundation.min.css',
		array( 'normalize' ),
		defined( 'WP_DEBUG' ) && WP_DEBUG ? time() : '5.5.2'
	);

	wp_register_style(
		'normalize',
		get_template_directory_uri() . '/assets/vendor/css/normalize.css',
		array(),
		defined( 'WP_DEBUG' ) && WP_DEBUG ? time() : '3.0.3'
	);

	wp_register_script(
		'foundation',
		get_template_directory_uri() . '/assets/vendor/js/foundation.min.js',
		array( 'jquery', 'fastclick', 'jquery-cookie', 'modernizr', 'placeholder' ),
		defined( 'WP_DEBUG' ) && WP_DEBUG ? time() : '5.5.2'
	);

	wp_register_script(
		'fastclick',
		get_template_directory_uri() . '/assets/vendor/js/fastclick.js',
		array(),
		defined( 'WP_DEBUG' ) && WP_DEBUG ? time() : THEME_VERSION
	);

	wp_register_script(
		'jquery-cookie',
		get_template_directory_uri() . '/assets/vendor/js/jquery.cookie.js',
		array( 'jquery' ),
		defined( 'WP_DEBUG' ) && WP_DEBUG ? time() : '1.4.1'
	);

	wp_register_script(
		'modernizr',
		get_template_directory_uri() . '/assets/vendor/js/modernizr.js',
		array(),
		defined( 'WP_DEBUG' ) && WP_DEBUG ? time() : '2.8.3'
	);

	wp_register_script(
		'placeholder',
		get_template_directory_uri() . '/assets/vendor/js/placeholder.js',
		array(),
		defined( 'WP_DEBUG' ) && WP_DEBUG ? time() : '2.0.9'
	);

	/**
	 * Fonts for the theme. Must be hosted font (Google fonts for example).
	 *
	 * @since 0.1.0
	 */
	$wordcrash_fonts = apply_filters( 'wordcrash_fonts', array(
		'font-awesome' => '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css',
		'open-sans' => 'https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic',
		'sigmar' => '//fonts.googleapis.com/css?family=Sigmar+One',
	) );

	if ( ! empty( $wordcrash_fonts ) ) {
		foreach ( $wordcrash_fonts as $ID => $link ) {
			wp_register_style(
				THEME_ID . "-font-$ID",
				$link
			);
		}
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/**
 * Enqueue theme files.
 *
 * @since 0.1.0
 */
function _wordcrash_load_scripts() {

	// Theme styles
	wp_enqueue_style( THEME_ID );

	// Theme script
	wp_enqueue_script( THEME_ID );

	// Shuffle
	wp_enqueue_script( 'shuffle' );

	// FOUNDATION
	wp_enqueue_script( 'foundation' );
	wp_enqueue_script( 'fastclick' );
	wp_enqueue_script( 'jquery.cookie.js' );
	wp_enqueue_script( 'modernizr.js' );
	wp_enqueue_script( 'placeholder.js' );

	/** Explained above */
	$wordcrash_fonts = apply_filters( 'wordcrash_fonts', array(
		'font-awesome' => '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css',
		'open-sans' => 'https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic',
		'sigmar' => '//fonts.googleapis.com/css?family=Sigmar+One',
	) );

	if ( ! empty( $wordcrash_fonts ) ) {
		foreach ( $wordcrash_fonts as $ID => $link ) {
			wp_enqueue_style( THEME_ID . "-font-$ID" );
		}
	}
}

/**
 * Register nav menus.
 *
 * @since 0.1.0
 */
function _wordcrash_load_nav_menus() {

	// Primary
	register_nav_menu( 'primary', 'Primary Menu' );

	// Error 404
	register_nav_menu( 'error-404', 'Error 404' );
}

/**
 * Register sidebars.
 *
 * @since 0.1.0
 */
function _wordcrash_load_sidebars() {

	// Page
//	register_sidebar( array(
//		'name' => 'Page',
//		'id' => 'page',
//		'description' => 'Displays on all pages.',
//		'before_title' => '<h3 class="widget-title">',
//		'after_title' => '</h3>',
//	));
}

/**
 * Adds a favicon.
 *
 * @since 0.1.0
 */
function _wordcrash_load_favicon() {

	if ( ! file_exists( get_stylesheet_directory() . '/assets/images/favicon.ico' ) ) {
		return;
	}
	?>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() . '/assets/images/favicon.ico'; ?>"/>
	<?php
}

	if ( ! function_exists( 'wordcrash_widgets_init' ) ) :
	/**
	* Register widget areas and custom widgets.
	*
	* @link http://codex.wordpress.org/Function_Reference/register_sidebar
	*/
	function wordcrash_widgets_init() {

		register_sidebar( array(
			'name' => __( 'Wordcrash Sidebar', 'wordcrash' ),
			'id' => 'wordcrash-sidebar',
			'description' => __( 'Appears on posts and pages except the full width template.', 'wordcrash' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title' => '<h5>',
			'after_title' => '</h5>',
		));
	}
endif;
add_action( 'widgets_init', 'wordcrash_widgets_init' );

// Include shortcodes
require_once __DIR__ . '/includes/shortcodes/button.php';

// Include theme specific functions
require_once __DIR__ . '/includes/theme-functions.php';

// Admin
require_once __DIR__ . '/admin/admin.php';
