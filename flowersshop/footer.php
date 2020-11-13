<?php
/**
 * The template for displaying the footer
**/

?>

	<div class="footer">
		<div class="left_footer">
			<img src="<?php echo get_template_directory_uri() . '/assets/img/footer_logo.gif'; ?>" alt="" /><br />
			<a href="http://csscreme.com">
				<img src="<?php echo get_template_directory_uri() . '/assets/img/csscreme.gif'; ?>" alt="" border="0" />
			</a>
		</div>

			<?php
				// Add footer menu 
				wp_nav_menu( [
					'theme_location'  => 'footer',
					'menu'            => 'Footer Menu', 
					'container'       => 'nav', 
					'menu_class'      => 'right_footer', 
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 0,
				] );
			?>
	</div>
	<!-- ./footer -->
</div>
<!-- ./wrap -->

<?php wp_footer(); ?>

</body>
</html>
