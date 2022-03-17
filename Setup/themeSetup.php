<?php
// Base setup
function themeSetup() {
  // Add localization
  load_theme_textdomain('language', get_template_directory() . '/languages');

  // Add basic features
  add_theme_support('automatic-feed-links');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ));
  add_theme_support('responsive-embeds');
  add_theme_support('editor-styles');

  // Update fixed core image sizes
  update_option('large_size_w', 1920);
  update_option('large_size_h', 1440);
  update_option('medium_large_size_w', 1280);
  update_option('medium_large_size_h', 960);
  update_option('medium_size_w', 640);
  update_option('medium_size_h', 480);
  update_option('thumbnail_size_w', 320);
  update_option('thumbnail_size_h', 320);

  // Add custom image sizes
  add_image_size('preview', 16, 16, true);

  // Load custom styles used inside the WYSIWYG backend editor.
  add_editor_style(esc_url(get_template_directory_uri() . '/assets/css/wp/editor-styles.css'));

  // Register navigation menus
  register_nav_menus(array(
    'primary' => __('Primäre Navigation', 'language'),
    'secondary' => __('Sekundäre Navigation', 'language'),
  ));
}
add_action('after_setup_theme', 'themeSetup');

// Changes/adds the names of existing images sizes
function changeImageSizeNames($sizes) {
  return array_merge($sizes, array(
    'medium_large' => __('Medium Large'),
  ));
}
add_filter('image_size_names_choose', 'changeImageSizeNames');

// Blur custom preview image
function blurPreviewImage($meta) {
  $path = wp_upload_dir();
  $subdir = trailingslashit(dirname($meta['file']));
  $file = trailingslashit($path['basedir']).$subdir.$meta['sizes']['preview']['file'];

  if ($meta['sizes']['preview']) {
    list($orig_w, $orig_h, $orig_type) = @getimagesize($file);

    $image = wp_load_image($file);

    if ($image) {
      for ($i = 0; $i < 10; $i++) {
        imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
      }

      switch ($orig_type) {
        case IMAGETYPE_GIF:
          imagegif($image, $file);
          break;

        case IMAGETYPE_PNG:
          imagepng($image, $file);
          break;

        case IMAGETYPE_JPEG:
          imagejpeg($image, $file, 75);
          break;
      }
    }
  }

  return $meta;
}
add_filter('wp_generate_attachment_metadata', 'blurPreviewImage');

// Styles and scripts
function themeScripts() {
  // Remove jQuery from frontend
  // This can be dangerous as some plugins require jQuery to work properly
  // Only uncomment when you're absolutely shure
  // if (!is_admin()) wp_deregister_script('jquery');

  // Remove gutenberg styles from frontend
  // wp_dequeue_style('wp-block-library');

  // Load custom styles And scripts into the frontend
  wp_enqueue_style('styles', esc_url(get_template_directory_uri() . '/assets/css/styles.min.css'), '1.0', 'screen');
  wp_enqueue_script('scripts', esc_url(get_template_directory_uri() . '/assets/js/scripts.min.js'), array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'themeScripts');