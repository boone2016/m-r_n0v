<header id="navigation">
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container navbar-seo hidden-xs">
			<div class="seo-wrap">

			<?php 
				$variables = get_field('phone_numbers', 'option');
				if(!empty($variables)){
					foreach( $variables as $key => $val ):
						if( $val['primary_number'] == 'Yes' ) {
						$tel = preg_replace('/\D+/', '', $val['phone_number']);
			?>
				<div class="navbar-left">
					<a itemprop="telephone" href="tel:<?php echo $tel; ?>">
						<span class="phone"><i class="fa <?php echo $val['number_icon'] ?>"></i> <strong><?php echo $val['phone_number'] ?></strong></span>
					</a>
				</div>
			<?php
						}
					endforeach;
				}
			?>

			<?php
				$footSocial = get_field('header_social_display', 'option');
				if($footSocial==1) :
					if( have_rows('social_media', 'option') ){
			?>
				<div class="social text-right" itemscope itemtype="http://schema.org/Organization">
					<link itemprop="url" href="<?php echo home_url(); ?>">
			    <?php while( have_rows('social_media', 'option') ): the_row(); ?>
		        	<a itemprop="sameAs" href="<?php the_sub_field('url') ?>">
			        	<i class="fa <?php the_sub_field('social_icon'); ?>"></i>
			        </a>
			    <?php endwhile; ?>
				</div>
			<?php
					}
				endif;
			?>

			</div>
		</div>
		<div class="container primary">
			<div class="nav-wrap">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<?php 
						$logoUrl = get_field( 'custom_logo', 'option');
						if( !empty($logoUrl) ):
					?>
					<a itemprop="logo" class="navbar-logo" href="<?php echo home_url(); ?>"><img src="<?php echo $logoUrl; ?>" /></a>
					  <?php else : ?>
					<a itemprop="logo" class="navbar-brand" href="<?php echo home_url(); ?>">
						<?php bloginfo('name'); ?>
					</a>
					<?php endif; ?>

					<?php ubermenu( 'main' , array( 'theme_location' => 'primary_navigation' ) ); ?><!-- END navigation -->

				</div><!-- END navbar-header -->
			</div><!-- END nav-wrap -->
		</div><!-- END container -->
	</nav><!-- END navbar-custom -->
</header>
