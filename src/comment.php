<?php
/**
 * Ker WP BootStrap
 *
 * Walker Comment class
 * https://developer.wordpress.org/reference/classes/walker_comment/
 *
 * Author: Jules Clement <jules@ker.bz>
 */

class ker_wpbs_walker_comment extends Walker_Comment {
    /* private $el = 'article'; */
    /* function start_lvl(&$output, $depth = 0, $args = array()) { */
    /*     $indent = ($depth > 0 ? str_repeat("  ", $depth) : ''); */
    /*     // build html */
    /*     $output .= "\n" . $indent */
    /*         . '<' . $this->el .' class="comment">' . "\n"; */
    /*     error_log('yo walker_comment'); */
    /* } */
    /* function end_lvl( &$output, $depth = 0, $args = array() ) { */
    /*     $output .= '</' . $this->el . '>'; */
    /*     error_log($output); */
    /* }    */

    /* Essentially same as class-walker-comment.php from PW */
    /* Just put the footer in the end! */
	protected function html5_comment( $comment, $depth, $args ) {
		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
?>
		<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
        <article>
          <div class="comment-content">
            <?php comment_text(); ?>
          </div>
          <footer>
            <span class="vcard">
<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
              <b class="fn"><?php echo get_comment_author_link( $comment ); ?></b>
            </span> -
            <span class="link">
              <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
                <time datetime="<?php comment_time( 'c' ); ?>">
                  <?php printf( __( '%1$s at %2$s' ), get_comment_date( '', $comment ), get_comment_time() ); ?>
                </time>
                <span class="icon"></span>
              </a>
            </span>
            <?php edit_comment_link('<span class="icon" title="' . __( 'Moderate' ) . '"></span><span class="text">' . __( 'Moderate' ) . '</span>', '<span class="edit">', '</span>'); ?>
            <?php comment_reply_link( array_merge( $args, array(
    'reply_text' => '<span class="icon" title="' . __( 'Comment' ) . '"></span><span class="text">' . __( 'Comment' ) . '</span>',
    'add_below' => 'div-comment',
    'depth'     => $depth,
    'max_depth' => $args['max_depth'],
    'before'    => '<span class="reply">',
    'after'     => '</span>'
)));
?>
<?php if ( '0' == $comment->comment_approved ) : ?>
            <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
<?php endif; ?>
          </footer>
        </article>
<?php
    }
}

?>
