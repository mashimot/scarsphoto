
@extends('layouts.app-scars')

@section('content')
<a href="{{ route('galleries.index') }}" class="text-white">Gallery</a>

<div class="title-container-outer-wrap">
	<div class="container-fluid clearfix">
		<div class="page-contents-wrap  ">
			<div id="post-5822" class="post-5822 page type-page status-publish hentry">
				<div class="entry-page-wrapper entry-content clearfix">
					<div id="mtheme-pagebuilder-wrapper-5822" class="mtheme-pagebuilder">
						<div class="mtheme-supercell clearfix ">
							<div class="mtheme-cell-wrap">
								<div id="mtheme-block-1" class="mtheme-block mtheme-block-em_portfolio_grid span12 mtheme-first-cell " data-width="12">
									<div id="gridblock-container" class="portfolio-gutter-nospace thumnails-gutter-active gridblock-masonary gridblock-three clearfix" data-columns="3" style="position: relative; height: 1203.83px;">
                                        @foreach($images as $img)
										<div class="gridblock-element gridblock-element-id-110 gridblock-element-order-1  gridblock-filterable filter-paintings p-1" data-portfolio="portfolio-110" data-id="id-2" style="width: 33.3333%; position: absolute; left: 0px; top: 0px;">
											<div class="gridblock-grid-element gridblock-element-inner" data-portfolioid="110">
												<div class="gridblock-background-hover">
													<div class="gridblock-links-wrap box-title-true">
                                                        <a class="column-gridblock-icon" href="https://imaginem.io/kinetika/project/nullam-rhoncus-magna/?menu_type=middle" rel="bookmark" title="Vertical image set">
                                                            <span class="hover-icon-effect"><i class="feather-icon-plus"></i></span>
                                                        </a>
                                                        <a data-lightbox="magnific-image" class="column-gridblock-icon" title="Bridge" href="{{ $img->download_url }}">
                                                            <span class="hover-icon-effect"><i class="feather-icon-maximize"></i></span>
                                                        </a>
                                                        <span class="boxtitle-hover">
                                                            <a href="https://imaginem.io/kinetika/project/nullam-rhoncus-magna/?menu_type=middle" rel="bookmark" title="Vertical image set">Vertical image set</a>
                                                            <span class="boxtitle-worktype">Paintings</span>
                                                        </span>
													</div>
												</div>
												<img src="{{ $img->download_url }}" alt="" class="displayed-image">
											</div>
										</div>
                                        @endforeach
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--div class="commentform-wrap">
					<div id="commentform-section">
						<div id="respond" class="comment-respond">
							<h3 id="reply-title" class="comment-reply-title">Leave a reply <small><a rel="nofollow" id="cancel-comment-reply-link" href="/kinetika/portfolio-galleries/masonary-portfolio/?menu_type=middle#respond" style="display:none;">Cancel reply</a></small></h3>
							<form action="https://imaginem.io/kinetika/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate="">
								<p class="comment-notes"><span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
								</p>
								<p class="comment-form-comment">
									<label for="comment">Comment</label>
									<textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea>
								</p>
								<p class="comment-form-author">
									<label for="author">Name <span class="required">*</span>
									</label>
									<input id="author" name="author" type="text" value="" size="30" maxlength="245" required="required">
								</p>
								<p class="comment-form-email">
									<label for="email">Email <span class="required">*</span>
									</label>
									<input id="email" name="email" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" required="required">
								</p>
								<p class="comment-form-url">
									<label for="url">Website</label>
									<input id="url" name="url" type="url" value="" size="30" maxlength="200">
								</p>
								<p class="comment-form-cookies-consent">
									<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes">
									<label for="wp-comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label>
								</p>
								<p class="form-submit">
									<input name="submit" type="submit" id="submit" class="submit" value="Post Comment">
									<input type="hidden" name="comment_post_ID" value="5822" id="comment_post_ID">
									<input type="hidden" name="comment_parent" id="comment_parent" value="0">
								</p>
							</form>
						</div>
					</div>
				</div-->
			</div>
		</div>
		<div class="contentclearfix clearfix"></div>
	</div>
	<div class="contentclearfix clearfix"></div>
</div>
@endsection

@section('scripts')
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js'></script>
<script>

jQuery(document).ready(function($) {

	// cache container
	var $filterContainer = $('#gridblock-container,#gridblock-container-blog,.thumbnails-grid-container');
	var AjaxPortfolio;
	var portfolio_height;
	var portfolio_width;
	var half_width;
	var image_height;
	var slideshow_active;
	var AutoStart;
	var ajax_image_height;
	var ajax_window_height;
	var $data;
		
	var ajaxLoading=0;
	var SlideStarted=false;

    //variables to confirm window height and width
    var lastWindowHeight = $(window).height();
    var lastWindowWidth = $(window).width();

	//Detect Orientaiton change
	window.onload = orientationchange;
	window.onorientationchange = orientationchange;
	jQuery(window).bind("resize", orientationchange);
	function orientationchange() {
		isotopeInit();
	}

    $(window).resize(function() {

		$('.thumbnails-grid-container').each(function() {
			$(this).find('.gridblock-element').removeClass('animation-action animated flipInX');
		});

        //confirm window was actually resized
        if($(window).height()!=lastWindowHeight || $(window).width()!=lastWindowWidth){

            //set this windows size
            lastWindowHeight = $(window).height();
            lastWindowWidth = $(window).width();

            //call my function
            if ($.fn.isotope) {
            	$filterContainer.isotope( 'layout' );
        	}

           	ajax_image_height=jQuery('.displayed-image').height();
			$('.ajax-image-selector').css({"height" : ajax_image_height + "px"});

        }
    });

	// Toggle - Show and Hide displayed portfolio showcase item
	jQuery("a.ajax-hide").click(
		function () {
			if ( jQuery(".ajax-gridblock-window").is(':animated') || jQuery(".ajax-gridblock-image-wrap").is(':animated') ) return;
			if (SlideStarted==false) {
				jQuery('.gridblock-ajax').eq(0).trigger('click');
			}
			$('.ajax-gridblock-block-wrap').toggleClass('ajax-collapsed');
			jQuery('.ajax-gridblock-window').slideToggle();
			return false;
		}
	);
	
	AjaxPortfolio = function(e) {
		// Initialize
	    var page = 1;
	    var loading = true;
		var loaded = false;
	    var $window = jQuery(window);
	    var $content = jQuery("body #ajax-gridblock-wrap");
	    var $contentData = jQuery("body #ajax-gridblock-content");
		var total = jQuery('#gridblock-container .gridblock-ajax').length;
		var index;
		var nextStatus=true;
		var prevStatus=true;
		
		var isiPhone = navigator.userAgent.toLowerCase().indexOf("iphone");
		var isiPad = navigator.userAgent.toLowerCase().indexOf("ipad");
		var isiPod = navigator.userAgent.toLowerCase().indexOf("ipod");

		var deviceAgent = navigator.userAgent.toLowerCase();
		var isIOS = deviceAgent.match(/(iphone|ipod|ipad)/);
		var ua = navigator.userAgent.toLowerCase();
		var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");

		var altTotal=total-1;


	jQuery(".gridblock-ajax").click(function(){

		//Get postID from rel attribute of link
		var postID = jQuery(this).attr("data-portfolioid");
		if(typeof postID === 'undefined') return;
	
		AutoStart=false;
		SlideStarted=true;

		if ( $(this).parent().hasClass('gridblock-displayed') ) {
			return false;
		}

		ajax_image_height=jQuery('.displayed-image').height();
		$('.ajax-image-selector').css({"height" : ajax_image_height + "px"});

		$('.ajax-gallery-navigation').fadeIn();
		$('span.ajax-loading').show();
		//Get this index
		index=jQuery(".gridblock-ajax").index(this);
		//Store the navigation ID as the current element
		jQuery('.ajax-gallery-navigation').attr('id', index);

		//Grab the current displayed ID
		var DisplayedID = jQuery('.ajax-gallery-navigation').attr("data-portfolioid");
		
		// Compare clicked and Displayed ID. Acts as Gatekeeper


		if (postID!=DisplayedID) {

			$('.ajax-gridblock-block-wrap').addClass('ajax-active');
			// Remove previous displayed set class
			jQuery('div').removeClass("gridblock-displayed");
		
			//Add portfolio post ID to attribute
			jQuery('.ajax-gallery-navigation').attr('data-portfolioid', postID);
		
			//Add the class to currently viewing
			jQuery( '[data-portfolio=portfolio-'+postID+']').addClass('gridblock-displayed');


			var filtered_total = $('#gridblock-container div:visible').length;
			var $got_current = $filterContainer.find(".gridblock-displayed");
			var $next_portfolio = $got_current.nextAll("div:visible").first();
			var $prev_portfolio = $got_current.prevAll("div:visible").first();

			if ($next_portfolio.length) {
				$('.ajax-next').removeClass('ajax-nav-disabled').css('cursor','pointer');
			} else {
				$('.ajax-next').addClass('ajax-nav-disabled').css('cursor','default');
			}
			if ($prev_portfolio.length) {
				$('.ajax-prev').removeClass('ajax-nav-disabled').css('cursor','pointer');
			} else {
				$('.ajax-prev').addClass('ajax-nav-disabled').css('cursor','default');
			}

			var sitewide = $('.top-menu-wrap').width();
			// If iphone then scroll to Ajax nav bar - otherwise top of page
			if(sitewide==470 || sitewide==758) {
				jQuery('html, body').stop().animate({
				    scrollTop: jQuery(".ajax-gridblock-block-wrap").offset().top - 20
				}, 1000);
			} else {
				jQuery('html, body').stop().animate({
				    scrollTop: jQuery(".ajax-gridblock-block-wrap").offset().top - 120
				}, 1000);
			}

			 function syncPosition(el) {
			     var current = this.currentItem;
			     $("#owl-ajax-2")
			         .find(".owl-item")
			         .removeClass("synced")
			         .eq(current)
			         .addClass("synced")
			     if ($("#owl-ajax-2").data("owlCarousel") !== undefined) {
			         center(current)
			     }
			 }

			 function center(number) {
			     var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
			     var num = number;
			     var found = false;
			     for (var i in sync2visible) {
			         if (num === sync2visible[i]) {
			             var found = true;
			         }
			     }

			     if (found === false) {
			         if (num > sync2visible[sync2visible.length - 1]) {
			             sync2.trigger("owl.goTo", num - sync2visible.length + 2)
			         } else {
			             if (num - 1 === -1) {
			                 num = 0;
			             }
			             sync2.trigger("owl.goTo", num);
			         }
			     } else if (num === sync2visible[sync2visible.length - 1]) {
			         sync2.trigger("owl.goTo", sync2visible[1])
			     } else if (num === sync2visible[0]) {
			         sync2.trigger("owl.goTo", num - 1)
			     }
			 }
			

				jQuery('#ajax-gridblock-loading').show();

				jQuery.ajax({
	                type: "post",
	                url: ajax_var.url,
	                data: "action=ajaxportfolio&post_id="+postID,
	                beforeSend : function(){
						ajax_window_height = $('#ajax-gridblock-content').height();
						$('.ajax-gridblock-window').css({'height': ajax_window_height + 'px'});

	                    jQuery("#ajax-gridblock-content").fadeOut('slow');
	                },
	                success    : function(data){
						loaded = true;
						jQuery('#ajax-gridblock-loading').hide();
						jQuery("#ajax-gridblock-content").remove();
						$('span.ajax-loading').hide();
	                    $data = $(data);

	                    if($data.length){

	                        $content.append($data);
							$('.ajax-gridblock-window').css({'height': 'auto'});

	                        jQuery('.ajax-gridblock-window').slideDown(500, function(){
								jQuery(".ajax-gridblock-image-wrap").fadeTo(100, 1);
								jQuery(".ajax-gridblock-data, .ajax-gridblock-contents-wrap").fadeIn();
								jQuery("#ajax-gridblock-content").fadeIn('slow');
	                            loading = false;
	                        });
							jQuery('.ajax-gridblock-image-wrap img').bind('load', function() {
								jQuery('.ajax-gridblock-image-wrap img').fadeTo(100, 1);
								//$('.ajax-portfolio-image-wrap').css({'background': 'none'});
							});
                            $("a[data-lightbox^='magnific-image-gallery']").magnificPopup({
                                type: 'image',
                                closeBtnInside: false,
                                fixedContentPos:true,
                                mainClass: 'mfp-zoom-in',
                                removalDelay: 300,
                                image: {
                                    verticalFit: true,
                                    titleSrc: function(item) {
                                        var caption = item.el.attr('title');

                                        var pinItURL = "http://pinterest.com/pin/create/bookmarklet/";
                                        pinItURL += '?url=' + window.location.href;
                                        pinItURL += '&media=' + item.el.attr('href');
                                        pinItURL += '&description=' + caption;
                                        var pinshare = '<a class="lightbox-share" href="'+pinItURL+'" target="_blank"><i class="fa fa-pinterest"></i></a>';

                                        var facebookURL = "http://www.facebook.com/sharer.php";
                                        facebookURL += '?u=' + item.el.attr('href');
                                        facebookURL += '&t=' + caption;
                                        var facebookshare = '<a class="lightbox-share" href="'+facebookURL+'" target="_blank"><i class="fa fa-facebook"></i></a>';

                                        var twitterURL = "http://twitter.com/intent/tweet?text=";
                                        twitterURL += caption;
                                        twitterURL += '+' + item.el.attr('href');
                                        var twittershare = '<a class="lightbox-share" href="'+twitterURL+'" target="_blank"><i class="fa fa-twitter"></i></a>';


                                        return caption + '<div class="maginific-lightbox-sharing">'+facebookshare+pinshare+twittershare+'</div>';
                                    }
                                },

                                gallery: {
                                    enabled: true,
                                    preload:	[1,1],
                                    arrowMarkup: '<span title="%title%" class="mfp-arrow mfp-arrow-%dir%"><i class="fa fa-angle-%dir% mfp-prevent-close"></i></span>',
                                    tCounter: '<span class="mfp-counter-inner">%curr% / %total%</span>'
                                },

                                callbacks: {
                                    open: function() {
                                        this.wrap.on('click.pinhandler', '.lightbox-share', function(e) {

                                            window.open(e.currentTarget.href, "intent", "scrollbars=yes,resizable=yes,toolbar=no,location=yes,width=550,height=420,left=" + (window.screen ? Math.round(screen.width / 2 - 275) : 50) + ",top=" + 100);

                                            return false;
                                        });

                                        if ($.fn.swipe) {
                                            $(".mfp-wrap").swipe({
                                                swipeLeft: function() {
                                                    $(".mfp-arrow-left").magnificPopup("next");
                                                },
                                                swipeRight: function() {
                                                    $(".mfp-arrow-right").magnificPopup("prev");
                                                }
                                            });
                                        }

                                        //overwrite default prev + next function. Add timeout for css3 crossfade animation
                                        $.magnificPopup.instance.next = function() {
                                            var self = this;
                                            self.wrap.removeClass('mfp-image-loaded');
                                            setTimeout(function() { $.magnificPopup.proto.next.call(self); }, 120);
                                        }
                                        $.magnificPopup.instance.prev = function() {
                                            var self = this;
                                            self.wrap.removeClass('mfp-image-loaded');
                                            setTimeout(function() { $.magnificPopup.proto.prev.call(self); }, 120);
                                        }
                                    },
                                    beforeClose: function() {
                                    this.wrap.off('click.pinhandler');
                                    },
                                    imageLoadComplete: function() 
                                    {	
                                        var self = this;
                                        setTimeout(function() { self.wrap.addClass('mfp-image-loaded'); }, 16);
                                    }
                                }
                            });

                            if ($.fn.waypoint) {

                                //Skill Bar
                                $('.skillbar').waypoint(function() {
                                    $('.skillbar').each(function(){
                                        percent = $(this).attr('data-percent');
                                        $(this).find('.skillbar-bar').animate({ 'width' : percent + '%' }, 3000, 'easeInOutExpo').addClass('progressed');
                                    });
                                }, { offset: '90%' });

                                $('.animation-standby').waypoint(function() {
                                    $(this).removeClass('animation-standby').addClass('animation-action');
                                }, { offset: '90%' });

                                $('.is-animated').waypoint(function() {
                                    $(this).removeClass('is-animated').addClass('element-animate');
                                }, { offset: '90%' });
                            }

                            var sync1 = $("#owl-ajax");
                            var sync2 = $("#owl-ajax-2");

                            sync1.owlCarousel({
                                singleItem: true,
                                slideSpeed: 500,
                                navigation: true,
                                autoHeight: true,
                                pagination: false,
                                afterAction: syncPosition,
                                navigationText : ["",""],
                                responsiveRefreshRate: 200,
                            });

                            sync2.owlCarousel({
                                items: 15,
                                itemsDesktop: [1199, 10],
                                itemsDesktopSmall: [979, 10],
                                itemsTablet: [768, 8],
                                itemsMobile: [479, 4],
                                pagination: false,
                                responsiveRefreshRate: 100,
                                afterInit: function(el) {
                                    el.find(".owl-item").eq(0).addClass("synced");
                                }
                            });

                            $("#owl-ajax-2").on("click", ".owl-item", function(e) {
                                e.preventDefault();
                                var number = $(this).data("owlItem");
                                sync1.trigger("owl.goTo", number);
                            });
	                    } else {
	                        jQuery('#ajax-gridblock-loading').hide();
	                    }
	                },
	                error: function(jqXHR, textStatus, errorThrown) {
	                    jQuery('#ajax-gridblock-loading').hide();
	                    alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
	                }
	        	});

			return false;
			}
		});
	
	}
	
	function AjaxNavigation() {

		// Next Clicked
		$('.ajax-next').click(function(){
			
			if ( $(".ajax-gridblock-window").is(':animated') || $(".ajax-gridblock-image-wrap").is(':animated') ) return;

			var $got_current = $filterContainer.find(".gridblock-displayed");
			var $next_portfolio = $got_current.nextAll("div:visible").first();
			
			if ($next_portfolio.length) {
				$next_portfolio.find(".gridblock-ajax").trigger('click');
			}

			$('.ajax-gridblock-block-wrap').removeClass('ajax-collapsed');
			
			return false;

		});

		// Clicked Prev	

		$('.ajax-prev').click(function(){
			
			if ( $(".ajax-gridblock-window").is(':animated') || $(".ajax-gridblock-image-wrap").is(':animated') ) return;

			var $got_current = $filterContainer.find(".gridblock-displayed");
			var $prev_portfolio = $got_current.prevAll("div:visible").first();

			$prev_portfolio.find(".gridblock-ajax").trigger('click');

			$('.ajax-gridblock-block-wrap').removeClass('ajax-collapsed');
			
			return false;
		});	
	}
	
	
	function isotopeInit() {
		// initialize isotope
		if ($.fn.isotope) {

			$filterContainer.imagesLoaded( function() {

			var itemReveal = Isotope.Item.prototype.reveal;
			Isotope.Item.prototype.reveal = function() {
			  itemReveal.apply( this, arguments );
			  $( this.element ).removeClass('isotope-hidden');
			};

			var itemHide = Isotope.Item.prototype.hide;
			Isotope.Item.prototype.hide = function() {
			  itemHide.apply( this, arguments );
			  $( this.element ).addClass('isotope-hidden');
			};
			
			if ( $($filterContainer).hasClass('gridblock-masonary') ) {

				var photow_window_width = $('.container-fluid').width();
				if ( photow_window_width === null ) {
					photow_window_width = $('.container-edge-to-edge').width();
				}
				var wallContainer_w = $($filterContainer).width()-0.5;

				number_of_columns = $($filterContainer).attr('data-columns');

				var fourcolumn = '23%',
				threecolumn = '31%',
				twocolumn = '48%',
				onecolumn = '99%';

				if ( $($filterContainer).hasClass('thumnails-gutter-active') ) {
					fourcolumn = '25%';
					threecolumn = '33.3333%';
					twocolumn = '50%';
					onecolumn = '100%';
					wallContainer_w = $($filterContainer).width()-0.5;
				}

				if (number_of_columns==4) {
					$($filterContainer).find('.gridblock-element').css('width',fourcolumn);
				}
				if (number_of_columns==3) {
					$($filterContainer).find('.gridblock-element').css('width',threecolumn);
				}
				if (number_of_columns==2) {
					$($filterContainer).find('.gridblock-element').css('width',twocolumn);
				}
				if (number_of_columns==1) {
					$($filterContainer).find('.gridblock-element').css('width',onecolumn);
				}

				if (photow_window_width < 1035 ) {
					number_of_columns = 3;
					$($filterContainer).find('.gridblock-element').css('width',threecolumn);
				}
				if (photow_window_width < 800 ) {
					number_of_columns = 2;
					$($filterContainer).find('.gridblock-element').css('width',twocolumn);
				}			
				if (photow_window_width < 500 ) {
					number_of_columns = 2;
					$($filterContainer).find('.gridblock-element').css('width',onecolumn);
				}

				//console.log(wallContainer_w , wallContainer_w / number_of_columns , number_of_columns );
				console.log( number_of_columns , photow_window_width , wallContainer_w );

				if ( $('body.rtl').length == 1 ) {
					$filterContainer.isotope({
						isOriginLeft: false,
						resizable: false, // disable normal resizing
					  	masonry: {
					    	gutterWidth: 0,
					    	columnWidth: wallContainer_w / number_of_columns
					  }
					});
				} else {
					$filterContainer.isotope({
						resizable: false, // disable normal resizing
					  	masonry: {
					    	gutterWidth: 0,
					    	columnWidth: wallContainer_w / number_of_columns
					  }
					});					
				}

			} else {
				if ( $('body.rtl').length == 1 ) {
					$filterContainer.isotope({
						isOriginLeft: false,
						animationEngine : 'best-available',
						layoutMode : 'fitRows',
						  masonry: {
						    gutterWidth: 0
						  }
					});
				} else {
					$filterContainer.isotope({
						animationEngine : 'best-available',
						layoutMode : 'fitRows',
						  masonry: {
						    gutterWidth: 0
						  }
					});
				}
			}
		});
		}
	}
	function isotopeClicks() {
		// filter items when filter link is clicked
		$('#gridblock-filters a').click(function(){
		  var selector = $(this).attr('data-filter');
		  var filter_title = $(this).attr('data-title');
		  $filterContainer.isotope({ filter: selector });

		  $('#gridblock-filters a').removeClass('is-active');
		  $(this).addClass('is-active');

			$('.gridblock-filter-wrap h2').text(filter_title);
			// Set index to zero and disable prev
			$('.ajax-gallery-navigation').attr('id', '-1');
			$('.ajax-prev').css('cursor','default');

		  return false;
		});
	}


	AjaxPortfolio();
	AjaxNavigation();
	isotopeInit();
	isotopeClicks();
	if ($.fn.isotope) {
		$filterContainer.imagesLoaded( function() {
	    $filterContainer.isotope( 'on', 'layoutComplete', function (isoInstance, laidOutItems) {
			$(".gridblock-element:not(.isotope-hidden) .column-gridblock-lightbox").magnificPopup({
	 	        type: 'image',
	 	        tLoading: '',
		        closeBtnInside: false,
		        fixedContentPos:true,
		        mainClass: 'mfp-zoom-in',
		        removalDelay: 300,
		        image: {
		            verticalFit: true,
		            titleSrc: function(item) {

		                        var caption = item.el.attr('title');

		                        var pinItURL = "http://pinterest.com/pin/create/bookmarklet/";
		                        pinItURL += '?url=' + window.location.href;
		                        pinItURL += '&media=' + item.el.attr('href');
		                        pinItURL += '&description=' + caption;
		                        var pinshare = '<a class="lightbox-share" href="'+pinItURL+'" target="_blank"><i class="fa fa-pinterest"></i></a>';

		                        var facebookURL = "http://www.facebook.com/sharer.php";
		                        facebookURL += '?u=' + item.el.attr('href');
		                        facebookURL += '&t=' + caption;
		                        var facebookshare = '<a class="lightbox-share" href="'+facebookURL+'" target="_blank"><i class="fa fa-facebook"></i></a>';

		                        var twitterURL = "http://twitter.com/intent/tweet?text=";
		                        twitterURL += caption;
		                        twitterURL += '+' + item.el.attr('href');
		                        var twittershare = '<a class="lightbox-share" href="'+twitterURL+'" target="_blank"><i class="fa fa-twitter"></i></a>';


		                        return caption + '<div class="maginific-lightbox-sharing">'+facebookshare+pinshare+twittershare+'</div>';
		            }
		        },

			    gallery: {
			      enabled: true,
			      preloader: true,
			      preload:	[1,1],
			      arrowMarkup: '<span title="%title%" class="mfp-arrow mfp-arrow-%dir%"><i class="fa fa-angle-%dir% mfp-prevent-close"></i></span>',
			      tCounter: '<span class="mfp-counter-inner">%curr% / %total%</span>'
			    },

			    callbacks: {
					open: function() {
						this.wrap.on('click.pinhandler', '.lightbox-share', function(e) {

						  window.open(e.currentTarget.href, "intent", "scrollbars=yes,resizable=yes,toolbar=no,location=yes,width=550,height=420,left=" + (window.screen ? Math.round(screen.width / 2 - 275) : 50) + ",top=" + 100);

						  return false;
						});

						if ($.fn.swipe) {
							$(".mfp-wrap").swipe({
							    swipeLeft: function() {
							    	$(".mfp-arrow-left").magnificPopup("next");
							    },
							    swipeRight: function() {
							    	$(".mfp-arrow-right").magnificPopup("prev");
							    }
							});
						}

						//overwrite default prev + next function. Add timeout for css3 crossfade animation
						$.magnificPopup.instance.next = function() {
							var self = this;
							self.wrap.removeClass('mfp-image-loaded');
							setTimeout(function() { $.magnificPopup.proto.next.call(self); }, 120);
						}
						$.magnificPopup.instance.prev = function() {
							var self = this;
							self.wrap.removeClass('mfp-image-loaded');
							setTimeout(function() { $.magnificPopup.proto.prev.call(self); }, 120);
						}
					},
					beforeClose: function() {
						this.wrap.off('click.pinhandler');
					},
					imageLoadComplete: function() 
					{	
						var self = this;
						setTimeout(function() { self.wrap.addClass('mfp-image-loaded'); }, 16);
					}
			    }

			});

			$(".gridblock-element:not(.isotope-hidden) a[data-lightbox^='magnific-image']").magnificPopup({
	 	        type: 'image',
	 	        tLoading: '',
		        closeBtnInside: false,
		        fixedContentPos:true,
		        mainClass: 'mfp-zoom-in',
		        removalDelay: 300,
		        image: {
		            verticalFit: true,
		            titleSrc: function(item) {

		                        var caption = item.el.attr('title');

		                        var pinItURL = "http://pinterest.com/pin/create/bookmarklet/";
		                        pinItURL += '?url=' + window.location.href;
		                        pinItURL += '&media=' + item.el.attr('href');
		                        pinItURL += '&description=' + caption;
		                        var pinshare = '<a class="lightbox-share" href="'+pinItURL+'" target="_blank"><i class="fa fa-pinterest"></i></a>';

		                        var facebookURL = "http://www.facebook.com/sharer.php";
		                        facebookURL += '?u=' + item.el.attr('href');
		                        facebookURL += '&t=' + caption;
		                        var facebookshare = '<a class="lightbox-share" href="'+facebookURL+'" target="_blank"><i class="fa fa-facebook"></i></a>';

		                        var twitterURL = "http://twitter.com/intent/tweet?text=";
		                        twitterURL += caption;
		                        twitterURL += '+' + item.el.attr('href');
		                        var twittershare = '<a class="lightbox-share" href="'+twitterURL+'" target="_blank"><i class="fa fa-twitter"></i></a>';


		                        return caption + '<div class="maginific-lightbox-sharing">'+facebookshare+pinshare+twittershare+'</div>';
		            }
		        },

			    gallery: {
			      enabled: true,
			      preloader: true,
			      preload:	[1,1],
			      arrowMarkup: '<span title="%title%" class="mfp-arrow mfp-arrow-%dir%"><i class="fa fa-angle-%dir% mfp-prevent-close"></i></span>',
			      tCounter: '<span class="mfp-counter-inner">%curr% / %total%</span>'
			    },

			    callbacks: {
					open: function() {
						this.wrap.on('click.pinhandler', '.lightbox-share', function(e) {

						  window.open(e.currentTarget.href, "intent", "scrollbars=yes,resizable=yes,toolbar=no,location=yes,width=550,height=420,left=" + (window.screen ? Math.round(screen.width / 2 - 275) : 50) + ",top=" + 100);

						  return false;
						});

						if ($.fn.swipe) {
							$(".mfp-wrap").swipe({
							    swipeLeft: function() {
							    	$(".mfp-arrow-left").magnificPopup("next");
							    },
							    swipeRight: function() {
							    	$(".mfp-arrow-right").magnificPopup("prev");
							    }
							});
						}

						//overwrite default prev + next function. Add timeout for css3 crossfade animation
						$.magnificPopup.instance.next = function() {
							var self = this;
							self.wrap.removeClass('mfp-image-loaded');
							setTimeout(function() { $.magnificPopup.proto.next.call(self); }, 120);
						}
						$.magnificPopup.instance.prev = function() {
							var self = this;
							self.wrap.removeClass('mfp-image-loaded');
							setTimeout(function() { $.magnificPopup.proto.prev.call(self); }, 120);
						}
					},
					beforeClose: function() {
						this.wrap.off('click.pinhandler');
					},
					imageLoadComplete: function() 
					{	
						var self = this;
						setTimeout(function() { self.wrap.addClass('mfp-image-loaded'); }, 16);
					}
			    }

			});
	    });
	    });
	}
});

</script>
@endsection