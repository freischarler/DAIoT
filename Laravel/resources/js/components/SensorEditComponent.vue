<template>
  <div class="container">
      <form @submit.prevent="onSubmit($event)">
        <div class="form-group">
            <label for="sensor_serial">Nombre</label>
            <input id="sensor_serial" v-model="sensor.serial" />
        </div>
        <div class="form-group">
            <label for="sensor_ubicacion">Ubicacion</label>
            <input id="sensor_ubicacion" v-model="sensor.ubicacion" />
        </div>
        <div class="form-group">
            <button type="submit">UPDATE</button>
            <a href="javascript:history.go(-1)" class="btn btn-primary  btn-block btn-lg active" role="button" aria-pressed="true">REGRESAR</a>
        </div>
    </form>
  </div>
</template>
<script>
export default {
  data() {
    return {
      sensor: {
        id: this.$route.params.id,
        serial: "",
        ubicacion: ""
      }
    };
  },
  methods: {
    onSubmit(event) {
        console.log(this.sensor);
        axios.put('/api/sensor/'+this.$route.params.id, {
        id: this.sensor.id,
        serial: this.sensor.serial,
        ubicacion: this.sensor.ubicacion,
        }).then((response) => {
        console.log(response);
        this.message = 'User updated';
        setTimeout(() => this.message = null, 2000);
        //this.sensor = response.data.data;
        }).catch(error => {
            console.log(error)
    }) }
  },
  created() {
      // @todo load user details
  }
};
</script>