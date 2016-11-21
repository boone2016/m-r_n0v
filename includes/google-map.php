<?php 
	if( get_row_layout() == 'google_map_section'):
		wp_register_script( 'googlemaps', 'https://maps.googleapis.com/maps/api/js?v=3.exp', null, null, true );
		wp_enqueue_script('googlemaps');
		$location = get_sub_field('google_map');
		$scroll = get_field('scroll_wheel', 'option') == 1 ? 0 : 1;
		$width = (get_sub_field('width') == 1 ? 1 : 0);
		$zoom = intval(get_sub_field('zoom'));
		$height = get_sub_field('map_height');
		if( !empty($location) ){
			if($width==0){
				echo '<section class="google-map">';
					echo '<div class="container">';
			}
?>
	<div class="acf-map" style="height:<?php echo $height ?>px" data-zoom='<?php echo $zoom ?>' data-scroll='<?php echo $scroll ?>'>
		<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
			<p class="address"><?php echo $location['address']; ?></p>
		</div>
	</div>
<?php
			if($width==0){
					echo '</div>';
				echo '</section>';
			}
		} // end if location is not empty
	endif;
?>