<?php
/**
 * B2Me Starter Theme - eCommerce functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package B2Me_Starter_Theme_-_eCommerce
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '2024.1' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function b2me_starter_theme_ecommerce_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on B2Me Starter Theme - eCommerce, use a find and replace
		* to change 'b2me-starter-theme-ecommerce' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'b2me-starter-theme-ecommerce', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'b2me-starter-theme-ecommerce' ),
			'footer-nav' => esc_html__( 'Footer Nav', 'b2me-starter-theme-ecommerce' ),
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
			'b2me_starter_theme_ecommerce_custom_background_args',
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
add_action( 'after_setup_theme', 'b2me_starter_theme_ecommerce_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function b2me_starter_theme_ecommerce_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'b2me_starter_theme_ecommerce_content_width', 640 );
}
add_action( 'after_setup_theme', 'b2me_starter_theme_ecommerce_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function b2me_starter_theme_ecommerce_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'b2me-starter-theme-ecommerce' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'b2me-starter-theme-ecommerce' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'b2me_starter_theme_ecommerce_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function b2me_starter_theme_ecommerce_scripts() {
	// Fonts
	wp_enqueue_style( 'google-fonts-opensans', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap');
	wp_enqueue_style( 'google-fonts-oxygen', 'https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap');

	// CSS Resources
	wp_enqueue_style( 'b2me-aos', 'https://unpkg.com/aos@next/dist/aos.css');
	wp_enqueue_style( 'b2me-fa-icons', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css');
	wp_enqueue_style( 'b2me-slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css', array(), _S_VERSION );

	// Main CSS
	wp_enqueue_style( 'b2me-global-styles', get_stylesheet_directory_uri() . '/css/global.css', array(), null);
	wp_enqueue_style( 'b2me-starter-theme-ecommerce-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'main-style', get_stylesheet_directory_uri() . '/stylus/style.css', array(), null);
	wp_style_add_data( 'b2me-starter-theme-ecommerce-style', 'rtl', 'replace' );

	// JS Resources
	wp_enqueue_script( 'b2me-slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', ['jquery'], _S_VERSION, true );
	wp_enqueue_script( 'b2me-aos', 'https://unpkg.com/aos@next/dist/aos.js', ['jquery'], _S_VERSION, true );

	// Main JS
	wp_enqueue_script( 'b2me-global-script',  get_stylesheet_directory_uri() . '/js/global.js', ['jquery'], null);
	wp_enqueue_script( 'shortcodes-scripts', get_stylesheet_directory_uri() . '/js/shortcodes.js', ['jquery']);
	wp_enqueue_script( 'main-scripts', get_stylesheet_directory_uri() . '/js/app.js', ['jquery']);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'b2me_starter_theme_ecommerce_scripts' );

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
 * Call shortcodes
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/** Require all modules on theme */
function b2me_starter_theme_require_modules () {
	$modules = glob( get_stylesheet_directory() . '/modules/*' , GLOB_ONLYDIR );
	if ( $modules ) {
		foreach ( $modules as $module ) {
			if ( file_exists( $module . '/module.php' ) ) {
				require_once( $module . '/module.php' );
			}
		}
	}
}
add_action( 'after_setup_theme', 'b2me_starter_theme_require_modules' );

function add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );

	return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

/* Disable visual editor on page edit */
function disable_visual_editor_on_pages() {
    global $pagenow;

    if ($pagenow == 'post.php' && isset($_GET['post'])) {
        $post_id = $_GET['post'];
        $post_type = get_post_type($post_id);

        // Check if it's a page
        if ($post_type == 'page') {
            add_filter('user_can_richedit', '__return_false', 50);
        }
    }
}
add_action('admin_init', 'disable_visual_editor_on_pages');