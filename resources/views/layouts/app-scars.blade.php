<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Scars Photo') }}</title>

    <!-- Scripts -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script type='text/javascript' src='http://kinetika.imaginem.co/wp-content/themes/kinetika/js/pace.min.js'></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<!--link rel='stylesheet' id='wp-block-library-css'  href='https://imaginem.io/kinetika/wp-includes/css/dist/block-library/style.min.css?ver=5.3.2' type='text/css' media='all' /-->
<link rel='stylesheet' id='rs-plugin-settings-css'  href='https://imaginem.io/kinetika/wp-content/plugins/revslider/public/assets/css/rs6.css?ver=6.2.2' type='text/css' media='all' />
<link rel='stylesheet' id='MainStyle-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/style.css?ver=screen' type='text/css' media='all' />
<!--link rel='stylesheet' id='verticalmenuCSS-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/css/verticalmenu.css?ver=5.3.2' type='text/css' media='screen' /-->
<link rel='stylesheet' id='videoJSCSS-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/videojs/video-js.css?ver=5.3.2' type='text/css' media='screen' />
<!--link rel='stylesheet' id='demo_css-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/framework/demopanel/demo.panel.css?ver=5.3.2' type='text/css' media='screen' /-->
<link rel='stylesheet' id='owlcarousel_css-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/css/owlcarousel/owl.carousel.css?ver=5.3.2' type='text/css' media='screen' />
<link rel='stylesheet' id='magnific_lightbox-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/css/magnific/magnific-popup.css?ver=5.3.2' type='text/css' media='screen' />
<link rel='stylesheet' id='magnific_lightbox-css'  href='https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css' type='text/css' media='screen' />
    
<link rel='stylesheet' id='MainStyle-Light-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/style-light.css?ver=screen' type='text/css' media='all' />
<link rel='stylesheet' id='Animations-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/css/animations.css?ver=5.3.2' type='text/css' media='screen' />
<link rel='stylesheet' id='fontAwesome-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/css/fonts/font-awesome/css/font-awesome.min.css?ver=5.3.2' type='text/css' media='screen' />
<!--link rel='stylesheet' id='etFonts-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/css/fonts/et-fonts/et-fonts.css?ver=5.3.2' type='text/css' media='screen' /-->
<!--link rel='stylesheet' id='featherFonts-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/css/fonts/feather-webfont/feather.css?ver=5.3.2' type='text/css' media='screen' /-->
<!--link rel='stylesheet' id='lineFonts-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/css/fonts/fontello/css/fontello.css?ver=5.3.2' type='text/css' media='screen' /-->
<!--link rel='stylesheet' id='simepleLineFont-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/css/fonts/simple-line-icons/simple-line-icons.css?ver=5.3.2' type='text/css' media='screen' /-->
<link rel='stylesheet' id='css_jplayer-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/css/html5player/jplayer.dark.css?ver=5.3.2' type='text/css' media='screen' />
<link rel='stylesheet' id='supersized_CSS-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/css/supersized/supersized.css?ver=5.3.2' type='text/css' media='screen' />
<!--link rel='stylesheet' id='mtheme-ie-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/css/ie.css?ver=5.3.2' type='text/css' media='all' /-->
<!--link rel='stylesheet' id='kinetika-fonts-css'  href='//fonts.googleapis.com/css?family=Lato%3A100%2C100i%2C300%2C300i%2C400%2C400i%2C700%2C700i%2C900%2C900i%7CCrimson%2BText%3A400%2C400italic%2C600%2C600italic%2C700%2C700italic%7CPT+Mono&#038;ver=1.0.0' type='text/css' media='all' /-->
<link rel='stylesheet' id='ResponsiveCSS-css'  href='https://imaginem.io/kinetika/wp-content/themes/kinetika/css/responsive.css?ver=5.3.2' type='text/css' media='screen' />
<style id='ResponsiveCSS-inline-css' type='text/css'>
.logo img { width: 154px; }.stickymenu-zone.sticky-menu-activate .logo img { height:auto; width: 154px; }.logo img { top: 28px; }.vertical-logoimage { width: 300px; }
	@media only screen and (max-width: 1024px) {
		
	}
	@media only screen and (min-width: 768px) and (max-width: 959px) {
		
	}
	@media only screen and (max-width: 767px) {
		
	}
	@media only screen and (min-width: 480px) and (max-width: 767px) {
		
	}
html{position:absolute;height:100%;width:100%;min-height:100%;min-width:100%;}
body,#supersized li { background:; }
</style>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-includes/js/jquery/jquery.js?ver=1.12.4-wp'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/plugins/revslider/public/assets/js/rbtools.min.js?ver=6.0'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/plugins/revslider/public/assets/js/rs6.min.js?ver=6.2.2'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/pace.min.js'></script>
<!--link rel='https://api.w.org/' href='https://imaginem.io/kinetika/wp-json/' /-->
<!--link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://imaginem.io/kinetika/xmlrpc.php?rsd" /-->
<!--link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://imaginem.io/kinetika/wp-includes/wlwmanifest.xml" /--> 
<script type="text/javascript">function setREVStartSize(e){			
			try {								
				var pw = document.getElementById(e.c).parentNode.offsetWidth,
					newh;
				pw = pw===0 || isNaN(pw) ? window.innerWidth : pw;
				e.tabw = e.tabw===undefined ? 0 : parseInt(e.tabw);
				e.thumbw = e.thumbw===undefined ? 0 : parseInt(e.thumbw);
				e.tabh = e.tabh===undefined ? 0 : parseInt(e.tabh);
				e.thumbh = e.thumbh===undefined ? 0 : parseInt(e.thumbh);
				e.tabhide = e.tabhide===undefined ? 0 : parseInt(e.tabhide);
				e.thumbhide = e.thumbhide===undefined ? 0 : parseInt(e.thumbhide);
				e.mh = e.mh===undefined || e.mh=="" || e.mh==="auto" ? 0 : parseInt(e.mh,0);		
				if(e.layout==="fullscreen" || e.l==="fullscreen") 						
					newh = Math.max(e.mh,window.innerHeight);				
				else{					
					e.gw = Array.isArray(e.gw) ? e.gw : [e.gw];
					for (var i in e.rl) if (e.gw[i]===undefined || e.gw[i]===0) e.gw[i] = e.gw[i-1];					
					e.gh = e.el===undefined || e.el==="" || (Array.isArray(e.el) && e.el.length==0)? e.gh : e.el;
					e.gh = Array.isArray(e.gh) ? e.gh : [e.gh];
					for (var i in e.rl) if (e.gh[i]===undefined || e.gh[i]===0) e.gh[i] = e.gh[i-1];
										
					var nl = new Array(e.rl.length),
						ix = 0,						
						sl;					
					e.tabw = e.tabhide>=pw ? 0 : e.tabw;
					e.thumbw = e.thumbhide>=pw ? 0 : e.thumbw;
					e.tabh = e.tabhide>=pw ? 0 : e.tabh;
					e.thumbh = e.thumbhide>=pw ? 0 : e.thumbh;					
					for (var i in e.rl) nl[i] = e.rl[i]<window.innerWidth ? 0 : e.rl[i];
					sl = nl[0];									
					for (var i in nl) if (sl>nl[i] && nl[i]>0) { sl = nl[i]; ix=i;}															
					var m = pw>(e.gw[ix]+e.tabw+e.thumbw) ? 1 : (pw-(e.tabw+e.thumbw)) / (e.gw[ix]);					

					newh =  (e.type==="carousel" && e.justify==="true" ? e.gh[ix] : (e.gh[ix] * m)) + (e.tabh + e.thumbh);
				}			
				
				if(window.rs_init_css===undefined) window.rs_init_css = document.head.appendChild(document.createElement("style"));					
				document.getElementById(e.c).height = newh;
				window.rs_init_css.innerHTML += "#"+e.c+"_wrapper { height: "+newh+"px }";				
			} catch(e){
				console.log("Failure at Presize of Slider:" + e)
			}					   
		  };</script>
		<style type="text/css" id="wp-custom-css">
			
.demo-page-overview-text {
	margin:0 auto;text-align:center;font-size: 31px;font-weight: 300;line-height: 46px;text-align: center;width: 71%;
}
.demo-page-overview-box {
	background: #f9f9f9;font-size: 22px;font-weight: 300;line-height: 37px;padding: 50px;
}


@media only screen and (min-width: 768px) and (max-width: 959px) {
	.demo-page-overview-text {
		font-size: 21px;
		line-height: 36px;
		width: 90%;
	}
	.demo-page-overview-box {
		font-size: 16px;
		line-height: 27px;
		padding: 50px;
	}
}
@media only screen and (max-width: 767px) {
	.demo-page-overview-text {
		font-size: 21px;
		line-height: 36px;
		width: 90%;
	}
	.demo-page-overview-box {
		font-size: 16px;
		line-height: 27px;
		padding: 50px;
	}
}
@media only screen and (min-width: 480px) and (max-width: 767px) {
	.demo-page-overview-text {
		font-size: 21px;
		line-height: 36px;
		width: 90%;
	}
	.demo-page-overview-box {
		font-size: 16px;
		line-height: 27px;
		padding: 50px;
	}
}

		</style>


    @yield('css')
</head>
<body class="home blog theme-kinetika woocommerce-no-js single-author theme-is-light demo middle-logo page-is-fullscreen fullscreen-slideshow has-fullscreen-eventbox theme-fullwidth body-dashboard-push footer-is-on">
    @include('includes.header')
    <div id="app" style="margin-top: 80px !important;">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer>
        <div class="fullscreen-footer-wrap">
            <div class="fullscreen-footer-info">
                Copyright &copy; 2016	</div>
            <div class="fullscreen-footer-social">
                <div class="login-socials-wrap clearfix">
                    <aside id="msocial-widget-3" class="widget MSocial_Widget">
                        <div class="social-header-wrap">
                            <ul>
                                <li class="social-icon">
                                    <a class="ntips" title="Facebook" href="https://www.facebook.com/Scarsphoto/"  target="_blank">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="social-icon">
                                    <a class="ntips" title="Twitter" href="#"  target="_blank">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="social-icon">
                                    <a class="ntips" title="Instagram" href="#"  target="_blank">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                <li class="social-icon">
                                    <a class="ntips" title="Vimeo" href="#"  target="_blank">
                                        <i class="fa fa-vimeo-square"></i>
                                    </a>
                                </li>
                                <li class="social-icon">
                                    <a href="#" class="ntips">
                                        <i class="fa fa-phone-square"></i> &nbsp; Entre em contato: <strong>97271-0113</strong></a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
        <div id="goto-top" title="top of page"><i class="fa fa-chevron-up"></i></div>
    </footer>



<!--script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js?ver=3.8.0'></script-->
<!--script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/typed.js'></script-->
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/menu/verticalmenu.js'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/videojs/video.js'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/jquery.touchSwipe.min.js'></script>
<!--script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/framework/demopanel/js/demo-panel.js'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/menu/superfish.js'></script-->
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/jquery.nicescroll.min.js'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/jquery.easing.min.js'></script>
<!--script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/page-elements.js'></script-->

<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/jquery.fitvids.js'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/jquery.stellar.min.js'></script>
<!--script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/waypoints/waypoints.min.js'></script-->
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/imagesloaded.pkgd.min.js'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-includes/js/hoverIntent.min.js?ver=1.8.1'></script>
<!--script type='text/javascript' src='https://imaginem.io/kinetika/wp-includes/js/jquery/ui/core.min.js?ver=1.11.4'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-includes/js/jquery/ui/widget.min.js?ver=1.11.4'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-includes/js/jquery/ui/position.min.js?ver=1.11.4'></script-->
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-includes/js/jquery/ui/tooltip.min.js?ver=1.11.4'></script>
<!--script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/modernizr.custom.47002.js'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/classie.js'></script-->
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/jquery.stickymenu.js'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/stickySidebar.js'></script>
<script type='text/javascript' src="{{ URL::asset('js/common.js') }}"></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-includes/js/comment-reply.min.js?ver=5.3.2'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/jquery.backstretch.min.js'></script>
<!--script type='text/javascript' src='https://imaginem.io/kinetika/wp-includes/js/wp-embed.min.js?ver=5.3.2'></script-->
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/jquery.isotope.min.js'></script>
<script type='text/javascript' src='https://imaginem.io/kinetika/wp-content/themes/kinetika/js/owlcarousel/owl.carousel.min.js'></script>


<!--script type="text/javascript">
jQuery(function($){	
	jQuery.supersized({
		slideshow               :   1,
		autoplay				:	1,
		start_slide             :   1,
		image_path				:	'https://imaginem.io/kinetika/wp-content/themes/kinetika/images/supersized/',
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
		fit_portrait         	:   1,
		fit_landscape			:   0,
		slide_links				:	'blank',
		thumb_links				:	1,
		thumbnail_navigation    :   0,
		slides 					:  	[
{image : 'https://imaginem.io/kinetika/wp-content/uploads/sites/20/2015/07/slideshow_1.jpg', alttext : 'Forest', title : '<div class="fullscreen-slideshow-color" data-color="bright"></div><div class="slideshow-content-wrap"><div class="slideshow_title  slideshow_title_animation">Kinetika Studio</div><div class="slideshow_caption"><p>A powerful fullscreen studio wordpress theme. Create your online photography, videography, illustration and other creative works easily.</p><br /></div><div class="slideshow_content_link "><a class="supersized-button" href="http://themeforest.net/item/kinetika-fullscreen-photography-theme/12162415">Purchase</a></div></div>', thumb : '', url : ''},{image : 'https://imaginem.io/kinetika/wp-content/uploads/sites/20/2015/07/slideshow_2.jpg', alttext : 'Architecture', title : '<div class="fullscreen-slideshow-color" data-color="bright"></div><div class="slideshow-content-wrap"><div class="slideshow_title  slideshow_title_animation">Slideshow &amp; Video</div><div class="slideshow_caption"><p>Displays HTML5, Vimeo and Youtube fullscreen videos. Or display an HTML5 and Youtube videos as a page backgrounds with transparency controls.</p><br /></div><div class="slideshow_content_link "><a class="supersized-button" href="http://themeforest.net/item/kinetika-fullscreen-photography-theme/12162415">Purchase</a></div></div>', thumb : '', url : ''},{image : 'https://imaginem.io/kinetika/wp-content/uploads/sites/20/2015/07/slideshow_3.jpg', alttext : 'Bride', title : '<div class="fullscreen-slideshow-color" data-color="dark"></div><div class="slideshow-content-wrap"><div class="slideshow_title  slideshow_title_animation">Events Support</div><div class="slideshow_caption"><p>Manage theme in-built Events posts with status control for Cancelled or Postponed events.</p><br /></div><div class="slideshow_content_link "><a class="supersized-button" href="http://themeforest.net/item/kinetika-fullscreen-photography-theme/12162415">Purchase</a></div></div>', thumb : '', url : ''},{image : 'https://imaginem.io/kinetika/wp-content/uploads/sites/20/2015/07/slideshow_4.jpg', alttext : 'Dancer', title : '<div class="fullscreen-slideshow-color" data-color="bright"></div><div class="slideshow-content-wrap"><div class="slideshow_title  slideshow_title_animation">Kinetika Studio</div><div class="slideshow_caption"><p>A powerful fullscreen studio wordpress theme. Create your online photography, videography, illustration and other creative works easily.</p><br /></div><div class="slideshow_content_link "><a class="supersized-button" href="http://themeforest.net/item/kinetika-fullscreen-photography-theme/12162415">Purchase</a></div></div>', thumb : '', url : ''}		],
		progress_bar			:	1,					
		mouse_scrub				:	1
	});
	if ($.fn.swipe) {
		jQuery(".page-is-fullscreen #supersized,.pattern-overlay").swipe({
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
/* ]]> */
</script-->
    @yield('scripts')
</body>
</html>
