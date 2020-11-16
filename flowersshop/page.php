<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.

 */

get_header();
?>

<div class="center_content">
	<div class="left_content">
		<div class="title">
			<span class="title_icon">
				<img src="<?php echo get_template_directory_uri() . '/assets/img/bullet1.gif'; ?>" alt="" />
			</span><?php the_title(); ?>
		</div>
		<?php the_content(); ?>
		<div class="clear"></div>
	</div>
	<!--end of left content-->

<?php get_sidebar(); ?>
<!--end of right content-->

<div class="clear"></div>
  </div>
  <!--end of center content-->
<?php get_footer(); 
