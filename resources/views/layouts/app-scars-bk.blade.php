
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
	@if(request()->route()->getName() != "contact.index")
	@endif
	<!--
	-->

	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<!--
    <link rel='stylesheet' id='MainStyle-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/style.css?ver=screen' type='text/css' media='all' />
    <link rel='stylesheet' id='verticalmenuCSS-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/css/verticalmenu.css?ver=5.3.2' type='text/css' media='screen' />
	-->
    <!--
    <link rel='stylesheet' id='videoJSCSS-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/videojs/video-js.css?ver=5.3.2' type='text/css' media='screen' />
    <link rel='stylesheet' id='demo_css-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/framework/demopanel/demo.panel.css?ver=5.3.2' type='text/css' media='screen' />
    <link rel='stylesheet' id='owlcarousel_css-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/css/owlcarousel/owl.carousel.css?ver=5.3.2' type='text/css' media='screen' />
    -->
    <!--
    <link rel='stylesheet' id='magnific_lightbox-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/css/magnific/magnific-popup.css?ver=5.3.2' type='text/css' media='screen' />
    <link rel='stylesheet' id='MainStyle-Light-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/style-light.css?ver=screen' type='text/css' media='all' />
	<link rel='stylesheet' id='css_jplayer-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/css/html5player/jplayer.dark.css?ver=5.3.2' type='text/css' media='screen' />
    -->
    <link rel='stylesheet' id='supersized_CSS-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/css/supersized/supersized.css?ver=5.3.2' type='text/css' media='screen' />
	<!--
	<link href="https://pagecdn.io/plugin/wp-wp-supersized/3.1.6/css/supersized.core.css" rel="stylesheet" crossorigin="anonymous"  >
	<link href="https://pagecdn.io/plugin/wp-wp-supersized/3.1.6/css/supersized.flickr.css" rel="stylesheet" crossorigin="anonymous"  >
	<link href="https://pagecdn.io/plugin/wp-wp-supersized/3.1.6/css/supersized.css" rel="stylesheet" crossorigin="anonymous"  >
	<link href="https://pagecdn.io/plugin/wp-wp-supersized/3.1.6/theme/supersized.shutter.css" rel="stylesheet" crossorigin="anonymous"  >
	-->

	<link rel='stylesheet' id='fontAwesome-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/css/fonts/font-awesome/css/font-awesome.min.css?ver=5.3.3' type='text/css' media='screen' />
	<link rel='stylesheet' id='etFonts-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/css/fonts/et-fonts/et-fonts.css?ver=5.3.3' type='text/css' media='screen' />
	<link rel='stylesheet' id='featherFonts-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/css/fonts/feather-webfont/feather.css?ver=5.3.3' type='text/css' media='screen' />
	<link rel='stylesheet' id='lineFonts-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/css/fonts/fontello/css/fontello.css?ver=5.3.3' type='text/css' media='screen' />
	<link rel='stylesheet' id='simepleLineFont-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/css/fonts/simple-line-icons/simple-line-icons.css?ver=5.3.3' type='text/css' media='screen' />

    <link rel='stylesheet' id='mtheme-ie-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/css/ie.css?ver=5.3.2' type='text/css' media='all' />
    <link rel='stylesheet' id='kinetika-fonts-css'  href='//fonts.googleapis.com/css?family=Lato%3A100%2C100i%2C300%2C300i%2C400%2C400i%2C700%2C700i%2C900%2C900i%7CCrimson%2BText%3A400%2C400italic%2C600%2C600italic%2C700%2C700italic%7CPT+Mono&#038;ver=1.0.0' type='text/css' media='all' />
	<!--
    <link rel='stylesheet' id='ResponsiveCSS-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/css/responsive.css?ver=5.3.2' type='text/css' media='screen' />
	
	<link rel="stylesheet" media="screen" href="//assetcdn.500px.org/assets/galleries-ec25d7bbd248e574f22da22d99029975.css" />
	-->

	<style>
		body {
			background-color: white; !important;
		}
	</style>

<!--
    <script type='text/javascript' src='https://imaginem.io/kinetika/wp-includes/js/jquery/jquery.js?ver=1.12.4-wp'></script>
    <script type='text/javascript' src='https://imaginem.io/kinetika/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>
    <script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/pace.min.js'></script>
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

		<style>
     	/*html, body {
			height: 100%;
			width: 100%;
			left: 0;
			top: 0;
			overflow: hidden;
			position: fixed; 
        }
		.fill {
			height: 100%;
			width: 100%;
			max-height: 100vh;
			max-width: 100vh;
			object-fit: contain;
		}

		*/
		</style>
	
    @yield('css')
</head>
<!--Portfolio-->
<body>
<script>
	//var _default = "page-template-default page page-id-5832 page-child parent-pageid-5820 theme-kinetika woocommerce-no-js single-author theme-is-light demo boxed-site-layout left-logo page-is-not-fullscreen no-title-background pagebuilder-active theme-fullwidth body-dashboard-push footer-is-on nosidebar";

	var _default = [
		"page-template-default",
		"page",
		"page-id-5832",
		"page-child",
		"parent-pageid-5820",
		"theme-kinetika",
		"woocommerce-no-js",
		"single-author",
		"theme-is-light",
		"demo",
		"boxed-site-layout",
		"left-logo",
		"page-is-not-fullscreen",
		"no-title-background",
		"pagebuilder-active",
		"theme-fullwidth",
		"body-dashboard-push",
		"footer-is-on",
		"nosidebar",
	];
	var portfolio = [
		"page-template",
		"page-template-template-bloglist",
		"page-template-template-bloglist-php",
		"page",
		"page-id-5929",
		"page-parent",
		"theme-kinetika",
		"woocommerce-no-js",
		"single-author",
		"theme-is-light",
		"demo",
		"middle-logo",
		"page-is-not-fullscreen",
		"no-title-background",
		"theme-fullwidth",
		"body-dashboard-push",
		"footer-is-on",
		"rightsidebar"
	];
	var contato  = [
		"page-template",
		"page-template-template-fullpage",
		"page-template-template-fullpage-php",
		"page",
		//"page-id-5896",
		//"page-child",
		//"parent-pageid-5855",
		"theme-kinetika",
		"woocommerce-no-js",
		"single-author",
		"theme-is-light",
		"demo",
		"middle-logo",
		"page-is-not-fullscreen",
		"no-title-background",
		//"pagebuilder-active",
		"theme-fullwidth",
		"body-dashboard-push",
		"footer-is-on",
		"rightsidebar"
	];
	var common = [
		"page-template",
		"page",
		//"theme-kinetika",
		//"woocommerce-no-js",
		"single-author",
		"theme-is-light",
		"demo",
		"middle-logo",
		//."page-is-not-fullscreen",
		"no-title-background",
		"theme-fullwidth",
		"body-dashboard-push",
		"footer-is-on",
		"rightsidebar",
	];
	var z = portfolio.filter((val) => {
		return contato.indexOf(val) != -1;
	});

	//var arr = z.join(" ").split(" ");
	var _def = `[\n`;
 	z.forEach(item => {
		_def += `\t"${item}",\n`;
	});
	_def += "];\n";
	//console.log(_def);
	var diff = $(portfolio).not(contato).get();
	//console.log(diff);
	/*common = common.concat([
		"page-template-template-fullpage",
		"page-template-template-fullpage-php"
	]);*/
	console.log(common);
	//$("body").addClass(portfolio.join(" "));
	$("body").addClass(common.join(" "));
</script>
<div id="app">
	@include('includes.header')
	<div class="container-wrapper container-fullwidth">
		@yield('content')
	</div>
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
-->
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js'></script>
<!--
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/jquery.easing.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var ajax_var = {"url":"https:\/\/imaginem.io\/kinetika\/wp-admin\/admin-ajax.php","nonce":"6e4357b0cb"};
/* ]]> */
</script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/page-elements.js'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/jquery.fitvids.js'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/jquery.stellar.min.js'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/waypoints/waypoints.min.js'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/imagesloaded.pkgd.min.js'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-includes/js/hoverIntent.min.js?ver=1.8.1'></script>
-->
<script type='text/javascript' src='https://code.jquery.com/ui/1.12.0/jquery-ui.min.js'></script>
<!--
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/modernizr.custom.47002.js'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/classie.js'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/jquery.stickymenu.js'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/stickySidebar.js'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/magnific/jquery.magnific-popup.min.js'></script>
-->
<script type='text/javascript' src="{{ asset('js/common.js') }}"></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/owlcarousel/owl.carousel.min.js'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/html5player/jquery.jplayer.min.js'></script>
<!--
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/supersized/supersized.3.2.7.min.js'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/supersized/supersized.shutter.js'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-includes/js/wp-embed.min.js?ver=5.3.2'></script>
-->

<script>
$(document).ready(function(){
	let r = ResponsiveMobileMenu();
	r.init();
	let stickMenu = StickyMenu();
	stickMenu.init();
});
let t = Tooltip();
t.init();
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