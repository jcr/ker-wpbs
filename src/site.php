<?php
/**
 * Ker WP BootStrap
 *
 * Theme base function file
 *
 * Author: Jules Clement <jules@ker.bz>
 */

function ker_wpbs_excerpt_more() {
    
}
function ker_wpbs_post_decoration() {
    if (is_home() && ! is_paged()) {
        if (is_sticky())
            echo '<span class="glyphicon glyphicon-pushpin"></span>';
    }
    if (post_password_required()) {
        echo '<span class="glyphicon glyphicon-lock"></span>';
    }
}
function ker_wpbs_the_thumbnail() {
    //global $post;
    if ($thumb = get_the_post_thumbnail()) {
        if (!is_singular()) {
            echo '<a href="'. get_permalink() .'" aria-hidden="true">';
        }
        echo $thumb;
        if (!is_singular()) echo '</a>';
    }
}

/* add_filter('wp_mail_from', 'XXX_mail_from'); */
/* function XXX_mail_from($old) { */
/*     return 'SITE@DOMAIN.EXT'; */
/* } */
/* add_filter('wp_mail_from_name', 'XXX_mail_from_name'); */
/* function XXX_mail_from_name($old) { */
/*     return 'Wordpress?'; */
/* } */

?>
