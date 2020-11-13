<?php
/**
 * 
 * WooCommerce functions
 * The file contains custom functions
 * that edit default woocommerce hooks and templates
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * flowers shop breadcrumbs
 */
add_action( 'woocommerce_before_main_content', 'fs_add_custom_breadcrumbs', 20);

function fs_add_custom_breadcrumbs() { ?>

  <div class="crumb_nav">

    <?php
      woocommerce_breadcrumb(array(
        'delimiter' => ' &gt;&gt; ',
        'home'        => _x( 'home', 'breadcrumb', 'woocommerce' ),
      ));
    ?>

  </div>

  <?php
}

/*
 *  output product-page content
 */
add_action('woocommerce_single_product_summary', 'fs_current_product_content', 5);

//conteiner with functions that outup content part
function fs_current_product_content() {

  fs_current_product_title(); //output product title from woocommerce template
  
  ?>

  <!-- container with image and main information about product -->
  <div class="feat_prod_box_details">

  <?php
  
  woocommerce_show_product_images(); //output product img from woocommerce template

  fs_current_product_main_info(); //output main product info
}

//output the product title
function fs_current_product_title() {
  ?>

  <div class="title">
		<span class="title_icon">
			<img src="<?php echo get_template_directory_uri() . '/assets/img/bullet1.gif'; ?>" alt="" />
		</span><?php echo wc_get_template( 'single-product/title.php' ); ?>
  </div>
  
  <?php
}

//outup main product info
function fs_current_product_main_info() {
  ?>

  <div class="prod_det_box">
    <div class="box_top"></div>
    <div class="box_center">
      <div class="prod_title">Details</div>

      <?php
        // output short description
        woocommerce_template_single_excerpt(); 
      ?>

      <div class="price">
        <strong>PRICE:</strong> 

        <?php 
          // output product price
          woocommerce_template_single_price(); 
        ?>

      </div>
        <div class="price">
          <strong>COLORS:</strong> 
          <span class="colors">
            <img src="<?php echo get_template_directory_uri() . '/assets/img/color1.gif'; ?>" alt="" border="0" />
          </span> 
          <span class="colors">
            <img src="<?php echo get_template_directory_uri() . '/assets/img/color2.gif'; ?>" alt="" border="0" />
          </span> 
          <span class="colors">
            <img src="<?php echo get_template_directory_uri() . '/assets/img/color3.gif'; ?>" alt="" border="0" />
          </span> 
        </div>

        <?php
          //add button add to cart
          woocommerce_template_single_add_to_cart();
        ?>

      </div>
    <div class="box_bottom"></div>
  </div>
  <div class="clear"></div>
</div>

<?php
}


/**
 * Rename product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'fs_rename_tabs', 98 );

function fs_rename_tabs( $tabs ) {

	$tabs['description']['title'] = __( 'More details' );		// Rename the description tab
	$tabs['reviews']['title'] = __( 'Reviews' );				// Rename the reviews tab
	$tabs['additional_information']['title'] = __( 'Characteristics' );	// Rename the additional information tab

	return $tabs;

}

/**
 * Customize product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'fs_edit_tabs_content', 98 );

function fs_edit_tabs_content( $tabs ) {

  $tabs['description']['callback'] = 'fs_custom_description_tab_content';	// Custom description callback
  $tabs['additional_information']['callback'] = 'fs_custom_additional_tab_content';	// Custom additional callback

	return $tabs;
}

function fs_custom_description_tab_content() {
  echo '<h2>Custom Description</h2>'; ?>
  
  <div id="tab1" class="tab" style="display: block;"> 
  
    <?php the_content(); ?>

  </div>

  <?php
}

function fs_custom_additional_tab_content() {
  global $product; //object with all product info

  echo '<h2>Custom Description</h2>';

  // Output additional info
  do_action( 'woocommerce_product_additional_information', $product );
}


/**
 * Add a custom product data tab
 */
add_filter( 'woocommerce_product_tabs', 'fs_new_product_related_tab' );

function fs_new_product_related_tab( $tabs ) {
	
	// Adds the new tab (related products)
	
	$tabs['related_tub'] = array(
		'title' 	=> __( 'Related Products', 'woocommerce' ),
		'priority' 	=> 50,
		'callback' 	=> 'woocommerce_output_related_products' // wc function output relation posts
	);

	return $tabs;

}
