<?php
/**
 * Template Name: Employees Template w/o Sidebar
 */
?>

<?php

	if($primaryBg!=''){
		echo '</section>';
	}

	$terms = get_terms( 'department', array(
		    'hide_empty' => 1
		)
	);
	foreach( $terms as $term ) {
 
	    // Define the query
	    $args = array(
	        'post_type' 		=> 'employee',
	        'department' 		=> $term->slug,
		    'orderby'    		=> 'name',
		    'order' 			=> 'ASC',
		    'posts_per_page' 	=> -1,
	    );
	    $query = new WP_Query( $args );
	
	    // output the term name in a heading tag
		echo '<section class="' . $term->slug . ' department">';
			echo '<div class="container">';
				echo '<div class="row">';
					if ($term->slug == 'executive' && function_exists('yoast_breadcrumb')) {
						echo '<div class="col-xs-12 yoast_breadcrumb">';
							yoast_breadcrumb('<span id="breadcrumbs">','</span>');
						echo '</div>';
					}
					echo '<div class="col-md-12 text-center department-title">';
						echo '<h2>' . $term->name . '</h2>';
					echo '</div>';
				echo '</div>';
				echo '<div class="row">';
     
	        // Start the Loop
	        while ( $query->have_posts() ) : $query->the_post(); ?>

			<figure class="col-xs-12 col-sm-6 col-md-3 employee-item">
				<a class="employee-anchor" href="<?php the_permalink()?>">
				<?php if ( has_post_thumbnail() ) { ?>
				<div class="bg-img" style="background: url('<?php the_post_thumbnail_url(); ?>') center top no-repeat;background-size: cover;"></div>
				<?php } else { ?>
					<div class="bg-img" style="background: url(<?php echo get_template_directory_uri() . '/images/default-logo.jpg' ?>) center top no-repeat;background-size: cover;"></div>
				<?php } ?>
					<figcaption>
						<h5 class="employee-name"><span><?php the_title();?></span></h5>
						<span class="border"></span>
						<small class="employee-meta"><em><?php the_field('employee_title'); ?></em></small>
					</figcaption>
				</a>
			</figure>
	        <?php endwhile;
			    echo '</div>';
		    echo '</div>';
	    echo '</section>';
     
	    // use reset postdata to restore orginal query
	    wp_reset_postdata();
	}

?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<p>Note: *Are private contractors, they are not employees of Morningside Recovery.</p>
		</div>
	</div>
</div>	
