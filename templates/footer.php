<footer class="content-info">
	<div id="foot-top">
		<div class="container foot-top">
			<div class="row">

			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<div class="col-sm-12 col-md-7 foot-box">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div>
			<?php endif; ?>	

			<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
				<div class="col-sm-12 col-md-2 foot-box">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>
			<?php endif; ?>	

			<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
				<div class="col-sm-12 col-md-3 foot-box">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div>
			<?php endif; ?>	

			</div>
		</div>
	</div><!-- END foot-top -->

	<div id="foot-bottom">
		<div class="container">
			<div class="row">

				<div class="col-xs-12 col-sm-6 copyright">
				<?php 
					$copyright = get_field( 'copyright_text', 'option');
					if (!empty($copyright)){
						echo '<p><small>'.$copyright.'</small></p>';
					} else {
				?>
					<small>&copy; <?php echo date("Y") ?> Morningside Recovery | <a href="<?php echo home_url(); ?>/privacy-policy/">Privacy Policy</a> | <a href="<?php echo home_url(); ?>/sitemap/">Sitemap</a></small>
				<?php  } ?>
				</div>

				<?php
					$footSocial = get_field('footer_social_display', 'option');
					if($footSocial==1) :
				?>
				<div class="col-xs-12 col-sm-6 social" itemscope itemtype="http://schema.org/Organization">
					<link itemprop="url" href="<?php echo home_url(); ?>">
					<?php
						if( have_rows('social_media', 'option') ){
					    	while( have_rows('social_media', 'option') ): the_row();
				    ?>
		        	<a itemprop="sameAs" href="<?php the_sub_field('url') ?>">
			        	<i class="fa <?php the_sub_field('social_icon'); ?>"></i>
			        </a>
					<?php 
						endwhile;
						}
					?>
				</div>
			<?php endif; ?>
			</div>
		</div>
	</div><!-- END foot-bottom -->
<?php
	$sticky = get_field('sticky_form', 'option') == 1 ? 1 : 0;
	$form = get_field('form_shortcode', 'option');
	if($sticky == 1){
		$pad='<div id="pad" class="hidden-md hidden-lg" style="padding-bottom:40px;"></div>';
		echo $pad;
?>
</footer>

<div class="hidden-xs hidden-sm sticky-form slide">
	<div class="form-tab">
		<a href="#" class="title">
			Contact Us!
		</a>
	</div>
	<div class="form-wrap">
		<div class="form-tab">
			<a href="#" class="title close">
				<i class="fa fa-close"></i>
			</a>
		</div>

		<?php echo $form; ?>
	</div>
</div>
<div class="sticky-footer-nav container hidden-md hidden-lg">
	<div class="row text-center">

		<div class="col-xs-5">
			<a href="/about/contact-morningside-recovery/" class="sticky-foot-btn">
				<i class="fa fa-envelope"></i> <span class="hidden-xs"> Contact Us</span>
			</a>
		</div>		
		<div class="col-xs-5">
			<a itemprop="telephone" href="tel:8669420095" class="sticky-foot-btn">
				<i class="fa fa-phone"></i> <span class="hidden-xs"> (866) 942-0095</span>
			</a>
		</div>		
		<div class="col-xs-2">
	        <a href="#tip-top" class="sticky-foot-btn">
	            <span class="fa fa-chevron-up"></span>
	        </a>
		</div>

	</div>
</div>
<div id="back-top-wrapper" class="hidden-xs hidden-sm">
    <p id="back-top">
        <a href="#tip-top">
            <span class="fa fa-chevron-up"></span>
        </a>
    </p>
</div>

<?php } else { ?>

</footer>

<div id="back-top-wrapper">
    <p id="back-top" style="display: none;">
        <a href="#tip-top">
            <span class="fa fa-chevron-up"></span>
        </a>
    </p>
</div>

<?php
	}

	$modal = get_field('modal', 'option') == 1 ? 1 : 0;
	$modalTitle = get_field('modal_title', 'option');
	$modalContent = get_field('modal_content', 'option');
	if($modal == 1 && !is_page(13088) && !is_page(25359) && !is_page(6102)){
?>

<div class="modal fade" tabindex="-1" role="dialog" id="verifyIns" data-controls-modal="verifyIns" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog text-center" role="document">
		<div class="modal-content">

			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<?php echo $modalContent; ?>
					</div>
				</div>
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php } ?>