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
        <img src="<?php echo get_template_directory_uri() . '/assets/img/about.gif'; ?>" alt="" class="right" /> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud. 
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
        <div class="new_prod_box"> <a href="#">product name</a>
          <div class="new_prod_bg"> <span class="new_icon"><img src="<?php echo get_template_directory_uri() . '/assets/img/promo_icon.gif'; ?>" alt="" /></span> <a href="#"><img src="<?php echo get_template_directory_uri() . '/assets/img/thumb1.gif'; ?>" alt="" class="thumb" border="0" /></a> </div>
        </div>
        <div class="new_prod_box"> <a href="#">product name</a>
          <div class="new_prod_bg"> <span class="new_icon"><img src="<?php echo get_template_directory_uri() . '/assets/img/promo_icon.gif'; ?>" alt="" /></span> <a href="#"><img src="<?php echo get_template_directory_uri() . '/assets/img/thumb2.gif'; ?>" alt="" class="thumb" border="0" /></a> </div>
        </div>
        <div class="new_prod_box"> <a href="#">product name</a>
          <div class="new_prod_bg"> <span class="new_icon"><img src="<?php echo get_template_directory_uri() . '/assets/img/promo_icon.gif'; ?>" alt="" /></span> <a href="#"><img src="<?php echo get_template_directory_uri() . '/assets/img/thumb3.gif'; ?>" alt="" class="thumb" border="0" /></a> </div>
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

} // class Promotions_Widget

// register Promotions_Widget 
function register_promotions_widget() {
  register_widget( 'Promotions_Widget' );
}
add_action( 'widgets_init', 'register_promotions_widget' );




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




/**
 * Adds Product_Categories_Widget widget.
 */
class Product_Partners_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'product_partners_widget', // Base ID
			esc_html__( 'Flowers Product Partners', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'Widget with all product partners', 'text_domain' ), ) // Args
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
					<img src="<?php echo get_template_directory_uri() . '/assets/img/bullet6.gif'; ?>" alt="" />
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

} // class Product_Partners_Widget


// register Product_Partners_Widget
function register_product_partners_widget() {
	register_widget( 'Product_Partners_Widget' );
}
add_action( 'widgets_init', 'register_product_partners_widget' );