<?php
/**
 * Ker WP BootStrap
 *
 * Menu class for WP
 * This Nav menu class is explained at
 * http://shinraholdings.com/62/custom-nav-menu-walker-function/#example-code
 *
 * Author: Jules Clement <jules@ker.bz>
 */

class ker_wpbs_walker_nav_menu extends Walker_Nav_Menu {
    // add classes to ul sub-menus
    function start_lvl( &$output, $depth = 0, $args = array()) {
        // depth dependent classes
        $indent = ( $depth > 0  ? str_repeat( "  ", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        $classes = array('dropdown-menu');
        $class_names = implode( ' ', $classes );
        // build html
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }
    // add main/sub classes to li's and links
    function start_el( &$output, $item, $depth= 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

        // passed classes
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
  
        // build html
        $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $class_names . '">';

        /* if ($depth == 0) */
        /*     echo '<script>console.log('.json_encode($item).');</script>'; */

        // link attributes
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        if ($this->has_children) {
            $attributes .= ' class="dropdown-toggle"';
            $attributes .= ' aria-expended="false" data-toggle="dropdown"';
        }
        $item_output = sprintf(
            '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
        );
  
        // build html
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}
//add_filter( 'walker_nav_menu_start_el', 'ageris_walker_nav_menu', 10, 4 );

?>
