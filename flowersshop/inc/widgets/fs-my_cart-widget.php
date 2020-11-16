<?php

/**
 * Adds  My_Cart_Widget widget.
 */
class My_Cart_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'my_cart_widget', // Base ID
			esc_html__( 'My Cart Widget', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'Widget with cart', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	**/
	public function widget( $args, $instance ) {
		echo $args['before_widget']; ?>
    <div class="cart">
        <div class="title">
          <span class="title_icon">
            <img src="<?php echo get_template_directory_uri() . '/assets/img/cart.gif'; ?>" alt="" />
          </span>
          <!-- Output title -->
          <?php if ( ! empty( $instance['title'] ) ) {
			    echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		      } ?>
        </div>
        <?php flowers_shop_woocommerce_cart_link(); ?>
        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="view_cart">view cart</a> 
    </div>

		<?php echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		return $instance;
	}

} // class My_Cart_Widget

// register My_Cart_Widget 
function register_cart_widget() {
  register_widget( 'My_Cart_Widget' );
}
add_action( 'widgets_init', 'register_cart_widget' );