/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import parallax from '@allardyce/parallax';
import Parallax from 'vue-parallaxy';
import axios from 'axios';
import { routes } from './routes.js';
import SocialMediaList from './pages/partials/SocialMediaList';
import StickyFooter from './pages/partials/StickyFooter';
import NavHeader from './pages/core/NavHeader';


//import Vuetify from 'vuetify/lib/framework';
//import { VParallax } from 'vuetify/lib/components';


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

axios.defaults.headers.common = {
    'X-CSRF-TOKEN': Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest',
    'Authorization': 'Bearer ' + Laravel.apiToken,
};
Vue.prototype.$http = axios;
Vue.use(parallax);
Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.component('parallax', Parallax);
Vue.component('social-media-list', SocialMediaList);
Vue.component('sticky-footer', StickyFooter);
Vue.component('nav-header', NavHeader);

/*Vue.use(Vuetify, {
    components: {
        VParallax
    },
});
*/
const router = new VueRouter({
    mode: 'history',
    routes: routes
});

var common = [
    "page-template",
    "page",
    //"theme-kinetika",
    //"woocommerce-no-js",
    "single-author",
    "theme-is-light",
    "demo",
    //"middle-logo",
    "left-logo",
    //."page-is-not-fullscreen",
    "no-title-background",
    "theme-fullwidth",
    "body-dashboard-push",
    "footer-is-on",
    "rightsidebar",
    'page-is-fullscreen'
];
var _contact = [
    "page-template-default",
    "page",
    "page-id-128",
    "page-child",
    "parent-pageid-120",
    //"fullscreen-mode-off",
    "page-has-full-background",
    //"rightclick-block",
    "single-author",
    "theme-is-light",
    "left-logo",
    "menu-is-horizontal",
    //"page-is-not-fullscreen",
    "fullscreen-ui-switchable",
    "header-type-overlay",
    "page-is-opaque",
    "theme-fullwidth",
    "body-dashboard-push",
    "footer-is-off",
    "pagebuilder-active",
    "edge-to-edge",
];
var _about = [
    "page-template-default",
    "page",
    "page-id-128",
    "page-child",
    "parent-pageid-120",
    //"fullscreen-mode-off",
    "page-has-full-background",
    //"rightclick-block",
    "single-author",
    "theme-is-light",
    "left-logo",
    "menu-is-horizontal",
    //"page-is-not-fullscreen",
    "fullscreen-ui-switchable",
    "header-type-overlay",
    "page-is-opaque",
    "theme-fullwidth",
    "body-dashboard-push",
    "footer-is-off",
    "pagebuilder-active",
    "edge-to-edge",
];
router.beforeEach((to, from, next) => {
    document.title = to.meta.title || 'Scarsphoto';
    document.body.className = '';
    if(to.name == 'contacts.index'){
        document.body.classList.add(..._contact);
    } else if(to.name == 'about.index'){
        document.body.classList.add(..._about);
    } else {
        document.body.classList.add(...common);
    }
    next();
});
const opts = {}
const app = new Vue({
    'router': router
    //'vuetify': new Vuetify({})
 })
.$mount('#app');




