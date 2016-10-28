<?php
/**
 * Ker WP BootStrap
 *
 * Template: simple article
 *
 * can be a post or a page
 *
 * Author: Jules Clement <jules@ker.bz>
 */
$comments_number = get_comments_number();
?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <header>
            <?php ker_wpbs_the_thumbnail(); ?>
            <h1><?php ker_wpbs_post_decoration(); ?><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
            <?php echo get_the_category_list(); ?>
        </header>
        <section>
<?php if ( has_excerpt() || is_search() || !is_singular() ) : ?>
          <div class="excerpt">
            <?php the_excerpt(); ?>
          </div>
<?php else: ?>
          <?php the_content(__('Continue reading')); ?>
<?php endif; ?>
        </section>
        <footer>
          <p class="link">
            <span class="vcard"><b class="fn"><?php the_author(); ?></b></span> -
            <a href="<?php the_permalink(); ?>#" rel="bookmark">
              <time datetime="<?php get_the_time( 'c' ); ?>"><?php echo get_the_date(); ?>
<?php /* if (get_the_time('U') != get_the_modified_time('U')) { echo ', ' . __('updated ') . get_the_modified_date(); } */ ?>
              </time>
              <span class="icon"></span>
            </a>
          </p>
          <?php /* Multi-page content */ wp_link_pages(); ?>
<?php if (!is_singular()): ?>
<?php /* Have Comments */ if ($comments_number): ?>
    <p><?php comments_popup_link(
    __('No comments', 'ker-wpbs'),
    number_format_i18n( $comments_number ) . ' ' . __('comment', 'ker-wpbs'),
    number_format_i18n( $comments_number ) . ' ' . __('comments', 'ker-wpbs'),
    '', ''); ?></p>
<?php endif; /* End of Have Comments */ ?>
<?php endif; ?>
        </footer>
<?php /* Comments */ if (comments_open() || $comments_number): comments_template(); endif; ?>
<?php /* if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ): ?> */
/* <?php endif; */ ?>
      </article>
