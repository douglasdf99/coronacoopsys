/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vue from "vue"

import VueMoment from 'vue-moment'

const moment = require('moment/moment');
require('moment/locale/pt-br');
Vue.use(VueMoment, {
  moment
});

console.log(Vue.moment()) //es

Vue.mixin({
  methods: {
    url_redirect: function (local) {
      return window.location.protocol + '//' + window.location.host + '/' + local;
    }
  }
});
Vue.filter('formatDate', function(value) {
  if (value) {
    return moment(String(value)).format('DD/MM/YYYY')
  }
});

import VModal from 'vue-js-modal'


Vue.use(VModal);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
Vue.component('pagination', require('./components/pagination/Pagination.vue').default);
Vue.component('preloader', require('./components/pagination/PreloaderComponent.vue').default);

Vue.component('home', require('./components/Home.vue').default);
Vue.component('menu-front', require('./components/Menu.vue').default);
Vue.component('usuarios-lista', require('./components/usuarios/Lista.vue').default);
Vue.component('ramos-lista', require('./components/ramos/Lista.vue').default);
Vue.component('produtos-lista', require('./components/produtos/Lista.vue').default);
Vue.component('coops-lista', require('./components/coops/Lista.vue').default);
Vue.component('canais-lista', require('./components/canais/Lista.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
