<?php
/**
 * Template Name: Landing Page Template w/o Sidebar
 */
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