<?php
/**
 * Ker WP BootStrap
 *
 * Site home page
 *
 * Author: Jules Clement <jules@ker.bz>
 */

get_header();

if (is_home()): /* Type of page */
    echo '<h1>ISHOME</h1>';
elseif (is_search()):
    echo '<h1>IS SEARCH</h1>';
elseif (is_page()):
    echo '<h1>IS PAGE</h1>';
elseif (is_singular()):
    echo '<h1>IS POST</h1>';
elseif (is_category()):
    echo '<h1>IS CAT</h1>';
elseif (is_tag()):
    echo '<h1>IS DOG</h1>';
endif; /* End of page type */

?>
      <main>
<?php
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
<?php get_sidebar(); ?>
<?php get_footer(); ?>
