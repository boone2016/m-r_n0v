<?
	if( get_row_layout() == 'text_box'):
		$bgImage = get_sub_field('bg_img');
		$bgPosition = get_sub_field('bg_position');
		$bgRepeat = (get_sub_field('bg_repeat') == 1 ? 'repeat;' : 'no-repeat; background-size:cover;');
		$bgColor = get_sub_field('bg_color');
		$text = get_sub_field('text_area');
		$custom_class = get_sub_field('custom_class');
    	if(!empty($text)){
?>
	<section class="text-section <?php echo $custom_class; ?>" style="<?php
			if(!empty($bgColor)){ 
				echo "background:".$bgColor.";";
			} elseif (!empty($bgImage)){
				echo "background: url('".$bgImage."') $bgPosition $bgRepeat";
			}
		?>">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<?php echo $text; ?>
				</div>
			</div>
		</div>
	</section>
<?php
		}//end if wysisyg is not empty
    endif; // end text box secton
?>