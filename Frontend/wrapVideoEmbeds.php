<?php
// Wraps videos on the frontend embeded into the backend editor
function wrapVideoEmbeds($html, $url) {
  if (preg_match('/youtube-nocookie.com/', $url) || preg_match('/youtube.com/', $url) || preg_match('/vimeo.com/', $url)) {
    $html = '<figure class="aligncenter"><div class="u-mediawrap">' . $html . '</div></figure>';
  }

  return $html;
}
add_filter('embed_oembed_html', 'wrapVideoEmbeds', 10, 3);