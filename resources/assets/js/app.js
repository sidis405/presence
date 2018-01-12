
import ToggleButton from 'vue-js-toggle-button'
require('./bootstrap');

window.Vue = require('vue');

Vue.use(require('vue-moment'));

Vue.use(ToggleButton)


Vue.component('employeelist', require('./components/EmployeeList.vue'));

const app = new Vue({
    el: '#app'
});
