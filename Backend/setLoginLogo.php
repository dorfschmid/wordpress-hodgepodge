<?php
// Add a custom logo to the WordPress login page
function setLoginLogo() {
  echo
  '<style type="text/css">
    h1 a {
      width: 100% !important;
      height: ???px !important;
      background-image: url(' . esc_url(get_template_directory_uri() . '/assets/images/???') . ') !important;
      background-size: ???px ???px !important;
      background-position: 50% 50% !important;
    }
  </style>';
}
add_action('login_head', 'setLoginLogo');