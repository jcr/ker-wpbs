<?php
/**
 * Ker WP BootStrap
 *
 * Footer section (sidebar)
 *
 * Author: Jules Clement <jules@ker.bz>
 */

$bar = 'footer';
if (is_active_sidebar($bar)):
?>
<aside class="sidebar footer">
<?php dynamic_sidebar($bar); ?>
</aside>
<?php endif; ?>
