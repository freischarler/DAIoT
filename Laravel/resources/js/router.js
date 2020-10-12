import Vue    from 'vue'
import Router from 'vue-router'

import HomeComponent    from './components/HomeComponent.vue'
import DeviceComponent from './components/DeviceComponent.vue';
import DeviceAddComponent from './components/DeviceAddComponent.vue';
import DeviceEditComponent from './components/DeviceEditComponent.vue';
import DeviceDeleteComponent from './components/DeviceDeleteComponent.vue';

import SensorComponent from './components/SensorComponent.vue';
import LogComponent from './components/LogComponent.vue';
import SensorEditComponent from './components/SensorEditComponent.vue';
import SensorDeleteComponent from './components/SensorDeleteComponent.vue';
import SensorAddComponent from './components/SensorAddComponent.vue';
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
            path: '/dispositivos/:id/edit',
            component: DeviceEditComponent
        },
        {
            path: '/dispositivos/:id/delete',
            component: DeviceDeleteComponent
        },
        {
            path: '/dispositivos/add',
            component: DeviceAddComponent
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
            path: '/sensores/:id/delete',
            component: SensorDeleteComponent
        },
        {
            path: '/sensores/add',
            component: SensorAddComponent
        },
        {
            path: '/log/:id',
            component: LogComponent
        },  
    ],
    linkActiveClass: "active",
    mode: "history"
})