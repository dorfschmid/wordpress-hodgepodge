<?php
// Returns the HTML time tag with the current posts date
function getMetaTime() {
  $time_string = sprintf('<time datetime="%1$s">%2$s</time>',
    esc_html(get_the_date('Y-m-d H:i:s')),
    esc_html(get_the_date())
  );

  return $time_string;
}