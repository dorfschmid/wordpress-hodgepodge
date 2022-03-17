<?php
// Register a post type and a taxonomy
function postTypeInit() {
  // Regsiter the post type
  register_post_type('posttype',
    array(
      'labels' => array(
          'name' => esc_html__('Things', 'language'),
          'singular_name' => esc_html__('Thing', 'language'),
          'menu_name' => esc_html__('Things', 'language'),
          'all_items' => esc_html__('All Things', 'language'),
          'add_new' => esc_html__('Add Things', 'language'),
          'add_new_item' => esc_html__('Add Thing', 'language'),
          'edit_item' => esc_html__('Edit Thing', 'language'),
          'new_item' => esc_html__('New Thing', 'language'),
          'view_item' => esc_html__('View Thing', 'language'),
          'search_items' => esc_html__('Search Thing', 'language'),
          'not_found' => esc_html__('No Thing found', 'language'),
          'not_found_in_trash' => esc_html__('No Thing found inside trash', 'language'),
      ),
      'description' => esc_html__('Manage Things', 'language'),
      'public' => true,
      'hierarchical' => false,
      'exclude_from_search' => false,
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'show_in_nav_menus' => false,
      'show_in_admin_bar' => false,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-coffee',
      'capability_type' => 'post',
      'supports' => array('title', 'editor', 'thumbnail'),
      'has_archive' => true,
      'rewrite' => array('slug' => 'posttype'),
      'query_var' => true,
    )
  );

  // Register the taxonomy
  register_taxonomy(
    'posttype_taxonomy',
    'posttype',
    array(
      'labels' => array(
        'name' => esc_html__('Gizmos', 'language'),
        'singular_name' => esc_html__('Gizmo', 'language'),
        'menu_name' => esc_html__('Gizmos', 'language'),
        'all_items' => esc_html__('All Gizmos', 'language'),
        'edit_item' => esc_html__('Edit Gizmo', 'language'),
        'view_item' => esc_html__('View Gizmo', 'language'),
        'update_item' => esc_html__('Update Gizmo', 'language'),
        'add_new_item' => esc_html__('Add Gizmo', 'language'),
        'new_item_name' => esc_html__('New Gizmo', 'language'),
        'parent_item' => esc_html__('Parent Gizmo', 'language'),
        'parent_item_colon' => esc_html__('Parent Gizmo:', 'language'),
        'search_items' => esc_html__('Search Gizmo', 'language'),
      ),
      'description' => esc_html__('Manage Gizmos', 'language'),
      'public' => true,
      'publicly_queryable' => true,
      'hierarchical' => true,
      'show_ui' => true,
      'show_in_nav_menus' => false,
      'show_admin_column' => true,
      'rewrite' => array('slug' => 'posttype-taxonomy'),
      'query_var' => true,
      )
  );
}
add_action('init', 'postTypeInit');
?>