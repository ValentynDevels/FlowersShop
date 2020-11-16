<?php

//Prevent direct access to the file 
if (!defined('ABSPATH')) {
  exit;
}

//theme supports
add_action('after_setup_theme', 'flowers_settings');

function flowers_settings() {
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );

  /**
 * WooCommerce setup function.
 * @return void
 */
  add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 150,
			'single_image_width'    => 300,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	add_image_size('products', 116, 108, true);
	add_image_size('products-home', 150, 140, true);
}
