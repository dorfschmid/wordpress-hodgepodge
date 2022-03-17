<?php
// Restrict access to non-admins
function restrictMenuPages() {
  if (!current_user_can('administrator')) {
    remove_menu_page('edit-comments.php');
    remove_menu_page('profile.php');
    remove_menu_page('tools.php');
  }
}
add_action('admin_menu', 'restrictMenuPages');