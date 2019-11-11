

require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import Vuetify from 'vuetify'
import router from './Router/router'
import User from './Helpers/user'
import Exceptions from './Helpers/Exceptions'
import md from 'marked'
import VueSimplemde from 'vue-simplemde'

window.User = User
window.Exceptions = Exceptions
window.EventBus = new Vue()
window.md = md
Vue.use(Vuetify)


// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('AppHome', require('./components/AppHome').default);
Vue.component('vue-simplemde', VueSimplemde)

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    router,
});
