

require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import Vuetify from 'vuetify'
import router from './Router/router'
import User from './Helpers/user'
window.User = User
Vue.use(Vuetify)

console.log(User.loggedIn())

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('AppHome', require('./components/AppHome').default);

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    router,
});
