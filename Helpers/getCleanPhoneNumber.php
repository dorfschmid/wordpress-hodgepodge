<?php
// Get a clean phone number (e.g.: for use inside a tel: link)
function getCleanPhomeNumber($number) {
  $number = preg_replace("/\([^)]+\)/","", $number);

  return esc_html(str_replace(array(' ', '/', '(', ')', '-', '–', '—'), '', $number));
}