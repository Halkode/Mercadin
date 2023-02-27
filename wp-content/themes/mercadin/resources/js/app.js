require('./bootstrap');

import jQuery from 'jquery';
window.$ = window.jQuery = jQuery;

import 'popper.js';
import 'bootstrap';
// import 'slick-carousel';
// import '@fancyapps/fancybox';
// import 'plyr';
// import 'aos';


import menu from './partials/menu';

($ => {
    $(() => {
        menu();
    });
})(jQuery);

import Vue from 'vue';

Vue.component('example', require('./components/Example.vue').default);

const app = new Vue({
    el: '#app'
});
