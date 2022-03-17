<?php
// Add/prepare new post type columns
function addPostTypePostColumns($columns) {
  return array_merge ($columns, array (
      'posttype_date' => __('Date', 'language'),
      'posttype_notice' => __('Notice', 'language'),
  ));
}
add_filter('manage_posttype_posts_columns', 'addPostTypePostColumns');

// Add the post type data to the columns
function addPostTypePostColumnsData($column, $post_id) {
  $posttype_date = get_field('date', $post_id);
  $posttype_notice = get_field('notice', $post_id);

  switch ($column) {
    case 'posttype_date':
      echo $posttype_date;
      break;

    case 'posttype_notice':
      echo $posttype_notice;
      break;
  }
}
add_action('manage_posttype_posts_custom_column', 'addPostTypePostColumnsData', 10, 2);
?>