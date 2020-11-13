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
        Field::make( 'image', 'fs_header_logo', __( 'Header Logo' ) ),
    ) )
    ->add_tab( __( 'About us' ), array(
        Field::make( 'textarea', 'fs_about_page_text', __( 'Text on "About us" page' ) )->set_width(50),
    ) )
    ->add_tab( __( 'Reg and Log' ), array(
        Field::make( 'text', 'crb_first_name', __( 'First Name' ) ),
        Field::make( 'text', 'crb_last_name', __( 'Last Name' ) ),
        Field::make( 'text', 'crb_position', __( 'Position' ) ),
    ) );

