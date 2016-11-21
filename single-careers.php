<?php while (have_posts()) : the_post(); ?>
	<article <?php post_class(); ?>>
		<div class="entry-content">
			<h2 class="blog-title"><span><?php the_title();?></span></h2>
			<hr>
			<?php the_content(); ?>
		</div>
	</article></br>
<?php endwhile; ?>