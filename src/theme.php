<?php
/**
 * Ker WP BootStrap
 *
 * Theme specific functions
 *
 * Author: Jules Clement <jules@ker.bz>
 */

function ker_wpbs_theme_support() {
    // Site logo
    add_theme_support('site-logo', array(
        //'size' => 'post-thumbnails',
    ));
	// Custom background (credits: @bransonwerner)
	add_theme_support(
        'custom-background', array(
            'default-image'         => '',
            'default-color'         => '',
            'wp-head-callback'      => '_custom_background_cb',
            'admin-head-callback'   => '',
            'admin-preview-callback' => ''
        )
	);
	add_theme_support('html5', array('comment-list', 'search-form', 'comment-form'));
	add_theme_support('automatic-feed-links');
	add_theme_support('menus');

    // Post related
    add_post_type_support('post', 'post-formats');
	add_theme_support('post-formats', array('aside', 'link', 'quote'));
	add_theme_support('post-thumbnails');
}

add_action('footer_credits', 'ker_wpbs_credits');
function ker_wpbs_credits() {
    echo '\o/ '.date('Y');
}

add_action('customize_register', 'ker_wpbs_theme_customizer');
function ker_wpbs_theme_customizer($wp_customize) {
/*   // Uncomment the below lines to remove the default customize sections  */
/*   // $wp_customize->remove_section('title_tagline'); */
/*   // $wp_customize->remove_section('colors'); */
/*   // $wp_customize->remove_section('background_image'); */
/*   // $wp_customize->remove_section('static_front_page'); */
/*   // $wp_customize->remove_section('nav'); */
/*   // $wp_customize->remove_control('blogdescription'); */
/*   // Uncomment the following to change the default section titles */
/*   // $wp_customize->get_section('colors')->title = __( 'Theme Colors' ); */
/*   // $wp_customize->get_section('background_image')->title = __( 'Images' ); */
}

?>