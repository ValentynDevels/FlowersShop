<?php
  get_header(); ?>

<div class="center_content">
    <div class="left_content">
      <div class="title">
        <span class="title_icon">
          <img src="<?php echo get_template_directory_uri() . '/assets/img/bullet1.gif'; ?>" alt="" />
        </span>Featured products
      </div>
      <?php

        // The featured product query
        $query = new WP_Query( array(
          'post_type'           => 'product',
          'post_status'         => 'publish',
          'ignore_sticky_posts' => 1,
          'posts_per_page'      => 2,
          'tax_query'           => array(
            array(
              'taxonomy' => 'product_visibility',
              'field'    => 'name',
              'terms'    => 'featured',
              'operator' => 'IN', // or 'NOT IN' to exclude feature products
            )
          )
        ) );

      if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
          <div class="feat_prod_box">
            <div class="prod_img" style="float: left;">
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('products-home'); ?>
              </a>
            </div>

            <div class="prod_det_box">
              <div class="box_top"></div>
              <div class="box_center">
                <div class="prod_title"><?php the_title(); ?></div>
                <p class="details" style="padding: 5px 15px;"><?php echo strip_tags(get_the_excerpt()); ?></p>
                <a href="<?php the_permalink(); ?>" class="more">- more details -</a>
                <div class="clear"></div>
              </div>
              <div class="box_bottom"></div>
            </div>
            <div class="clear"></div>
      </div>

        <?php endwhile; wp_reset_postdata(); endif; ?>
        <div class="title">
          <span class="title_icon">
            <img src="<?php echo get_template_directory_uri() . '/assets/img/bullet2.gif'; ?>" alt="" />
          </span>New products
        </div>

        <div class="new_products">

        <?php

        // The new products query
        $query = new WP_Query( array(
          'post_type'           => 'product',
          'post_status'         => 'publish',
          'ignore_sticky_posts' => 1,
          'posts_per_page'      => 3,
          'order'               => 'DESC'
        ) );

      if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>

        <div class="new_prod_box"> 
          <a href="<?php the_permalink(); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
            <h2 class="woocommerce-loop-product__title"><?php the_title(); ?></h2>
            <div class="prod_thumb_wrap">
              <span class="product_new">NEW</span>
              <?php the_post_thumbnail('products'); ?>
            </div>

          </a>
        </div>

      <?php endwhile; wp_reset_postdata(); endif; ?>
      </div>
      </div>
    <!--end of left content-->
   <?php get_sidebar() ?>
    <div class="clear"></div>
  </div>
  <!--end of center content-->


<?php
  get_footer(); 