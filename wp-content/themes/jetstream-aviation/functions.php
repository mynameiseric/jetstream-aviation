<?php
/**
 * Jetstream Aviation functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Jetstream_Aviation
 */

new Functions();

class Functions {
  /**
   * Sets up the theme and support for WordPress and DrakeCooper
   * framework functionality.
   */
  public function __construct() {
    $this->constants();
    $this->manage_site_styles();
    $this->manage_site_scripts();
  }
  
  /**
   * Defines the constant paths for use within this theme.
   *
   * @since 0.1.0
   */
  private function constants() {
    // Sets the path to the parent theme directory.
    define( 'THEME_DIR', get_template_directory() );

    // Sets the path to the parent theme directory URI.
    define( 'THEME_URI', get_template_directory_uri() );

    // Sets the path to the child theme directory.
    define( 'CHILD_THEME_DIR', get_stylesheet_directory() );

    // Sets the path to the child theme directory URI.
    define( 'CHILD_THEME_URI', get_stylesheet_directory_uri() );

		// Sets the path to the child theme library directory.
		define( 'CHILD_THEME_LIB_DIR',  get_stylesheet_directory() . '/library' );

		// Sets the path to the child theme css directory URI.
		//define( 'CHILD_THEME_CSS_URI', trailingslashit( CHILD_THEME_URI ) . 'library/css' );

		// Sets the path to the child theme images directory URI.
		define( 'CHILD_THEME_IMG_URI', trailingslashit( CHILD_THEME_URI ) . 'img' );

		// Sets the path to the child theme javascript directory URI.
		define( 'CHILD_THEME_JS_URI', trailingslashit( CHILD_THEME_URI ) . 'js' );
    
   // Sets the path to the child theme fonts.
		define( 'CHILD_THEME_FONTS_URI', trailingslashit( CHILD_THEME_URI ) . 'fonts' );

  }

  /**
   * Manage Sitewide Styles
   */
  private function manage_site_styles() {

    // Enqueue Styles
    add_action( 'wp_enqueue_scripts', function() {
//      global $wp_styles;
//      // HEADER
//      wp_enqueue_style(
//        'style',
//        trailingslashit( CHILD_THEME_CSS_URI ) . 'style.css',
//        '',
//        '',
//        'all'
//      );
//      
      wp_enqueue_style(
        'font-awesome',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css',
        '',
        '',
        'all'
      );
      
/*
      wp_enqueue_style(
          'ie8_conditional',
          trailingslashit( CHILD_THEME_CSS_URI ) . 'style-ie8.css',
          array( 'style' ),
          '',
          'all'
        );
      $wp_styles->add_data( 'ie8_conditional', 'conditional', 'IE 8' );
*/
    });

//    add_action( 'wp_enqueue_scripts', function() {
//      wp_dequeue_style( 'main' );
//      wp_dequeue_style( 'thematic_style' );
//      wp_deregister_style( 'dc-modal' );
//    }, 99);

    // HTML5, Correct style links (no id or type attributes)
    add_filter( 'style_loader_tag', function( $tag ) {
      $tag = preg_replace( '/\s+id=["\'][^"\']++["\']/', '', $tag );
      return preg_replace( '/\s+type=["\'][^"\']++["\']/', '', $tag );
    });
  }


  /**
   * Manage Sitewide Scripts
   */
  private function manage_site_scripts() {

    // Enqueue Scripts, priority: 5
    add_action( 'wp_enqueue_scripts', function() {
      // HEADER

        // FOOTER
        if ( ! is_admin() ) {
          // jQuery
          wp_deregister_script( 'jquery' ); // Build jQuery using GoogleAPI
          wp_register_script(
              'jquery',
              '//code.jquery.com/jquery-2.2.3.min.js',
              false,
              '2.2.3',
              false
            );
          wp_enqueue_script( 'jquery' );

          // jQuery UI
//          wp_deregister_script( 'jquery-ui' ); // Build jQuery UI using GoogleAPI
//          wp_register_script(
//              'jquery-ui',
//              '//code.jquery.com/ui/1.11.4/jquery-ui.min.js',
//              array( 'jquery' ),
//              '1.11.4',
//              true
//            );
        }
      }, 5 );

      // Enqueue Scripts, priority: default (10)
      add_action( 'wp_enqueue_scripts', function() {
        
        if ( ! is_admin() ) {
          // FOOTER
          if ( defined( 'WP_DEBUG' ) && true === WP_DEBUG ) {
            // Dev only scripts
            wp_enqueue_script(
                'tweenmax',
                trailingslashit( CHILD_THEME_JS_URI ) . 'vendor/TweenMax.js',
                array( 'jquery' ),
                '',
                false
            );
            wp_enqueue_script(
                'scroll-magic',
                trailingslashit( CHILD_THEME_JS_URI ) . 'vendor/ScrollMagic.js',
                array( 'jquery' ),
                '',
                false
            );
            wp_enqueue_script(
                'scroll-magic-gsap',
                trailingslashit( CHILD_THEME_JS_URI ) . 'vendor/animation.gsap.js',
                array( 'jquery' ),
                '',
                false
            );
            wp_enqueue_script(
                'debug-add-indictors',
                trailingslashit( CHILD_THEME_JS_URI ) . 'vendor/debug.addIndicators.js',
                array( 'jquery' ),
                '',
                false
            );
//             	wp_enqueue_script( 
//                  'jetstream-aviation-skip-link-focus-fix', 
//                  trailingslashit( CHILD_THEME_JS_URI ) . 'skip-link-focus-fix.js', 
//                  array(), 
//                  '20151215', 
//                  true );
//
//              wp_enqueue_script( 
//                  'jetstream-aviation-navigation', 
//                  get_template_directory_uri() . '/js/navigation.js', 
//                  array(), 
//                  '20151215', 
//                  true );
              
//            wp_enqueue_script(
//                'colorbox',
//                trailingslashit( CHILD_THEME_JS_URI ) . 'vendor/jquery.colorbox.js',
//                array( 'jquery' ),
//                '',
//                true
//            );
//
            wp_enqueue_script(
                'main',
                trailingslashit( CHILD_THEME_JS_URI ) . 'site/main.js',
                array( 'jquery' ),
                '',
                true
              );
//
          } 
          else {
            // Production only scripts
            wp_enqueue_script(
                'vendor',
                trailingslashit( CHILD_THEME_JS_URI ) . 'build/' . 'vendor.min.js',
                array( 'jquery' ),
                '',
                true
              );

            wp_enqueue_script(
                'site',
                trailingslashit( CHILD_THEME_JS_URI ) . 'build/' . 'site.min.js',
                array( 'jquery', 'vendor' ),
                '',
                true
              );
          }
        }
    });
  }  
  
}

if ( ! function_exists( 'jetstream_aviation_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function jetstream_aviation_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Jetstream Aviation, use a find and replace
	 * to change 'jetstream-aviation' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'jetstream-aviation', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'jetstream-aviation' ),
	) );

	/*
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'jetstream_aviation_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'jetstream_aviation_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jetstream_aviation_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jetstream_aviation_content_width', 640 );
}
add_action( 'after_setup_theme', 'jetstream_aviation_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jetstream_aviation_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'jetstream-aviation' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'jetstream_aviation_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function jetstream_aviation_scripts() {
	wp_enqueue_style( 'jetstream-aviation-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jetstream-aviation-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'jetstream-aviation-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

//	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
//		wp_enqueue_script( 'comment-reply' );
//	}
}
add_action( 'wp_enqueue_scripts', 'jetstream_aviation_scripts' );

add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}

function my_nav_wrap() {
  // default value of 'items_wrap' is <ul id="%1$s" class="%2$s">%3$s</ul>'
  
  // open the <ul>, set 'menu_class' and 'menu_id' values
  $wrap  = '<ul id="%1$s" class="%2$s">';
  
  $wrap .= '<div class="swoosh-up"><img src="' . get_template_directory_uri() . '/img/swoosh-up.png"></div>';
  
  // get nav items as configured in /wp-admin/
  $wrap .= '%3$s';
  
  $wrap .= '<span class="end-cap"></span>';
  
  // close the <ul>
  $wrap .= '</ul>';
  // return the result
  return $wrap;
}



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
//require get_template_directory() . '/inc/jetpack.php';
