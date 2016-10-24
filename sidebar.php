<?php
/**
 * Ker WP BootStrap
 *
 * Site main sidebar
 *
 * Author: Jules Clement <jules@ker.bz>
 */

$asidebar = array('sidebar', 'sidebar1');
$showside = false;
foreach ($asidebar as $bar) {
    if (is_active_sidebar($bar)) $showside = true;
}
if (has_nav_menu('social') || $showside) : ?>
<aside id="sidebar">
<?php
foreach ($asidebar as $bar) {
    if (is_active_sidebar($bar)) {
        dynamic_sidebar($bar);
    }
}
?>
<?php if (has_nav_menu('social')) : ?>
    <div id="social-navigation" class="social-navigation widget list-group" role="navigation">
<?php
    // Social links navigation menu.
    wp_nav_menu(array(
        'theme_location' => 'social',
        'depth'          => 1,
        'link_before'    => '<span class="screen-reader-text">',
        'link_after'     => '</span>',
   ));
?>
    </div>
<?php endif; ?>
</aside>
<?php endif; ?>
