<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body id="tip-top" <?php body_class(); ?>>
	<!-- Google Tag Manager -->
	<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TRVX6K"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-TRVX6K');</script>
	<!-- End Google Tag Manager -->
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
	<!-- Preloader -->
	<div id="preloader">
		<div id="loader">
			<span class="dot dot_1"></span>
			<span class="dot dot_2"></span>
			<span class="dot dot_3"></span>
			<span class="dot dot_4"></span>
		</div>
	</div>

    <?php
		do_action('get_header');
		get_template_part('templates/header');
		if ( is_page_template('template-employees.php')) {
			include( get_template_directory() . '/template-employees.php');
		} else {
			if(!is_search()){
				$primaryBg = (get_field('primary_text_section') != "" ? '<section style="background:'.get_field('primary_text_section').'">' : '');
				echo $primaryBg;
			}
	?>
    <div class="wrap container" role="document">
      <div class="content row">

	   <?php 
			if ( !is_front_page() && !is_page_template( ['template-employees.php','template-landing.php','template-landing-page-v2.0.php'] ) ) {
			    if ( function_exists('yoast_breadcrumb') ) {
					echo '<div class="col-xs-12 yoast_breadcrumb">';
						yoast_breadcrumb('<span id="breadcrumbs">','</span>');
					echo '</div>';
				}
			}
		?>

        <main class="main <?php if ( !is_home() ) { echo 'col-xs-12'; } ?>">
          <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->

        <?php if (Setup\display_sidebar()) : ?>
          <aside class="sidebar">
            <?php include Wrapper\sidebar_path(); ?>
          </aside><!-- /.sidebar -->
        <?php endif; ?>

      </div><!-- /.content -->
    </div><!-- /.wrap -->

	<?php 
			if($primaryBg!=''){
				echo '</section>';
			}
		}	
	?>

    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>
