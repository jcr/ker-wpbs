<?php
/**
 * Ker WP BootStrap
 *
 * Footer section (sidebar)
 *
 * Author: Jules Clement <jules@ker.bz>
 */

/* $asidebar = array('footer'); */
/* $showside = false; */
/* foreach ($asidebar as $bar) { */
/*     if (is_active_sidebar($bar)) $showside = true; */
/* } */
/* if (has_nav_menu('social') || $showside) : */

$bar = 'footer';
if (is_active_sidebar($bar)):
?>
<aside class="sidebar footer">
<?php dynamic_sidebar($bar); ?>
</aside>
<?php endif; ?>
