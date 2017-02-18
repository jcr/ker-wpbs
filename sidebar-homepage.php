<?php
/**
 * Ker WP BootStrap
 *
 * Home page section block
 *
 * Author: Jules Clement <jules@ker.bz>
 */
if ((is_front_page() || is_home()) && is_active_sidebar( 'homepage' )  ) : ?>
    <div id="homepage-section" class="widget-area" role="complementary">
  <div class="debug"><small><?php echo basename(__FILE__); ?></small></div>
<?php dynamic_sidebar( 'homepage' ); ?>
    </div>
<?php endif; ?>
