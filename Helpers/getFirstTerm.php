<?php
// Get first term form array
function getFirstTerm($taxonomy, $id = null) {
  if (is_null($id)) $id = get_the_id();

  $term_obj = false;
  $terms = get_the_terms($id, $taxonomy);

  if (!empty($terms)) {
    if (class_exists('WPSEO_Primary_Term')) {
      $wpseo_primary_term = new WPSEO_Primary_Term($taxonomy, $id);
      $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
      $term_obj = get_term($wpseo_primary_term);

      if (is_wp_error($term_obj)) {
        $term_obj = $terms[0];
      }
    } else {
      $term_obj = $terms[0];
    }
  }

  return $term_obj;
}