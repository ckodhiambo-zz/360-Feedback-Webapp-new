import Vue from 'vue'


require('./bootstrap');

window.Vue = require('vue').default;
window.Fire = new Vue();
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)



// import plugin
import VueToastr from "vue-toastr";
// use plugin
Vue.use(VueToastr, {
    /* OverWriting Plugin Options */
    defaultTimeout: 3000,
    defaultPosition: "toast-top-right",
    defaultProgressBar: false,
    defaultProgressBarValue: 0,
});

import moment from 'moment';
moment().format();

Vue.filter("date", function(created){
    return moment(created).format('MMMM Do YYYY, h:mm:ss a');
});

import Swal from 'sweetalert2'
window.swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

window.toast = Toast;

// import Form from 'vform'
//
// window.Form = Form;
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;

// resources/assets/js/app.js

import $ from 'jquery';
window.$ = window.jQuery = $;

require('./components');


const app = new Vue({
    el: '#app'
});

