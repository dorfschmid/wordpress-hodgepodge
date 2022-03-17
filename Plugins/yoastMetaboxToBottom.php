<?php
// Sets the yoast seo metabox to the bottom
function yoastMetaboxToBottom() {
  return 'low';
}
add_filter('wpseo_metabox_prio', 'yoastMetaboxToBottom');