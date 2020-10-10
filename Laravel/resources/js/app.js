require('./bootstrap');

import Vue from 'vue'
import VueMqtt from 'vue-mqtt'
import App from './components/App'

import router from './router'

import MqttExample from './components/MqttExample.vue';

import DeviceComponent from './components/DeviceComponent.vue';
import SensorComponent from './components/SensorComponent.vue';
import LogComponent from './components/LogComponent.vue';

/*Vue.use(VueMqtt, 'ws://localhost:9001', {clientId: 'WebClient-' + parseInt(Math.random() * 100000)})
Vue.config.productionTip = false
Vue.config.productionTip = false
Vue.component('mqtt-example',  MqttExample);*/


Vue.component('device-component', DeviceComponent);
Vue.component('sensor-component', SensorComponent);
Vue.component('log-component', LogComponent);

const app = new Vue({
    el: '#app',
    router,
    components: { App },
    template: '<App/>'
})