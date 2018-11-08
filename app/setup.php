<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {

	wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css');
	wp_enqueue_style('google-fonts','https://fonts.googleapis.com/css?family=Lora:400,700|Ubuntu:400,700&amp;subset=latin-ext');
	wp_enqueue_style('slick.css','https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
	wp_register_script( 'slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', null, null, true );
	wp_enqueue_script('slick');
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);


    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);



/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
	require_once('bs4Navwalker.php');

    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'primary_left_nav' => __('Primary Left Navigation', 'sanlucar'),
        'primary_right_nav' => __('Primary Right Navigation', 'sanlucar'),
        'footer_nav' => __('Footer Navigation', 'sanlucar')
    ]);

	//register MegaMenu widget if the Mega Menu is set as the menu location
	$location = 'mega_menu';
	$css_class = 'mega-menu-parent';
	$locations = get_nav_menu_locations();
	if ( isset( $locations[ $location ] ) ) {
		$menu = get_term( $locations[ $location ], 'nav_menu' );
		if ( $items = wp_get_nav_menu_items( $menu->name ) ) {
			foreach ( $items as $item ) {
				if ( in_array( $css_class, $item->classes ) ) {
					register_sidebar( array(
						'id'   => 'mega-menu-item-' . $item->ID,
						'description' => 'Mega Menu items',
						'name' => $item->title . ' - Mega Menu',
						'before_widget' => '<li id="%1$s" class="mega-menu-item">',
						'after_widget' => '</li>',

					));
				}
			}
		}
	}
    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});
