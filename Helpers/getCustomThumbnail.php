<?php
// Returns a posts thumbnail data as an array used for the picture element
function getCustomThumbnail($id = null, $size = 'large') {
  if (is_null($id)) $id = get_the_id();

  if (has_post_thumbnail($id)) {
    $post_thumbnail_id = get_post_thumbnail_id($id);
    $src = wp_get_attachment_image_src($post_thumbnail_id, $size);

    return array(
      'sizes' => array(
        'preview' => wp_get_attachment_image_url($post_thumbnail_id, 'preview'),
        'large' => wp_get_attachment_image_url($post_thumbnail_id, 'large'),
        'medium_large' => wp_get_attachment_image_url($post_thumbnail_id, 'medium_large'),
        'medium' => wp_get_attachment_image_url($post_thumbnail_id, 'medium'),
      ),
      'width' => $src[1],
      'height' => $src[2],
      'alt' => get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true),
    );
  }

  return false;
}