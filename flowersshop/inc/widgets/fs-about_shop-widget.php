<?php

/**
 * Adds About_Our_Shop widget.
 */
class About_Our_Shop_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'foo_widget', // Base ID
			esc_html__( 'Our_Shop', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'Widget with information about shop', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 */
	public function widget( $args, $instance ) {
    echo $args['before_widget']; 
    ?>
    
    <div class="title">
      <span class="title_icon">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/bullet3.gif'; ?>" alt="" />
      </span>
      <!-- widget title -->

      <?php
      if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
      } 
      ?>

    </div>
    <div class="about">
      <p> 
        <img src="<?php echo carbon_get_theme_option('fs_widget_img'); ?>" alt="" class="right" /> 
				<?php echo carbon_get_theme_option('fs_widget_text'); ?>
      </p>
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

} // class About_Our_Shop_Widget

// register About_Our_Shop_Widget
function register_about_widget() {
  register_widget( 'About_Our_Shop_Widget' );
}
add_action( 'widgets_init', 'register_about_widget' );