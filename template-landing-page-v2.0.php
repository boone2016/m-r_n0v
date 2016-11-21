<?php
/**
 * Template Name: LandingPage v2.0 w/ Nav & Builder
 */
?>


<?php 
	$sidebar_display = get_field('sidebar_display');
	if ( is_active_sidebar( 'sidebar-cta' ) && $sidebar_display == true ) :
		dynamic_sidebar( 'sidebar-cta' );
	endif;
?>


<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>


	</div><!-- END container -->
</div><!-- END wrap -->

<?php

  if($primaryBg!=''){
    echo '</section>';
  }

	
get_template_part('includes/page', 'builder'); ?>

<?php
	
	if(is_page(26120) || is_page(26123) || is_page(26127) || is_page(26172) || is_page(26175) || is_page(26178)){
?>		

<section class="section-title" style="background:#062a47;">
		<div class="container">
			<div class="row text-center">
				<div class="col-xs-12">
					<h2 class="title">Have Questions?</h2>
				</div>
			</div>
		</div><!-- END container -->
	</section>
<section class="text-section" style="background-color:#e3e3e3">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<p>Beginning the recovery process can be emotional and overwhelming. The most difficult part is taking the first step and deciding to make a positive change. Whether you are seeking treatment for yourself or a loved one, we're here to help every step of the way. <a href="/treatment/admissions/insurance/">Your existing insurance benefits could cover the cost of treatment.</a> To begin the recovery process, contact us for more information and support.</p>
				</div>	
			</div>
		<div class="row">	
		<div class="col-xs-4 col-sm-4 col-sm-offset-1">
<?php
				if(is_page(26120)){					
					echo '<a href="tel:8889065218" class="med-blue-btn"><i class="fa fa-phone"></i> Give Us A Call</a>';
				}elseif(is_page(26123)){
					echo '<a href="tel:8887629421" class="med-blue-btn"><i class="fa fa-phone"></i> Give Us A Call</a>';
				}elseif(is_page(26127)){
					echo '<a href="tel:8889797184" class="med-blue-btn"><i class="fa fa-phone"></i> Give Us A Call</a>';		
				}elseif(is_page(26172)){
					echo '<a href="tel:8887387130" class="med-blue-btn"><i class="fa fa-phone"></i> Give Us A Call</a>';	
				}elseif(is_page(26175)){
					echo '<a href="tel:8882772674" class="med-blue-btn"><i class="fa fa-phone"></i> Give Us A Call</a>';		
				}else{
					echo '<a href="tel:8882909352" class="med-blue-btn"><i class="fa fa-phone"></i> Give Us A Call</a>';	
				}		
?>					
		</div>
						<div class="hidden-xs col-sm-2">
							<h2 style="display: inline;">OR</h2>
						</div>		
					<div class="col-xs-4 col-xs-offset-1 col-sm-offset-0 col-sm-4">
						<a href="/treatment/admissions/insurance" class="med-blue-btn"><i class="fa fa-check-square-o"></i> Verify Insurance</a>
					</div>
				</div>	
			</div><!--end row-->	
		</div><!--end container-->
	</div><!--end container-fluid-->
</section>	

<?php
	}
?>			
		