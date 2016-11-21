<?
	if( get_row_layout() == 'section_title'):
		$sectionIcon = get_sub_field('section_icon');
		$sectionIconColor = get_sub_field('section_icon_color');
		$sectionImgIcon = get_sub_field('section_image_icon');
		$sectionTitle = get_sub_field('section_title');
		$sectionContent = get_sub_field('section_content');
		$bgColor = get_sub_field('background_color');
		if (!empty($sectionTitle)){
?>
	<section class="section-title" style="background:<?php echo $bgColor; ?>;">
		<div class="container">
			<div class="row text-center">
				<div class="col-xs-12">

				<?php if (!empty($sectionImgIcon)){ ?>
					<div class="icon-wrap">
						<img class="section-icon" src="<?php echo $sectionImgIcon; ?>" />
					</div>
				<?php  } elseif (!empty($sectionIcon)){ ?>
					<div class="icon-wrap">
						<i style="color:<?php echo $sectionIconColor ?>" class="img-icon fa <?php echo $sectionIcon; ?> fa-5x"></i>
					</div>
				<?php } ?>

					<h2 class="title"><?php echo $sectionTitle; ?></h2>
	
				<?php if (!empty($sectionContent)){ ?>
					<span class="border"></span>
					<?php echo $sectionContent; ?>
				<?php } ?>

				</div>
			</div>
		</div><!-- END container -->
	</section><!-- END section title -->
<?php
		}// end if title is not empty
	endif;
?>