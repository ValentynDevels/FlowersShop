<?php
  get_header(); ?>
  
  <div class="center_content">
    <div class="left_content">
      <div class="title">
        <span class="title_icon">
          <img src="<?php echo get_template_directory_uri() . '/assets/img/bullet1.gif'; ?>" alt="" />
        </span>
        <?php the_title(); ?>
      </div>

      <?php
        $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

        // The featured product query
        $query = new WP_Query( array(
          'post_type'           => 'product',
          'post_status'         => 'publish',
          'ignore_sticky_posts' => 1,
          'posts_per_page'      => 4,
          'paged'               => $paged,
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
                <span class="product_special">SPECIAL</span>
                <div class="prod_title"><?php the_title(); ?></div>
                <p class="details" style="padding: 5px 15px;"><?php echo strip_tags(get_the_excerpt()); ?></p>
                <a href="<?php the_permalink(); ?>" class="more">- more details -</a>
                <div class="clear"></div>
              </div>
              <div class="box_bottom"></div>
            </div>
            <div class="clear"></div>
      </div>
      

        <?php endwhile; wp_reset_postdata(); endif; 
        $big = 999999999; 

        ?>
        <div class="special_pag">
        <?php
        echo paginate_links( array(
          'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
          'current' => max( 1, get_query_var('paged') ),
          'total'   => $query->max_num_pages,
          'prev_text' => '<<',
          'next_text' => '>>',
          'type' => 'list'
        ) );
      ?>
      </div>
    </div>
    
    
    <!--end of left content-->
    <?php get_sidebar(); ?>
    <!--end of right content-->
    <div class="clear"></div>
  </div>
  <!--end of center content-->


<?php 
  get_footer(); 