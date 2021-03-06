<?php
/**
 * Ker WP BootStrap
 *
 * WP Walker Menu class
 *
 * Author: Jules Clement <jules@ker.bz>
 */

//add_filter( 'walker_nav_menu_start_el', 'ker_wpbs_walker_nav_menu', 10, 4 );
class ker_wpbs_walker_nav_menu extends Walker_Nav_Menu {
    // add classes to ul sub-menus
    function start_lvl( &$output, $depth = 0, $args = array()) {
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

        /* if ($depth > 0) { */
        /*     $args->link_before = '@'.$item->title.'@'; */
        /*     echo '<script>console.log('.json_encode($item).');</script>'; */
        /* } */
        /* // passed classes */
        /* $classes = empty( $item->classes ) ? array() : (array) $item->classes; */
        /* $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) ); */
        // id="nav-menu-item-'. $item->ID . '" class="' . $class_names . '">';
  
        // Menu item class
        $class = '';
        // link attributes
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $args->link_after = '';
        if ($this->has_children) {
            if ($depth > 0) {
                $class = 'dropdown-submenu';
            } else {
                $attributes .= ' class="dropdown-toggle"';
                $attributes .= ' data-toggle="dropdown"';
                $class = 'dropdown';
                $args->link_after = '<b class="caret"></b>';
            }
            //} else {
        }

        // build html
        $output .= $indent . '<li' . ($class ? ' class="' . $class . '"' : '') . '>';
        $item_output = sprintf(
            '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
        );
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

?>
