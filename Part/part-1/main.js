
//---------------------------------------------------------------
// Import internal or external file
//--------------------------------------------------------------
import Vue from "vue";
import App from "./App.vue";
import router from "./router"
import axios from 'axios';


//---------------------------------------------------------------
// Environment configuration
//--------------------------------------------------------------
Vue.config.productionTip = false;
Vue.APIURL = Vue.prototype.APIURL = process.env.VUE_APP_APIURL;
Vue.IMAGEURL = Vue.prototype.IMAGEURL = process.env.VUE_APP_IMAGEURL;
Vue.baseUrl = Vue.prototype.baseUrl = process.env.VUE_APP_BASEURL;

//---------------------------------------------------------------
// Axios configuration
//--------------------------------------------------------------
const base = axios.create({
    baseURL: process.env.VUE_APP_APIURL
});
//prototype http declare for axios  request
Vue.prototype.$http = base;



//---------------------------------------------------------------
// Vue app instance create and route declare and root id declare
//--------------------------------------------------------------
new Vue({
  router,
  render: h => h(App)
}).$mount("#app");
