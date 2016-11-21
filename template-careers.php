<?php
/**
 * Template Name: Careers Template w/o Sidebar
 */
?>


	</div><!-- END container -->
</div><!-- END wrap -->
<?php 
	$hasposts = get_posts('post_type=careers');
	if( !empty ( $hasposts ) ) {

		$terms = get_terms( 'position', array(
			    'hide_empty' => 1
			)
		);
		foreach( $terms as $term ) {
		    $args = array(
		        'post_type' => 'careers',
		        'position' => $term->slug,
		    );
		    $query = new WP_Query( $args );

			echo '<section class="' . $term->slug . '">';
				echo '<div class="container">';
					echo '<div class="row">';
						echo '<div class="col-md-12">';
					echo '<h2>' . $term->name . '</h2>';
					echo '<hr>';
				echo '</div>';
			echo '</div>';
			echo '<div class="row">';
	        while ( $query->have_posts() ) : $query->the_post();
?>
				<div class="col-xs-12 blog-item">
					<a class="blog-anchor" href="<?php the_permalink()?>">	
						<h4 class="blog-title text-left"><span><?php the_title();?></span></h4>
					</a>
					<?php the_excerpt(); ?>
				</div>
	        
    <?php
	    	endwhile;
				    echo '</div>';
			    echo '</div>';
		    echo '</section>';
	    // use reset postdata to restore orginal query
			wp_reset_postdata(); 
		}
	} else {
		echo '<div class="container">';
			echo '<div class="row">';
				echo '<div class="col-xs-12">';
					echo '<h5>We currently do not have any openings. Please check back with us soon!</h5>'; 
				echo '</div>';
			echo '</div>';
		echo '</div>';
	}
?>