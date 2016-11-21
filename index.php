<?php
	get_template_part('templates/page', 'header');
	if (!have_posts()) :
?>
	<div class="alert alert-warning">
		<?php _e('Sorry, no results were found.', 'sage'); ?>
	</div>
<?php
		get_search_form();
	endif;
	while (have_posts()) : the_post();
		get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format());
	endwhile;
?>


<footer class="col-xs-12 paginate">
<?php 
	the_posts_navigation(array(
	   'prev_text' => __( '<div class="col-xs-6"><i class="fa fa-chevron-left"></i> Older</div>', 'sage' ),
	   'next_text' => __( '<div class="col-xs-6 text-right">Newer <i class="fa fa-chevron-right"></i></div>', 'sage' ),
	   'screen_reader_text' => __( 'Posts navigation' )
    ));
?>
</footer>