<?php if (the_content()!=''){ ?>
	<div class="page-content">
		<?php the_content(); ?>
		<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
	</div>
<?php }?>