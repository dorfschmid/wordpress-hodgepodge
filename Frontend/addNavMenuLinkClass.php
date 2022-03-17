<?php
// Adds the ability to add link classes to the wp_nav_menu
function addNavMenuLinkClass($atts, $item, $args, $depth) {
  if (isset($args->link_class)) {
    if ($depth == 0) {
      $atts['class'] = $args->link_class;
    }
  }

  return $atts;
}
add_filter('nav_menu_link_attributes', 'addNavMenuLinkClass', 10, 4);