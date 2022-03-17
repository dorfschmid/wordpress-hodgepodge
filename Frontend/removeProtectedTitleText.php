<?php
// Removes forced protected and private strings from titles
function removeProtectedTitleText() {
  return __('%s');
}
add_filter('protected_title_format', 'removeProtectedTitleText');
add_filter('private_title_format', 'removeProtectedTitleText');