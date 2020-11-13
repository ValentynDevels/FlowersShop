<?php 
  get_header(); ?>

<div class="center_content">
    <div class="left_content">
      <div class="title"><span class="title_icon"><img src="<?php echo get_template_directory_uri() . '/assets/img/bullet1.gif'; ?>" alt="" /></span>About us</div>
      <div class="feat_prod_box_details">
        <p class="details"> <img src="images/about.gif" alt="" class="right" />  
        <?php echo  str_replace(array("\r\n", "\r", "\n"), '</p><p>', carbon_get_theme_option('fs_about_page_text')); ?>
        </p>
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