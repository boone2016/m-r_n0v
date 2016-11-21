<article <?php post_class('col-sm-6 col-md-4 blog-roll-item'); ?>>
	<?php if ( has_post_thumbnail( $post->ID ) ) { ?>
	<figure class="blog-item">
		<a class="blog-anchor" href="<?php the_permalink()?>">
			<?php // if($format!='standard'){echo $format;} ?>
			<div class="bg-img" style="background: url('<?php the_post_thumbnail_url(); ?>') center center no-repeat;background-size: cover;"></div>
			<figcaption>
				<h5 class="blog-title"><span><?php the_title();?></span></h5>
				<span class="border"></span>
				<p class="blog-meta"><em><?php the_time('F jS, Y') ?></em></p>
			</figcaption>
		</a>
	</figure>
	<?php } else { ?>
	<header>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php get_template_part('templates/entry-meta'); ?>
	</header>
	<?php } ?>

	<div class="entry-summary">
		<?php edit_post_link(); ?>
		<p class="excerpt"><?php echo(get_the_excerpt()); ?></p>
	</div> 
</article>
