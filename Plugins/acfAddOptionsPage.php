<?php
// Adds an acf options page
if (function_exists('acf_add_options_page')) {
  $options = acf_add_options_page(array(
      'page_title'    => 'General Options',
      'menu_title'    => 'General Options',
      'menu_slug'     => 'site-options',
      'capability'    => 'edit_posts',
      'icon_url'      => 'dashicons-admin-generic',
      'position'      => 2,
      'redirect'      => false,
  ));
}