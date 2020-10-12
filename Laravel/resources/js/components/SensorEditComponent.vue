<template>
  <div class="container">
    <div class="row justify-content-center">
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
            <button class="btn btn-danger  btn-block btn-lg active" type="submit">EDITAR</button>
            <a href="javascript:history.go(-1)" class="btn btn-primary  btn-block btn-lg active" role="button" aria-pressed="true">REGRESAR</a>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
import router from '../router'

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
        router.push({ path: '/sensores' })
        }).catch(error => {
            console.log(error)
    }) }
  },
  created() {
      // @todo load user details
  }
};
</script>