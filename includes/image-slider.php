<?php
	if( get_row_layout() == 'image_slider'):
		$bgImage = get_sub_field('bg_img');
		$bgPosition = get_sub_field('bg_position');
		$bgRepeat = (get_sub_field('bg_repeat') == 1 ? 'repeat;' : 'no-repeat; background-size:cover;');
		$bgColor = get_sub_field('bg_color');
		$custom_class = get_sub_field('custom_class');
?>
 <section class="text-section slider <?php echo $custom_class; ?>" style="
<?php
			if(!empty($bgColor)){ 
?>				
				background-color: <?php echo $bgColor;?>
<?php				
			} elseif (!empty($bgImage)){ 
?>
				background: url('<?php echo $bgImage;?>') <?php echo $bgPosition;?> <?php echo $bgRepeat;?>
<?php				
			}
?>">

    <div class="container">
     	 <div class="row">
	 	 	<div class="col-sm-12">
	 	 		<div class="slider-pro" id="my-slider">
            		<div class="sp-slides">
<?php 		
	endif;	 
	
			$i=1;
					if(have_rows('slider_images')):
						while(have_rows('slider_images')) : the_row();
						$captionText = get_sub_field('caption_text');
						$captionTitle = get_sub_field('caption_title');
						$images = get_sub_field('image');
						$titleClass = get_sub_field('custom_caption_title_class');
						$textClass = get_sub_field('custom_caption_text_class');	
							echo '<div class="sp-slide">';
							echo '<img class="sp-image" src="'.$images.'"/>';
							echo '<p class="sp-caption '.$textClass.'"><span class="paragraph '.$titleClass.'">'.$captionTitle.'</span><br>' .$captionText. ' </p>';	
			$i++;
						endwhile;
					endif;
?>
						</div><!--end sp-slide-->
          			</div><!--end slider-pro-->
        		</div><!--end sp-slides-->
      		</div><!--end col-sm-12-->
    	</div><!--end row-->
    </div><!--end container-->
</section>
