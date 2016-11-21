
<?php		
	if( get_row_layout() == 'page_lists_links'):
		$listTitle = get_sub_field('list_title');
		$bgColor = (get_sub_field('bg_color') != '') ? 'style="background-color:' . get_sub_field('bg_color') . ';"' : '' ;
		$rows = get_sub_field('enter_page_links');
		$repCount = count($rows);
		$i=1;

		if( have_rows('enter_page_links') ){
			while ( have_rows('enter_page_links') ) : the_row();
		    	$pgTitle = get_sub_field('page_title');
		    	$link = get_sub_field('page_link');
	        	if($i ==1){
					if (!empty($listTitle)){
						echo '<section class="page-links-title" '.$bgColor.'>';
							echo '<div class="container">';
								echo '<div class="row">';
									echo '<h3 class="text-center">'.$listTitle.'</h3>';
								echo '</div>';
							echo '</div>';
						echo '</section>';
					}
						echo '<section class="page-links">';
							echo '<div class="container">';
								echo '<div class="row">';
	        	}
?>
				<div class="col-sm-6 box-item text-center <?php if( ($i%2)  &&  ($i ==$repCount) ){echo 'col-sm-offset-3';}?>">
					<h5>
						<a class="box-anchor" href="<?php echo $link; ?>">
							<span><?php echo $pgTitle; ?></span>
						</a>
					</h5>
				</div>
<?php
	        	if($i ==$repCount){
				        	echo '</div>';
			        	echo '</div>';
					echo '</section><!-- END section -->';
	        	}
				$i++;
			endwhile;
		}
	endif;
?>