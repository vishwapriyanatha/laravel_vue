require('./bootstrap');

window.Vue = require('vue');

Vue.component('home-component', require('./components/HomeComponent.vue').default);

Vue.use(require('vue-moment'));
import router from './router.js';
const app = new Vue({
    el: '#app',
    router:router
});
