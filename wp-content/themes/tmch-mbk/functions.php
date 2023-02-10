<?php
/**
 * tmch-mbk functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tmch-mbk
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tmch_mbk_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on tmch-mbk, use a find and replace
		* to change 'tmch-mbk' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'tmch-mbk', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'tmch-mbk' ),
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
			'tmch_mbk_custom_background_args',
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
add_action( 'after_setup_theme', 'tmch_mbk_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tmch_mbk_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tmch_mbk_content_width', 640 );
}
add_action( 'after_setup_theme', 'tmch_mbk_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tmch_mbk_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'tmch-mbk' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'tmch-mbk' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'tmch_mbk_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tmch_mbk_scripts() {
	wp_enqueue_style( 'tmch-mbk-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'tmch-mbk-style', 'rtl', 'replace' );
	wp_enqueue_style( 'tmch-mbk--custom-style', get_template_directory_uri() . '/assets/css/tmch-main.css', array(), _S_VERSION );

	wp_enqueue_script( 'tmch-mbk-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'tmch-mbk-custom-js', get_template_directory_uri() . '/assets/js/custom.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tmch_mbk_scripts' );

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
 * add theme support for woocommerce - v. important
 * source : (https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes)
 */
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

/**
 * add additional class on navigation li
 * source : (https://stackoverflow.com/questions/14464505/how-to-add-class-in-li-using-wp-nav-menu-in-wordpress)
 */
function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

/**
 * remove auto wrapping of tags with p - acf wysiwyg editor
 * source : (https://support.advancedcustomfields.com/forums/topic/no-p-tags-with-wysiwyg-field/)
 */

function my_acf_add_local_field_groups() {
    remove_filter('acf_the_content', 'wpautop' );
}
add_action('acf/init', 'my_acf_add_local_field_groups');

/**
 * breadcrumbs modifications as per the theme
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => '',
            'wrap_before' => '<ul class="breadcrumbs" itemprop="breadcrumb">',
            'wrap_after'  => '</ul>',
            'before'      => '<li>',
            'after'       => '</li>',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}

/**
 * wrap last word in sentence/heading
 */
function last_word_wrap($string, $class = null) {
    $span = '<span';
    if( $class ) {
        $span .= ' class="' . $class . '"';
    }
    $span .= '>';
    $wrapped = preg_replace('/\s(\S*)$/', ' ' . $span . '$1', $string);
    $wrapped .= '</span>';
    return $wrapped;
}

/**
 * register custom sidebars/widgets
 */
function register_widget_areas() {

	register_sidebar( array(
	  'name'          => 'Footer area',
	  'id'            => 'footer_area',
	  'description'   => 'you can add logo and short description here',
	  'before_widget' => '',
	  'after_widget'  => '',
	  'before_title'  => '<span class="h3">',
	  'after_title'   => '</span>',
	));
  
	register_sidebar( array(
	  'name'          => 'Footer list 01',
	  'id'            => 'footer_list_one',
	  'description'   => 'add menu list (max 3 suggested)',
	  'before_widget' => '',
	  'after_widget'  => '',
	  'before_title'  => '<span class="h5">',
	  'after_title'   => '</span>',
	));

	register_sidebar( array(
	  'name'          => 'Footer list 02',
	  'id'            => 'footer_list_two',
	  'description'   => 'add menu list (max 3 suggested)',
	  'before_widget' => '',
	  'after_widget'  => '',
	  'before_title'  => '<span class="h5">',
	  'after_title'   => '</span>',
	));
	register_sidebar( array(
	  'name'          => 'Footer list 03',
	  'id'            => 'footer_list_three',
	  'description'   => 'add menu list (max 3 suggested)',
	  'before_widget' => '',
	  'after_widget'  => '',
	  'before_title'  => '<span class="h5">',
	  'after_title'   => '</span>',
	));
  

  
	register_sidebar( array(
	  'name'          => 'Footer Terms List',
	  'id'            => 'footer_terms_list',
	  'description'   => 'policy pages and etc (max 3 suggested)',
	  'before_widget' => '',
	  'after_widget'  => '',
	  'before_title'  => '',
	  'after_title'   => '',
	));
  
  }
  
  add_action( 'widgets_init', 'register_widget_areas' );


/**
 * shortcodes for service pages
 * "[ctaExperts]"
 */

/**
 *  "[ctaExperts]"
 */
  function cta_experts_function() {
	return '<div class="cta-snippet yellow-box">
	<div>
		<span class="cta-text">Our experts can deliver a <strong>customized essay</strong> tailored to your instructions for only <span class="text-red"><strong><s>$13.00</s></strong></span> <span class="text-green"><strong>$11.05/page</strong></span></span>    
		<div class="tutor-gallery-container">
			<div class="tutor-gallery">
				<img src="http://placeimg.com/60/60/tech" title="" alt="Some Tech Picture" />
				<img src="http://placeimg.com/60/60/tech" title="" alt="Some Tech Picture" />
				<img src="http://placeimg.com/60/60/tech" title="" alt="Some Tech Picture" />
				<img src="http://placeimg.com/60/60/arch" title="" alt="Some Architecture Picture" />
				<img src="http://placeimg.com/60/60/arch" title="" alt="Some Architecture Picture" />
				<img src="http://placeimg.com/60/60/arch" title="" alt="Some Architecture Picture" />
				<img src="http://placeimg.com/60/60/arch" title="" alt="Some Architecture Picture" />
				<img src="http://placeimg.com/60/60/arch" title="" alt="Some Architecture Picture" />
				<div class="tutor-stats">
					<span>1k+</span>
				</div>
			</div>
			<span class="tutor-numbers">More Than<br/> 1k+ Tutor</span>
		</div>
	</div>
	<div>
		<a href="#" class="btn btn-solid">
			Get Started <span class="arrow-icon"></span>
		</a>
	</div>
</div>';
}
add_shortcode('ctaExperts', 'cta_experts_function');

/**
 *  "[ctaGuarantees]"
 */

function cta_guarantee_function(){
	return '<div class="cta-services-guarantee">
	<div>
		<div class="guarantee-box">
			<div class="svg-container">
				<svg width="52" height="71" viewBox="0 0 52 71" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M13.1519 49.5794C11.9752 48.3913 12.5886 48.7263 9.75027 47.9593C8.46245 47.6107 7.33037 46.9407 6.30662 46.1382L0.162768 61.3468C-0.431712 62.8193 0.678705 64.4189 2.25225 64.3587L9.38735 64.0839L14.2948 69.3175C15.3782 70.4714 17.2794 70.1118 17.8739 68.6394L24.9223 51.1913C23.4544 52.0171 21.8254 52.5011 20.1408 52.5011C17.5002 52.5011 15.0193 51.4634 13.1519 49.5794V49.5794ZM51.8378 61.3468L45.6939 46.1382C44.6702 46.9421 43.5381 47.6107 42.2503 47.9593C39.397 48.7304 40.0227 48.3941 38.8486 49.5794C36.9812 51.4634 34.499 52.5011 31.8584 52.5011C30.1738 52.5011 28.5447 52.0157 27.0768 51.1913L34.1253 68.6394C34.7197 70.1118 36.6223 70.4714 37.7043 69.3175L42.6132 64.0839L49.7483 64.3587C51.3218 64.4189 52.4322 62.8179 51.8378 61.3468V61.3468ZM35.6148 46.4855C37.684 44.3595 37.921 44.5427 40.8677 43.732C42.7486 43.2138 44.2192 41.7031 44.723 39.7698C45.7359 35.887 45.4732 36.356 48.237 33.515C49.6142 32.0999 50.1518 30.0368 49.6481 28.1036C48.6365 24.2236 48.6352 24.765 49.6481 20.8808C50.1518 18.9476 49.6142 16.8845 48.237 15.4695C45.4732 12.6284 45.7359 13.096 44.723 9.21458C44.2192 7.28138 42.7486 5.77063 40.8677 5.25247C37.0922 4.21204 37.5472 4.48411 34.7807 1.64173C33.4035 0.226688 31.3953 -0.327023 29.5143 0.191141C25.7403 1.2302 26.267 1.23157 22.4862 0.191141C20.6053 -0.327023 18.597 0.225321 17.2199 1.64173C14.456 4.48274 14.911 4.21204 11.1342 5.25247C9.25329 5.77063 7.78266 7.28138 7.27891 9.21458C6.26735 13.096 6.5287 12.6284 3.76485 15.4695C2.38766 16.8845 1.8487 18.9476 2.35381 20.8808C3.36537 24.7581 3.36673 24.2167 2.35381 28.1023C1.85006 30.0355 2.38766 32.0986 3.76485 33.515C6.5287 36.356 6.266 35.887 7.27891 39.7698C7.78266 41.7031 9.25329 43.2138 11.1342 43.732C14.1648 44.5659 14.391 44.4347 16.3857 46.4855C18.1772 48.3271 20.9682 48.6566 23.1213 47.2812C23.9823 46.7293 24.9811 46.4363 26.0009 46.4363C27.0208 46.4363 28.0196 46.7293 28.8806 47.2812C31.0323 48.6566 33.8233 48.3271 35.6148 46.4855ZM13.2251 24.0581C13.2251 16.8079 18.9451 10.9304 26.0003 10.9304C33.0555 10.9304 38.7755 16.8079 38.7755 24.0581C38.7755 31.3083 33.0555 37.1859 26.0003 37.1859C18.9451 37.1859 13.2251 31.3083 13.2251 24.0581V24.0581Z" fill="#FD7583"/>
				</svg>
			</div>
			<div class="guarantee-text">
				<span class="h5">Satisfaction Guarantee</span>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.</p>
			</div>
		</div>
	</div>
	<div>
		<div class="guarantee-box">
			<div class="svg-container">
				<svg width="57" height="55" viewBox="0 0 57 55" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M56.3069 19.195L56.8564 16.29C57.4059 13.413 56.3489 10.347 54.0389 8.30997C48.5509 3.46597 40.6339 0.74997 28.9719 0.76397C17.3309 0.77797 8.35687 3.50797 3.36587 8.35197C2.32762 9.36753 1.58971 10.6499 1.2334 12.0578C0.877083 13.4658 0.916176 14.9448 1.34637 16.332L2.21437 19.237C2.63109 20.5663 3.49217 21.7118 4.65324 22.4816C5.8143 23.2514 7.20473 23.5986 8.59137 23.465L14.2894 22.8945C16.7359 22.6495 17.8069 20.595 18.4999 18.25C19.5359 14.736 20.2499 12.125 20.2499 12.125C22.9169 11.1275 25.4509 10.375 28.9999 10.375C32.5489 10.375 35.1319 11.054 37.7499 12.125C37.7499 12.125 38.4359 14.7325 39.4999 18.25C40.2839 20.84 42.1354 22.6635 44.6344 22.905L50.3639 23.458C53.2444 23.738 55.7889 21.911 56.3069 19.1915V19.195ZM27.2499 32.25C27.714 32.25 28.1591 32.4343 28.4873 32.7625C28.8155 33.0907 28.9999 33.5358 28.9999 34V39.25H32.5174C32.9815 39.25 33.4266 39.4343 33.7548 39.7625C34.083 40.0907 34.2674 40.5358 34.2674 41C34.2674 41.4641 34.083 41.9092 33.7548 42.2374C33.4266 42.5656 32.9815 42.75 32.5174 42.75H27.2499C26.7857 42.75 26.3406 42.5656 26.0124 42.2374C25.6842 41.9092 25.4999 41.4641 25.4999 41V34C25.4999 33.5358 25.6842 33.0907 26.0124 32.7625C26.3406 32.4343 26.7857 32.25 27.2499 32.25ZM13.2499 39.25C13.2499 37.1817 13.6573 35.1336 14.4488 33.2227C15.2403 31.3118 16.4004 29.5756 17.8629 28.113C19.3255 26.6505 21.0617 25.4904 22.9726 24.6989C24.8835 23.9074 26.9316 23.5 28.9999 23.5C31.0682 23.5 33.1163 23.9074 35.0271 24.6989C36.938 25.4904 38.6743 26.6505 40.1368 28.113C41.5993 29.5756 42.7595 31.3118 43.551 33.2227C44.3425 35.1336 44.7499 37.1817 44.7499 39.25C44.7499 43.4271 43.0905 47.4332 40.1368 50.3869C37.1831 53.3406 33.177 55 28.9999 55C24.8227 55 20.8166 53.3406 17.8629 50.3869C14.9092 47.4332 13.2499 43.4271 13.2499 39.25V39.25ZM28.9999 27C25.751 27 22.6351 28.2906 20.3378 30.5879C18.0405 32.8852 16.7499 36.0011 16.7499 39.25C16.7499 42.4989 18.0405 45.6147 20.3378 47.912C22.6351 50.2093 25.751 51.5 28.9999 51.5C32.2488 51.5 35.3646 50.2093 37.6619 47.912C39.9593 45.6147 41.2499 42.4989 41.2499 39.25C41.2499 36.0011 39.9593 32.8852 37.6619 30.5879C35.3646 28.2906 32.2488 27 28.9999 27Z" fill="#FFB357"/>
				</svg>
			</div>
			<div class="guarantee-text">
				<span class="h5">24/7 Support</span>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.</p>
			</div>
		</div>
	</div>
	<div>
		<div class="guarantee-box">
			<div class="svg-container">
				<svg width="60" height="63" viewBox="0 0 60 63" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0.75 11.7709C0.75 11.1907 0.980468 10.6343 1.3907 10.2241C1.80094 9.81384 2.35734 9.58337 2.9375 9.58337C10.7046 9.58337 18.2733 6.83296 25.6875 1.27087C26.0661 0.986888 26.5267 0.833374 27 0.833374C27.4733 0.833374 27.9339 0.986888 28.3125 1.27087C35.7267 6.83296 43.2954 9.58337 51.0625 9.58337C51.6427 9.58337 52.1991 9.81384 52.6093 10.2241C53.0195 10.6343 53.25 11.1907 53.25 11.7709V27.0834C53.25 27.6113 53.2383 28.1334 53.215 28.6555C51.7918 27.2171 49.9733 26.2341 47.9903 25.8313C46.0073 25.4285 43.9493 25.6242 42.0778 26.3934C40.2062 27.1625 38.6054 28.4706 37.4788 30.1514C36.3521 31.8322 35.7504 33.8099 35.75 35.8334V35.9792C34.103 36.3154 32.6228 37.2103 31.5598 38.5125C30.4968 39.8146 29.9163 41.4441 29.9167 43.125V57.7084C29.9167 57.8542 29.9196 57.9942 29.9283 58.1342C29.2342 58.4375 28.5283 58.7292 27.7992 59.015C27.2846 59.2174 26.7125 59.2174 26.1979 59.015C9.3775 52.3884 0.75 41.6667 0.75 27.0834V11.7709ZM38.6667 38.75V35.8334C38.6667 33.8995 39.4349 32.0448 40.8023 30.6774C42.1698 29.3099 44.0245 28.5417 45.9583 28.5417C47.8922 28.5417 49.7469 29.3099 51.1143 30.6774C52.4818 32.0448 53.25 33.8995 53.25 35.8334V38.75H54.7083C55.8687 38.75 56.9814 39.211 57.8019 40.0314C58.6224 40.8519 59.0833 41.9647 59.0833 43.125V57.7084C59.0833 58.8687 58.6224 59.9815 57.8019 60.802C56.9814 61.6224 55.8687 62.0834 54.7083 62.0834H37.2083C36.048 62.0834 34.9352 61.6224 34.1147 60.802C33.2943 59.9815 32.8333 58.8687 32.8333 57.7084V43.125C32.8333 41.9647 33.2943 40.8519 34.1147 40.0314C34.9352 39.211 36.048 38.75 37.2083 38.75H38.6667ZM43.0417 35.8334V38.75H48.875V35.8334C48.875 35.0598 48.5677 34.318 48.0207 33.771C47.4737 33.224 46.7319 32.9167 45.9583 32.9167C45.1848 32.9167 44.4429 33.224 43.8959 33.771C43.349 34.318 43.0417 35.0598 43.0417 35.8334ZM48.875 50.4167C48.875 49.6432 48.5677 48.9013 48.0207 48.3543C47.4737 47.8073 46.7319 47.5 45.9583 47.5C45.1848 47.5 44.4429 47.8073 43.8959 48.3543C43.349 48.9013 43.0417 49.6432 43.0417 50.4167C43.0417 51.1903 43.349 51.9321 43.8959 52.4791C44.4429 53.0261 45.1848 53.3334 45.9583 53.3334C46.7319 53.3334 47.4737 53.0261 48.0207 52.4791C48.5677 51.9321 48.875 51.1903 48.875 50.4167Z" fill="#4CB7D8"/>
				</svg>
			</div>
			<div class="guarantee-text">
				<span class="h5">100% Confidential</span>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.</p>
			</div>
		</div>
	</div>
	<div>
		<div class="guarantee-box">
			<div class="svg-container">
				<svg width="70" height="47" viewBox="0 0 70 47" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M53.8976 21.6641L54.4444 31.3333C54.5255 32.7409 53.695 34.0464 51.9531 35.25C50.2112 36.4536 47.8313 37.4072 44.8134 38.111C41.7954 38.8148 38.5243 39.1667 35 39.1667C31.4757 39.1667 28.2046 38.8148 25.1866 38.111C22.1687 37.4072 19.7888 36.4536 18.0469 35.25C16.305 34.0464 15.4745 32.7409 15.5556 31.3333L16.1024 21.6641L33.5417 27.2025C33.9873 27.3453 34.4734 27.4167 35 27.4167C35.5266 27.4167 36.0127 27.3453 36.4583 27.2025L53.8976 21.6641ZM70 11.75C70 12.2192 69.7772 12.5354 69.3316 12.6986L35.3038 23.4694C35.2228 23.4898 35.1215 23.5 35 23.5C34.8785 23.5 34.7772 23.4898 34.6962 23.4694L14.8872 17.166C14.0162 17.8596 13.2972 18.9969 12.73 20.5778C12.1629 22.1587 11.8186 23.9794 11.697 26.0397C12.9731 26.7741 13.6111 27.8859 13.6111 29.375C13.6111 30.7826 13.0237 31.8739 11.849 32.6491L13.6111 45.8984C13.6516 46.184 13.5706 46.439 13.3681 46.6634C13.1858 46.8878 12.9427 47 12.6389 47H6.80556C6.50174 47 6.25868 46.8878 6.07639 46.6634C5.87384 46.439 5.79282 46.184 5.83333 45.8984L7.59549 32.6491C6.42072 31.8739 5.83333 30.7826 5.83333 29.375C5.83333 27.8859 6.49161 26.7537 7.80816 25.9785C8.03096 21.7559 9.02344 18.39 10.7856 15.8809L0.668403 12.6986C0.222801 12.5354 0 12.2192 0 11.75C0 11.2808 0.222801 10.9646 0.668403 10.8014L34.6962 0.030599C34.7772 0.0101997 34.8785 0 35 0C35.1215 0 35.2228 0.0101997 35.3038 0.030599L69.3316 10.8014C69.7772 10.9646 70 11.2808 70 11.75Z" fill="#E23E3D"/>
				</svg>
			</div>
			<div class="guarantee-text">
				<span class="h5">Experienced Tutors</span>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.</p>
			</div>
		</div>
	</div>
</div>';
}
add_shortcode('ctaGuarantees', 'cta_guarantee_function');

/**
 *  "[onTimeDelivery]"
 */

function on_time_delivery_function(){
	return '<div class="cta-snippet yellow-box">
	<div>
		<span class="cta-text"><span class="text-yellow d-block"><strong>On-Time Delivery!</strong></span> Get your <strong>100% customized</strong> paper done in as little as <span class="text-yellow d-block"><strong>3 hours</strong></span></span>    
	</div>
	<div>
		<a href="#" class="btn btn-solid">
			Get Started <span class="arrow-icon"></span>
		</a>
	</div>
</div>';
}
add_shortcode('onTimeDelivery', 'on_time_delivery_function');


/**
 *  "[ctaTheme]"
 */

function cta_theme_function(){
	return '<div class="cta-snippet yellow-box">
	<div>
		<span class="cta-text">We’ll deliver a <strong>custom paper</strong> tailored to your requirements. 
		<span class="text-yellow"><strong>Cut 15% off</strong></span> your first order</span>
	</div>
	<div>
		<a href="#" class="btn btn-solid">
			Get Started <span class="arrow-icon"></span>
		</a>
	</div>
</div>';
}
add_shortcode('ctaTheme', 'cta_theme_function');