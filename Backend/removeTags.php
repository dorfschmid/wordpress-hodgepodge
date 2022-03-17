<?php
// Disable post tags
function removeTags() {
  unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'removeTags');

// Remove post tags sub menu
function removeTagsSubMenu() {
  remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
}
add_action('admin_menu', 'removeTagsSubMenu');