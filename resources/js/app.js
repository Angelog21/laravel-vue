

require('./bootstrap');

window.Vue = require('vue');

Vue.component('mis-pensamientos-component', require('./components/MisPensamientosComponent.vue').default);
Vue.component('pensamiento-component', require('./components/PensamientoComponent.vue').default);
Vue.component('formulario-component', require('./components/FormComponent.vue').default);

const app = new Vue({
    el: '#app',
});
