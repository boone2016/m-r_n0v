<?php 
	$sidebar_display = get_field('sidebar_display');
	if ( is_active_sidebar( 'sidebar-cta' ) && $sidebar_display == true ) :
		dynamic_sidebar( 'sidebar-cta' );
	endif;
?>


<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>d

	</div><!-- END container -->
</div><!-- END wrap -->


<section>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h2>Send Us A Message</h2>
			</div>
		</div>
		<iframe class="ctm-call-widget" src="https://app.calltrackingmetrics.com/form_reactors/FRT472ABB2C5B9B141A9EC85C3E43485B090D2C89CF350D91A9" style="width:100%;height:435px;border:none"></iframe>
<script defer async src="https://dwklcmio8m2n2.cloudfront.net/assets/form_reactors.js"></script>
	
		<div class="col-xs-12 col-sm-4">
			<?php dynamic_sidebar('sidebar-contact'); ?>
		</div>
	</div>
</section>



<?php

  if($primaryBg!=''){
    echo '</section>';
  }

get_template_part('includes/page', 'builder'); ?>