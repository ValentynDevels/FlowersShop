<?php 
  get_header(); ?>

<div class="center_content">
    <div class="left_content">
      <div class="title"><span class="title_icon"><img src="<?php echo get_template_directory_uri() . '/assets/img/bullet1.gif'; ?>" alt="" /></span>About us</div>
      <div class="feat_prod_box_details">
       <?php the_content(); ?>
      </div>
      <div class="clear"></div>
    </div>
    <!--end of left content-->
    <?php get_sidebar(); ?>
    <!--end of right content-->
    <div class="clear"></div>
  </div>
  <!--end of center content-->

<?php 
  get_footer(); ?>