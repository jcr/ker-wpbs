<?php
/**
 * Ker WP BootStrap
 *
 * Site comments template
 *
 * Author: Jules Clement <jules@ker.bz>
 */

// If the current post is protected by a password
if ( post_password_required() ) {
	return;
}
?>
        <aside class="comments">
          <header>
<?php if ( have_comments() ) : ?>
            <h2><?php
    $comments_number = get_comments_number();
    echo number_format_i18n( $comments_number );
    echo ' ' . _nx('comment on', 'comments on', $comments_number, 'comments title', 'ker-wpbs'); ?>
            <small><?php echo get_the_title(); ?></small></h2>
          </header>
<?php
/* Only for non single pages? */
the_comments_navigation();
?>
          <ol class="comment-list">
<?php
/* Show the comments */
wp_list_comments(array(
    'style'       => 'ol',
    'walker' => new ker_wpbs_walker_comment
    //'style' => 'html5'
));
endif; // End of have_comments()
?>
          </ol>
<?php
/* Comments are Closed */
if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
?>
          <p class="no-comments"><?php _e( 'Comments are closed.', 'ker-wpbs' ); ?></p>
<?php endif; // End of Comments Closed 
/* Comment form */
		comment_form( array(
			/* 'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">', */
			/* 'title_reply_after'  => '</h2>', */
		) );
?>
        </aside>
