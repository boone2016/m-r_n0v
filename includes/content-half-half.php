<?
	if( get_row_layout() == 'content_half_half'):
		$leftBgImg = get_sub_field('left_background_image');
		$leftBgColor = get_sub_field('left_bg_color');
		$leftBg = (empty($leftBgImg)) ? 'style="background:'.$leftBgColor.'";' : 'style="background: url('.$leftBgImg.') no-repeat center center;background-size: cover;"';
		$leftTitle = get_sub_field('left_content_title');
		$leftRollover = get_sub_field('left_rollover_text');
		$leftLink = get_sub_field('left_link');
		if(!empty($leftTitle)){
	?>
	<section class="content-half">
		<div class="container">
			<div class="row box-layout">
				<figure class="col-sm-6 box-item">
					<div class="bg-img" <?php echo $leftBg; ?>></div>
					<a class="box-anchor" href="<?php echo get_site_url(); ?><?php echo $leftLink; ?>">
						<figcaption>
							<h2 class="box-title"><span><?php echo $leftTitle; ?></span></h2>
							<?php if(!empty($leftRollover)){ ?>
							<div class="rollover dk-shadow">
								<span class="border"></span>
								<?php echo $leftRollover; ?>
							</div>
							<?php } ?>
						</figcaption>
					</a>
				</figure>
<?php
		}// end if title is not empty
		$rightBgImg = get_sub_field('right_background_image');
		$rightBgColor = get_sub_field('right_bg_color');
		$rightBg = (empty($rightBgImg)) ? 'style="background:'.$rightBgColor.'";' : 'style="background: url('.$rightBgImg.') no-repeat center center;background-size: cover;"';
		$rightTitle = get_sub_field('right_content_title');
		$rightRollover = get_sub_field('right_rollover_text');
		$rightLink = get_sub_field('right_link');
		if(!empty($rightTitle)){
?>
				<figure class="col-sm-6 box-item">
					<div class="bg-img" <?php echo $rightBg; ?>></div>
					<a class="box-anchor" href="<?php echo get_site_url(); ?><?php echo $rightLink; ?>">
						<figcaption>
							<h2 class="box-title"><span><?php echo $rightTitle; ?></span></h2>
							<?php if(!empty($rightRollover)){ ?>
							<div class="rollover dk-shadow">
								<span class="border"></span>
								<?php echo $rightRollover; ?>
							</div>
							<?php } ?>
						</figcaption>
					</a>
				</figure>
			</div><!-- END box-layout -->
		</div>
	</section>
<?php
		} // end if title is not empty
	endif;
?>