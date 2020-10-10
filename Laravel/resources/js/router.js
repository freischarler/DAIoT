import Vue    from 'vue'
import Router from 'vue-router'

import HomeComponent    from './components/HomeComponent.vue'
import DeviceComponent from './components/DeviceComponent.vue';
import SensorComponent from './components/SensorComponent.vue';
import LogComponent from './components/LogComponent.vue';

Vue.use(Router)

export default new Router({
    routes: [
        {
            path: '/',
            component: HomeComponent
        },
        {
            path: '/dispositivos',
            component: DeviceComponent
        },
        {
            path: '/sensores',
            component: SensorComponent
        },
        {
            path: '/log/:id',
            component: LogComponent
        },  
    ],
    linkActiveClass: "active",
    mode: "history"
})