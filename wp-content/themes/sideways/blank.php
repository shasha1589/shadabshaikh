<?php

/* Template Name: No Content */

global $shortname;

$theme_options = get_option( $shortname.'_theme_options' );

get_header();

?>

<div id="wrapper">
	
	<?php include ('navigation.php'); ?>
	
</div>

<?php get_footer(); ?>