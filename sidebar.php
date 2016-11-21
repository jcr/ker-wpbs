<?php
/**
 * Ker WP BootStrap
 *
 * Site main sidebar
 *
 * Author: Jules Clement <jules@ker.bz>
 */

if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
    <aside id="sidebar" class="widget-area" role="complementary">
<?php dynamic_sidebar( 'sidebar-1' ); ?>
    </aside>
<?php endif; ?>
