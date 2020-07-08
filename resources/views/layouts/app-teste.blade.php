
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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	-->

	<link rel='stylesheet' id='kinatrix-MainStyle-css'  href='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/style.css?ver=screen' type='text/css' media='all' />
	<link rel='stylesheet' id='kinatrix-Animations-css'  href='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/css/animations.css?ver=5.4.1' type='text/css' media='screen' />
	<link rel='stylesheet' id='contact-form-7-css'  href='https://imaginem.cloud/kinatrix/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.1.7' type='text/css' media='all' />
	<link rel='stylesheet' id='kinatrix-ResponsiveCSS-css'  href='https://imaginem.cloud/kinatrix/wp-content/themes/kinatrix/css/responsive.css?ver=5.4.1' type='text/css' media='screen' />

    <link rel='stylesheet' id='supersized_CSS-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/css/supersized/supersized.css?ver=5.3.2' type='text/css' media='screen' />
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
        .Masthead-hadouken  {
            z-index: 999999;

        }
        
		</style>
	
    @yield('css')
</head>
<!--Portfolio-->
<body>
<script>
	//var _default = "page-template-default page page-id-5832 page-child parent-pageid-5820 theme-kinetika woocommerce-no-js single-author theme-is-light demo boxed-site-layout left-logo page-is-not-fullscreen no-title-background pagebuilder-active theme-fullwidth body-dashboard-push footer-is-on nosidebar";
	//var _d = 'page-template-default page page-id-128 page-child parent-pageid-120 fullscreen-mode-off page-has-full-background rightclick-block single-author theme-is-light left-logo menu-is-horizontal page-is-not-fullscreen fullscreen-ui-switchable header-type-overlay page-is-opaque theme-fullwidth body-dashboard-push footer-is-off pagebuilder-active edge-to-edge';
	var _d = "page-template page-template-template-fullpage page-template-template-fullpage-php page page-id-5857 page-child parent-pageid-5855 theme-kinetika woocommerce-js single-author theme-is-light demo middle-logo page-is-not-fullscreen no-title-background pagebuilder-active theme-fullwidth body-dashboard-push footer-is-on nosidebar pace-done pace-done sticky-menu-on"; 
	_d = _d.split(" ");

	var _def = `[\n`;
	_d.forEach(item => {
		_def += `\t"${item}",\n`;
	});
	_def += "];\n";
	console.log(_def);
	var _contact = [
		"page-template-default",
		"page",
		"page-id-128",
		"page-child",
		"parent-pageid-120",
		"fullscreen-mode-off",
		"page-has-full-background",
		"rightclick-block",
		"single-author",
		"theme-is-light",
		"left-logo",
		"menu-is-horizontal",
		"page-is-not-fullscreen",
		"fullscreen-ui-switchable",
		"header-type-overlay",
		"page-is-opaque",
		"theme-fullwidth",
		"body-dashboard-push",
		"footer-is-off",
		"pagebuilder-active",
		"edge-to-edge",
	];

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

	var _def = `[\n`;
 	z.forEach(item => {
		_def += `\t"${item}",\n`;
	});
	_def += "];\n";
	//var diff = $(portfolio).not(contato).get();
	var diff = $(common).not(_contact).get();
	var dupl = common.filter((val) => {
		return _contact.indexOf(val) != -1;
	});
	console.log(dupl, diff);
	//$("body").removeClass();
	//$("body").addClass(common.join(" "));
	//$("body").addClass(_contact.join(" "));
	//alert("{{ url()->current() }}")

	//console.log(_contact.join(""));
	
</script>    
<div id="app">
            <parallax container-class="Masthead-hadouken">
                <img src="https://imaginem.cloud/kinatrix/wp-content/uploads/sites/30/2018/03/header-7.jpg" alt="very cool bg">
            </parallax>    
        <div id="home" class="container-wrapper container-fullwidth">
            <div class="horizontal-menu-body-container">
                <div class="title-container-outer-wrap">
                    <div class="title-container-wrap">
                        <div class="title-container clearfix">
                            <div class="entry-title-wrap">
                                <h1 class="entry-title">Contact us</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container clearfix">
                    <div class="page-contents-wrap  ">
                        <div id="post-128" class="post-128 page type-page status-publish hentry">
                            <div class="entry-page-wrapper entry-content clearfix">
                                <div id="mtheme-pagebuilder-wrapper-128" class="mtheme-pagebuilder">
                                    <div id="builder-column-2"  class="mtheme-modular-column  modular-column-class-2  modular-column-has-side-padding modular-column-has-side-padding-in-percent column-parallax"  style="margin-bottom:66px;margin-top:66px;padding-left:10%;padding-right:10%; ">
                                        <div class="mtheme-supercell clearfix  boxed-column">
                                            <div class="mtheme-supercell-inner clearfix">
                                                <div class="column-setter first-column span12">
                                                    <div class="mtheme-cell-wrap" >
                                                        <div id="mtheme-block-2" class="mtheme-block mtheme-block-em_column_block span12 mtheme-first-cell " data-width="12">
                                                            <div class="mtheme-cell-inner">
                                                                <div class="row clearfix">
                                                                    <div class="mtheme-cell-wrap" >
                                                                        <div id="mtheme-block-3" class="mtheme-block mtheme-block-em_multiheadline span12 mtheme-first-cell " data-width="12">
                                                                            <div class="mtheme-cell-inner">
                                                                                <div class="multi-headlines-outer" style="margin-bottom:38px;">
                                                                                    <div class="multi-headlines-wrap">
                                                                                        <div class="multi-headlines animation-multiheadline-standby animated fadeInUpMulti">
                                                                                            <h1 style="text-align: center;">Contact us</h1>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="multi-headlines-wrap">
                                                                                        <div class="multi-headlines animation-multiheadline-standby animated fadeInUpMulti">
                                                                                            <h3 style="text-align: center;">We&#039;ll be glad to hear from you</h3>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="mtheme-cell-wrap" >
                                                                        <div id="mtheme-block-4" class="mtheme-block mtheme-block-em_displayrichtext span12 mtheme-first-cell " data-width="12">
                                                                            <div class="mtheme-cell-inner">
                                                                                <div class="animation-standby animated none">
                                                                                    <p style="text-align: center;">198  West 21th Street, Suite 721
                                                                                        <br />
                                                                                        New York, NY 10010
                                                                                        <br />
                                                                                        Email: 
                                                                                        <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c5bcaab0b7a0a8a4aca985bcaab0b7a1aaa8a4acabeba6aaa8">[email&#160;protected]</a>
                                                                                        <br />
                                                                                        Phone: +88 (0) 101 0000 000
                                                                                        <br />
                                                                                        Fax: +88 (0) 202 0000 001
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="mtheme-cell-wrap" >
                                                                        <div id="mtheme-block-5" class="mtheme-block mtheme-block-em_dividers span12 mtheme-first-cell " data-width="12">
                                                                            <div class="mtheme-cell-inner">
                                                                                <div class="clearfix divider-common default-divider  divider-blank" style="padding-top:32px;"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="mtheme-cell-wrap" >
                                                                        <div id="mtheme-block-6" class="mtheme-block mtheme-block-em_dividers span2 mtheme-first-cell " data-width="2">
                                                                            <div class="mtheme-cell-inner">
                                                                                <div class="clearfix divider-common default-divider  divider-blank" style="padding-top:10px;"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mtheme-cell-wrap" >
                                                                        <div id="mtheme-block-7" class="mtheme-block mtheme-block-em_displayshortcode span8 mtheme-following-cell " data-width="8">
                                                                            <div class="mtheme-cell-inner">
                                                                                <div role="form" class="wpcf7" id="wpcf7-f340-p128-o1" lang="en-US" dir="ltr">
                                                                                    <div class="screen-reader-response"></div>
                                                                                    
                                                                                    


                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .entry-content -->
                    </div>
                </div>
                <div class="footer-container-wrap clearfix">
                    <div class="footer-end clearfix">
                        <div class="footer-logo">
                            <img class="footer-logo-image" src="https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/images/logo_responsive.png" alt="footer-logo" />
                        </div>
                        <div id="copyright" class="footer-container">
                            <ul>
                                <li>All rights reserved
                                    <br/>Copyright &copy;2018
                                    <br/>Photography WordPress
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-back-cover"></div>


</div>

<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js'></script>
<script type='text/javascript' src='https://code.jquery.com/ui/1.12.0/jquery-ui.min.js'></script>
<!--
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=5.1.7'></script>
-->
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/js/velocity.min.js'></script>
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/js/velocity.ui.js'></script>
<script type='text/javascript' src="{{ asset('js/page-elements.js') }}"></script>
<!--
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/js/waypoints/waypoints.min.js'></script>
-->
<script type='text/javascript' src='https://www.mybarcelonaphotographer.com/wp-content/themes/kinatrix/js/jarallax/jarallax.js'></script>

<script type='text/javascript' src="{{ asset('js/common.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/common2.js') }}"></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/owlcarousel/owl.carousel.min.js'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/html5player/jquery.jplayer.min.js'></script>

@yield('scripts')
</body>
</html>