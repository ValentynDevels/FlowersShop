<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Flowers_Shop
 */

if ( ! is_active_sidebar( 'main-sidebar' ) ) {
	return;
}
?>

<div class="right_content">
	<?php dynamic_sidebar( 'main-sidebar' ); ?>
</div>
