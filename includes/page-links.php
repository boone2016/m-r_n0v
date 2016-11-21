<?
	if( get_row_layout() == 'page_excerpt_links'):
		$bgColor = get_sub_field('bg_color') != '' ? 'style="background-color:' . get_sub_field('bg_color').';"' : '' ;
		$rows = get_sub_field('page_excerpts');
		$repCount = count($rows);
		$i=1;
		if( have_rows('page_excerpts') ){
			while ( have_rows('page_excerpts') ) : the_row();
		    	$icon = get_sub_field('excerpt_icon');
		    	$exTitle = get_sub_field('excerpt_title');
		    	$excerpt = get_sub_field('page_excerpt');
		    	$link = get_sub_field('page_link')!='' ? ' href="'.get_sub_field('page_link').'"' : '';
		    	if(!empty($exTitle)){
		        	if($i ==1){
			        	echo '<section class="page-preview-box" '.$bgColor.'>';
							echo '<div class="container">';
								echo '<div class="row page-box-layout">';
		        	}
?>
				<div class="col-sm-6 page-excerpt <?php if( ($i%2)  &&  ($i ==$repCount) ){echo 'col-sm-offset-3';}?>">
				<?php if (!empty($link)){ ?>
					<a class="page-box-anchor"<?php echo $link; ?>>
				<?php } else { ?>
					<span class="page-box-anchor"<?php echo $link; ?>>
				<?php } ?>
						<div class="text-center box">
						<?php if(!empty($icon)){ ?>
							<span class="icon"><i class="fa <?php echo $icon; ?> fa-2x"></i></span>
						<?php } ?>
							<h5 class="page-box-title"><?php echo $exTitle; ?></h5>
							<span class="border"></span>
							<p><?php echo $excerpt; ?></p>
						</div>
				<?php if (!empty($link)){ ?>
					</a>
				<?php } else { ?>
					</span>
				<?php } ?>
				</div>
<?php
		        	if($i ==$repCount){
					        	echo '</div>';
				        	echo '</div>';
						echo '</section><!-- END section -->';
		        	}
				}//end if title is not empty
				$i++;
			endwhile;
		}
	endif;
?>