<?php 
	$images = get_field('gallery');
	$imagesShortcode;

	// Append shortcodes
	if( $images ):
        foreach( $images as $image ):
            $imageShortcode = '[fusion_slide type="image"]'.$image['url'].'[/fusion_slide]';
        	$imagesShortcode .= $imageShortcode;
        endforeach;
	endif;

	// Display shortcodes
	echo do_shortcode(
		'[fusion_slider]'.$imagesShortcode.'[/fusion_slider]'
	);

	// Reset shortcodes
	$imagesShortcode = '';
?>