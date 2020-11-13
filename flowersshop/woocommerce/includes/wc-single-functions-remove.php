<?php
/**
 * Disable the default WooCommerce's.
 *
 * Removing the default WooCommerce hooks,
 * actions and filters and stylesheets
 * 
 * 
**/ 

if (!defined('ABSPATH')) {
  exit;
}

// remove woocommerce stylesheet
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' ); 

//remove default woocommerce breadcrumbs
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);


//remove output wraper and some info
remove_all_actions('woocommerce_before_single_product_summary');

/**
 * Remove default output product image,
 * description, title, and other
 */
remove_all_actions('woocommerce_single_product_summary');

//remove output related products after single product content
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

