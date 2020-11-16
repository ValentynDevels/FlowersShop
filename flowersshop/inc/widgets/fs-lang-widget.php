<?php
/**
 * Adds top widget with languages and currencies
 */
class Lang_And_Currency extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'lang-currency', // Base ID
			esc_html__( 'Language and Currency', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'widget with languages and currencies', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget']; ?>
      <div class="languages_box"> 
        <span class="red">Languages:</span> 
        <a href="#">
          <img src="<?php echo get_template_directory_uri() . '/assets/img/gb.gif'; ?>" alt="" border="0" />
        </a> 
        <a href="#">
          <img src="<?php echo get_template_directory_uri() . '/assets/img/fr.gif'; ?>" alt="" border="0" />
        </a> 
        <a href="#">
          <img src="<?php echo get_template_directory_uri() . '/assets/img/de.gif'; ?>" alt="" border="0" />
        </a> 
      </div>

      <div class="currency"> 
        <span class="red">Currency: </span> 
        <a href="#">GBP</a> <a href="#">EUR</a> 
        <a href="#"><strong>USD</strong></a> 
      </div>

		<?php echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 * @param array $instance Previously saved values from database.
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
	 * @see WP_Widget::update()
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		return $instance;
	}

} // class Lang_And_Currency

// register Lang_And_Currency widget
function register_lang_and_currency_widget() {
  register_widget( 'Lang_And_Currency' );
}
add_action( 'widgets_init', 'register_lang_and_currency_widget' );