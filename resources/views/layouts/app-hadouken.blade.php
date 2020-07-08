
<!DOCTYPE html>
<html class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel='dns-prefetch' href='//fonts.googleapis.com' />
    <link rel='dns-prefetch' href='//s.w.org' />
    <link href='https://fonts.gstatic.com' crossorigin rel='preconnect' />
    <!--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/justifiedGallery/3.7.0/css/justifiedGallery.min.css" />
    -->
    <!-- Styles -->
    <!--
    <link rel='stylesheet' id='wp-block-library-css'  href='https://www.mybarcelonaphotographer.com/wp-includes/css/dist/block-library/style.min.css?ver=5.4.1' type='text/css' media='all' />
<link rel='stylesheet' id='contact-form-7-css'  href='https://www.mybarcelonaphotographer.com/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.1.7' type='text/css' media='all' />
<link rel='stylesheet' id='rs-plugin-settings-css'  href='https://www.mybarcelonaphotographer.com/wp-content/plugins/revslider/public/assets/css/rs6.css?ver=6.1.0' type='text/css' media='all' />
<style id='rs-plugin-settings-inline-css' type='text/css'>
#rs-demo-id {}
</style>
-->
<link rel='stylesheet' id='kinatrix-MainStyle-css'  href='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/style.css?ver=screen' type='text/css' media='all' />
<!--
<link rel='stylesheet' id='owlcarousel-css'  href='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/css/owlcarousel/owl.carousel.css?ver=5.4.1' type='text/css' media='screen' />
<link rel='stylesheet' id='lightgallery-css'  href='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/js/lightbox/css/lightgallery.css?ver=5.4.1' type='text/css' media='screen' />
<link rel='stylesheet' id='lightgallery-transitions-css'  href='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/js/lightbox/css/lg-transitions.min.css?ver=5.4.1' type='text/css' media='screen' />
-->
<link rel='stylesheet' id='kinatrix-Animations-css'  href='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/css/animations.css?ver=5.4.1' type='text/css' media='screen' />

<!--
<link rel='stylesheet' id='supersized-css'  href='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/css/supersized/supersized.css?ver=5.4.1' type='text/css' media='screen' />
<link rel='stylesheet' id='kinatrix-ResponsiveCSS-css'  href='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/css/responsive.css?ver=5.4.1' type='text/css' media='screen' />
<style id='kinatrix-ResponsiveCSS-inline-css' type='text/css'>
.sidebarinfo-menu { background-color:rgba(104,104,104, 0.95); }.sidebarinfo-menu:before { background-image: url(http://kinatrix.imaginem.co/wp-content/uploads/sites/24/2018/03/background-dashboard-3.jpg); }.menu-is-horizontal .logo img { height: 28px; }.menu-is-horizontal .logo img { top: 34px; }.vertical-logoimage { width: 300px; }
</style>
-->
	<script>
    let Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
        'apiToken' => $currentUser->api_token ?? null,
        '_BASE_URL' => URL::to('/')
    ]) !!};
    </script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<!--
	<script src="//assetcdn.500px.org/packs/application-7cb28698962943ac9c0a.js"></script>
	-->

	<script src="{{ asset('js/app.js') }}" defer></script>


	
    @yield('css')
</head>
<!--Portfolio-->
<body class="page-template-default page page-id-128 page-child parent-pageid-120 fullscreen-mode-off page-has-full-background rightclick-block single-author theme-is-light left-logo menu-is-horizontal page-is-not-fullscreen fullscreen-ui-switchable header-type-overlay page-is-opaque theme-fullwidth body-dashboard-push footer-is-off pagebuilder-active edge-to-edge">
<div id="app">
	@include('includes.header')
        @include('samples.contact')
</div>
<!--
	<script type="text/javascript">
		var c = document.body.className;
		c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
		document.body.className = c;
	</script>
	<script type='text/javascript'>
/* <![CDATA[ */
var wpcf7 = {"apiSettings":{"root":"https:\/\/imaginem.io\/kinetika\/wp-json\/contact-form-7\/v1","namespace":"contact-form-7\/v1"}};
/* ]]> */
</script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=5.1.7'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js?ver=2.70'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wc_add_to_cart_params = {"ajax_url":"\/kinetika\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/kinetika\/?wc-ajax=%%endpoint%%","i18n_view_cart":"View cart","cart_url":"https:\/\/imaginem.io\/kinetika\/cart\/?menu_type=boxed-left","is_cart":"","cart_redirect_after_add":"no"};
/* ]]> */
</script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=3.8.0'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min.js?ver=2.1.4'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var woocommerce_params = {"ajax_url":"\/kinetika\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/kinetika\/?wc-ajax=%%endpoint%%"};
/* ]]> */
</script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js?ver=3.8.0'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wc_cart_fragments_params = {"ajax_url":"\/kinetika\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/kinetika\/?wc-ajax=%%endpoint%%","cart_hash_key":"wc_cart_hash_858bc94740ea5e479295c10dde39b09d","fragment_name":"wc_fragments_858bc94740ea5e479295c10dde39b09d","request_timeout":"5000"};
/* ]]> */
</script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js?ver=3.8.0'></script>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js'></script>
-->
<!--
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/menu/verticalmenu.js'></script>
-->
<!--
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/videojs/video.js'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/jquery.touchSwipe.min.js'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/framework/demopanel/js/demo-panel.js'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/menu/superfish.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var kinatrix_vars = {"mtheme_uri":"https:\/\/www.mybarcelonaphotographer.com\/wp-content\/themes\/kinatrix","lightbox_thumbnails":"false","lightbox_transition":"lg-slide"};
/* ]]> */
</script>
<script type='text/javascript'>
/* <![CDATA[ */
var wpcf7 = {"apiSettings":{"root":"https:\/\/www.mybarcelonaphotographer.com\/wp-json\/contact-form-7\/v1","namespace":"contact-form-7\/v1"}};
/* ]]> */
</script>
-->

<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=5.1.7'></script>
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/js/velocity.min.js'></script>
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/js/velocity.ui.js'></script>
<!--
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/js/menu/verticalmenu.js'></script>

<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/js/menu/superfish.js'></script>
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/js/jquery.stickymenu.js'></script>
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/js/jquery.easing.min.js'></script>

<script type='text/javascript'>
/* <![CDATA[ */
var ajax_var = {"url":"https:\/\/www.mybarcelonaphotographer.com\/wp-admin\/admin-ajax.php","nonce":"c5c9dffcfd"};
/* ]]> */
</script>
    -->

<script type='text/javascript' src="{{ asset('js/page-elements.js') }}"></script>


<!--
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/js/jquery.fitvids.js'></script>
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/js/lazysizes.min.js'></script>
-->
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/js/waypoints/waypoints.min.js'></script>
<!--
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-includes/js/imagesloaded.min.js?ver=3.2.0'></script>
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-includes/js/hoverIntent.min.js?ver=1.8.1'></script>
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-includes/js/jquery/ui/core.min.js?ver=1.11.4'></script>
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-includes/js/jquery/ui/widget.min.js?ver=1.11.4'></script>
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-includes/js/jquery/ui/position.min.js?ver=1.11.4'></script>

<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-includes/js/jquery/ui/tooltip.min.js?ver=1.11.4'></script>

<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/js/owlcarousel/owl.carousel.min.js'></script>
-->
<!--
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/js/modernizr.custom.47002.js'></script>
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/js/jquery.gridrotator.js'></script>
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/js/classie.js'></script>
-->
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/js/jarallax/jarallax.js'></script>
<!--
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/js/lightbox/js/lightgallery-all.min.js'></script>
    -->

<script type='text/javascript' src="{{ asset('js/common2.js') }}"></script>
<!--

<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/js/tilt.jquery.js'></script>
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/js/supersized/supersized.3.2.7.min.js'></script>
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/js/supersized/supersized.shutter.js'></script>
<script type='text/javascript'>
		jQuery(function($){	
			jQuery.supersized({
				slideshow               :   1,
				autoplay				:	1,
				start_slide             :   1,
				image_path				:	'https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/images/supersized/',
				stop_loop				:	0,
				random					: 	0,
				slide_interval          :   8000,
				transition              :   1,
				transition_speed		:	1000,
				new_window				:	0,
				pause_hover             :   0,
				keyboard_nav            :   1,
				performance				:	2,
				image_protect			:	0,			   
				min_width		        :   0,
				min_height		        :   0,
				vertical_center         :   1,
				horizontal_center       :   1,
				fit_always				:	0,
				fit_portrait         	:   0,
				fit_landscape			:   0,
				slide_links				:	'blank',
				thumb_links				:	1,
				thumbnail_navigation    :   0,
				slides 					:  	[
		{image : 'https://www.mybarcelonaphotographer.com/wp-content/uploads/fullscreen-main-1.jpg', title : '<div class="fullscreen-slideshow-color" data-color="bright"></div>', thumb : '', url : ''},{image : 'https://www.mybarcelonaphotographer.com/wp-content/uploads/fullscreen-img-6.jpg', title : '<div class="fullscreen-slideshow-color" data-color="dark"></div>', thumb : '', url : ''},{image : 'https://www.mybarcelonaphotographer.com/wp-content/uploads/fullscreen-img-4.jpg', title : '<div class="fullscreen-slideshow-color" data-color="bright"></div>', thumb : '', url : ''},{image : 'https://www.mybarcelonaphotographer.com/wp-content/uploads/fullscreen-img-3.jpg', title : '<div class="fullscreen-slideshow-color" data-color="dark"></div>', thumb : '', url : ''},{image : 'https://www.mybarcelonaphotographer.com/wp-content/uploads/fullscreen-img-2.jpg', title : '<div class="fullscreen-slideshow-color" data-color="bright"></div>', thumb : '', url : ''}				],
				progress_bar			:	1,					
				mouse_scrub				:	1
			});
			if ($.fn.swipe) {
				jQuery(".page-is-fullscreen #supersized,.page-is-not-fullscreen #supersized").swipe({
				  excludedElements: "button, input, select, textarea, .noSwipe",
				  swipeLeft: function() {
				    jQuery("#nextslide").trigger("click");
				  },
				  swipeRight: function() {
				    jQuery("#prevslide").trigger("click");
				  }
				});
			}
		});
</script>
    -->

    <!--
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/js/jquery.touchSwipe.min.js'></script>
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-includes/js/wp-embed.min.js?ver=5.4.1'></script>
<script type='text/javascript' src='https://maps.google.com/maps/api/js?key='></script>
    -->
<script>
$(document).ready(function(){
	let r = ResponsiveMobileMenu();
	r.init();
	let stickMenu = StickyMenu();
	stickMenu.init();
});
//let t = Tooltip();
//t.init();
function ResponsiveMobileMenu(){
	let settings = {
		collapsed: true, // Start with collapsed menu (only level 1 items visible)
		close_same_level: false, // Close elements on same level when opening new node.
		duration: 200 // Animation duration should be tweaked according to easing.
	};

	let init = function(){
		if($('ul.mtree').length) { 
			// Set initial styles 
			$('.mtree ul').css({
				'overflow': 'hidden', 
				'height': (settings.collapsed) ? 0 : 'auto', 
				'display': (settings.collapsed) ? 'none' : 'block' 
			});
			
			// Get node elements, and add classes for styling
			const node = $('.mtree li:has(ul)');  
			node.each(function(index, val) {
				let $this = $(this);
				$this.children(':first-child').css('cursor', 'pointer')
				$this.addClass('mtree-node mtree-' + ((settings.collapsed) ? 'closed' : 'open'));
				$this.children('ul').addClass('mtree-level-' + ($this.parentsUntil($('ul.mtree'), 'ul').length + 1));
			});
			
			// Set mtree-active class on list items for last opened element
			$('.mtree li > *:first-child').on('click.mtree-active', function(e){
				let $this = $(this);
				if($this.parent().hasClass('mtree-closed')) {
					$('.mtree-active').not($this.parent()).removeClass('mtree-active');
					$this.parent().addClass('mtree-active');
				} else if($this.parent().hasClass('mtree-open')){
					$this.parent().removeClass('mtree-active'); 
				} else {
					$('.mtree-active').not($this.parent()).removeClass('mtree-active');
					$this.parent().toggleClass('mtree-active'); 
				}
			});

			node.children(':first-child').on('click.mtree', function(e){
				const $this = $(this);
				const el = $this.parent().children('ul').first();
				let isOpen = $this.parent().hasClass('mtree-open');
				
				// close other elements on same level if opening 
				if((settings.close_same_level || $('.csl').hasClass('active')) && !isOpen) {
					const close_items = $this.closest('ul').children('.mtree-open').not($this.parent()).children('ul');
					close_items.delay(100).slideToggle(settings.duration, function(){
						setNodeClass($this.parent(), true);
					});
				}
				
				el.css({
					'height': 'auto'
				}); 
		
				setNodeClass($this.parent(), isOpen);
				el.slideToggle(settings.duration);
				e.preventDefault();
			});
			
			// Function for updating node class
			function setNodeClass(el, isOpen) {
				el.removeClass('mtree-closed').addClass('mtree-open');
			}
			
			if($('.mtree').css('opacity') == 0) {
				$('.mtree').show(200);
			}
		}
	};

	return {
		init: init
	};
}
function StickyMenu(){
	var stickyNavTop = 10;
	var stickyzone = '.stickymenu-zone';
	var stickyNav = function(){
		var scrollTop = $(window).scrollTop();
			
		if (scrollTop > stickyNavTop) { 
			$(stickyzone).addClass('sticky-menu-activate');
			$('body').addClass('sticky-menu-on');
		} else {
			$(stickyzone).removeClass('sticky-menu-activate'); 
			$('body').removeClass('sticky-menu-on');
		}
	};
	return {
		init: function(){
			stickyNav();
			$(window).scroll(function() {
				stickyNav();
			});
		}
	}
}
function Tooltip(){
	let init = function(){
		$(".ntips").tooltip({
			position: { 
				my: "center bottom+40",
				at: "center bottom"
			},
			show: {
				effect: "fade",
				delay: 5
			}
		});	
		$(".stips").tooltip({
			position: { 
				my: "center top",
				at: "center top"
			},
			show: {
				effect: "fade",
				delay: 5
			}
		});
	}

	return {
		init: init
	};
}
</script>
@yield('scripts')
</body>
</html>