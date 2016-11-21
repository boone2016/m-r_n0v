<?
	if( get_row_layout() == 'columns'):
		$col = get_sub_field('columns');
		switch($col){
		    case '1': $num= '12'; break;
		    case '2': $num= '6'; break;
		    case '3': $num= '4'; break;
		    case '4': $num= '3'; break;
		    case '5': $num= '2'; break;
		    case '6': $num= '2'; break;
		}
		$rows = get_sub_field('column_content');
		$repCount = count($rows);

		if( get_sub_field('ctm_bg') == 1 ){
			$bgColor = (get_sub_field('bg_color') != '' ? 'style="background:' . get_sub_field('bg_color') . ';"' : '');
			$bgImage = (get_sub_field('bg_img') != '' ? "background: url(" . get_sub_field('bg_img') . ")" : '');
			$bgPosition = get_sub_field('bg_position');
			$bgRepeat = (get_sub_field('bg_repeat') == 1 ? 'repeat;' : 'no-repeat; background-size:cover;');
			$bgImgVar = "style='" . $bgImage . " " . $bgPosition . " " . $bgRepeat . "'";
		}
		
		$readMore = get_sub_field('read_more');
		$colTitle = (get_sub_field('columns_title') != '' ? '<h2 class="text-center">' . get_sub_field('columns_title') . "</h2>" : '');

    	echo '<section class="entry-content" ';
		if(!empty($bgColor) && !empty($bgImage)){ 
			echo $bgColor . '>';
		} elseif (empty($bgColor) && !empty($bgImage)){
			echo $bgImgVar . '>';
		} elseif (!empty($bgColor) && empty($bgImage)){
			echo $bgColor . '>';
		} else{
			echo '>';
		}

		if(!empty($colTitle)){
			echo '<div class="container column-title">';
				echo '<div class="row">';
					echo '<div class="col-xs-12 title">';
						echo $colTitle;
					echo '</div>';
				echo '</div>';
			echo '</div>';
		}

		$i=1;
		if( have_rows('column_content') ){
			while ( have_rows('column_content') ) : the_row();
		    	$image = get_sub_field('image');
		    	$title = get_sub_field('title');
		    	$content = get_sub_field('content');
		    	$link = get_sub_field('link');
		    	$columnOffset = (get_sub_field('column_offset') != '' ? 'col-sm-offset-'.get_sub_field('column_offset'): '');
	        	if($i ==1){
					echo '<div class="container column-content">';
						echo '<div class="row">';
	        	}
?>
				<div class="col-sm-<?php echo $num;?> <?php echo $columnOffset;?> content">
				<figure class="col-item">

					<?php if (!empty($image) && !empty($link)) { ?>
					<a class="img-anchor" href="<?php echo $link?>">
						<div class="img-wrap" style="background: url('<?php echo $image; ?>') no-repeat center center;background-size: cover;"></div>
					</a>
					<?php } elseif (!empty($image) && empty($link)) { ?>
					<div class="img-wrap" style="background: url('<?php echo $image; ?>') no-repeat center center;background-size: cover;"></div>
					<?php } ?>

					<figcaption class="text-center">
					<?php
						if (!empty($link)) {
							echo '<a class="box-anchor" href="'.$link.'">';
								echo '<h4 class="box-title"><span>'.$title.'</span></h4>';
							echo '</a>';
						} else {	
							echo '<h4 class="box-title"><span>'.$title.'</span></h4>';
						}
					?>
						<span class="border"></span>
						<?php echo $content; ?>
					</figcaption>
				</figure>
			<?php	
				if (!empty($link) && ($readMore == true)){
					echo '<a class="box-anchor read-more" href="'.$link.'">Read More</a>';
				}
			?>	
				</div>
<?php
	        	if($i ==$repCount){
				        	echo '</div>';
			        	echo '</div>';
					echo '</section><!-- END column section -->';
	        	} $i++;
				//end if title is not empty
			endwhile;
		}
	endif;
?>