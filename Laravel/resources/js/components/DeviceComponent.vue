<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Device List</div>
                
                <div class="card-body">

                <table class="table">

                    <tr>
                        <th width="10%">Id</th>
                        <th width="30%">Serial</th>
                        <th width="45%">Description</th>
                        <th width="15%">Acciones</th>
                    </tr>

                    <tr v-for="device in devices" :key="device.id">
                        <td>{{ device.id }}</td>
                        <td>{{ device.serial }}</td>
                        <td>{{ device.description }}</td>
                        <button type="button" class="btn btn-default" aria-label="Right Align">
                            <router-link :to="'/log/' + device.id" class="btn btn-primary nav-link" style="width:75px; background-color: #469e65" v-if="device.estado==0">ON</router-link>
                            <router-link :to="'/log/' + device.id" class="btn btn-primary nav-link" style="width:75px; background-color: #e07169" v-if="device.estado==1">OFF</router-link>

                            <router-link :to="'/dispositivos/' + device.id +'/edit'" class="glyphicon glyphicon-pencil" aria-hidden="true"></router-link>
                            <router-link :to="'/dispositivos/' + device.id +'/delete'"  class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></router-link>
                        </button>
                    </tr>
                </table>
                <router-link :to="'/dispositivos/add'" class="btn btn-secondary btn-block btn-lg active" role="button" aria-pressed="true">Nuevo</router-link>
                

                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {

        data() {
            return {
              devices: [],
            }
        },
        methods: {
            getdevices(){
                axios.get('/api/dispositivos')
                     .then((response)=>{
                        console.log(response);
                       this.devices = response.data.data,
                       console.log(response.data.data);
                     })
            }
        },
        created() {
            this.getdevices()
        }
    }
</script> 

<style>

</style>