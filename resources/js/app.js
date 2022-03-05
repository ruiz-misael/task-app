

require('./bootstrap');

window.Vue = require('vue').default;
import moment from 'moment'
import 'moment/locale/es';

Vue.prototype.moment = moment
Vue.use(require('vue-moment'));



Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('tareas', require('./components/TareasComponent.vue').default);


const app = new Vue({
    el: '#app',
});
