<?php
/**
 * Ker WP BootStrap
 *
 * Site home page
 *
 * Author: Jules Clement <jules@ker.bz>
 */

get_header();

/* if (is_home()): /\* is homepage *\/ */
/*     // DO STUFF */
/* endif; /\* End of is homepage *\/ */

?>
      <main class="col-xs-12 col-sm-8 col-lg-offset-1 col-lg-6">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <header>
            <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
          </header>
        <section>
          <?php the_content(); ?>
        </section>
      </article>
<?php endwhile;
/*     XXX_pager(); */
/* else: */
/*     XXX_post_oops(); */
endif; ?>
    </main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
