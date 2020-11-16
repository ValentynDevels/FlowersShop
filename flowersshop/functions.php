<?php

//Prevent direct access to the file 
if (!defined('ABSPATH')) {
  exit;
}

//load theme supports
require get_template_directory() . '/inc/theme-settings.php';

//load theme scripts and styles
require get_template_directory() . '/inc/enqueue-scripts.php';

//load register menus file
require get_template_directory() . '/inc/menus.php';

//load files that register sidebars and widgets
require get_template_directory() . '/inc/widgets/sidebars.php';
require get_template_directory() . '/inc/widgets/widgets.php';

//load woocommerce functions and settings
if (class_exists('WooCommerce')) {
  // main woocommerce php file
  require get_template_directory() . '/inc/woocommerce.php';

  /**
   * settings for sigle product page
   */
  require get_template_directory() . '/woocommerce/includes/wc-single-functions-remove.php';
  require get_template_directory() . '/woocommerce/includes/wc-single-functions.php';
  require get_template_directory() . '/woocommerce/includes/wc-functions-cart.php';

  /**
   * settings for archove products page
   */
  require get_template_directory() . '/woocommerce/includes/wc-archive-functions-remove.php';
  require get_template_directory() . '/woocommerce/includes/wc-archive-functions.php';
}

//include carbon fields plugin
add_action('after_setup_theme', 'crb_load');

function crb_load() {
  load_template(get_template_directory() . '/inc/carbon-fields/vendor/autoload.php');
  \Carbon_Fields\Carbon_Fields::boot();
}

//include carbon fields options files
add_action('carbon_fields_register_fields', 'fs_reg_custom_fields');

function fs_reg_custom_fields() {
  //require get_template_directory() . '/inc/carbon-fields/custom-fields-options/metabox.php';
  require get_template_directory() . '/inc/carbon-fields/custom-fields-options/theme-options.php';
}
