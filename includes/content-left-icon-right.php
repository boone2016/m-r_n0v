<?
	if( get_row_layout() == 'content_left_icon_right'):
		$bgImg = get_sub_field('background_image');
		$leftBgColor = get_sub_field('left_bg_color');
		$bg = (empty($bgImg)) ? 'style="background:'.$leftBgColor.'";' : 'style="background: url('.$bgImg.') no-repeat center center;background-size: cover;"';
		$title = get_sub_field('content_title');
		$rollover = get_sub_field('rollover_text');
		$leftLink = get_sub_field('left_link');
		if(!empty($title)){
?>
	<section class="icon-right">
		<div class="container">
			<div class="row box-layout">
				<figure class="col-sm-7 box-item">
					<div class="bg-img" <?php echo $bg; ?>></div>
					<a class="box-anchor" href="<?php echo $leftLink; ?>">
						<figcaption>
							<h2 class="box-title"><span><?php echo $title; ?></span></h2>
							<?php if(!empty($rollover)){ ?>
							<div class="rollover dk-shadow">
								<span class="border"></span>
								<?php echo $rollover; ?>
							</div>
							<?php } ?>
						</figcaption>
					</a>
				</figure>
<?php
		}// end if title is not empty
		$bgColor = get_sub_field('background_color');
		$icon = get_sub_field('font_awesome_icon');
		$imgIcon = get_sub_field('image_icon');
		$iconTitle = get_sub_field('icon_title');			        	
		$titleColor = get_sub_field('title_color');
		$rightLink = get_sub_field('right_link');
		if(!empty($iconTitle)){
?>
				<figure class="col-sm-5 box-item">
					<div class="bg-img" style="background-color: <?php echo $bgColor?>"></div>
					<a class="box-anchor" href="<?php echo $rightLink; ?>">
						<figcaption>
						<?php if (!empty($imgIcon)){ ?>
							<img class="img-icon" src="<?php echo $imgIcon; ?>" />
						<?php  } else { ?>
							<i class="img-icon fa <?php echo $icon; ?>" style="color: <?php echo $titleColor; ?>"></i>
						<?php } ?>
							<h2 class="icon-title" style="color: <?php echo $titleColor; ?>"><?php echo $iconTitle; ?></h2>
						</figcaption>
					</a>
				</figure>
			</div><!-- END box-layout -->
		</div><!-- END container -->
	</section>
<?php
		}//end if title is not empty
	endif;
?>