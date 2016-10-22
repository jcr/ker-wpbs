<?php
/**
 * Ker WP BootStrap
 *
 * Theme specific functions
 *
 * Author: Jules Clement <jules@ker.bz>
 */

function ker_wpbs_filter_the_content($content){
    // remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
	$content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
    return $content;
}
