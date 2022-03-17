<?php
// Get comma seperated term list
function getCommaTerms($taxonomy = 'category', $links = false, $limit = 0, $id = null) {
  if (is_null($id)) $id = get_the_id();

  $terms = get_the_terms($id , $taxonomy);
  $termList = '';

  if ($terms) {
    $termIndex = 1;

    foreach ($terms as $term) {
      if ($links) {
        $link = esc_url(get_term_link($term->term_id));
        $termList.= '<a href="' . $link . '">';
      }

      $termList.= esc_html($term->name);

      if ($links) {
        $termList.= '</a>';
      }

      $termList.= ', ';

      if ($termIndex == $limit) break;

      $termIndex++;
    }

    $termList = rtrim($termList, ', ');

    return $termList;
  } else {
    return false;
  }
}