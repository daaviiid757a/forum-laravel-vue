require('./bootstrap');
require('./fontawesome');

window.Vue = require('vue');

import VueIziToast from 'vue-izitoast';
import 'izitoast/dist/css/iziToast.min.css';
import Authorization from './authorization/authorize'

Vue.use(VueIziToast);
Vue.use(Authorization);

Vue.component('question-page', require('./components/QuestionPage.vue').default);

const app = new Vue({
    el: '#app'
});

