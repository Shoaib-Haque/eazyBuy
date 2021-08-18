require('./bootstrap');
import vue from 'vue'
window.Vue = vue;

import HomeApp from './components/customer/home/Index.vue';
import ProductApp from './components/customer/product/Index.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import {routes} from './routes';

//import Vue from 'vue'
//import App from './app.vue'


Vue.use(VueRouter);
Vue.use(VueAxios, axios);
 
const router = new VueRouter({
    mode: 'history',
    routes: routes
});

if (document.getElementById('home')) {
    const home = new Vue({
        el: '#home',
        router: router,
        render: h => h(HomeApp),
    });
}

if (document.getElementById('product')) {
    const home = new Vue({
        el: '#product',
        router: router,
        render: h => h(ProductApp),
    });
}

/* 
const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(HomeApp),
});
*/