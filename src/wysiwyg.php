<?php
/**
 * Ker WP BootStrap
 *
 * Site WYSIWYG filters
 *
 * Author: Jules Clement <jules@ker.bz>
 */

function ker_wpbs_filter_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

?>
