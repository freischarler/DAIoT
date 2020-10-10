<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Device List</div>
                
                <div class="card-body">

                <table class="table">

                    <tr>
                        <th width="30%">Id</th>
                        <th width="30%">Serial</th>
                        <th width="20%">Description</th>
                        <th width="5%">Enabled?</th>
                    </tr>

                    <tr v-for="device in devices" :key="device.device_id">
                        <td>{{ device.device_id }}</td>
                        <td>{{ device.serial }}</td>
                        <td>{{ device.description }}</td>
                        <td><span class="glyphicon glyphicon-trash"></span></td>
                    </tr>
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