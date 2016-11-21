<?php // check if the flexible content field has rows of data
	if( have_rows('page_boxes') ):
	     // loop through the rows of data
	    while ( have_rows('page_boxes') ) : the_row();



		    /**
			 ** SECTION TITLE
			 *********************************/
			if( get_row_layout() == 'section_title'):
				require('section-title.php');
		    endif; // end page lists links secton



		    /**
			 ** CONTENT LEFT ICON RIGHT
			 *********************************/
			if( get_row_layout() == 'content_left_icon_right'):
				require('content-left-icon-right.php');
		    endif; // end page lists links secton



		    /**
			 ** CONTENT HALF HALF
			 *********************************/
			if( get_row_layout() == 'content_half_half'): 
				require('content-half-half.php');
		    endif; // end page lists links secton



		    /**
			 ** ICON LEFT CONTENT RIGHT
			 *********************************/
			if( get_row_layout() == 'icon_left_content_right'): 
				require('icon-left-content-right.php');
		    endif; // end page lists links secton



		    /**
			 ** PAGE EXCERPT LINKS
			 *********************************/
			if( get_row_layout() == 'page_excerpt_links'):
				require('page-links.php');
		    endif; // end page lists links secton



		    /**
			 ** PAGE LISTS LINKS
			 *********************************/
			if( get_row_layout() == 'page_lists_links'):
				require('page-list-links.php');
		    endif; // end page lists links secton



		    /**
			 ** BLOG
			 *********************************/
			if( get_row_layout() == 'blog_section'): 
				require('grid-blog.php');
		    endif; // end page lists links secton



			/**
			 ** GOOGLE MAP
			 *********************************/
			if( get_row_layout() == 'google_map_section'): 
				 require('google-map.php');
		    endif; // end page lists links secton



		    /**
			 ** Columns
			 *********************************/
			if( get_row_layout() == 'columns'):
			 require('columns.php');
		    endif; // end page lists links secton



		    /**
			 ** Columns
			 *********************************/
			if( get_row_layout() == 'text_box'):
			 require('text-area.php');
		    endif; // end page lists links secton
		    
		    
		    		    /**
			 ** Image Slider
			 *********************************/
			if( get_row_layout() == 'image_slider'):
			 require('image-slider.php');
		    endif; // end page lists links secton



	    endwhile; // end while has page_boxes loop
    
	else :

    // no layouts found

	endif;
?>
