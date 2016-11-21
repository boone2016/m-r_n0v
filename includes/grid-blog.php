<?
	if( get_row_layout() == 'blog_section'):
		$limit = get_sub_field('post_per_page');
		$viewAll = get_sub_field('view_all');
		if(!empty($limit)){
			$args = array(
		    	'orderby' => 'date',
		    	'order' => 'DESC',
		    	'post_status' => 'publish',
		    	'posts_per_page' => $limit,
			);
?>
	<section class="blog-grid">
		<div class="container">
			<div class="row">
			<?php
				$query = new WP_Query( $args );
			    $i=0;
			    while ( $query->have_posts() ) :
				    $query->the_post();
					$i++;
					if($i < 3){
			?>
					<figure class="col-xs-12 col-sm-6 blog-item item-<?php echo $i ?>">
						<a class="blog-anchor" href="<?php the_permalink()?>">
						<?php if ( has_post_thumbnail() ) { ?>
						<div class="bg-img" style="background: url('<?php the_post_thumbnail_url(); ?>') center center no-repeat;background-size: cover;"></div>
						<?php } else { ?>
							<div class="bg-img" style="background: url(<?php echo get_template_directory_uri() . '/images/default-logo.jpg' ?>) center center no-repeat;background-size: cover;"></div>
						<?php } ?>						<figcaption>
								<h5 class="blog-title"><span><?php the_title();?></span></h5>
								<span class="border"></span>
								<p class="blog-meta"><em><?php the_time('F jS, Y') ?></em></p>
							</figcaption>
						</a>
					</figure>
			<?php
					}
					if ($i > 2){
			?>
					<figure class="col-xs-12 col-sm-4 blog-item item-<?php echo $i ?>">
						<a class="blog-anchor" href="<?php the_permalink()?>">
						<?php if ( has_post_thumbnail() ) { ?>
						<div class="bg-img" style="background: url('<?php the_post_thumbnail_url(); ?>') center center no-repeat;background-size: cover;"></div>
						<?php } else { ?>
							<div class="bg-img" style="background: url(<?php echo get_template_directory_uri() . '/images/default-logo.jpg' ?>) center center no-repeat;background-size: cover;"></div>
						<?php } ?>
							<figcaption>
								<h5 class="blog-title"><span><?php the_title();?></span></h5>
								<span class="border"></span>
								<p class="blog-meta"><em><?php the_time('F jS, Y') ?></em></p>
							</figcaption>
						</a>
					</figure>
			<?php
					}
					if ($i >= 5){$i=0;}
				endwhile;
			?>
			</div>
		</div>
	<?php
		} // end if title is not empty
		if($viewAll==1){
			$width = get_sub_field('section_width');
			$text = ( empty(get_sub_field('button_text')) ) ? 'View All Posts' : get_sub_field('button_text');
			$link=get_sub_field('button_link');
			if( empty($link) ) { 
		    	$link = site_url() . '/blog/';
		    }else{
			    $link=get_sub_field('button_link');
			}
			$bgColor = get_sub_field('bg_color');
	?>
		<div class="all-blog-section" <?php if($width==1) { echo 'style="background: '.$bgColor.';"'; }?>>
			<div class="container">
				<div class="row" <?php if($width==0) { echo 'style="background: '.$bgColor.'"'; } ?>>
					<div class="col-xs-12 text-center button-wrap">
						<a class="med-yellow-btn" href="<?php echo $link; ?>"><?php echo $text; ?></a>
					</div>
				</div>
			</div>
		</div>
	<?php
			}
			wp_reset_query();
		endif;
	?>
	</section><!-- END grid -->
