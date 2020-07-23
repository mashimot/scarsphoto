/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap-admin');

import Vue from 'vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import { routes } from './routes.js';
import Toasted from 'vue-toasted';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import { SelfBuildingSquareSpinner } from 'epic-spinners';

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
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('self-building-square-spinner', SelfBuildingSquareSpinner);
Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(Toasted);
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
//Vue.use(AtomSpinner);


var options = [{
    type : 'success',
    theme: "outline",
    position: "top-center",
    fullWidth: true,
    //icon : 'error_outline',
    duration : 5000,
    message: 'Data has been saved successfully'
},{
    type : 'delete',
    theme: "outline",
    position: "top-center",
    fullWidth: true,
    //icon : 'error_outline',
    duration : 5000,
    message: 'Data has been deleted successfully'
},
{
    type: 'error',
    theme: "outline",
    position: "top-center",
    fullWidth: true,
    //icon : 'error_outline',
    duration : 5000,
    message: 'Oops.. Something Went Wrong...'

}].forEach(option => {
    Vue.toasted.register(`on_${option.type}`,
        (payload) => {
            // if there is no message passed show default message
            if(! payload.message) {
                return option.message;
            }

            // if there is a message show it with the message
            return payload.message;
        },
        option
    )
});
// register the toast with the custom message


const router = new VueRouter({
    mode: 'history',
    routes: routes
});
const app = new Vue({
    'router': router
 })
.$mount('#app');




