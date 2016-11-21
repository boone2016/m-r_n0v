<?php
	$image = get_field('header_image');
	$cta = get_field('cta');
	$parallax = get_field('bg_parallax') == 1 ? 'start ' : '';
	$cta_pos = get_field('cta_pos') != '' ? get_field('cta_pos').';' : ';';
	$size = 'background-size:'. get_field('bg_size').';';
	$repeat = get_field('bg_repeat') == 1 ? "background-repeat: repeat;" : "background-repeat: no-repeat;";
	if( !empty($image) && !is_search() ): 
?>
<section id="cta" class="parallaxParent">
	<div class="<?php echo $parallax ?>parallax" style="background: url('<?php echo $image['url']; ?>') <?php echo $cta_pos; echo $repeat; echo $size; ?>"></div>

<?php include( get_template_directory() . '/templates/navigation.php'); ?>

	<div class="overlay"></div>

	<div class="container header-cta">
		<div class="row">
			<div class="col-xs-12">
			<?php echo $cta; ?>
			</div>
		</div>
	</div>

</section>

<?php elseif ( is_404()) : ?>

<section id="cta" class="parallaxParent">
	<div class="start parallax" style="background: url('/wp-content/uploads/2015/09/msr-oc-hb-pier-1920x1080-1.jpg') center center no-repeat ;background-size:cover;"></div>

		<div class="overlay"></div>

  <?php include( get_template_directory() . '/templates/navigation.php'); ?>

		<div class="container header-cta">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="dk-shadow head" style="color:#fff;">Page Not Found</h1>
					<p class="dk-shadow sub-head" style="color:#fff;">This may be the result of a bad or outdated link. We apologize for any inconvenience.</p>
					<a href="<?php echo home_url(); ?>" class="med-blue-btn ">Visit Our Home Page</a>
				</div>
			</div>
		</div>

</section>

<?php else : ?>

<section class="primary-nav-wrap">
  <?php include( get_template_directory() . '/templates/navigation.php'); ?>
</section>

<?php endif; ?> 