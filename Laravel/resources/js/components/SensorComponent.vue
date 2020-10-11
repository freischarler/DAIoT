<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Sensor List</div>
                
                <div class="card-body">

                <table class="table">

                    <tr>
                        <th width="15%">Serial</th>
                        <th width="15%">Ubicacion</th>
                        <th width="15%">Temperatura</th>
                        <th width="15%">Humedad</th>
                        <th width="30%">Tiempo</th>  
                        <th width="10%">Acciones</th>

                    </tr>

                    <tr v-for="sensor in sensores" :key="sensor.id">
                        <td>{{ sensor.serial }}</td>
                        <td>{{ sensor.ubicacion }}</td>
                        <td>{{ sensor.temperatura }}</td>
                        <td>{{ sensor.humedad }}</td>
                        <td>{{ sensor.tiempo }}</td>
                        <button type="button" class="btn btn-default" aria-label="Left Align">
                            <router-link :to="'/log/' + sensor.id" class="btn btn-primary nav-link" >Ver Log</router-link>
                            <router-link :to="'/sensores/' + sensor.id +'/edit'" class="glyphicon glyphicon-pencil" aria-hidden="true"></router-link>
                            <router-link :to="'/sensores/' + sensor.id +'/delete'"  class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></router-link>
                        </button>
                        <!--td><router-link :to="'/log/' + sensor.id" class="btn btn-primary nav-link" >Ver Log</router-link></td>
                        <td><router-link :to="'/sensores/' + sensor.id +'/edit'" class="btn btn-primary nav-link" >Edit</router-link></td-->
                    </tr>

                    <!-- dsf>a :href="'/sensor/' + sensor.id" class="btn btn-primary nav-link" <-->

                </table>


                <router-link :to="'/sensores/add'" class="btn btn-secondary btn-block btn-lg active" role="button" aria-pressed="true">Nuevo</router-link>
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
              sensores: [],
            }
        },
        methods: {
            getsensores(){
                axios.get('/api/sensor')
                     .then((response)=>{
                       this.sensores = response.data.data,
                       console.log(response.data.data);
                     })
            },
            verLog(id) {
                console.log(id);
                //element.scrollIntoView({ behavior: 'smooth' });
            }
        },
        created() {
            this.getsensores()
        }
    }
</script> 

<style>

</style>