<?php

if (!defined('ABSPATH')) {
    exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

//->set_width(30)

// Add second options page under 'Basic Options'
Container::make( 'theme_options', __( 'Theme settings' ) )
    ->set_icon('dashicons-carrot')
    ->add_tab( __( 'Header & Footer' ), array( //method add_tab add tabs for fields
        Field::make( 'image', 'fs_header_logo', __( 'Header Logo' ) )->set_value_type( 'url' )->set_width(25),
        Field::make( 'image', 'fs_footer_logo', __( 'Footer Logo' ) )->set_value_type( 'url' )->set_width(25),
        Field::make( 'image', 'fs_footer_add_logo', __( 'Footer additional Logo' ) )->set_value_type( 'url' )->set_width(25),
        Field::make( 'image', 'fs_footer_bg', __( 'Footer Background' ) )->set_value_type( 'url' )->set_width(25),
    ) )
    ->add_tab( __( 'Our shop widget' ), array(
        Field::make( 'text', 'fs_widget_text', __( 'Text' ) ),
        Field::make( 'image', 'fs_widget_img', __( 'Image' ) )->set_value_type( 'url'),
    ) );

