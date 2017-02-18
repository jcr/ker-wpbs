<?php
/**
 * Ker WP BootStrap
 *
 * Site home page
 *
 * Author: Jules Clement <jules@ker.bz>
 */
get_header();
if (is_front_page()) echo '<h1>ISHOME '.basename(__FILE__).'</h1>';
get_sidebar();
?>
      <main>
<?php
get_sidebar('homepage');
/* Have Post + The Loop */
if (have_posts()) {
    while (have_posts()) {
        the_post();
        get_template_part('templates/article');
    } /* End of The Loop */
    ker_wpbs_pager();
} else {
    get_template_part('templates/nothing');
} /* End of Have Post + The Loop */
?>
      </main>
<?php get_footer(); ?>
