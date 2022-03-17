<?php
// Fixes the highlighting of the current blog home page
function fixNavMenuCssClass($classes, $item) {
  if (!is_home()) {
    $blogID = get_option('page_for_posts');

    if ($item->object_id == $blogID) {
      unset($classes[array_search('current_page_parent', $classes)]);
    }
  }

  return $classes;
}
add_filter('nav_menu_css_class', 'fixNavMenuCssClass', 10, 3);