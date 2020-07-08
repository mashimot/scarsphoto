<template>
<div>
    <div class="responsive-menu-wrap">
        <span class="mobile-menu-icon" @click="mobileMenuIcon()">
            <i class="mobile-menu-icon-toggle" :class="{ 'feather-icon-cross': isMobileMenuOpen, 'feather-icon-menu': !isMobileMenuOpen }"></i>
        </span>
        <div class="mobile-menu-toggle">
            <div class="logo-mobile">
                <router-link :to="{ name: home.to.name }">
                    <img class="logoimage" src="https://imaginem.io/kinetika/wp-content/themes/kinetika/images/logo_dark.png" alt="logo">
                </router-link>
            </div>
        </div>
    </div>
    <div class="responsive-mobile-menu" :class="{ 'menu-push-onscreen': isMobileMenuOpen }">
        <div class="mobile-wpml-lang-selector-wrap"></div>
        <div class="mobile-social-header">
            <div class="footer-column">
                <div class="sidebar-widget">
                    <aside id="msocial-widget-3" class="widget MSocial_Widget">
                        <div class="social-header-wrap">
                            <social-media-list></social-media-list>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
        <nav>
            <ul class="mtree">
                <li v-for="(nav) in navList"  @click="mobileMenuIcon()" class="menu-item">
                    <router-link :to="{ name: nav.to.name }" v-if="nav.children.length <= 0">{{ nav.name }}</router-link>
                </li>
            </ul>
        </nav>
        <div class="cleafix"></div>
    </div>
    <div class="mtheme-fullscreen-toggle" :class="{ 'fullscreen-toggle-on': fullScreenToggleOn, 'fullscreen-toggle-off': !fullScreenToggleOn }" @click="fullScreenToggle()">
        <i class="fa"  :class="{ 'fa-compress': fullScreenToggleOn, 'fa-expand': !fullScreenToggleOn }"></i>
    </div>
    <div class="stickymenu-zone outer-wrap">
        <div class="outer-header-wrap clearfix">
            <nav>
                <div class="mainmenu-navigation">
                    <div class="header-logo-section">
                        <div class="logo">
                            <router-link :to="{ name: home.to.name }">
                                <img class="logoimage" src="https://imaginem.io/kinetika/wp-content/themes/kinetika/images/logo_dark.png" alt="logo">
                            </router-link>
                        </div>
                    </div>
                    <div class="homemenu">
                        <ul class="sf-menu mtheme-left-menu">
                            <li v-for="(nav) in navList" class="menu-item">
                                <router-link :to="{ name: nav.to.name }" v-if="nav.children.length <= 0">{{ nav.name }}</router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="wpml-lang-selector-wrap"></div>
</div>
</template>

<script>
    export default {
        data() {
            return {
                isMobileMenuOpen: false,
                fullScreenToggleOn: false,
                home: {
                    to: {
                        name: 'home.index'
                    },
                    name: 'Home',
                    children: []
                },
                navList: [{
                    to: {
                        name: 'home.index'
                    },
                    name: 'Home',
                    children: []
                }, {
                    to: {
                        name: 'portfolio.index'
                    },
                    name: 'Portfolio',
                    children: []
                }, {
                    to: {
                        name: 'about.index'
                    },
                    name: 'About',
                    children: []
                }, {
                    to: {
                        name: 'contacts.index'
                    },
                    name: 'Contato',
                    children: []
                }]
            }
            
        },
        created(){
            $(window).scroll(() => {
                this.stickyNav();
            });
        },
        methods: {
            stickyNav(){
                var stickyNavTop = 10;
	            var stickyzone = '.stickymenu-zone';
                var scrollTop = $(window).scrollTop();
                    
                if (scrollTop > stickyNavTop) { 
                    $(stickyzone).addClass('sticky-menu-activate');
                    //$('body').addClass('sticky-menu-on');
                } else {
                    $(stickyzone).removeClass('sticky-menu-activate'); 
                    //$('body').removeClass('sticky-menu-on');
                }
            },
            fullScreenToggle(){
                this.fullScreenToggleOn = !this.fullScreenToggleOn;
                var events_toggle_element = $('.mtheme-events-carousel');
                var fullscreen_toggle_elements = $(".container-outer,.single-mtheme_photostory .portfolio-nav-wrap,.vertical-left-bar,.vertical-right-bar,#slidecaption,#static_slidecaption,.tp-bullets,#copyright,.edit-entry,.stickymenu-zone,.social-toggle-wrap,.fullscreen-footer-wrap,.toggle-menu,.page-is-not-fullscreen .container-wrapper");
                var reverse_switch_elements = $('.background-slideshow-controls');
                //var slideshow_caption = $('#static_slidecaption,#slidecaption');
                if(this.fullScreenToggleOn){
                    events_toggle_element.addClass('mtheme-events-offscreen');
                    fullscreen_toggle_elements.fadeOut();
                    reverse_switch_elements.fadeIn();
                } else {
                    events_toggle_element.removeClass('mtheme-events-offscreen');
                    fullscreen_toggle_elements.fadeIn();
                    reverse_switch_elements.fadeOut();
                }
            },
            mobileMenuIcon(){
                this.isMobileMenuOpen = !this.isMobileMenuOpen;
                //$('body').toggleClass('body-dashboard-push-left');
                //alert();
                //$('.mobile-menu-icon-toggle').toggleClass('feather-icon-menu').toggleClass('feather-icon-cross');
                $('.responsive-mobile-menu').toggle( 10, function() {
                    //$(".responsive-mobile-menu").toggleClass('menu-push-onscreen');
                    //$("body").toggleClass('menu-is-onscreen');
                });
            }
        }
    }
</script>
