
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('tareas', require('./components/tareas.vue'));

const app = new Vue({
    el: '#tareas'
});

Vue.component('novedades', require('./components/novedades.vue'));

const novedad = new Vue({
    el: '#novedad'
});

Vue.component('ver-clientes', require('./components/ver-clientes.vue'));

const clientes = new Vue({
    el: '#clientes'
});

Vue.component('notificaciones', require('./components/notificaciones.vue'));

const notificacion = new Vue({
    el: '#notificacion'
});

Vue.component('documentos', require('./components/documentos-cliente.vue'));

const documentos = new Vue({
    el: '#documentos'
});