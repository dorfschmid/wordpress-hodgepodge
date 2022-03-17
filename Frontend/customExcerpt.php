<?php
// Define a custom excerpt length
function customExcerptLength($length) {
  return 20;
}
add_filter('excerpt_length', 'customExcerptLength', 999);

// Define a custom excerpt more string
function customExcerptMore($more) {
  return '...';
}
add_filter('excerpt_more', 'customExcerptMore');