<?php
/**
 * Ker WP BootStrap
 *
 * Theme base function file
 *
 * Author: Jules Clement <jules@ker.bz>
 */

require_once('src/content.php');
require_once('src/head.php');
require_once('src/menu.php');
require_once('src/pager.php');
require_once('src/comment.php');
require_once('src/site.php');
require_once('src/theme.php');
require_once('src/wysiwyg.php');
require_once('src/promoted.php');

/**
 * Bootstraping Theme
 */
add_action('after_setup_theme', 'ker_wpbs_setup_theme');
function ker_wpbs_setup_theme() {
    //add_editor_style(get_stylesheet_directory_uri() . '/css/editor-style.css');

    // CLEANUP
    // Remove various head links
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
    // Add some cleanup actions/filters for later
    add_action('get_header',        'ker_wpbs_action_cleanup_header');
    add_action('wp_head',           'ker_wpbs_action_cleanup_head', 1);
	add_filter('style_loader_src',  'ker_wpbs_filter_cleanup_version', 999);
	add_filter('script_loader_src', 'ker_wpbs_filter_cleanup_version', 999);
    // Remove emoji
    ker_wpbs_remove_emoji();
	add_filter('tiny_mce_plugins',  'ker_wpbs_filter_tinymce');
	add_filter('wp_resource_hints', 'ker_wpbs_filter_resource_hints', 10, 2);

    // IMPROVEMENTS (so you think... ;)
    add_filter('wp_title', 'ker_wpbs_title', 10, 3);
    /* add_filter('the_generator', 'XXX_rss_version'); */
    /* add_filter('gallery_style', 'XXX_gallery_style'); */
    add_filter('excerpt_more', 'ker_wpbs_excerpt_more');
    add_filter('the_content',  'ker_wpbs_filter_the_content');

    // THEME setup
    ker_wpbs_theme_support();
    ker_wpbs_theme_layout();
//    set_post_thumbnail_size(125, 125, true);
    // i18n
    load_theme_textdomain('ker-wpbs', get_template_directory() . '/translation');
    add_action('wp_head', 'ker_wpbs_customize_css');
    add_action('wp_enqueue_scripts', 'ker_wpbs_scripts_and_styles', 999);
}

function ker_wpbs_theme_layout() {
    register_nav_menus(array(
        'primary'   => __('Main Menu',    'ker-wpbs'),
        //'social'    => __('Social Links', 'ker-wpbs'),
        'footer'    => __('Footer Menu',  'ker-wpbs')
    ));
	register_sidebar(array(
		'id'            => 'sidebar',
		'name'          => __( 'Main Sidebar', 'ker-wpbs' ),
		'description'   => __( 'The first (primary) sidebar.', 'ker-wpbs' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s list-group">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="list-group-item-heading">',
		'after_title'   => '</h2>',
	));
	register_sidebar(array(
		'id'            => 'sidebar1',
		'name'          => __( 'WP Sidebar', 'ker-wpbs' ),
		'description'   => __( 'WP default sidebar.', 'ker-wpbs' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s list-group">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="list-group-item-heading">',
		'after_title'   => '</h2>',
	));
}

?>
