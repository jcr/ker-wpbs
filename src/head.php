<?php
/**
 * Ker WP BootStrap
 *
 * Head(er) related functions
 * All those functions are called during theme setup
 *
 * Author: Jules Clement <jules@ker.bz>
 */

// Customizer CSS overrides
function ker_wpbs_customize_css() {
    $color = get_theme_mod('header_footer_color');
    if (!$color) return;

/*     $style = ' */
/* body>header, .navbar, .navbar a, body>footer { */
/*   background-color: ' .  get_theme_mod('header_footer_color') . ' */
/* } */
/* '; */
    /* echo '<style type="text/css">' . $style . '</style>'; */

    echo '<style type="text/css">';
    include_once('custom.css.php');
    echo '</style>';
}

function ker_wpbs_action_cleanup_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
    remove_action('wp_head', 'wp_admin_bar_header');
}

function ker_wpbs_scripts_and_styles() {
    global $wp_styles;

    wp_register_style('stylesheet', get_stylesheet_directory_uri() . '/css/style.css', array(), '', 'all');
    wp_register_script('bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.7', false );
    wp_register_script('bootstrap-dropdown', get_stylesheet_directory_uri() . '/js/bootstrap-dropdown.js', array('bootstrap'));
    if (!is_admin()) {
		wp_enqueue_script('jquery');
		wp_enqueue_script('bootstrap');
		wp_enqueue_script('bootstrap-dropdown');
		wp_enqueue_style('stylesheet');
    }
}
function ker_wpbs_admin_scripts_and_styles() {
    wp_register_style( 'admin_css', get_template_directory_uri() . '/css/admin.css', false, '1.0.0');
    wp_enqueue_style('admin_css');
}
add_action('admin_enqueue_scripts', 'ker_wpbs_admin_scripts_and_styles');

function ker_wpbs_remove_emoji() {
    remove_action('wp_head',            'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts','print_emoji_detection_script');
	remove_action('wp_print_styles',    'print_emoji_styles');
	remove_action('admin_print_styles', 'print_emoji_styles');	
	remove_filter('the_content_feed',   'wp_staticize_emoji');
	remove_filter('comment_text_rss',   'wp_staticize_emoji');	
	remove_filter('wp_mail',            'wp_staticize_emoji_for_email');
}

// remove head links
function ker_wpbs_filter_resource_hints($urls, $relation_type) {
	if ('dns-prefetch' == $relation_type) {
		/** This filter is documented in wp-includes/formatting.php */
		$emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');
        $urls = array_diff( $urls, array( $emoji_svg_url ) );
	}
	return $urls;
}

// remove version from scripts & css
function ker_wpbs_filter_cleanup_version($src) {
	if (strpos($src, 'ver=')) {
		$src = remove_query_arg('ver', $src);
    }
    return $src;
}

// remove injected stuff at wp_head
function ker_wpbs_action_cleanup_head() {
	if (has_filter('wp_head', 'wp_widget_recent_comments_style')) {
		remove_filter('wp_head', 'wp_widget_recent_comments_style');
	}
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
	}
}

// A better title
// http://www.deluxeblogtips.com/2012/03/better-title-meta-tag.html
function ker_wpbs_title($title, $sep, $seplocation) {
    global $page, $paged;
    if (is_feed()) return $title;
    // Add the blog's name
    if ('right' == $seplocation) {
        $title .= get_bloginfo('name');
    } else {
        $title = get_bloginfo('name') . $title;
    }
    // Add the blog description for the home/front page.
    if (is_home() || is_front_page()) {
        if ($site_description = get_bloginfo('description', 'display')) {
            $title .= " {$sep} {$site_description}";
        }
    }
    // Add a page number if necessary:
    if ($paged >= 2 || $page >= 2) {
        $title .= " {$sep} " . sprintf(__('Page %s', 'dbt'), max($paged, $page));
    }
    return $title;
}

?>
