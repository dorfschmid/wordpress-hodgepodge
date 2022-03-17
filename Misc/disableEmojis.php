<?php
// Disabled emojis
function disableEmojis() {
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_print_styles', 'print_emoji_styles');

  add_filter('emoji_svg_url', '__return_false');
}
add_action('init', 'disableEmojis');