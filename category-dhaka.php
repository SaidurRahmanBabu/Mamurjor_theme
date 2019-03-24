<?php
	single_cat_title();
	$cat_obj = get_queried_object();
	$create_thumb = get_field('cat_thumb', $cat_obj);

	 if($create_thumb){
	 	$cat_thumb_url = wp_get_attachment_image_src( $create_thumb); 
	 }
?>
<br>
	<a href="<?php the_permalink(); ?>">
		<img src="<?php echo esc_url($cat_thumb_url[0]); ?>" alt="">
	</a>