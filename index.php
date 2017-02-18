<?php
/**
 * Ker WP BootStrap
 *
 * Site home page
 *
 * Author: Jules Clement <jules@ker.bz>
 */

get_header();
// Is this the home page?
if (is_home()):
  echo '<div class="debug bg-alert">ISHOME <small>'.basename(__FILE__).'</small></div>';
endif;
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
