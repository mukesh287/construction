<?php
/**
 * membershiply functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package membershiply
 */


if ( ! function_exists( 'membershiply_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */

	function membershiply_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on membershiply, use a find and replace
		 * to change 'membershiply' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'membershiply', get_template_directory() . '/languages' );

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
		set_post_thumbnail_size( 300 );

		add_image_size( 'membershiply-grid', 350 , 230, true );
		add_image_size( 'membershiply-slider', 850 );
		add_image_size( 'membershiply-small', 300 , 180, true );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1'	=> esc_html__( 'Primary', 'membershiply' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'membershiply_custom_background_args', array(
			'default-color' => '#f1f1f1',
			'default-image' => '',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'membershiply_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function membershiply_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'membershiply_content_width', 640 );
}
add_action( 'after_setup_theme', 'membershiply_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function membershiply_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'membershiply' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'membershiply' ),
		'before_widget' => '<section id="%1$s" class="fbox swidgets-wrap widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="sidebar-headline-wrapper"><div class="sidebarlines-wrapper"><div class="widget-title-lines"></div></div><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (1)', 'membershiply' ),
		'id'            => 'footerwidget-1',
		'description'   => esc_html__( 'Add widgets here.', 'membershiply' ),
		'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (2)', 'membershiply' ),
		'id'            => 'footerwidget-2',
		'description'   => esc_html__( 'Add widgets here.', 'membershiply' ),
		'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (3)', 'membershiply' ),
		'id'            => 'footerwidget-3',
		'description'   => esc_html__( 'Add widgets here.', 'membershiply' ),
		'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Widget (1)', 'membershiply' ),
		'id'            => 'headerwidget-1',
		'description'   => esc_html__( 'Add widgets here.', 'membershiply' ),
		'before_widget' => '<section id="%1$s" class="header-widget widget swidgets-wrap %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><div class="sidebar-title-border"><h3 class="widget-title">',
		'after_title'   => '</h3></div></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Widget (2)', 'membershiply' ),
		'id'            => 'headerwidget-2',
		'description'   => esc_html__( 'Add widgets here.', 'membershiply' ),
		'before_widget' => '<section id="%1$s" class="header-widget widget swidgets-wrap %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><div class="sidebar-title-border"><h3 class="widget-title">',
		'after_title'   => '</h3></div></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Widget (3)', 'membershiply' ),
		'id'            => 'headerwidget-3',
		'description'   => esc_html__( 'Add widgets here.', 'membershiply' ),
		'before_widget' => '<section id="%1$s" class="header-widget widget swidgets-wrap %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><div class="sidebar-title-border"><h3 class="widget-title">',
		'after_title'   => '</h3></div></div>',
	) );

	
}




add_action( 'widgets_init', 'membershiply_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function membershiply_scripts() {
	wp_enqueue_style( 'membershiply-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'membershiply-style', get_stylesheet_uri() );
	wp_enqueue_script( 'membershiply-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20170823', true );
	wp_enqueue_script( 'membershiply-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20170823', true );	
	wp_enqueue_script( 'membershiply-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'), '20150423', true );
	wp_enqueue_script( 'membershiply-script', get_template_directory_uri() . '/js/script.js', array(), '20160720', true );
	wp_enqueue_script( 'membershiply-accessibility', get_template_directory_uri() . '/js/accessibility.js', array(), '20160720', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'membershiply_scripts' );

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Google fonts, credits can be found in readme.
 */

function membershiply_google_fonts() {

	wp_enqueue_style( 'membershiply-google-fonts', '//fonts.googleapis.com/css?family=Noto+Sans+JP:wght@400;500;700&display=swap', false ); 
}

add_action( 'wp_enqueue_scripts', 'membershiply_google_fonts' );



/**
 * Deactivate Elementor Wizard
 */
function membershiply_remove_elementor_onboarding() {
	update_option( 'elementor_onboarded', true );
}
add_action( 'after_switch_theme', 'membershiply_remove_elementor_onboarding' );




/**
 * Dots after excerpt
 */

function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');



/**
 * Blog Pagination 
 */
if ( !function_exists( 'membershiply_numeric_posts_nav' ) ) {
	
	function membershiply_numeric_posts_nav() {

		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			if( !$current_page = get_query_var('paged') )
				$current_page = 1;
			if( get_option('permalink_structure') ) {
				$format = 'page/%#%/';
			} else {
				$format = '&paged=%#%';
			}
			echo wp_kses_post(paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> 'Previous',
				'next_text'		=> 'Next',
			) ));
		}
	}
	
}


/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function membershiply_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
		/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'membershiply_skip_link_focus_fix' );



require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Free Seo Optimized Responsive Theme for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'membershiply_register_required_plugins' );

function membershiply_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
    	array(
    		'name'      => 'Superb Helper',
    		'slug'      => 'superb-helper',
    		'required'  => false,
    	),

    	array(
    		'name'      => 'Elementor',
    		'slug'      => 'elementor',
    		'required'  => false,
    	),

    	array(
    		'name'      => 'ProfileGrid',
    		'slug'      => 'profilegrid-user-profiles-groups-and-communities',
    		'required'           => false,
    	),

    	    	array(
    		'name'      => 'Superb Addons - WordPress Editor And Elementor Blocks, Sections & Patterns',
    		'slug'      => 'superb-blocks',
    		'required'           => false,
    	),
    );

    $config = array(
        'id'           => 'membershiply',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );


    tgmpa( $plugins, $config );
}

/**
 * Checkbox sanitization callback example.
 * 
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function membershiply_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}


/**
 * Copyright and License for Upsell button by Justin Tadlock - 2016-2019 © Justin Tadlock. customizer button https://github.com/justintadlock/trt-customizer-pro
 */
require_once( trailingslashit( get_template_directory() ) . 'justinadlock-customizer-button/class-customize.php' );







// Theme page start

add_action('admin_menu', 'membershiply_themepage');
function membershiply_themepage()
{
	$option = get_option('membershiply_themepage_seen');
	$awaiting = !$option ? ' <span class="awaiting-mod">1</span>' : '';
	$theme_info = add_theme_page(__('Theme Settings', 'membershiply'), __('Theme Settings', 'membershiply').$awaiting, 'manage_options', 'membershiply-info.php', 'membershiply_info_page', 1);
}
function membershiply_info_page()
{
	$user = wp_get_current_user();
	$theme = wp_get_theme();
	$parent_name = is_child_theme() ? wp_get_theme($theme->Template) : '';
	$theme_name = is_child_theme() ? $theme." ".__("and", "membershiply")." ".$parent_name : $theme;
	$demo_text = is_child_theme() ? sprintf(__("Need inspiration? Take a moment to view our theme demo for the %s parent theme %s!", "membershiply"), $theme, $parent_name) : __("Need inspiration? Take a moment to view our theme demo!", "membershiply");
	$premium_text = is_child_theme() ? sprintf(__("Unlock all features by upgrading to the premium edition of %s and its parent theme %s.", "membershiply"), $theme, $parent_name) : sprintf(__("Unlock all features by upgrading to the premium edition of %s.", "membershiply"),$theme);
	$option_name = 'membershiply_themepage_seen';
	$option = get_option($option_name, null);
	if (is_null($option)) {
		add_option($option_name, true);
	} elseif (!$option) {
		update_option($option_name, true);
	} ?>
	<div class="wrap">

		<div class="spt-theme-settings-wrapper">
			<div class="spt-theme-settings-wrapper-main-content">
				<div class="spt-theme-settings-tabs">

					<div class="spt-theme-settings-tab">
						<input type="radio" id="tab-1" name="tab-group-1">



						<label class="spt-theme-settings-label" for="tab-1"><?php esc_html_e("Get started with", "membershiply"); ?> <?php echo esc_html($theme_name); ?></label>

						<div class="spt-theme-settings-content">

							<div class="spt-theme-settings-content-getting-started-wrapper">
								<div class="spt-theme-settings-content-item">
									<div class="spt-theme-settings-content-item-header">
										<?php esc_html_e("Add Menus", "membershiply"); ?>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<a href="<?php echo esc_url(admin_url('nav-menus.php'))  ?>"><?php esc_html_e("Go to Menus", "membershiply"); ?></a>
									</div>
								</div>

								<div class="spt-theme-settings-content-item">
									<div class="spt-theme-settings-content-item-header">
										<?php esc_html_e("Add Widgets", "membershiply"); ?>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<a href="<?php echo esc_url(admin_url('widgets.php'))  ?>"><?php esc_html_e("Go to Widgets", "membershiply"); ?></a>
									</div>
								</div>

								<div class="spt-theme-settings-content-item">
									<div class="spt-theme-settings-content-item-header">
										<?php esc_html_e("Customize Header Colors", "membershiply"); ?>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "membershiply"); ?></a>
									</div>
								</div>

								<div class="spt-theme-settings-content-item">
									<div class="spt-theme-settings-content-item-header">
										<?php esc_html_e("Customize Header Text, button & Background", "membershiply"); ?>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "membershiply"); ?></a>
									</div>
								</div>

								<div class="spt-theme-settings-content-item">
									<div class="spt-theme-settings-content-item-header">
										<?php esc_html_e("Upload Logo", "membershiply"); ?>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "membershiply"); ?></a>
									</div>
								</div>

								<div class="spt-theme-settings-content-item">
									<div class="spt-theme-settings-content-item-header">
										<?php esc_html_e("Change Background Color / Image", "membershiply"); ?>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "membershiply"); ?></a>
									</div>
								</div>


								<a target="_blank" href="https://superbthemes.com/membershiply/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Customize All Fonts", "membershiply"); ?></span> <span><?php esc_html_e("Premium", "membershiply"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "membershiply"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/membershiply/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Customize All Colors", "membershiply"); ?></span> <span><?php esc_html_e("Premium", "membershiply"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "membershiply"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/membershiply/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Import Demo Content", "membershiply"); ?></span> <span><?php esc_html_e("Premium", "membershiply"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Demo Import", "membershiply"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/membershiply/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Contact Premium Support", "membershiply"); ?></span> <span><?php esc_html_e("Premium", "membershiply"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "membershiply"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/membershiply/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Unlock Full SEO Optimization", "membershiply"); ?></span> <span><?php esc_html_e("Premium", "membershiply"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "membershiply"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/membershiply/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Full Page Templated", "membershiply"); ?></span> <span><?php esc_html_e("Premium", "membershiply"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "membershiply"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/membershiply/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Only Show Header On Front Page", "membershiply"); ?></span> <span><?php esc_html_e("Premium", "membershiply"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "membershiply"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/membershiply/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Hide Header Button On Mobile", "membershiply"); ?></span> <span><?php esc_html_e("Premium", "membershiply"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "membershiply"); ?></span>
									</div>
								</a>


								<a target="_blank" href="https://superbthemes.com/membershiply/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Hide Sidebar on Blog Feed", "membershiply"); ?></span> <span><?php esc_html_e("Premium", "membershiply"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "membershiply"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/membershiply/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Unlock Elementor Compatibility", "membershiply"); ?></span> <span><?php esc_html_e("Premium", "membershiply"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Install Elementor", "membershiply"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/membershiply/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Access All Child Themes", "membershiply"); ?></span> <span><?php esc_html_e("Premium", "membershiply"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("View Child Themes", "membershiply"); ?></span>
									</div>
								</a>


								<a target="_blank" href="https://superbthemes.com/membershiply/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Add Recent Posts Widget", "membershiply"); ?></span> <span><?php esc_html_e("Premium", "membershiply"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Widgets", "membershiply"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/membershiply/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Hide Header Tagline On Mobile", "membershiply"); ?></span> <span><?php esc_html_e("Premium", "membershiply"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "membershiply"); ?></span>
									</div>
								</a>


								<a target="_blank" href="https://superbthemes.com/membershiply/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Custom Copyright Text", "membershiply"); ?></span> <span><?php esc_html_e("Premium", "membershiply"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "membershiply"); ?></span>
									</div>
								</a>


								<a target="_blank" href="https://superbthemes.com/membershiply/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Remove 'Tag' from tag page title", "membershiply"); ?></span> <span><?php esc_html_e("Premium", "membershiply"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "membershiply"); ?></span>
									</div>
								</a>


								<a target="_blank" href="https://superbthemes.com/membershiply/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Remove 'Author' from author page title", "membershiply"); ?></span> <span><?php esc_html_e("Premium", "membershiply"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "membershiply"); ?></span>
									</div>
								</a>


								<a target="_blank" href="https://superbthemes.com/membershiply/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Remove 'Category' from author page title", "membershiply"); ?></span> <span><?php esc_html_e("Premium", "membershiply"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "membershiply"); ?></span>
									</div>
								</a>


								<a target="_blank" href="https://superbthemes.com/membershiply/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Hide Author Name on Blog Feed", "membershiply"); ?></span> <span><?php esc_html_e("Premium", "membershiply"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "membershiply"); ?></span>
									</div>
								</a>
								<a target="_blank" href="https://superbthemes.com/membershiply/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Only Show Upper Widgets On Front Page", "membershiply"); ?></span> <span><?php esc_html_e("Premium", "membershiply"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "membershiply"); ?></span>
									</div>
								</a>
								<a target="_blank" href="https://superbthemes.com/membershiply/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Scroll To Top Button", "membershiply"); ?></span> <span><?php esc_html_e("Premium", "membershiply"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "membershiply"); ?></span>
									</div>
								</a>

							</div>
						</div> 
					</div>


				</div>      
			</div>

			<div class="spt-theme-settings-wrapper-sidebar">

				<div class="spt-theme-settings-wrapper-sidebar-item">
					<div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Additional Resources", "membershiply"); ?></div>
					<div class="spt-theme-settings-wrapper-sidebar-item-content">
						<ul>
							<li>
								<a target="_blank" href="https://wordpress.org/support/forums/"><span class="dashicons dashicons-wordpress"></span><?php esc_html_e("WordPress.org Support Forum", "membershiply"); ?></a>
							</li>
							<li>
								<a target="_blank" href="https://www.facebook.com/superbthemescom/"><span class="dashicons dashicons-facebook-alt"></span><?php esc_html_e("Find us on Facebook", "membershiply"); ?></a>
							</li>
							<li>
								<a target="_blank" href="https://twitter.com/superbthemescom"><span class="dashicons dashicons-twitter"></span><?php esc_html_e("Find us on Twitter", "membershiply"); ?></a>
							</li>
							<li>
								<a target="_blank" href="https://www.instagram.com/superbthemes/"><span class="dashicons dashicons-instagram"></span><?php esc_html_e("Find us on Instagram", "membershiply"); ?></a>
							</li>

						</ul>
					</div>
				</div>


				<div class="spt-theme-settings-wrapper-sidebar-item">
					<div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("View Demo", "membershiply"); ?></div>
					<div class="spt-theme-settings-wrapper-sidebar-item-content">
						<p><?php echo esc_html($demo_text); ?></p>
						<a href="https://superbthemes.com/demo/membershiply/" target="_blank" class="button button-primary"><?php esc_html_e("View Demo", "membershiply"); ?></a>
					</div>
				</div>

				<div class="spt-theme-settings-wrapper-sidebar-item">
					<div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Upgrade to Premium", "membershiply"); ?></div>
					<div class="spt-theme-settings-wrapper-sidebar-item-content">
						<p><?php echo esc_html($premium_text); ?></p>
						<a href="https://superbthemes.com/membershiply/" target="_blank" class="button button-primary"><?php esc_html_e("View Premium Version", "membershiply"); ?></a>
					</div>
				</div>

				<div class="spt-theme-settings-wrapper-sidebar-item">
					<div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Helpdesk", "membershiply"); ?></div>
					<div class="spt-theme-settings-wrapper-sidebar-item-content">
						<p><?php esc_html_e("If you have issues with", "membershiply"); ?> <?php echo esc_html($theme); ?> <?php esc_html_e("then send us an email through our website!", "membershiply"); ?></p>
						<a href="https://superbthemes.com/customer-support/" target="_blank" class="button"><?php esc_html_e("Contact Support", "membershiply"); ?></a>
					</div>
				</div>

				<div class="spt-theme-settings-wrapper-sidebar-item">
					<div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Review the Theme", "membershiply"); ?></div>
					<div class="spt-theme-settings-wrapper-sidebar-item-content">
						<p><?php esc_html_e("Do you enjoy using", "membershiply"); ?> <?php echo esc_html($theme); ?><?php esc_html_e("? Support us by reviewing us on WordPress.org!", "membershiply"); ?></p>
						<a href="https://wordpress.org/support/theme/<?php echo esc_attr(get_stylesheet()); ?>/reviews/#new-post" target="_blank" class="button"><?php esc_html_e("Leave a Review", "membershiply"); ?></a>
					</div>
				</div>



			</div>

		</div>
	</div>


	<?php
}

function membershiply_comparepage_css($hook) {
	if ('appearance_page_membershiply-info' != $hook) {
		return;
	}
	wp_enqueue_style('membershiply-custom-style', get_template_directory_uri() . '/css/compare.css');
}
add_action('admin_enqueue_scripts', 'membershiply_comparepage_css');

// Theme page end






add_action('admin_init', 'membershiply_spbThemesNotification', 8);

function membershiply_spbThemesNotification(){
	$notifications = include('inc/admin_notification/Autoload.php');
	$notifications->Add("membershiply_notification", "Unlock All Features with Membershiply Premium – Limited Time Offer", "
		
		Take advantage of the up to <span style='font-weight:bold;'>40% discount</span> and unlock all features with Membershiply Premium. 
		The discount is only available for a limited time.

		<div>
		<a style='margin-bottom:15px;' class='button button-large button-secondary' target='_blank' href='https://superbthemes.com/membershiply/'>Read More</a> <a style='margin-bottom:15px;' class='button button-large button-primary' target='_blank' href='https://superbthemes.com/membershiply/'>Upgrade Now</a>
		</div>

		", "info");



	$options_notification_start = array("delay"=> "-1 seconds", "wpautop" => false);
	$notifications->Add("membershiply_notification_start", "Let's get you started with Membershiply!", '
		<span class="st-notification-wrapper">
		<span class="st-notification-column-wrapper">
		<span class="st-notification-column">
		<img src="'. esc_url( get_template_directory_uri() . '/inc/admin_notification/src/preview.png' ).'" width="150" height="177" />
		</span>

		<span class="st-notification-column">
		<h2>Why Membershiply</h2>
		<ul class="st-notification-column-list">
		<li>Easy to Use & Customize</li>
		<li>Search Engine Optimized</li>
		<li>Lightweight and Fast</li>
		<li>Top-notch Customer Support</li>
		</ul>
		<a href="https://superbthemes.com/demo/membershiply/" target="_blank" class="button">View Membershiply Demo <span aria-hidden="true" class="dashicons dashicons-external"></span></a> 

		</span>
		<span class="st-notification-column">
		<h2>Customize Membershiply</h2>
		<ul>
		<li><a href="'. esc_url( admin_url( 'customize.php' ) ) .'" class="button button-primary">Customize The Design</a></li>
		<li><a href="'. esc_url( admin_url( 'widgets.php' ) ) .'" class="button button-primary">Add/Edit Widgets</a></li>
		<li><a href="https://superbthemes.com/customer-support/" target="_blank" class="button">Contact Support <span aria-hidden="true" class="dashicons dashicons-external"></span></a> </li>
		</ul>
		</span>
		</span>
		<span class="st-notification-footer">
		Membershiply is created by SuperbThemes. We have 100.000+ users and are rated <strong>Excellent</strong> on Trustpilot <img src="'. esc_url( get_template_directory_uri() . '/inc/admin_notification/src/stars.svg' ).'" width="87" height="16" />
		</span>
		</span>

		<style>.st-notification-column-wrapper{width:100%;display:-webkit-box;display:-ms-flexbox;display:flex;border-top:1px solid #eee;padding-top:20px;margin-top:3px}.st-notification-column-wrapper h2{margin:0}.st-notification-footer img{margin-bottom:-3px;margin-left:10px}.st-notification-column-wrapper .button{min-width:180px;text-align:center;margin-top:10px}.st-notification-column{margin-right:10px;padding:0 10px;max-width:250px;width:100%}.st-notification-column img{border:1px solid #eee}.st-notification-footer{display:inline-block;width:100%;padding:15px 0;border-top:1px solid #eee;margin-top:10px}.st-notification-column:first-of-type{padding-left:0;max-width:160px}.st-notification-column-list li{list-style-type:circle;margin-left:15px;font-size:14px}@media only screen and (max-width:1000px){.st-notification-column{max-width:33%}}@media only screen and (max-width:800px){.st-notification-column{max-width:50%}.st-notification-column:first-of-type{display:none}}@media only screen and (max-width:600px){.st-notification-column-wrapper{display:block}.st-notification-column{width:100%;max-width:100%;display:inline-block;padding:0;margin:0}span.st-notification-column:last-of-type{margin-top:30px}}</style>

		', "info", $options_notification_start);
	$notifications->Boot();
}
