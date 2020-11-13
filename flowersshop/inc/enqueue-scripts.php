<?php


//styles
function include_fs_styles() {
  //main css file 
  wp_enqueue_style('mainCss', get_stylesheet_uri(), array('lightboxCss'), '1.0.0');
  //lightbox lib css
  wp_enqueue_style('lightboxCss', get_template_directory_uri() . '/assets/css/lightbox.css', array(), null);
}

//scripts
function include_fs_scripts() {
  wp_enqueue_script('MainJs', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'include_fs_styles');
add_action('wp_enqueue_scripts', 'include_fs_scripts');