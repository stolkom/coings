require('./bootstrap');

import Vue from 'vue';
// window.Vue = require('vue');

// Vue.component('vue-main', require('./Main.vue'));

import VueMain from './Main.vue';

Vue.component('vue-main', VueMain);

const app = new Vue({
    el: '#app'
});