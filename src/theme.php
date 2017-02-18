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
  add_theme_support('custom-logo', array(
    'size' => 'post-thumbnails',
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
	//add_theme_support('post-formats', array('aside', 'link', 'quote'));
	add_theme_support('post-thumbnails');
}

add_action('footer_credits', 'ker_wpbs_credits');
function ker_wpbs_credits() {
    echo get_theme_mod('footer_text');
}

add_action('customize_register', 'ker_wpbs_theme_customizer');
function ker_wpbs_theme_customizer($wp_customize) {
    $wp_customize->add_setting('header_footer_color' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'header_footer_color', array(
            'label'      => __( 'Header & Footer bgcolor', 'ker-wpbs' ),
            'section'    => 'colors',
            'settings'   => 'header_footer_color',
        )
    ));

    $wp_customize->add_setting('footer_text');
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'footer_text', array(
            'label'      => __( 'Footer text', 'ker-wpbs' ),
            'section'    => 'title_tagline',
            'settings'   => 'footer_text',
        )
    ));
    // Section: Static Front Page
    $wp_customize->add_setting('show_sidebar_front');
    $wp_customize->add_control(new WP_Customize_Control(
      $wp_customize,
      'show_sidebar_front', array(
        'label' => __( 'Show sidebar on frontpage', 'ker-wpbs' ),
        'section' => 'static_front_page',
        'settings' => 'show_sidebar_front',
        'type' => 'radio',
        'choices' => array(
          0 => 'No',
          1 => 'Yes',
        ),
      )
    ));

    // New section: Fonts
    $wp_customize->add_section('ker_wpbs_fonts' , array(
        'title'      => __('Fonts', 'ker-wpbs'),
        'priority'   => 40,
    ) );
    $wp_customize->add_setting('font_header');
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'font_header', array(
            'label'      => __( 'Header font', 'ker-wpbs' ),
            'section'    => 'ker_wpbs_fonts',
            'settings'   => 'font_header',
        )
    ));

    // New section: Layout
    $wp_customize->add_section('ker_wpbs_layout' , array(
        'title'      => __('Layout', 'ker-wpbs'),
        'priority'   => 41,
    ) );
    $wp_customize->add_setting('layout_pos_menu', array('default' => 'top'));
    $wp_customize->add_control(new WP_Customize_Control(
      $wp_customize,
      'layout_pos_menu', array(
        'label' => __( 'Main menu position', 'ker-wpbs' ),
        'section' => 'ker_wpbs_layout',
        'settings' => 'layout_pos_menu',
        'type' => 'radio',
        'choices' => array(
          'top' => 'Header',
          'right' => 'Right',
          'left' => 'Left',
        ),
      )
    ));
    $wp_customize->add_setting('layout_pos_sidebar', array('default' => 'right'));
    $wp_customize->add_control(new WP_Customize_Control(
      $wp_customize,
      'layout_pos_sidebar', array(
        'label' => __( 'Sidebar position', 'ker-wpbs' ),
        'section' => 'ker_wpbs_layout',
        'settings' => 'layout_pos_sidebar',
        'type' => 'radio',
        'choices' => array(
          'right' => 'Right',
          'left' => 'Left',
        ),
      )
    ));
    $wp_customize->add_setting('layout_pos_highlight', array('default' => 'top'));
    $wp_customize->add_control(new WP_Customize_Control(
      $wp_customize,
      'layout_pos_highlight', array(
        'label' => __( 'Highlight area', 'ker-wpbs' ),
        'section' => 'ker_wpbs_layout',
        'settings' => 'layout_pos_highlight',
        'type' => 'radio',
        'choices' => array(
          'top' => 'Top',
          'right' => 'Right',
          'left' => 'Left',
        ),
      )
    ));

    /* Uncomment the below lines to remove the default customize sections */
    /* $wp_customize->remove_section('title_tagline'); */
    /* $wp_customize->remove_section('colors'); */
    /* $wp_customize->remove_section('background_image'); */
    /* $wp_customize->remove_section('static_front_page'); */
    /* $wp_customize->remove_section('nav'); */
    /* $wp_customize->remove_control('blogdescription'); */
    /* Uncomment the following to change the default section titles */
    /* $wp_customize->get_section('colors')->title = __( 'Theme Colors' ); */
    /* $wp_customize->get_section('background_image')->title = __( 'Images' ); */
}

add_filter('body_class', 'ker_wpbs_body_classes');
function ker_wpbs_body_classes($classes) {
  // Add 'no-sidebar' class to frontpage
  if (is_home() || is_front_page() && !get_theme_mod('show_sidebar_front'))
    $classes[] = 'no-sidebar';
  return $classes;
}

?>
