<?php
/**
 * Ker WP BootStrap
 *
 * Site header
 *
 * Author: Jules Clement <jules@ker.bz>
 */
?>
<!doctype html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php wp_title(''); ?></title>
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="@@@TODO: excerpt?@@@">
    <meta name="keywords" content="@@@TODO: TAGS?@@@">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
<!--[if IE]><link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico"><![endif]-->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <header class="container-fluid">
      <div class="site">
<?php if ( get_theme_mod( 'ker_wpbs_logo' ) ) : ?>
        <a href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php echo esc_url( get_theme_mod('ker_wpbs_logo')); ?>" alt="Logo <?php bloginfo('name'); ?>" itemprop="logo"/></a>
<?php endif; ?>
        <h1><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></h1>
<?php $description = get_bloginfo( 'description', 'display' );
  if ( $description || is_customize_preview() ) : ?>
        <p><?php echo $description; ?></p>
<?php endif; ?>
      </div>
<?php if ( has_nav_menu( 'primary' ) ) : ?>
      <div class="menu">
        <nav class="navbar navbar-default" itemscope itemtype="http://schema.org/SiteNavigationElement">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-header" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
<?php wp_nav_menu(array(
    'container' => 'div',
    'container_id' => 'navbar-header',
    'container_class' => 'collapse navbar-collapse',
    'menu' => __( 'Main Menu', 'ker_wpbs' ),  // nav name
    'menu_class' => 'nav navbar-nav navbar-right',               // adding custom nav class
    'theme_location' => 'primary',                 // where it's located in the theme
    'before' => '',                                 // before the menu
    'after' => '',                                  // after the menu
    'link_before' => '',                            // before each link
    'link_after' => '',                             // after each link
    'depth' => 0,                                   // limit the depth of the nav
    'fallback_cb' => '',                             // fallback function (if there is one)
    'walker' => new ker_wpbs_walker_nav_menu
)); ?>
        </nav>
      </div>
<?php endif; ?>
    </header>
    <section class="container-fluid">
    <div class="row">
