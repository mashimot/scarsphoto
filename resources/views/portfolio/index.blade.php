
@extends('layouts.app-scars')
@section('css')
<link rel="stylesheet" media="screen" href="//assetcdn.500px.org/assets/galleries-ec25d7bbd248e574f22da22d99029975.css" />
@endsection
@section('content')
	@include('partials.galleries.list')
	
	<div class="galleries_layout">
		<div class="header_region">
			<div>
				<div class="galleries_header galleries_header--with_cover">
					<div class="gallery_details tab_navigation_wrapper">
						<div class="gallery_details__title_wrapper">
							<h1 class="gallery_details__title">Portfolio</h1>
							<div class="gallery_details__private_icon"></div>
						</div>
						<p class="gallery_details__text"></p>
						<p class="gallery_details__text curator">
					
							<span class="light">Fotos de</span> <a href="{{ route('galleries.index') }}">{{ $user->name }}</a>
						</p>
						<div class="avatar_wrapper">
							<a href="{{ route('galleries.index') }}">
								<img class="avatar" src="https://drscdn.500px.org/user_avatar/2032631/q%3D85_w%3D30_h%3D30/v2?webp=true&amp;v=5&amp;sig=aeaaefbf8f24a5e0514943c39f5471fe01889de5c5abd4b8d34e1b08f514b1c7" title="Fabio Hashimoto">
							</a>
						</div>
					</div>
					<div class="sticky_ui fix_width_on_modal tab_navigation">
						<div class="sticky_ui__center">
							<p class="sticky_ui__name">All</p>
							<p class="sticky_ui__photo_count" data-i18n="%{photo_count}&nbsp;fotos">573&nbsp;fotos</p>
						</div>
						<div class="sticky_ui__left">
							<div class="avatar_wrapper">
								<a href="{{ route('galleries.index') }}">
									<img class="avatar" src="https://drscdn.500px.org/user_avatar/2032631/q%3D85_w%3D30_h%3D30/v2?webp=true&amp;v=5&amp;sig=aeaaefbf8f24a5e0514943c39f5471fe01889de5c5abd4b8d34e1b08f514b1c7" title="Fabio Hashimoto">
								</a>
							</div><a class="actor" href="{{ route('galleries.index') }}">{{ $user->name }}</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="profile-body">
			<div class="full-aspect-ratio-photo-grid photos_body infinite-scroll photos_body--fetched my-gallery demo-gallery">
					@foreach($images as $img)
						<a href="{{ $img->media_url }}" title="{{ $img->media_title }}" class="image-link" data-lightbox='magnific-image'> 
							<img src="{{ $img->media_url }}" alt="" />
						</a>
					@endforeach
			</div>
		</div>
	</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.min.js"></script>
<!--
<script src="//assetcdn.500px.org/assets/marionette-df5740e66fac935a6bb132538a2d49bc.js"></script>
-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/justifiedGallery/3.7.0/js/jquery.justifiedGallery.min.js"></script>
<!--
<script src="//assetcdn.500px.org/assets/uploader-9816dd80dca991d69676339a21240874.js"></script>
<script src="//assetcdn.500px.org/assets/photos-5d5721d9ad74a676d600e8b287db12ac.js"></script>
<script>
App.CuratorId = "2032631"
</script>
<script src="//assetcdn.500px.org/assets/galleries-6f8fa055b56cf7631eeec12829cc3f61.js"></script>
-->
<script>
$(document).ready(function(){
    $(".infinite-scroll").justifiedGallery({
        rowHeight: 500,
		margins: 6
		//lastRow: 'justify'
	});
	initMagnificPopup();
});

	var page = 2;
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() == $(document).height()) {
        //if ($(document).height() - $(this).height() - 100 < $(this).scrollTop()) {    
			paginate();
        }
	});
	function paginate(pos = null, __this = null){
		$.ajax({
			url: `{{ route('portfolio.index') }}?page=${page}`,
			type: "GET",
			beforeSend: function(){
				$('.ajax-load').show();
			},
			success: function(response){
				if(typeof response.html != 'undefined'){
					if(response.html == "" || response.html == null){
						if ($.magnificPopup.instance.isOpen) {
							$.magnificPopup.proto.next.call(__this);
						}
						$('.ajax-load').html("No more records found");
						$('.ajax-load').hide();
						return;
					} else {
						page++;
						$(".infinite-scroll").append(response.html).justifiedGallery('norewind');
						initMagnificPopup();
						if(pos != null){
							$('a.image-link').magnificPopup('open', pos);		
							$.magnificPopup.proto.next.call(__this);
						}
					}
				}
				
				$('.ajax-load').hide();
			},
			complete: function(){
				$('.ajax-load').hide();
			}
		})
		.fail(function(jqXHR, ajaxOptions, thrownError){
			alert('server not responding...');
		});
	}

	function initMagnificPopup(){
		$('a.image-link').magnificPopup({
			type: 'image',
			tLoading: '<div style="background-color: red: color: white;; font-size: 60px;">Loading image #%curr%..</div>',
			closeBtnInside: false,
			fixedContentPos: true,
			mainClass: 'mfp-zoom-in',
			image: {
				verticalFit: true,
				titleSrc: function(item) {
					let description = item.el.attr('title');
					let href = window.location.href;
					let media = item.el.attr('href');
					let share = {
						pinterest: {
							url: `http://pinterest.com/pin/create/bookmarklet/?url=${href}&media=${media}&description=${description}`
						},
						facebook: {
							url: `http://www.facebook.com/sharer.php?u=${href}&t=${description}`
						},
						twitter: {
							url: `http://twitter.com/intent/tweet?text=${description}+${href}`
						}
					}
					var pinshare = '<a class="lightbox-share" href="'+share.pinterest.url+'" target="_blank"><i class="fa fa-pinterest"></i></a>';
					var facebookshare = '<a class="lightbox-share" href="'+share.facebook.url+'" target="_blank"><i class="fa fa-facebook"></i></a>';
					var twittershare = '<a class="lightbox-share" href="'+share.twitter.url+'" target="_blank"><i class="fa fa-twitter"></i></a>';

					return description + '<div class="maginific-lightbox-sharing">'+facebookshare+pinshare+twittershare+'</div>';
				}
			},
			gallery: {
				enabled: true,
				preloader: true,
				preload: [1,1],
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
					var _this = this;
					$.magnificPopup.instance.next = function() {
						var __this = this;
						let last_pos = $(".image-link").length - 1;
						__this.wrap.removeClass('mfp-image-loaded');
						if(last_pos == __this.index){
							console.log(last_pos, __this.index);
							paginate(last_pos, __this);
						} else {
							setTimeout(function() { $.magnificPopup.proto.next.call(__this); }, 120);
						}
					}
					$.magnificPopup.instance.prev = function() {
						var __this = this;
						__this.wrap.removeClass('mfp-image-loaded');
						setTimeout(function() { $.magnificPopup.proto.prev.call(__this); }, 120);
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
	}
</script>  
@endsection