<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Log List</div>
                
                <div class="card-body">

                <table class="table">

                    <tr>
                        <th width="28%">Serial</th>
                        <th width="28%">Temperatura</th>
                        <th width="28%">Humedad</th>
                        <th width="5%">Tiempo</th>  
                        <th width="10%"></th>
                    </tr>

                    <tr v-for="sensor in sensores" :key="sensor.serial">
                        <td>{{ sensor.serial }}</td>
                        <td>{{ sensor.temperatura }}</td>
                        <td>{{ sensor.humedad }}</td>
                        <td>{{ sensor.tiempo }}</td>
                    </tr>
                </table>

                <a href="javascript:history.go(-1)" class="btn btn-primary  btn-block btn-lg active" role="button" aria-pressed="true">REGRESAR</a>
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
            init () {

            },
            getsensores(){
                console.log(this.$route.params);
                axios.get('/api/log/'+this.$route.params.id)
                     .then((response)=>{
                       this.sensores = response.data.data;
                       console.log(response.data.data);
                     })
            }
        },
        created() {
            this.getsensores()
            this.init();
        }
    }
</script> 

<style>

</style>