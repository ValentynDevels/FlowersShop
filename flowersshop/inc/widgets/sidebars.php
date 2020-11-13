<?php

//register main site sidebar in a right side
add_action( 'widgets_init', 'reg_main_sidebar' );

function reg_main_sidebar(){
	register_sidebar( array(
		'name'          => 'Main Right Sidebar',
		'id'            => "main-sidebar",
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div class="main-sidebar-widget">',
		'after_widget'  => "</div>\n",
		'before_title'  => '',
		'after_title'   => "",
	) );
}