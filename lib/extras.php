<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return '<a class="more" href="' . get_permalink() . '"> &hellip; ' . __('Read More', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/*
 * SHORTCODES
 ***********************************/
/**
 * Tooltip Shortcode
 */
add_filter( 'widget_text', 'do_shortcode' );
function tooltip_shortcode( $atts, $content = null ) {
	$a = shortcode_atts( array(
		'placement' => 'top',
		'title' 	=> ''
	), $atts );

	return '<strong class="tt-sc" data-toggle="tooltip" data-placement="' . esc_attr($a['placement']) . '" title="' . esc_attr($a['title']) . '">' . $content . '</strong>';
}
add_shortcode( 'tooltip', __NAMESPACE__ . '\\tooltip_shortcode' );
/**
 * Button Shortcode
 */
function button_shortcode( $atts, $content = null  ) {
	$a = shortcode_atts( array(
		'class' => '',
		'href' 	=> '#',
		'icon'	=> ''
	), $atts );	

	if ($a['class'] =='blue') { 
		$style = 'med-blue-btn ';
	} elseif ($a['class'] =='yellow') {
		$style = 'med-yellow-btn ';
	} elseif ($a['class'] =='orange') {
		$style = 'med-orange-btn ';
	} else {
		$style = '';
	}
	
	$output  ='<a href="' . esc_attr($a['href']) . '"'; // button link
	$output .='class="' . $style . '" itemprop="telephone">'; // button style
	$output .='<i class="fa fa-' . esc_attr($a['icon']) . '"></i> '; // button icon
	$output .= $content; // button content
	$output .='</a>';
	return  $output;
}
add_shortcode( 'button', __NAMESPACE__ . '\\button_shortcode' );

/**
 * Responsive Video Player Shortcode
 */
function video_shortcode( $atts ) {
	$a = shortcode_atts( array(
		'src' 		=> ''
	), $atts );

	return '<div class="embed-responsive embed-responsive-16by9 hidden-xs hidden-sm" itemscope itemtype="http://schema.org/VideoObject"><iframe class="embed-responsive-item" itemprop="thumbnailURL" src="' . esc_attr($a['src']) . '"></iframe></div>';
}
add_shortcode( 'video', __NAMESPACE__ . '\\video_shortcode' );

function vimeo_shortcode( $atts ) {
	$a = shortcode_atts( array(
		'src' 		=> ''
	), $atts );

	return '<div class="embed-responsive embed-responsive-16by9 hidden-xs hidden-sm" itemscope itemtype="http://schema.org/VideoObject"><iframe class="embed-responsive-item" itemprop="thumbnailURL" src="https://player.vimeo.com/video/' . esc_attr($a['src']) . '"></iframe></div>';
}
add_shortcode( 'vimeo', __NAMESPACE__ . '\\vimeo_shortcode' );

function youtube_shortcode( $atts ) {
	$a = shortcode_atts( array(
		'src' 	=> ''
	), $atts );

	return '<div class="embed-responsive embed-responsive-16by9 hidden-xs hidden-sm" itemscope itemtype="http://schema.org/VideoObject"><iframe class="embed-responsive-item" itemprop="thumbnailURL" src="https://www.youtube.com/embed/' . esc_attr($a['src']) . '"></iframe></div>';
}
add_shortcode( 'youtube', __NAMESPACE__ . '\\youtube_shortcode' );


function youtube_shortcode_api(  $atts ) {
	$a = shortcode_atts( array(
		'src' 	=> '#'
	), $atts );	

	$output  ='<a class="popup-youtube" '; // Youtube popup class
	$output .='href="'; // start link
	$output .='https://www.youtube.com/watch?v=' . esc_attr($a['src']) . '" itemscope itemtype="http://schema.org/VideoObject">'; // Video Link with Schema
	$output .='<i class="fa fa-youtube-play fa-5x"></i>'; // Play button
	$output .= '<img src="http://i1.ytimg.com/vi/' . esc_attr($a['src']) . '/0.jpg" itemprop="thumbnailURL" />'; // button content
	$output .='</a>';
	return  $output;
}
add_shortcode( 'youtube_api', __NAMESPACE__ . '\\youtube_shortcode_api' );

function vimeo_shortcode_api( $atts ) {
	$a = shortcode_atts( array(
		'src' 	=> '#'
	), $atts );	

	$imgid = esc_attr($a['src']);
	$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$imgid.php"));

	$output  ='<a class="popup-vimeo" '; // Youtube popup class
	$output .='href="'; // start link
	$output .='https://vimeo.com/' . esc_attr($a['id']) . '" itemscope itemtype="http://schema.org/VideoObject">'; // Video Link with Schema
	$output .='<i class="fa fa-youtube-play fa-5x"></i>'; // Play button
	$output .= '<img src="'.$hash[0]['thumbnail_large'].'" itemprop="thumbnailURL" />'; // button content
	$output .='</a>';
	return  $output;
}
add_shortcode( 'vimeo_api', __NAMESPACE__ . '\\vimeo_shortcode_api' );