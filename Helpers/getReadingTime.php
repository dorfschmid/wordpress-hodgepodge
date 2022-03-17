<?php
// Compute reading time
function getReadingTime($id = null) {
  if (is_null($id)) $id = get_the_id();

  $content = get_post_field('post_content', $id);
  $word_count = str_word_count(strip_tags($content));
  $readingtime = ceil($word_count / 200);

  return $readingtime;
}