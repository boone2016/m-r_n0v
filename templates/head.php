<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<?php
	if(is_page_template('template-landing.php') || is_page_template('template-landing-page-v2.0.php')){
		echo '<meta name="robots" content="noindex">';
		echo '<meta name="googlebot" content="noindex">';
	}
?>

<?php 
	// Add Custom Favicon 
	$favicon = get_field( 'favicon', 'option');
	if( !empty($favicon) ):
?>
    <link rel="shortcut icon" type="image/jpg" href="<?php echo $favicon; ?>" />
<?php 
	endif;
	
	// Add Tracking Code 
	$tracking = get_field( 'tracking_code', 'option');
	if( !empty($tracking) ):
		echo $tracking;
	endif;

	// Add Custom CSS 
	$customCss = get_field( 'custom_css', 'option');
	if( !empty($customCss) ):
?>
	<style type="text/css" media="screen">
		<?php echo $customCss; ?>
	</style>
<?php 
	endif;

	wp_head();

	// Add Custom Scripts Before Closing Head 
	$beforeHead = get_field( 'before_head', 'option');
	if( !empty($beforeHead) ):
		echo $beforeHead;
	endif;
?>
</head>
