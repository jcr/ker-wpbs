<?php
/**
 * Ker WP BootStrap
 *
 * Site main sidebar
 *
 * Author: Jules Clement <jules@ker.bz>
 */


if (!(is_home() || is_front_page() && !get_theme_mod('show_sidebar_front'))) :

if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
    <aside id="sidebar" class="widget-area" role="complementary">
  <div class="debug"><small><?php echo basename(__FILE__); ?></small></div>
<?php dynamic_sidebar( 'sidebar-1' ); ?>
    </aside>
<?php
endif; // active sidebar

endif; // home + show
?>
