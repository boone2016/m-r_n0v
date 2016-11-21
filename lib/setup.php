<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  add_theme_support('soil-clean-up');
  add_theme_support('soil-nav-walker');
  add_theme_support('soil-nice-search');
  add_theme_support('soil-jquery-cdn');
  add_theme_support('soil-relative-urls');

  // Register wp_nav_menu() menus
  if( function_exists('acf_add_options_page') ) {	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
  }

  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'sage')
  ]);

  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');

  // Enable post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  // Use main stylesheet for visual editor
  // To add custom styles edit /assets/styles/layouts/_tinymce.scss
  add_editor_style(Assets\asset_path('styles/main.css'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

/**
 * Register sidebars
 */
function widgets_init() {
  register_sidebar([
    'name'          => __('Primary', 'sage'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="title">',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('CTA', 'sage'),
    'id'            => 'sidebar-cta',
    'description' 	=> 'Sidebar will be displayed on the Hero Page Template below Hero Image',
    'before_widget' => '<div id="sidebar-cta" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="title">',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('Blog', 'sage'),
    'id'            => 'sidebar-blog',
    'description' 	=> 'Sidebar will be displayed on the Single Blog Posts',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="title">',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('Contact', 'sage'),
    'id'            => 'sidebar-contact',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="title">',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('Footer 1', 'sage'),
    'id'            => 'footer-1',
    'before_widget' => '<section id="sidebar-footer-1" class="widget">',
    'after_widget'  => '</section>',
    'before_title'  => '<h5>',
    'after_title'   => '</h5>'
  ]);

  register_sidebar([
    'name'          => __('Footer 2', 'sage'),
    'id'            => 'footer-2',
    'before_widget' => '<section id="sidebar-footer-2" class="widget">',
    'after_widget'  => '</section>',
    'before_title'  => '<h5>',
    'after_title'   => '</h5>'
  ]);

  register_sidebar([
    'name'          => __('Footer 3', 'sage'),
    'id'            => 'footer-3',
    'before_widget' => '<section id="sidebar-footer-3" class="widget">',
    'after_widget'  => '</section>',
    'before_title'  => '<h5>',
    'after_title'   => '</h5>'
  ]);

  register_sidebar([
    'name'          => __('Landing Page Footer', 'sage'),
    'id'            => 'landing-page-footer',
    'before_widget' => '<section id="sidebar-lander" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h5>',
    'after_title'   => '</h5>'
  ]);

}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar() {
  static $display;

  isset($display) || $display = !in_array(true, [
    // The sidebar will NOT be displayed if ANY of the following return true.
    // @link https://codex.wordpress.org/Conditional_Tags
    is_404(),
    is_front_page(),
    is_home(),
    is_page(),
    is_search(),
    is_archive(),
    is_single(),
    is_page_template(array(
    	'template-custom.php',
    	'template-form.php'
    )),
  ]);

  return apply_filters('sage/display_sidebar', $display);
}

/**
 * Theme assets
 */
function assets() {
  wp_enqueue_style('sage/css', Assets\asset_path('styles/main.css'), false, null);
  wp_enqueue_script('validate/js', Assets\asset_path('scripts/validate.js'), ['jquery'], null, true);
  wp_enqueue_script('tween/js', Assets\asset_path('scripts/tweenMax.js'), ['jquery'], null, true);
  wp_enqueue_script('sage/js', Assets\asset_path('scripts/main.js'), ['jquery'], null, true);

}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);