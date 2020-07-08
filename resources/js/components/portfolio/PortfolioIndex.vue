<template>
<div>
    <galleries-list></galleries-list>
    <div class="galleries_layout">
		<div class="header_region">
			<div>
				<div class="galleries_header galleries_header--with_cover">
					<div class="gallery_details tab_navigation_wrapper">
						<div class="gallery_details__title_wrapper">
							<h1 class="gallery_details__title"></h1>
							<div class="gallery_details__private_icon"></div>
						</div>
						<p class="gallery_details__text"></p>
						<p class="gallery_details__text curator">
					
							<span class="light">Fotos de</span> <a href=""></a>
						</p>
						<div class="avatar_wrapper">
							<a href="">
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
								<a href="">
									<img class="avatar" src="https://drscdn.500px.org/user_avatar/2032631/q%3D85_w%3D30_h%3D30/v2?webp=true&amp;v=5&amp;sig=aeaaefbf8f24a5e0514943c39f5471fe01889de5c5abd4b8d34e1b08f514b1c7" title="Fabio Hashimoto">
								</a>
							</div><a class="actor" href=""></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="profile-body">
			<div class="full-aspect-ratio-photo-grid photos_body infinite-scroll photos_body--fetched my-gallery demo-gallery" ref="infinite_scroll">
            	<a v-for="(img, key) in images.data" :key="key" :title="img.media_title" :href="img.media_url" class="image-link" ref="image_link"> 
					<img :src="img.media_url" :alt="img.media_title" />
				</a>
			</div>
		</div>
	</div>
</div>
</template>

<script>
    //import 'justifiedGallery';
    import magnificPopup from 'magnific-popup';
    import GalleriesList from './../partials/galleries/GalleriesList';
    export default {
        data() {
            return {
                page: 1,
                itsTimeToStop: false,
                gallery_id: -1,
                galleries: [],
                images: {
                    current_page: null,
                    data: [],
                    first_page_url: null,
                    from: 0,
                    last_page: 1,
                    last_page_url: null,
                    next_page_url: null,
                    path: null,
                    per_page: null,
                    prev_page_url: null,
                    to: null,
                    total: null
                },
                loading: true
            }
        },
        components: {
            'galleries-list': GalleriesList
        },
        methods: {
            getGalleries(pos = null, __this = null){
                let vm = this;
                this.loading = true;
                if(vm.page <= vm.images.last_page){
                    vm.axios
                        .get(`${Laravel._BASE_URL}/api/portfolio?page=${this.page}`)
                        .then((response) => {
                            console.log('page',response.data.images.current_page);
                            if(response.data.images.data.length > 0){
                                for(let key in response.data.images){
                                    if(key != 'data'){
                                        vm.images[key] = response.data.images[key];
                                    }
                                }
                                vm.images.data.push(...response.data.images.data);
                            }
                        })
                        .then(() => {
                            vm.loading = false;
                            if(vm.page == 1){
                                $(vm.$refs.infinite_scroll).justifiedGallery({
                                    rowHeight: 500,
                                    margins: 6
                                    //lastRow: 'justify'
                                }); 
                            } else {
                                $(vm.$refs.infinite_scroll).justifiedGallery('norewind');
                            }
                            vm.page++;                      
                            vm.initMagnificPopup();
                            if(pos != null){
                                $(vm.$refs.image_link).magnificPopup('open', pos);		
                                $.magnificPopup.proto.next.call(__this);
                            }
                        });
                } else {
                    if ($.magnificPopup.instance.isOpen) {
                        $.magnificPopup.proto.next.call(__this);
                    }
                }
            },
            scroll(){
                let vm = this;
                /*  window.onscroll = function () {
                    if (window.scrollY > (document.body.offsetHeight - window.outerHeight)) {
                        vm.getGalleries();
                    }
                }*/
                $(window).scroll(() => {
                    if($(window).scrollTop() + $(window).height() == $(document).height()) {
                        vm.getGalleries();
                    }
                });
            },
            initMagnificPopup(){
                let vm = this;
                console.log('magnific');
                $(vm.$refs.image_link).magnificPopup({
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
                    
                            var _this = this;
                            $.magnificPopup.instance.next = function() {
                                var __this = this;
                                let last_pos = $("a.image-link").length - 1;
                                console.log(last_pos, __this.index);

                                __this.wrap.removeClass('mfp-image-loaded');
                                if(last_pos == __this.index){
                                    vm.getGalleries(last_pos, __this);
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
        },
        beforeCreate() {
            this.$nextTick().then(() => document.body.classList.remove(...[
                //"page-template-template-fullpage",
                //"page-template-template-fullpage-php"
            ]))
        },
        created(){
            this.gallery_id = this.$route.params.id;
            
            this.getGalleries();
            this.initMagnificPopup();   
        },
        mounted() {
            this.scroll();
            /* window.setTimeout(function() {
                $('.justified-gallery').justifiedGallery({
                    rowHeight: 500,
                    margins: 6
                    //lastRow: 'justify'
                }); 
            }, 1000);*/
        }
    }
</script>
<style scoped>
    @import '../../../../node_modules/justifiedGallery/dist/css/justifiedGallery.min.css';
</style>