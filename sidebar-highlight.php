<?php
/**
 * Ker WP BootStrap
 *
 * Site main sidebar
 *
 * Author: Jules Clement <jules@ker.bz>
 */

if ( is_active_sidebar( 'highlight' )  ) : ?>
    <div id="highlight" class="container-fluid widget-area" role="complementary">
<?php dynamic_sidebar( 'highlight' ); ?>
    </div>
<?php endif; ?>
