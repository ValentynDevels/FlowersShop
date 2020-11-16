<?php

/**
 * Adds Promotions_Widget
 */
class Promotions_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'promotions_widget', // Base ID
			esc_html__( 'Promotions Widget', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'Widgets with promotions', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		?>
    
    <div class="right_box">
        <div class="title">
					<span class="title_icon">
						<img src="<?php echo get_template_directory_uri() . '/assets/img/bullet4.gif'; ?>" alt="" />
					</span>
        <!-- title -->
        <?php
        if ( ! empty( $instance['title'] ) ) {
          echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        ?>

        </div>

        <?php
        // The shortcode output three promotions products
        echo do_shortcode('[products limit="3" columns="1" orderby="rating" on_sale="true" class="new_prod_box"]');
        
        ?>
        
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

} // class Promotions_Widget

// register Promotions_Widget 
function register_promotions_widget() {
  register_widget( 'Promotions_Widget' );
}
add_action( 'widgets_init', 'register_promotions_widget' );

