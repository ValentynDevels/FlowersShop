<?php 

//reg Primary header menu
add_action( 'after_setup_theme', 'fs_reg_header_menu' );

function fs_reg_header_menu() {
  register_nav_menu( 'header', 'Primary Menu' );
}

//reg footer menu
add_action( 'after_setup_theme', 'fs_reg_footer_menu' );

function fs_reg_footer_menu() {
  register_nav_menu( 'footer', 'Footer Menu' );
}
