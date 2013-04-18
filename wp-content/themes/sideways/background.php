<?php

global $shortname;
$theme_options = get_option( $shortname.'_theme_options' );
	
// Set default background source.
$background_url = '{image : "'.$theme_options[$shortname.'_default_background'].'" }';

if ( is_home() ) { // If blog
	
	if ( $theme_options[$shortname.'_blog_background'] != '' ) {
		$background_url = '{image : "'.$theme_options[$shortname.'_blog_background'].'" }';
	}
	
} elseif ( is_archive() ) { // If archive page
	
	if ( $theme_options[$shortname.'_archive_background'] != '' ) {
		$background_url = '{image : "'.$theme_options[$shortname.'_archive_background'].'" }';
	}
	
} elseif ( is_search() ) { // If search results page

	if ( $theme_options[$shortname.'_search_background'] != '' ) {
		$background_url = '{image : "'.$theme_options[$shortname.'_search_background'].'" }';
	}
	
} elseif ( is_404() ) { // If page not found
	
	if ( $theme_options[$shortname.'_404_background'] != '' ) {
		$background_url = '{image : "'.$theme_options[$shortname.'_404_background'].'" }';
	}
	
} else { // If post, page or portfolio item

	$post_type = get_post_type();	
	
	if( $post_type == 'post' || $post_type == 'page' || $post_type == 'portfolio') {
		
		if ( get_post_meta( $post->ID, $shortname.'_background_image', true ) == 'Slide Show' ) { // If background option set to slideshow
			
			// Get all attached images
			$args = array(
				'post_type' => 'attachment',
				'numberposts' => -1,
				'post_status' => null,
				'post_parent' => $post->ID,
				'orderby' => 'menu_order',
				'order' => 'ASC'
			); 
				
			$attachments = get_posts($args);
				
			if ($attachments) {						
				
				$background_url = "";
				$counter = 1;

				foreach ($attachments as $attachment) {
				
					$attachurl = wp_get_attachment_url($attachment->ID);
					$title = apply_filters('the_title',$attachment->post_title);
					
					if ( count($attachments) != $counter ){
						$background_url .= '{ image : "'. $attachurl .'", title : "'. $title .'" },';
					} else { 
						$background_url .= '{ image : "'. $attachurl .'", title : "'. $title .'" }';
					}
					
					$counter++;
					
				}
			}
			
		} elseif ( get_post_meta( $post->ID, $shortname.'_background_image', true ) == 'URL' ) { // If background option set to URL
			
			$background_url = '{image : "'.get_post_meta( $post->ID, $shortname.'_background_image_url', true ).'" }';
			
		} elseif ( get_post_meta( $post->ID, $shortname.'_background_image', true ) == 'Featured Image' && has_post_thumbnail( $post->ID ) ) { // If background option set to featured image
		
			$src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'Full' );
			$background_url = '{ image : "'. $src[0] .'", title : "'. $title .'" }';
			
		} 
		
	}
	
} ?>	

<!-- SUPERSIZED -->
<script type="text/javascript">  
		
	jQuery(function($){
		$.supersized({
		
			//Functionality
			slideshow               :   1,		//Slideshow on/off
			autoplay				:	1,		//Slideshow starts playing automatically
			start_slide             :   1,		//Start slide (0 is random)
			random					: 	0,		//Randomize slide order (Ignores start slide)
			slide_interval          :   5000,	//Length between transitions
			transition              :   1, 		//0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
			transition_speed		:	1000,	//Speed of transition
			new_window				:	1,		//Image links open in new window/tab
			pause_hover             :   0,		//Pause slideshow on hover
			keyboard_nav            :   1,		//Keyboard navigation on/off
			performance				:	1,		//0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
			image_protect			:	1,		//Disables image dragging and right click with Javascript
			image_path				:	'', //Default image path

			//Size & Position
			min_width		        :   0,		//Min width allowed (in pixels)
			min_height		        :   0,		//Min height allowed (in pixels)
			vertical_center         :   1,		//Vertically center background
			horizontal_center       :   1,		//Horizontally center background
			fit_portrait         	:   0,		//Portrait images will not exceed browser height
			fit_landscape			:   0,		//Landscape images will not exceed browser width
			
			//Components
			navigation              :   0,		//Slideshow controls on/off
			thumbnail_navigation    :   0,		//Thumbnail navigation
			slide_counter           :   0,		//Display slide numbers
			slide_captions          :   0,		//Slide caption (Pull from "title" in slides array)
			slides 					:  	[		//Slideshow Images
											<?php echo $background_url; ?>
										]
										
		}); 
	});
	
</script>