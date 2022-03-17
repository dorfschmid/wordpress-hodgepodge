<?php
// Change default ACF TinyMCE editor elements
function acfCustomMceStyles($acf_toolbars) {
  $acf_toolbars['Full'][1] = array('formatselect', 'styleselect', 'bold', 'italic', 'bullist', 'numlist', 'blockquote', 'hr', 'link', 'unlink', 'pastetext', 'removeformat', 'undo', 'redo');

  return $acf_toolbars;
}
add_filter('acf/fields/wysiwyg/toolbars', 'acfCustomMceStyles');