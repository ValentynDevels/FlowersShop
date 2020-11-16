<?php

//set custom product image size
add_filter('single_product_archive_thumbnail_size', 'fs_resize');

function fs_resize($size) {
	$size = 'products';
	return $size;
}

add_action('woocommerce_before_shop_loop_item_title', 'product_thumbnail', 10);

function product_thumbnail() {
	global $product; 

	$sale = 0;
	
	// check sale
	if ($product->regular_price && $product->sale_price) {
		$sale = $product->regular_price - $product->sale_price;
		$sale = (($sale * 100) / $product->regular_price);
	}
	else {
		$created_date = strtotime( $product->get_date_created() );
		
		if ( ( time() - ( 60 * 60 * 24 * 3 ) ) < $created_date ) {
			$new = 'NEW';
		}
	}
	?>
	<div class="prod_thumb_wrap">

		<?php

			//output sale
			if ($sale) 
				echo '<span class="product_sale">-' . (int) $sale . '%</span>';
			else if ($new) {
				echo '<span class="product_new">' . $new . '</span>';
			}

			the_post_thumbnail('products');
		?>

	</div>

	<?php
}