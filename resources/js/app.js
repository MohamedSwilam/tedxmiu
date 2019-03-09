
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('waypoints/lib/jquery.waypoints')

window.Vue = require('vue');
window.VueAnimate = require('vue-animate-scroll');


Vue.use(VueAnimate);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('events', require('./components/events.vue').default);
Vue.component('event-info', require('./components/event-info.vue').default);
Vue.component('speaker', require('./components/speaker.vue').default);
Vue.component('sponsors', require('./components/sponsors.vue').default);

Vue.component('home-speaker', require('./components/home/home-speakers.vue').default);
Vue.component('home-events', require('./components/home/home-events.vue').default);
Vue.component('home-team', require('./components/home/home-team.vue').default);

Vue.component('teams', require('./components/teams.vue').default);
Vue.component('board', require('./components/board.vue').default);
Vue.component('team', require('./components/team.vue').default);


Vue.component('loader', require('./components/loaders/loader.vue').default);
Vue.component('circular-loader', require('./components/loaders/circular-loader.vue').default);
Vue.component('bounce-loader', require('./components/loaders/bounce-loader.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
