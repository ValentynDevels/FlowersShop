<?php

/**
 * Adds Product_Categories_Widget widget.
 */
class Product_Categories_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'product_categories_widget', // Base ID
			esc_html__( 'Flowers Product Categories', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'Widget with all product categories', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget']; ?>
		
		<div class="right_box">
			<div class="title">
				<span class="title_icon">
					<img src="<?php echo get_template_directory_uri() . '/assets/img/bullet5.gif'; ?>" alt="" />
				</span>
					<!-- title -->
					<?php
						if ( ! empty( $instance['title'] ) ) {
							echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
						}
					?>

			</div>

			<ul class="list">
			<?php

				$args = array(
					'style'              => 'list',
					'echo'               => 1,
					'depth'              => 0,
					'taxonomy'           => 'product_cat',
					'hide_title_if_empty' => true,
					'title_li' => '',
				);
				
				echo wp_list_categories( $args );
			?>

  		</ul>
		</div>
			</div>
		<?php
		echo $args['after_widget'];
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

} // class Product_Categories_Widget


// register Product_Categories_Widget 
function register_product_categories_widget() {
	register_widget( 'Product_Categories_Widget' );
}
add_action( 'widgets_init', 'register_product_categories_widget' );