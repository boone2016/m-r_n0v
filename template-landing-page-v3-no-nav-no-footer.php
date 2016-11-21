<?php
/**
 * Template Name: LandingPage v3.0w/ No Nav & Footer
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

			
		