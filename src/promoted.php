<?php
/**
 * Ker WP BootStrap
 *
 * Theme promoted feature
 *
 * Author: Jules Clement <jules@ker.bz>
 */

$OPT_promoted = 'promoted_posts';

/* Add a sticky-like option to Post 'Publish' metabox */
/* TODO: */
/* - move it after sticky span */
/* - (JS) hide by default , show when #visibility = public */
function add_publish_promoted() {
  global $post;
  $value = is_promoted($post->ID); //get_post_meta($post_obj->ID, 'promoted', true);
?>
  <span id="promoted-span">
    <input id="promoted" type="checkbox"<?php echo (!empty($value) ? ' checked="checked"' : null) ?> value="promoted" name="promoted" />
    <label for="promoted"><?php _e('Promoted') ?></label><br/>
  </span>
  <script>var SS = jQuery('#sticky-span'); var PS = jQuery('#promoted-span'); PS.remove(); PS.insertAfter(SS);</script>
<?php
  //echo '##FP Slider##';
  //echo '<script>console.log('.json_encode($post).');</script>';
}
add_action('post_submitbox_misc_actions', 'add_publish_promoted');

function save_publish_promoted($postid, $post, $update) {
    //echo '<script>console.log("Save publish", '.json_encode($post).');</script>';

    /* check if this is an autosave */
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return false;
    /* check if the user can edit this page */
    if ( !current_user_can( 'edit_page', $postid ) ) return false;
    /* check if there's a post id and check if this is a post */
    /* make sure this is the same post type as above */
    if ( empty($postid) )// || $post->post_type != 'post' )
        return false;
    /* Finally save promoted status */
    if( isset($_REQUEST['promoted']) ) {
        promote_post( $postid );
    } else {
        unpromote_post( $postid);
    }
}
add_action( 'save_post', 'save_publish_promoted', 10, 3 );

/* Frontend function */
function slider_promoted() {
    global $OPT_promoted, $post;
    $spost = $post;
    /**
     * Get 'posts' that have a Custom Field 'promoted'
     */
    /* $promoted = get_posts(array( */
    /*     'numberposts'   => 10, */
    /*     'post_type'     => 'post', */
    /*     'meta_key'      => 'promoted', */
    /*     'meta_value'    => '1' */
    /* )); */
    $promoted = get_option($OPT_promoted);
    if ( $promoted ) { ?>
      <div id="carousel-homepage" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
<?php $i=0; foreach ( $promoted as $post_id ) {
            $post = get_post($post_id);
            setup_postdata($post); ?>
          <div class="item<?php echo ($i++ ? '' : ' active') ?>">
           <div>
            <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
            <p><?php the_excerpt(); ?></p>
          </div>
          </div>
<?php } ?>
        </div>
        <ol class="carousel-indicators">
<?php $i=0; foreach ( $promoted as $post_id ) {
    //$post = get_post($post_id); setup_postdata($post); ?>
          <li data-target="#carousel-homepage" data-slide-to="<?php echo $i; ?>" class="<?php echo ($i++ ? '' : ' active') ?>"></li>
<?php } ?>
        </ol>

        <a class="left carousel-control" href="#carousel-homepage" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-homepage" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
<?php
    }
    $post = $spost;
}


/* Those functions are clones of WP core sticky functions (cf wp-includes/post.php) */
function is_promoted( $post_id = 0 ) {
    global $OPT_promoted;
	$post_id = absint( $post_id );
	if ( ! $post_id )
		$post_id = get_the_ID();
	$promoted = get_option( $OPT_promoted );
	if ( ! is_array( $promoted ) )
		return false;
	if ( in_array( $post_id, $promoted ) )
		return true;
	return false;
}
function promote_post( $post_id ) {
    global $OPT_promoted;
	$promoted = get_option($OPT_promoted);
	if ( !is_array($promoted) )
		$promoted = array($post_id);
	if ( ! in_array($post_id, $promoted) )
		$promoted[] = $post_id;
	update_option($OPT_promoted, $promoted);
}
function unpromote_post( $post_id ) {
    global $OPT_promoted;
	$promoted = get_option($OPT_promoted);
	if ( !is_array($promoted) )
		return;
	if ( ! in_array($post_id, $promoted) )
		return;
	$offset = array_search($post_id, $promoted);
	if ( false === $offset )
		return;
	array_splice($promoted, $offset, 1);
	update_option($OPT_promoted, $promoted);
}

?>
