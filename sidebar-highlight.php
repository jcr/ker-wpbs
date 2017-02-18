<?php
/**
 * Ker WP BootStrap
 * Author: Jules Clement <jules@ker.bz>
 */

if ( is_active_sidebar( 'highlight' )  ) : ?>
    <div id="highlight" class="container-fluid">
  <div class="debug"><small><?php echo basename(__FILE__); ?></small></div>
<?php dynamic_sidebar( 'highlight' ); ?>
    </div>
<?php endif; ?>
