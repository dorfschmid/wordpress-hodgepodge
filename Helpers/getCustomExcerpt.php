<?php
// Creates an excerpt from a any provided piece of text
function getCustomExcerpt($content, $length = 20) {
  $content = strip_shortcodes($content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]>', $content);
  $excerpt_length = apply_filters('excerpt_length', $length);
  $excerpt_more = apply_filters('excerpt_more', ' ' . '...');

  return wp_trim_words($content, $excerpt_length, $excerpt_more);
}