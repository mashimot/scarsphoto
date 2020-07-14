<template>
<div id="home" class="container-wrapper container-fullwidth">
	<ul id="slideshow-data" data-lastslide="3"><li class="slide-0" data-slide="0" data-color="bright" data-src="https://imaginem.io/kinetika/wp-content/uploads/sites/20/2015/07/slideshow_1.jpg" data-thumbnail="https://imaginem.io/kinetika/wp-content/uploads/sites/20/2015/07/slideshow_1-150x150.jpg" data-title="Kinetika Studio"></li><li class="slide-1" data-slide="1" data-color="bright" data-src="https://imaginem.io/kinetika/wp-content/uploads/sites/20/2015/07/slideshow_2.jpg" data-thumbnail="https://imaginem.io/kinetika/wp-content/uploads/sites/20/2015/07/slideshow_2-150x150.jpg" data-title="Slideshow &amp; Video"></li><li class="slide-2 data-active-slide" data-slide="2" data-color="dark" data-src="https://imaginem.io/kinetika/wp-content/uploads/sites/20/2015/07/slideshow_3.jpg" data-thumbnail="https://imaginem.io/kinetika/wp-content/uploads/sites/20/2015/07/slideshow_3-150x150.jpg" data-title="Events Support"></li><li class="slide-3" data-slide="3" data-color="bright" data-src="https://imaginem.io/kinetika/wp-content/uploads/sites/20/2015/07/slideshow_4.jpg" data-thumbnail="https://imaginem.io/kinetika/wp-content/uploads/sites/20/2015/07/slideshow_4-150x150.jpg" data-title="Kinetika Studio"></li></ul>				<div class="slideshow-controls-wrap">

			<!--Slide counter-->
						<div id="slidecounter">
				<span class="slidenumber">3</span> / <span class="totalslides">4</span>
			</div>
						<!--Arrow Navigation-->
						<div class="super-navigation">
			<div class="prevnext-wrap">
				<a id="nextslide" class="load-item" style="display: inline;"><i class="fa fa-angle-right"></i></a>
			</div>
			<div class="prevnext-wrap">
				<a id="prevslide" class="load-item" style="display: inline;"><i class="fa fa-angle-left"></i></a>
			</div>
			</div>

			<div id="controls-wrapper" class="load-item" style="display: block;">
				<div id="controls">
					<!--Navigation-->
																		<a id="play-button"><i id="pauseplay" class="feather-icon-pause"></i></a>
															</div>
			</div>

		</div>

	<div id="slidecaption" style="display: block;"><div class="fullscreen-slideshow-color" data-color="dark"></div></div>
	<!--Control Bar-->
	<!--Time Bar-->
						<div id="progress-back" class="load-item" style="display: block;">
				<div id="progress-bar" style="left: -119.898px;"></div>
			</div>
			<div class="contentclearfix clearfix"></div>
</div>
</template>

<script>
    //import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
    //import 'swiper/css/swiper.css'
    //let supersized = require('supersized');
    //require('./../../../../node_modules/supersized/js/supersized.3.2.7.js');
    //require('supersized.3.2.7.js');

    export default {
        components: {
            //'swiper': Swiper,
            //'swiper-slide': SwiperSlide
        },
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
                loading: true,
                swiperOption: {
                    spaceBetween: 10,
                    centeredSlides: true,
                    zoom: true,
                    pagination: {
                        el: '.swiper-pagination'
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    }
                }
            }
        },
        methods: {
            getGalleries(){
                let vm = this;
                vm.loading = true;
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
            }
        },
        beforeCreate() {
            this.$nextTick().then(() => document.body.classList.remove(...[
                "page-template-template-fullpage",
                "page-template-template-fullpage-php"
            ]))
        },
        created(){
            //this.getGalleries();
            this.$nextTick().then(() => {
                $.supersized({
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
                    slides 					:  	[{image : 'https://imaginem.io/kinetika/wp-content/uploads/sites/20/2015/07/slideshow_1.jpg', alttext : 'Forest', 	title : '<div class="fullscreen-slideshow-color" data-color="bright"></div>', thumb : '', url : ''},{image : 'https://imaginem.io/kinetika/wp-content/uploads/sites/20/2015/07/slideshow_2.jpg', alttext : 'Architecture', title : '<div class="fullscreen-slideshow-color" data-color="bright"></div>', thumb : '', url : ''},{image : 'https://imaginem.io/kinetika/wp-content/uploads/sites/20/2015/07/slideshow_3.jpg', alttext : 'Bride', title : '<div class="fullscreen-slideshow-color" data-color="dark"></div>', thumb : '', url : ''},{image : 'https://imaginem.io/kinetika/wp-content/uploads/sites/20/2015/07/slideshow_4.jpg', alttext : 'Dancer', title : '<div class="fullscreen-slideshow-color" data-color="bright"></div>', thumb : '', url : ''}		],
                    progress_bar			:	1,
                    mouse_scrub				:	1
                });
            });
        }
    }
</script>

<style lang="scss" scoped>

</style>
