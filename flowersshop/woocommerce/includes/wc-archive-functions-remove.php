<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// remove archive page description and sorting
remove_all_actions('woocommerce_before_shop_loop');

// remove product price and raiting
remove_all_actions('woocommerce_after_shop_loop_item_title');

//remove outupt sale text
remove_all_actions('woocommerce_before_shop_loop_item_title');

// remove add to cart link
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

