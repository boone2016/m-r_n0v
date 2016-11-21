<div class="yoast_breadcrumb">
	<div id="breadcrumbs" vocab="http://schema.org/" typeof="BreadcrumbList">
		<span property="itemListElement" typeof="ListItem">
			<a href="<?php echo home_url(); ?>" property="item" typeof="WebPage" >
				<span property="name">Home</span></a><meta property="position" content="1"> » 
		</span>
		<span property="itemListElement" typeof="ListItem">
			<a href="<?php echo home_url(); ?>/about/" property="item" typeof="WebPage" >
				<span property="name">About</span></a><meta property="position" content="2"> »
		</span>
		<span property="itemListElement" typeof="ListItem">
			<a href="<?php echo home_url(); ?>/about/meet-our-staff/" property="item" typeof="WebPage" >
				<span property="name">Meet Our Staff</span></a><meta property="position" content="3"> » 
		</span>
		<span property="itemListElement" typeof="ListItem" property="item" typeof="WebPage" >
			<span property="name">
				<span property="name"><?php the_title();?></span><meta property="position" content="4">
		</span>
	</div>
</div>
<?php while (have_posts()) : the_post(); ?>
	<article <?php post_class(); ?>>
		<?php if ( has_post_thumbnail( $post->ID ) ) { ?>
		<img class="img-responsive alignleft" src="<?php the_post_thumbnail_url('medium'); ?>" />
		<?php } ?>

		<div class="entry-content">
			<h5 class="blog-title text-left"><span><?php the_title();?></span></h5>
			<h6><?php the_field('employee_title'); ?></h6>
			<?php edit_post_link(); ?>
			<hr>
			<?php the_content(); ?>
		</div>
	</article>
<?php endwhile; ?>
