/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {
	  // Use this variable to set up the common and page specific functions. If you
	  // rename this variable, you will also need to rename the namespace below.
	  var Sage = {
	    // All pages
	    'common': {
	      init: function() {
	        // JavaScript to be fired on all pages

			/***************************************/
			/* Preloader */
			/***************************************/
			//<![CDATA[
			$(window).load(function() { // makes sure the whole site is loaded
			    $('#loader').fadeOut(); // will first fade out the loading animation
			    $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
			    $('body').delay(350).css({'overflow':'visible'});
			});
			//]]>


			/***************************************/
			/* Form Toggle Modal Display */
			/***************************************/
			$(".form-tab a.title").click(function(e){
				e.preventDefault();
			    $('.sticky-form').toggleClass('slide');
			});
			var counter = null,
				counters;
			if(localStorage.getItem("count") === null){
				counter=localStorage.setItem("count", 1);
				counters = 7;
			}else{
				counters= parseInt(localStorage.getItem("count")); 
				counters++;
				counter=localStorage.setItem("count", counters);
				if(counters===8 && $('#verifyIns').length>0){
					$('.sticky-form').toggleClass('slide');
					$('#verifyIns').modal('show');
				} 
			}
			if(counters>=25){
				localStorage.removeItem("count");
			}


			/***************************************/
			/* CTA parallax animation */
			/***************************************/



	  }, // END common init function
	  finalize: function() {
        // JavaScript to be fired on the all pages, after the init JS


		/****************************************/
		/*SLIDER PRO */
		/****************************************/
		
		$( document ).ready(function( $ ) {
			$( '#my-slider' ).sliderPro({
			    width: 1200,
			    height: 700,
			    arrows: true,
			    buttons: true,
			    waitForLayers: true,
			    autoplay: false,
			    autoScaleLayers: true	  
			});
		});	




		/***************************************/
		/* Match Heights */
		/***************************************/
        var $heightVars = [
	        $('.blog-item'),
	        $('.blog-roll-item'),
	        $('.page-excerpt .box'),
	        $('.employee-item'),
	        $('.foot-box'),
	        $('.col-item'),
	        $('.page-links .box-item')
        ];
		if( $.inArray($heightVars)){
			for (var i = 0; i < $heightVars.length; i++) {
			    $($heightVars[i]).matchHeight({
		            byRow: true,
		        });
			}
	    }


		/***************************************/
		/* Accordion with Chevron */
		/***************************************/
		function toggleChevron(e) {
		    $(e.target)
	        .prev('.panel-heading')
	        .find("i.indicator")
	        .toggleClass('fa-chevron-down fa-chevron-up');
		}
		$('#accordion').on('hidden.bs.collapse', toggleChevron);
		$('#accordion').on('shown.bs.collapse', toggleChevron);



		/***************************************/
		/* Smooth Scrolling */
		/***************************************/
		$('a[href*=\\#]:not([href=\\#])[href^="#"]:not([data-toggle])').click(function() {
			if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
				if (target.length) {
					$('html,body').animate({
						scrollTop: target.offset().top - 51
					}, 1500);
					return false;
				}
			}
		});


		/***************************************/
		/* Google Map */
		/***************************************/
		var map = null;
		$( document ).ready(function() {

			// Google Map Display
			if($('.acf-map').length>0 ) {
				var $scroll = $('.acf-map').attr('data-scroll'),
					$zoom	= parseInt($('.acf-map').attr('data-zoom')),
					new_map, add_marker, center_map;

				/*
				*  new_map
				*/

				new_map=function new_map( $el ) {
					// var
					var $markers = $el.find('.marker');
					// vars
					var args = {
						zoom		: $zoom,
						center		: new google.maps.LatLng(0, 0),
						mapTypeId	: google.maps.MapTypeId.ROADMAP,
						scrollwheel	: $scroll
					};
					// create map	        	
					var map = new google.maps.Map( $el[0], args);
					// add a markers reference
					map.markers = [];
					// add markers
					$markers.each(function(){
						add_marker( $(this), map );
					});
					// center map
					center_map( map );
					// return
					return map;
				};

				/*
				*  add_marker
				*/
				add_marker=function add_marker( $marker, map ) {
					// var
					var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
					// create marker
					var marker = new google.maps.Marker({
						position	: latlng,
						map			: map
					});
					// add to array
					map.markers.push( marker );
					// if marker contains HTML, add it to an infoWindow
					if( $marker.html() )
					{
						// create info window
						var infowindow = new google.maps.InfoWindow({
							content		: $marker.html()
						});
						// show info window when marker is clicked
						google.maps.event.addListener(marker, 'click', function() {
							infowindow.open( map, marker );
						});
					}
					google.maps.event.addListener(map, 'center_changed', function() {
					// 3 seconds after the center of the map has changed, pan back to the
					// marker.
						window.setTimeout(function() {
							  map.panTo(marker.getPosition());
							}, 9000);
						}
					);
				};

				/*
				*  center_map
				*/
				center_map=function center_map( map ) {
					// vars
					var bounds = new google.maps.LatLngBounds();
					// loop through all markers and create bounds
					$.each( map.markers, function( i, marker ){
						var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
						bounds.extend( latlng );
					});
					// only 1 marker?
					if( map.markers.length == 1 )
					{
						// set center of map
					    map.setCenter( bounds.getCenter() );
					    map.setZoom( $zoom );
					}
					else
					{
						// fit to bounds
						map.fitBounds( bounds );
					}
				};

				// create map
				$('.acf-map').each(function(){
					map = new_map( $(this) );
				});
			}

		});


		
		} // END common finalize function
    }, // END common
    
    'page_id_24479': {
	    init: function() {
		    $('#alumni').validate({
				/* @validation states + elements */
				errorClass: 'error-view',
				validClass: 'success-view',
				errorElement: 'span',
				onkeyup: false,
				onclick: false,
				/* @validation rules */
				rules: {
					name: {
						required: true
					},
					email: {
						required: true,
						email: true
					},
					phone: {
						required: true
					}
				},
				messages: {
					name: {
						required: 'Please enter your first name'
					},
					email: {
						required: 'Please enter your email',
						email: 'Incorrect email format'
					},
					phone: {
						required: 'Please enter your phone'
					}
				},
				// Add class 'error-view'
				highlight: function(element, errorClass, validClass) {
					$(element).closest('.input').removeClass(validClass).addClass(errorClass);
					if ( $(element).is(':checkbox') || $(element).is(':radio') ) {
						$(element).closest('.check').removeClass(validClass).addClass(errorClass);
					}
				},
				// Add class 'success-view'
				unhighlight: function(element, errorClass, validClass) {
					$(element).closest('.input').removeClass(errorClass).addClass(validClass);
					if ( $(element).is(':checkbox') || $(element).is(':radio') ) {
						$(element).closest('.check').removeClass(errorClass).addClass(validClass);
					}
				},
				// Error placement
				errorPlacement: function(error, element) {
					if ( $(element).is(':checkbox') || $(element).is(':radio') ) {
						$(element).closest('.check').append(error);
					} else {
						$(element).closest('.unit').append(error);
					}
				},
			});	 
		},
	},   

	    // Home page
	    'home': {
	      init: function() {
	        // JavaScript to be fired on the home page
	      },
	      finalize: function() {
	        // JavaScript to be fired on the home page, after the init JS
	      }
	    }, // END home 


	    // Job Application Page
	    'online_application': {
	      init: function() {
	        // JavaScript to be fired on the Job Application page
	
				/***************************************/
				/* Application Form validation */
				/***************************************/
				$( '#j-application' ).validate({
					/* @validation states + elements */
					errorClass: 'error-view',
					validClass: 'success-view',
					errorElement: 'span',
					onkeyup: false,
					onclick: false,
					/* @validation rules */
					rules: {
						app_name: {
							required: true
						},
						app_email: {
							required: true,
							email: true
						},
						app_phone: {
							required: true
						},
						app_address: {
							required: true
						},
						app_city: {
							required: true
						},
						app_post: {
							required: true
						},
						app_position: {
							required: true
						},
						file_1: {
							required: true,
							extension:'jpg|png|doc|docx|pdf'
						},
						file_2: {
							required: true,
							extension:'jpg|png|doc|docx|pdf'
						}
					},
					messages: {
						app_name: {
							required: 'Please enter your name'
						},
						app_email: {
							required: 'Please enter your email',
							email: 'Incorrect email format'
						},
						app_phone: {
							required: 'Please enter your phone'
						},
						app_address: {
							required: 'Please enter your address'
						},
						app_city: {
							required: 'Please enter city'
						},
						app_position: {
							required: 'Please select the positon you are apply for'
						},
						app_post: {
							required: 'Please enter zip code'
						},
						file_1: {
							required: 'Please upload your résumé',
							extension:'Incorrect file format'
						},
						file_2: {
							required: 'Please upload your cover letter',
							extension:'Incorrect file format'
						}
					},
					// Add class 'error-view'
					highlight: function(element, errorClass, validClass) {
						$(element).closest('.input').removeClass(validClass).addClass(errorClass);
						if ( $(element).is(':checkbox') || $(element).is(':radio') ) {
							$(element).closest('.check').removeClass(validClass).addClass(errorClass);
						}
					},
					// Add class 'success-view'
					unhighlight: function(element, errorClass, validClass) {
						$(element).closest('.input').removeClass(errorClass).addClass(validClass);
						if ( $(element).is(':checkbox') || $(element).is(':radio') ) {
							$(element).closest('.check').removeClass(errorClass).addClass(validClass);
						}
					},
					// Error placement
					errorPlacement: function(error, element) {
						if ( $(element).is(':checkbox') || $(element).is(':radio') ) {
							$(element).closest('.check').append(error);
						} else {
							$(element).closest('.unit').append(error);
						}
					},
					// Submit the form
					submitHandler:function() {			
				        $.ajax({
				            url     : $(this).attr('action'),
				            type    : $(this).attr('method'),
				            dataType: 'json',
				            data    : $(this).serialize(),
				            error   : function( xhr, err ) {
				                         alert('Error');     
				            }
				        });    
				        return false;
					}
				});
	
	      }
	    }, // END Job Application Page 
	

    }; // END var Sage

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
