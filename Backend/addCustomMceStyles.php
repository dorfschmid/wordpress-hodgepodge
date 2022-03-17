<?php
// Add the style select button to the editor
function addCustomMceButtons($buttons) {
  array_unshift($buttons, 'styleselect');

  return $buttons;
}
add_filter('mce_buttons_2', 'addCustomMceButtons');

// Define new style formats
function addCustomMceStyles($settings) {
  $style_formats = array(
    array(
      'title' => esc_html__('Display Headline (h1 - h6)', 'language'),
      'selector' => 'h1,h2,h3,h4,h5,h6',
      'classes' => 'u-display',
    ),
    array(
      'title' => esc_html__('Großer Paragraph (p)', 'language'),
      'selector' => 'p',
      'classes' => 'u-text-lead',
    ),
    array(
      'title' => esc_html__('Button (a)', 'language'),
      'selector' => 'a',
      'classes' => 'a-button',
    ),
  );

  $settings['style_formats'] = json_encode($style_formats);

  return $settings;
}
add_filter('tiny_mce_before_init', 'addCustomMceStyles');

// Change default TinyMCE editor elements
function editMceToolbars($toolbars) {
  $toolbars['block_formats'] = "Paragraph=p; Heading 2=h2; Heading 3=h3; Heading 4=h4; Heading 5=h5; Heading 6=h6";
  $toolbars['toolbar1'] = 'formatselect,styleselect,bold,italic,bullist,numlist,blockquote,hr,link,unlink,pastetext,removeformat,undo,redo,wp_more';
  $toolbars['toolbar2'] = '';
  $toolbars['toolbar3'] = '';
  $toolbars['toolbar4'] = '';

  return $toolbars;
}
add_filter('tiny_mce_before_init', 'editMceToolbars');