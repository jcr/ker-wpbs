<?php
/**
 * Ker WP BootStrap
 *
 * Home page section block
 *
 * Author: Jules Clement <jules@ker.bz>
 */
if ( is_active_sidebar( 'homepage' )  ) : ?>
    <div id="homepage-section" class="widget-area" role="complementary">
<?php dynamic_sidebar( 'homepage' ); ?>
    </div>
<?php endif; ?>
