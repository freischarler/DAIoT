import Vue    from 'vue'
import Router from 'vue-router'

import HomeComponent    from './components/HomeComponent.vue'
import DeviceComponent from './components/DeviceComponent.vue';
import SensorComponent from './components/SensorComponent.vue';
import LogComponent from './components/LogComponent.vue';
import SensorEditComponent from './components/SensorEditComponent.vue';
import SensorNuevoComponent from './components/SensorAddComponent.vue';
import WSComponent from './components/WSComponent.vue';

Vue.use(Router)

export default new Router({
    routes: [
        {
            path: '/',
            component: HomeComponent
        },
        {
            path: '/ws',
            component: WSComponent
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
            path: '/sensores/:id/edit',
            component: SensorEditComponent
        },
        {
            path: '/sensores/add',
            component: SensorNuevoComponent
        },
        {
            path: '/log/:id',
            component: LogComponent
        },  
    ],
    linkActiveClass: "active",
    mode: "history"
})