<?php
/**
 * Ker WP BootStrap
 *
 * Site main sidebar
 *
 * Author: Jules Clement <jules@ker.bz>
 */
if (has_nav_menu('social') || is_active_sidebar('sidebar')) : ?>
<aside id="sidebar" class="col-sm-4 col-lg-3" role="complementary">
<?php if (is_active_sidebar('sidebar')) : ?>
    <?php dynamic_sidebar('sidebar'); ?>
<?php endif; ?>
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