<?php
/**
 * Rosa2 Lite functions and definitions
 *
 * @package Rosa2 Lite
 */

if ( ! function_exists( 'rosa2_lite_setup' ) ) {

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function rosa2_lite_setup() {
		/**
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Nova, use a find and replace
		 * to change '__theme_txtd' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( '__theme_txtd', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Enable support for Post Thumbnails on posts only.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		remove_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-thumbnails', array( 'post' ) );

		/**
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary'   => esc_html__( 'Primary Menu', '__theme_txtd' ),
			'secondary' => esc_html__( 'Secondary Menu', '__theme_txtd' ),
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
			'header-text' => array(
				'site-title',
				'site-description',
			)
		) );
		add_image_size( 'rosa2-site-logo', 250, 250, false );

		add_theme_support( 'align-wide' );

		/**
		 * Add theme support for responsive embeds
		 */
		add_theme_support( 'responsive-embeds' );

		add_theme_support( 'disable-custom-font-sizes' );
		add_theme_support( 'editor-font-sizes', array() );

		/**
		 * Enable support for the Style Manager Customizer section (via Customify).
		 */
		add_theme_support( 'customizer_style_manager' );
	}
}
add_action( 'after_setup_theme', 'rosa2_lite_setup', 10 );

function rosa2_lite_deregister_gutenberg_styles() {
	// Overwrite Core block styles with empty styles.
	wp_deregister_style( 'wp-block-library' );
	wp_register_style( 'wp-block-library', '' );

	// Overwrite Core theme styles with empty styles.
	wp_deregister_style( 'wp-block-library-theme' );
	wp_register_style( 'wp-block-library-theme', '' );
}

add_action( 'enqueue_block_assets', 'rosa2_lite_deregister_gutenberg_styles', 10 );

function rosa2_lite_enqueue_theme_block_editor_assets() {
	$theme  = wp_get_theme( get_template() );
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	/* Default Google Fonts */
	wp_enqueue_style( 'rosa2-lite-google-fonts', rosa2_lite_google_fonts_url() );

	wp_enqueue_style( 'rosa2-block-styles', get_template_directory_uri() . '/editor.css', array(), $theme->get( 'Version' ) );
	wp_enqueue_style( 'rosa2-theme-styles', get_template_directory_uri() . '/dist/js/editor.blocks.css', array(), $theme->get( 'Version' ) );

	wp_enqueue_script(
		'rosa2-editor-js',
		get_template_directory_uri() . '/dist/js/editor.blocks' . $suffix . '.js',
		array( 'wp-blocks', 'wp-dom', 'wp-hooks' ),
		$theme->get( 'Version' ),
		true
	);
}

add_action( 'enqueue_block_editor_assets', 'rosa2_lite_enqueue_theme_block_editor_assets', 10 );

function rosa2_lite_scripts() {
	$theme  = wp_get_theme( get_template() );
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	/* Default Google Fonts */
	wp_enqueue_style( 'rosa2-lite-google-fonts', rosa2_lite_google_fonts_url() );

	wp_enqueue_style( 'rosa2-style', get_template_directory_uri() . '/style.css', array(), $theme->get( 'Version' ) );
	wp_style_add_data( 'rosa2-style', 'rtl', 'replace' );

	wp_enqueue_style( 'rosa2-blocks-styles', get_template_directory_uri() . '/dist/js/editor.blocks.css', array(), $theme->get( 'Version' ) );

	wp_enqueue_script( 'rosa2-app', get_template_directory_uri() . '/dist/js/scripts' . $suffix . '.js', array(
		'jquery',
		'hoverIntent',
		'imagesloaded'
	), $theme->get( 'Version' ), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'rosa2_lite_scripts', 10 );

function rosa2_lite_print_scripts() {
	ob_start(); ?>
    <script>
		window.addEventListener( "DOMContentLoaded", function( event ) {
			document.body.classList.remove( "is-loading" );
			document.body.classList.add( "has-loaded" );
		} );
		window.addEventListener( "beforeunload", function( event ) {
			document.body.classList.add( "is-loading" );
		} );
    </script>

	<?php echo ob_get_clean();
}

add_action( 'wp_print_scripts', 'rosa2_lite_print_scripts', 10 );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rosa2_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rosa2_lite_content_width', 960 );
}
add_action( 'after_setup_theme', 'rosa2_lite_content_width', 0 );


/**
 * Custom template tags for this theme.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/template-functions.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/extras.php';

/**
 * Customizer additions.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/customizer.php';

/**
 * Load various plugin integrations
 */
require_once trailingslashit( get_template_directory() ) . 'inc/integrations.php';

/**
 * Admin dashboard related logic.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/admin.php';
