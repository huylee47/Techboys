(function($, window){
	'use strict';

	var arrowWidth = 16;

	$.fn.resizeselect = function(settings) {

		return this.each( function() {

			$(this).change( function(){

				var $this = $(this);

				// create test element
				var text = $this.find("option:selected").text();
				var $test = $("<span>").html(text);

				// add to body, get width, and get out
				$test.appendTo('body');
				var width = $test.width();
				$test.remove();

				// set select width
				$this.width(width + arrowWidth);

				// run on start
			}).change();

		});
	};

})(jQuery, window);

(function($, window){
	'use strict';

	$.fn.navigationResize = function() {
		var $menuContainer = $(this);
		var $navItemMore = $menuContainer.find( 'li.techmarket-flex-more-menu-item' );
		var $overflowItemsContainer = $navItemMore.find( '.overflow-items' );

		$navItemMore.before( $navItemMore.find( '.overflow-items > li' ) );
		$navItemMore.siblings( '.dropdown-submenu' ).removeClass( 'dropdown-submenu' ).addClass( 'dropdown' );

		var $navItems = $navItemMore.parent().children( 'li:not(.techmarket-flex-more-menu-item)' ),
		navItemMoreWidth = $navItemMore.outerWidth(),
		navItemWidth = navItemMoreWidth,
		$menuContainerWidth = $menuContainer.width() - navItemMoreWidth;

		$navItems.each(function() {
			navItemWidth += $(this).outerWidth();
		});

		if( navItemWidth > $menuContainerWidth ) {
			$navItemMore.show();
			while (navItemWidth >= $menuContainerWidth) {
				navItemWidth -= $navItems.last().outerWidth();
				$navItems.last().prependTo( $overflowItemsContainer );
				$navItems.splice(-1,1);
			}

			$overflowItemsContainer.children( 'li.dropdown' ).removeClass( 'dropdown' ).addClass( 'dropdown-submenu' );
		} else {
			$navItemMore.hide();
		}
	}

})(jQuery, window);

(function($) {
	'use strict';

	var is_rtl = $('body,html').hasClass('rtl');

	/*===================================================================================*/
	/*  Block UI Defaults
	/*===================================================================================*/
	// if( typeof $.blockUI !== "undefined" ) {
	// 	$.blockUI.defaults.message                      = null;
	// 	$.blockUI.defaults.overlayCSS.background        = '#fff url(' + techmarket_options.ajax_loader_url + ') no-repeat center';
	// 	$.blockUI.defaults.overlayCSS.backgroundSize    = '16px 16px';
	// 	$.blockUI.defaults.overlayCSS.opacity           = 0.6;
	// }

	/*===================================================================================*/
	/*  Smooth scroll for wc tabs with @href started with '#' only
	/*===================================================================================*/
	$('.wc-tabs-wrapper ul.tm-tabs > li').on('click', 'a[href^="#"]', function(e) {
		// target element id
		var id = $(this).attr('href');

		// target element
		var $id = $(id);
		if ($id.length === 0) {
			return;
		}

		// prevent standard hash navigation (avoid blinking in IE)
		e.preventDefault();

		// top position relative to the document
		var pos = $id.offset().top;

		// animated top scrolling
		$('body, html').animate({scrollTop: pos});
	});

	
	/*===================================================================================*/
	/*  YITH Wishlist
	/*===================================================================================*/

	// $( document ).on( 'added_to_wishlist', function() {
	// 	$( '.images-and-summary' ).unblock();
	// 	$( '.product-inner' ).unblock();
	// 	$( '.product-list-view-inner' ).unblock();
	// 	$( '.product-item-inner' ).unblock();
	// });

	/*===================================================================================*/
	/*  Add to Cart animation
	/*===================================================================================*/

	$( 'body' ).on( 'adding_to_cart', function( e, $btn, data){
		$btn.closest( '.product' ).block();
	});

	$( 'body' ).on( 'added_to_cart', function(){
		$( '.product' ).unblock();
	});

	/*===================================================================================*/
	/*  WC Variation Availability
	/*===================================================================================*/

	$( 'body' ).on( 'woocommerce_variation_has_changed', function( e ) {
		var $singleVariationWrap = $( 'form.variations_form' ).find( '.single_variation_wrap' );
		var $availability = $singleVariationWrap.find( '.woocommerce-variation-availability' ).html();
		if ( typeof $availability !== "undefined" && $availability !== false ) {
			$( '.techmarket-stock-availability' ).html( $availability );
		}
	});

	/*===================================================================================*/
	/*  Deal Countdown timer
	/*===================================================================================*/

	$( '.deal-countdown-timer' ).each( function() {
		var deal_countdown_text = {
			'days_text': 'Ngày',
			'hours_text': 'Giờ',
			'mins_text': 'Phút',
			'secs_text': 'Giây'
		};
	
		var deal_time_diff = $(this).children('.deal-time-diff').text();
		var countdown_output = $(this).children('.deal-countdown');
		var target_date = ( new Date().getTime() ) + ( deal_time_diff * 1000 );
	
		var countdownInterval = setInterval( function () {
			var current_date = new Date().getTime();
			var seconds_left = (target_date - current_date) / 1000;
	
			if (seconds_left <= 0) {
				clearInterval(countdownInterval);
				countdown_output.html('<span class="expired">Kết thúc !</span>');
				return;
			}
	
			var days = parseInt(seconds_left / 86400);
			seconds_left = seconds_left % 86400;
	
			var hours = parseInt(seconds_left / 3600);
			seconds_left = seconds_left % 3600;
	
			var minutes = parseInt(seconds_left / 60);
			var seconds = parseInt(seconds_left % 60);
	
			countdown_output.html(
				'<span data-value="' + days + '" class="days"><span class="value">' + days +  '</span><b>' + deal_countdown_text.days_text + '</b></span>' +
				'<span class="hours"><span class="value">' + hours + '</span><b>' + deal_countdown_text.hours_text + '</b></span>' +
				'<span class="minutes"><span class="value">' + minutes + '</span><b>' + deal_countdown_text.mins_text + '</b></span>' +
				'<span class="seconds"><span class="value">' + seconds + '</span><b>' + deal_countdown_text.secs_text + '</b></span>'
			);
		}, 1000 );
	});
	

   
	/*===================================================================================*/
	/*  Product Categories Filter
	/*===================================================================================*/

	$(".section-categories-filter").each(function() {
		var $this = $(this);
		$this.find( '.categories-dropdown' ).change(function() {
			$this.block({ message: null });
			var $selectedKey = $(this).val();
			var $shortcode_atts = $this.find( '.categories-filter-products' ).data('shortcode_atts');
			if( $selectedKey !== '' || $selectedKey !== 0 || $selectedKey !== '0' ) {
				$shortcode_atts['category'] = $selectedKey;
			}
			$.ajax({
				url : techmarket_options.ajax_url,
				type : 'post',
				data : {
					action : 'product_categories_filter',
					shortcode_atts : $shortcode_atts
				},
				success : function( response ) {
					$this.find( '.categories-filter-products' ).html( response );
					$this.find( '.products > div[class*="post-"]' ).addClass( "product" );
					$this.unblock();
				}
			});
			return false;
		});
	});

	$( window ).on( 'resize', function() {
		if( $('[data-nav="flex-menu"]').is(':visible') ) {
			$('[data-nav="flex-menu"]').each( function() {
				$(this).navigationResize();
			});
		}
	});

	$( window ).on( 'load', function() {

		$(".section-categories-filter").each(function() {
			$(this).find( '.categories-dropdown' ).trigger('change');
		});

		/*===================================================================================*/
		/*  Bootstrap multi level dropdown trigger
		/*===================================================================================*/

		$('li.dropdown-submenu > a[data-toggle="dropdown"]').on('click', function(event) {
			event.preventDefault();
			event.stopPropagation();
			if ( $(this).closest('li.dropdown-submenu').hasClass('show') ) {
				$(this).closest('li.dropdown-submenu').removeClass('show');
			} else {
				$(this).closest('li.dropdown-submenu').removeClass('show');
				$(this).closest('li.dropdown-submenu').addClass('show');
			}
		});

	});

	$(document).ready( function() {

		$( 'select.resizeselect' ).resizeselect();

		/*===================================================================================*/
		/*  Flex Menu
		/*===================================================================================*/

		if( $('[data-nav="flex-menu"]').is(':visible') ) {
			$('[data-nav="flex-menu"]').each( function() {
				$(this).navigationResize();
			});
		}

		/*===================================================================================*/
		/*  PRODUCT CATEGORIES TOGGLE
		/*===================================================================================*/

		if( is_rtl ) {
			var $fa_icon_angle_right = '<i class="fa fa-angle-left"></i>';
		} else {
			var $fa_icon_angle_right = '<i class="fa fa-angle-right"></i>';
		}

		$('.product-categories .show-all-cat-dropdown').each(function(){
			if( $(this).siblings('ul').length > 0 ) {
				var $childIndicator = $('<span class="child-indicator">' + $fa_icon_angle_right + '</span>');

				$(this).siblings('ul').hide();
				if($(this).siblings('ul').is(':visible')){
					$childIndicator.addClass( 'open' );
					$childIndicator.html('<i class="fa fa-angle-up"></i>');
				}

				$(this).on( 'click', function(){
					$(this).siblings('ul').toggle( 'fast', function(){
						if($(this).is(':visible')){
							$childIndicator.addClass( 'open' );
							$childIndicator.html('<i class="fa fa-angle-up"></i>');
						}else{
							$childIndicator.removeClass( 'open' );
							$childIndicator.html( $fa_icon_angle_right );
						}
					});
					return false;
				});
				$(this).append($childIndicator);
			}
		});

		// $('.product-categories .cat-item > a').each(function(){
		// 	if( $(this).siblings('ul.children').length > 0 ) {
		// 		var $childIndicator = $('<span class="child-indicator">' + $fa_icon_angle_right + '</span>');

		// 		$(this).siblings('.children').hide();
		// 		$('.current-cat > .children').show();
		// 		$('.current-cat-parent > .children').show();
		// 		if($(this).siblings('.children').is(':visible')){
		// 			$childIndicator.addClass( 'open' );
		// 			$childIndicator.html('<i class="fa fa-angle-up"></i>');
		// 		}

		// 		$childIndicator.on( 'click', function(){
		// 			$(this).parent().siblings('.children').toggle( 'fast', function(){
		// 				if($(this).is(':visible')){
		// 					$childIndicator.addClass( 'open' );
		// 					$childIndicator.html('<i class="fa fa-angle-up"></i>');
		// 				}else{
		// 					$childIndicator.removeClass( 'open' );
		// 					$childIndicator.html( $fa_icon_angle_right );
		// 				}
		// 			});
		// 			return false;
		// 		});
		// 		$(this).prepend($childIndicator);
		// 	} else {
		// 		$(this).prepend('<span class="no-child"></span>');
		// 	}
		// });

		/*===================================================================================*/
		/*  YITH Wishlist
		/*===================================================================================*/

		// $( '.add_to_wishlist' ).on( 'click', function() {
		// 	$( this ).closest( '.images-and-summary' ).block();
		// 	$( this ).closest( '.product-inner' ).block();
		// 	$( this ).closest( '.product-list-view-inner' ).block();
		// 	$( this ).closest( '.product-item-inner' ).block();
		// });

		// $( '.yith-wcwl-wishlistaddedbrowse > .feedback' ).on( 'click', function() {
		// 	var browseWishlistURL = $( this ).next().attr( 'href' );
		// 	window.location.href = browseWishlistURL;
		// });


		/*===================================================================================*/
		/*  Slick Carousel
		/*===================================================================================*/

		$('[data-ride="tm-slick-carousel"]').each( function() {
			var $slick_target = false;
			
			if ( $(this).data( 'slick' ) !== 'undefined' && $(this).find( $(this).data( 'wrap' ) ).length > 0 ) {
				$slick_target = $(this).find( $(this).data( 'wrap' ) );
				$slick_target.data( 'slick', $(this).data( 'slick' ) );
			} else if ( $(this).data( 'slick' ) !== 'undefined' && $(this).is( $(this).data( 'wrap' ) ) ) {
				$slick_target = $(this);
			}

			if( $slick_target ) {
				$slick_target.slick();
			}
		});

		$(".custom-slick-pagination .slider-prev").click(function(e){
			if ( $( this ).data( 'target' ) !== 'undefined' ) {
				e.preventDefault();
				e.stopPropagation();
				var slick_wrap_id = $( this ).data( 'target' );
				$( slick_wrap_id ).slick('slickPrev');
			}
		});

		$(".custom-slick-pagination .slider-next").click(function(e){
			if ( $( this ).data( 'target' ) !== 'undefined' ) {
				e.preventDefault();
				e.stopPropagation();
				var slick_wrap_id = $( this ).data( 'target' );
				$( slick_wrap_id ).slick('slickNext');
			}
		});

		$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
			var $target = $(e.target).attr("href");
			$($target).find('[data-ride="tm-slick-carousel"]').each( function() {
				var $slick_target = $(this).data('wrap');
				if( $($target).find($slick_target).length > 0 ) {
					$($target).find($slick_target).slick('setPosition');
				}
			});
		});

		$('#section-landscape-product-card-with-gallery .products').on('init', function(event, slick){
			$(slick.$slides[0]).find(".big-image figure:eq(0)").nextAll().hide();
			$(slick.$slides[0]).find(".small-images figure").click(function(e){
			    var index = $(this).index();
			    $(slick.$slides[0]).find(".big-image figure").eq(index).show().siblings().hide();
			});
		});

		$("#section-landscape-product-card-with-gallery .products").slick({
			'infinite'			: false,
			'slidesToShow'		: 1,
			'slidesToScroll'	: 1,
			'dots'				: false,
			'arrows'			: true,
			'prevArrow'			: '<a href="#"><i class="tm tm-arrow-left"></i></a>',
			'nextArrow'			: '<a href="#"><i class="tm tm-arrow-right"></i></a>'
		});

		$("#section-landscape-product-card-with-gallery .products").slick('setPosition');

		$('#section-landscape-product-card-with-gallery .products').on('afterChange', function(event, slick, currentSlide){
		  	var current_element = $(slick.$slides[currentSlide]);
		  	current_element.find(".big-image figure:eq(0)").nextAll().hide();
			current_element.find(".small-images figure").click(function(e){
			    var index = $(this).index();
			    current_element.find(".big-image figure").eq(index).show().siblings().hide();
			});
		});


		// Animate on scroll into view
		// // $( '.animate-in-view' ).each( function() {
		// // 	var $this = $(this), animation = $this.data( 'animation' );
		// // 	var waypoint_animate = new Waypoint({
		// // 		element: $this,
		// // 		handler: function(e) {
		// // 			$this.addClass( $this.data( 'animation' ) + ' animated' );
		// // 		},
		// // 		offset: '90%'
		// // 	});
		// // });

		/*===================================================================================*/
		/*  Sticky Header
		/*===================================================================================*/

		$('.site-header .techmarket-sticky-wrap').each(function(){
			var tm_sticky_header = new Waypoint.Sticky({
				element: $(this),
				stuckClass: 'stuck animated fadeInDown faster'
			});
		});

		/*===================================================================================*/
		/*  Departments Menu
		/*===================================================================================*/

		// Set Home Page Sidebar margin-top
		var departments_menu_height_home_v5 = $( '.page-template-template-homepage-v5 .departments-menu > ul.dropdown-menu' ).height(),
			departments_menu_height_home_v6 = $( '.page-template-template-homepage-v6 .departments-menu > ul.dropdown-menu' ).height();

		$( '.page-template-template-homepage-v5 #secondary').css( 'margin-top', departments_menu_height_home_v5 + 35 );
		$( '.page-template-template-homepage-v6 #secondary').css( 'margin-top', departments_menu_height_home_v6 + 35 );

		if ( $( window ).width() > 768 ) {
			// Departments Menu Height
			var $departments_menu_dropdown = $( '.departments-menu-dropdown' ),
				departments_menu_dropdown_height = $departments_menu_dropdown.height();

			$departments_menu_dropdown.find( '.dropdown-submenu > .dropdown-menu' ).each( function() {
				$(this).find( '.menu-item-object-static_block' ).css( 'min-height', departments_menu_dropdown_height - 4 );
				$(this).css( 'min-height', departments_menu_dropdown_height - 4 );
			});

			$( '.departments-menu-dropdown' ).on( 'mouseleave', function() {
				var $this = $(this);
				$this.removeClass( 'animated-dropdown' );
			});

			$( '.departments-menu-dropdown .menu-item-has-children' ).on({
				mouseenter: function() {
					var $this = $(this),
						$dropdown_menu = $this.find( '> .dropdown-menu' ),
						$departments_menu = $this.parents( '.departments-menu-dropdown' ),
						css_properties = {
							width:      540,
							opacity:    1
						},
						animation_duration = 300,
						has_changed_width = true,
						animated_class = '',
						$container = '';

					if ( $departments_menu.length > 0 ) {
						$container = $departments_menu;
					}

					if ( $this.hasClass( 'yamm-tfw' ) ) {
						css_properties.width = 540;

						if ( $departments_menu.length > 0 ) {
							css_properties.width = 600;
						}
					} else if ( $this.hasClass( 'yamm-fw' ) ) {
						css_properties.width = 900;
					} else if ( $this.hasClass( 'yamm-hw' ) ) {
						css_properties.width = 450;
					} else {
						css_properties.width = 277;
					}

					$dropdown_menu.css( {
						visibility: 'visible',
						display:    'block',
						// overflow: 	'hidden'
					} );

					if ( ! $container.hasClass( 'animated-dropdown' ) ) {
						$dropdown_menu.animate( css_properties, animation_duration, function() {
							$container.addClass( 'animated-dropdown' );
						});
					} else {
						$dropdown_menu.css( css_properties );
					}
				}, mouseleave: function() {
					$(this).find( '> .dropdown-menu' ).css({
						visibility: 'hidden',
						opacity:    0,
						width:      0,
						display:    'none'
					});
				}
			});
		}

		/*===================================================================================*/
		/*  Handheld Menu
		/*===================================================================================*/
		// Hamburger Menu Toggler
		$( '.handheld-navigation .navbar-toggler' ).on( 'click', function() {
			$( this ).closest('.handheld-navigation').toggleClass( "toggled" );
			$('body').toggleClass( "active-hh-menu" );
		} );

		// Hamburger Menu Close Trigger
		$( '.tmhm-close' ).on( 'click', function() {
			$( this ).closest('.handheld-navigation').toggleClass( "toggled" );
			$('body').toggleClass( "active-hh-menu" );
		} );

		// Hamburger Menu Close Trigger when click outside menu slide
		$( document ).on("click", function(event) {
			if ( $( '.handheld-navigation' ).hasClass( 'toggled' ) ) {
				if ( ! $( '.handheld-navigation' ).is( event.target ) && 0 === $( '.handheld-navigation' ).has( event.target ).length ) {
					$( '.handheld-navigation' ).toggleClass( "toggled" );
					$( 'body' ).toggleClass( "active-hh-menu" );
				}
			}
		});

		// Search focus Trigger
		$('.handheld-header .site-search .search-field').focus(function () {
			$(this).closest('.site-search').addClass('active');
		}).blur(function () {
			$(this).closest('.site-search').removeClass('active');
		});

		/*===================================================================================*/
		/*  Handheld Sidebar
		/*===================================================================================*/
		// Hamburger Sidebar Toggler
		$( '.handheld-sidebar-toggle .sidebar-toggler' ).on( 'click', function() {
			$( this ).closest('.site-content').toggleClass( "active-hh-sidebar" );
		} );

		// Hamburger Sidebar Close Trigger
		$( '.tmhh-sidebar-close' ).on( 'click', function() {
			$( this ).closest('.site-content').toggleClass( "active-hh-sidebar" );
		} );

		// Hamburger Sidebar Close Trigger when click outside menu slide
		$( document ).on("click", function(event) {
			if ( $( '.site-content' ).hasClass( 'active-hh-sidebar' ) ) {
				if ( ! $( '.handheld-sidebar-toggle' ).is( event.target ) && 0 === $( '.handheld-sidebar-toggle' ).has( event.target ).length && ! $( '#secondary' ).is( event.target ) && 0 === $( '#secondary' ).has( event.target ).length ) {
					$( '.site-content' ).toggleClass( "active-hh-sidebar" );
				}
			}
		});

		/*===================================================================================*/
		/*  Products LIVE Search
		/*===================================================================================*/

		// if( techmarket_options.enable_live_search == '1' ) {

		// 	if ( techmarket_options.ajax_url.indexOf( '?' ) > 1 ) {
		// 		var prefetch_url    = techmarket_options.ajax_url + '&action=products_live_search&fn=get_ajax_search';
		// 		var remote_url      = techmarket_options.ajax_url + '&action=products_live_search&fn=get_ajax_search&terms=%QUERY';
		// 	} else {
		// 		var prefetch_url    = techmarket_options.ajax_url + '?action=products_live_search&fn=get_ajax_search';
		// 		var remote_url      = techmarket_options.ajax_url + '?action=products_live_search&fn=get_ajax_search&terms=%QUERY';
		// 	}

		// 	var searchProducts = new Bloodhound({
		// 		datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
		// 		queryTokenizer: Bloodhound.tokenizers.whitespace,
		// 		prefetch: prefetch_url,
		// 		remote: {
		// 			url: remote_url,
		// 			wildcard: '%QUERY',
		// 		},
		// 		identify: function(obj) {
		// 			return obj.id;
		// 		}
		// 	});

		// 	searchProducts.initialize();

		// 	$( '.navbar-search .product-search-field' ).typeahead( techmarket_options.typeahead_options,
		// 		{
		// 			name: 'search',
		// 			source: searchProducts.ttAdapter(),
		// 			displayKey: 'value',
		// 			limit: techmarket_options.live_search_limit,
		// 			templates: {
		// 				empty : [
		// 					'<div class="empty-message">',
		// 					techmarket_options.live_search_empty_msg,
		// 					'</div>'
		// 				].join('\n'),
		// 				suggestion: Handlebars.compile( techmarket_options.live_search_template )
		// 			}
		// 		}
		// 	);
		// }
	});



	/*===================================================================================*/
    /*  Price Filter
    /*===================================================================================*/
	  $( function() {
	    $( "#slider-range" ).slider({
	      range: true,
	      min: 0,
	      max: 500,
	      values: [ 0, 500 ],
	      slide: function( event, ui ) {
	        $( "#amount" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
	      }
	    });
	    $( "#amount" ).val(  $( "#slider-range" ).slider( "values", 0 ) +
	      " - " + $( "#slider-range" ).slider( "values", 1 ) );
	  } );

	$(document).ready(function() {
	    $('.maxlist-more ul').hideMaxListItems({
	        'max': 5,
	        'speed': 500,
	    	'moreText': '+ Show more',
			'lessText': '- Show less',
	        'moreHTML': '<p class="maxlist-more"><a href="#"></a></p>'
	    });


	    $('.home-slider').on('init', function(event, slick){
       		$('.slick-active .caption .pre-title').removeClass('hidden');
            $('.slick-active .caption .pre-title').addClass('animated slideInRight');

            $('.slick-active .caption .title').removeClass('hidden');
            $('.slick-active .caption .title').addClass('animated slideInRight');

            $('.slick-active .caption .sub-title').removeClass('hidden');
            $('.slick-active .caption .sub-title').addClass('animated slideInRight');

            $('.slick-active .caption .button').removeClass('hidden');
            $('.slick-active .caption .button').addClass('animated slideInDown');

            $('.slick-active .caption .offer-price').removeClass('hidden');
            $('.slick-active .caption .offer-price').addClass('animated fadeInLeft');

            $('.slick-active .caption .sale-price').removeClass('hidden');
            $('.slick-active .caption .sale-price').addClass('animated fadeInRight');

            $('.slick-active .caption .bottom-caption').removeClass('hidden');
            $('.slick-active .caption .bottom-caption').addClass('animated slideInDown');
        });


	    $('.home-slider').slick({
			dots: true,
			infinite: true,
			speed: 300,
			slidesToShow: 1,
			autoplay: true,
			pauseOnHover: false,
			arrows: false,
			autoplaySpeed: 3000,
			fade: true,
			lazyLoad: 'progressive',
			cssEase: 'linear'

			
	    });


       	$('.home-slider').on('afterChange', function(event, slick, currentSlide){
       		$('.slick-active .caption .pre-title').removeClass('hidden');
            $('.slick-active .caption .pre-title').addClass('animated slideInRight');

            $('.slick-active .caption .title').removeClass('hidden');
            $('.slick-active .caption .title').addClass('animated slideInRight');

            $('.slick-active .caption .sub-title').removeClass('hidden');
            $('.slick-active .caption .sub-title').addClass('animated slideInRight');

            $('.slick-active .caption .button').removeClass('hidden');
            $('.slick-active .caption .button').addClass('animated slideInDown');

            $('.slick-active .caption .offer-price').removeClass('hidden');
            $('.slick-active .caption .offer-price').addClass('animated fadeInLeft');

            $('.slick-active .caption .sale-price').removeClass('hidden');
            $('.slick-active .caption .sale-price').addClass('animated fadeInRight');

            $('.slick-active .caption .bottom-caption').removeClass('hidden');
            $('.slick-active .caption .bottom-caption').addClass('animated slideInDown');
        });
        

        $('.home-slider').on('beforeChange', function(event, slick, currentSlide){
        	$('.slick-active .caption .pre-title').removeClass('animated slideInRight');
            $('.slick-active .caption .pre-title').addClass('hidden');

            $('.slick-active .caption .title').removeClass('animated slideInRight');
            $('.slick-active .caption .title').addClass('hidden');

            $('.slick-active .caption .sub-title').removeClass('animated slideInRight');
            $('.slick-active .caption .sub-title').addClass('hidden');

            $('.slick-active .caption .button').removeClass('animated slideInDown');
            $('.slick-active .caption .button').addClass('hidden');

            $('.slick-active .caption .offer-price').removeClass('animated fadeInLeft');
            $('.slick-active .caption .offer-price').addClass('hidden');

            $('.slick-active .caption .sale-price').removeClass('animated fadeInRight');
            $('.slick-active .caption .sale-price').addClass('hidden');

            $('.slick-active .caption .bottom-caption').removeClass('animated slideInDown');
            $('.slick-active .caption .bottom-caption').addClass('hidden');

        });
	});

	
		
	


})(jQuery);

