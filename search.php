<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="col-xs-12 alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <div class="col-xs-12 search-excerpt">
    <?php get_template_part('templates/content', 'search'); ?>
  </div>
<?php endwhile; ?>

<footer class="col-xs-12 paginate">
	<?php 
		the_posts_navigation(array(
		   'prev_text' => __( '<div class="col-xs-6"><i class="fa fa-chevron-left"></i> Older</div>', 'sage' ),
		   'next_text' => __( '<div class="col-xs-6 text-right">Newer <i class="fa fa-chevron-right"></i></div>', 'sage' ),
		   'screen_reader_text' => __( 'Posts navigation' )
	    ));
	?>
</footer>