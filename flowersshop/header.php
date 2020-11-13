<?php
/**
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="wrap">
  <div class="header">
    <div class="logo">
			<a href="<?php echo get_home_url(); ?>">
				<?php $logo_id = carbon_get_theme_option('fs_header_logo');
					$logo = $logo_id ? wp_get_attachment_image($logo_id, 'full') : '';
				?>
				<img src="<?php echo $logo[0]; ?>" width="<?php echo $logo[1]; ?>" height="<?php echo $logo[2]; ?>">
			</a>
		</div>

			<?php
				// Add Primary header menu 
				wp_nav_menu( [
					'theme_location'  => 'header',
					'menu'            => 'Primary Menu', 
					'container'       => 'nav', 
					'container_id'    => 'menu',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 0,
				] );
			?>

  </div>


