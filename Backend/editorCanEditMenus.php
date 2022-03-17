<?php
// User role "editor" can now edit theme options (menus, etc.)
function editorCanEditMenus() {
  $role_object = get_role('editor');
  $role_object->add_cap('edit_theme_options');
}
add_action('admin_menu', 'editorCanEditMenus');