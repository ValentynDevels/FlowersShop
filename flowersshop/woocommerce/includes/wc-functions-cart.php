<?php

if ( ! function_exists( 'flowers_shop_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function flowers_shop_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		flowers_shop_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'flowers_shop_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'flowers_shop_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function flowers_shop_woocommerce_cart_link() {

		$item_count_text = sprintf(
			_n( '%d x item', '%d x items', WC()->cart->get_cart_contents_count(), 'flowers-shop' ),
			WC()->cart->get_cart_contents_count()
			);
			?>
		<div class="home_cart_content"> <?php echo esc_html( $item_count_text ); ?> | <span class="red">TOTAL: <?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> </div>
			
		<?php
	}
}

if ( ! function_exists( 'flowers_shop_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function flowers_shop_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php flowers_shop_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}
