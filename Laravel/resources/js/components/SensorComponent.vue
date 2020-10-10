<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Sensor List</div>
                
                <div class="card-body">

                <table class="table">

                    <tr>
                        <th width="28%">Serial</th>
                        <th width="28%">Temperatura</th>
                        <th width="28%">Humedad</th>
                        <th width="5%">Tiempo</th>  
                        <th width="10%"></th>
                    </tr>

                    <tr v-for="sensor in sensores" :key="sensor.id">
                        <td>{{ sensor.serial }}</td>
                        <td>{{ sensor.temperatura }}</td>
                        <td>{{ sensor.humedad }}</td>
                        <td>{{ sensor.tiempo }}</td>
                        <td><router-link :to="'/log/' + sensor.id" class="btn btn-primary nav-link" >Ver Log</router-link></td>
                    </tr>

                    <!-- dsf>a :href="'/sensor/' + sensor.id" class="btn btn-primary nav-link" <-->

                </table>


                <a href="#" class="btn btn-danger btn-block btn-lg active" role="button" aria-pressed="true">EDITAR</a>
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