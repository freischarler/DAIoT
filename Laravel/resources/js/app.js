require('./bootstrap');

import Vue from 'vue'
import VueMqtt from 'vue-mqtt'
import App from './components/App'

import router from './router'

import DeviceComponent from './components/DeviceComponent.vue';
import SensorComponent from './components/SensorComponent.vue';
import LogComponent from './components/LogComponent.vue';
import WSComponent from './components/WSComponent.vue';
import HomeComponent from './components/HomeComponent.vue';

Vue.use(VueMqtt, 'ws://192.168.0.232:9001', {clientId: 'WebClient-' + parseInt(Math.random() * 100000)})
Vue.config.productionTip = false
Vue.config.productionTip = false



Vue.component('device-component', DeviceComponent);
Vue.component('sensor-component', SensorComponent);
Vue.component('log-component', LogComponent);
Vue.component('ws-component',  WSComponent);
Vue.component('home-component',HomeComponent);''
const app = new Vue({
    el: '#app',
    router,
    components: { App },
    template: '<App/>'
})