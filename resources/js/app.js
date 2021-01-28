require('./bootstrap');

window.Vue = require('vue');
//
// //support vuex
import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from "./store/index"

const store = new Vuex.Store(
    storeData
)
//
Vue.component('example-component', require('./component/ExampleComponent.Vue').default);

const app = new Vue({

    el: '#app',

    store, //vuex

});
