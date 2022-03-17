<?php
// Allow editors to manage wpforms
function wpFormsEditorAccess($cap) {
  return 'unfiltered_html';
}
add_filter('wpforms_manage_cap', 'wpFormsEditorAccess');