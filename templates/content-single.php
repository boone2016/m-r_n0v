<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
	<?php if ( has_post_thumbnail() ) { ?>
	<figure>
		 <img class="img-responsive aligncenter" src='<?php the_post_thumbnail_url(); ?>' />
	</figure>
	<?php } ?>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>

	<footer class="col-xs-12 paginate">
		<nav class="row navigation posts-navigation">
			<div class="nav-previous">
				<div class="col-sm-6">
					<span><?php previous_post_link( '<i class="fa fa-chevron-left"></i> <strong>%link</strong>' ); ?></span>
				</div>
			</div>
			<div class="text-right nav-next">
				<div class="col-sm-6 text-right">
					<span><?php next_post_link( '<strong>%link</strong>  <i class="fa fa-chevron-right"></i>' ); ?></span>
				</div>
			</div>
			<?php wp_link_pages(['before' => '<nav class="page-nav navbar-right"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
		</nav>
	</footer>
  </article>
<?php endwhile; ?>