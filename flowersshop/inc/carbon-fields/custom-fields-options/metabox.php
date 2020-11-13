<!-- Complex field -->
<?php 
$slides = carbon_get_post_meta( get_the_ID(), 'crb_slides' );
if ( $slides ) {
    foreach ( $slides as $slide ) {
        echo $slide['image'];
    }
}
?>