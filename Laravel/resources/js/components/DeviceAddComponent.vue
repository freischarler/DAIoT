<template>
  <div class="container">
      <div class="row justify-content-center">
      <form @submit.prevent="onSubmit($event)">
        <div class="form-group">
            <label for="dispositivo_serial">Nombre</label>
            <input id="dispositivo_serial" v-model="dispositivo.serial" />
        </div>
        <div class="form-group">
            <label for="dispositivo_ubicacion">Ubicacion</label>
            <input id="dispositivo_ubicacion" v-model="dispositivo.description" />
        </div>
        <div class="form-group">
            <button class="btn btn-danger  btn-block btn-lg active" type="submit">AGREGAR</button>
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
      dispositivo: {
        serial: '',
        descripcion: ''
      }
    };
  },
  methods: {
    onSubmit(event) {
        console.log(this.dispositivo);
        axios.post('/api/dispositivo', {
        serial: this.dispositivo.serial,
        description: this.dispositivo.description,
        }).then((response) => {
        console.log(response);
        this.message = 'User updated';
        setTimeout(() => this.message = null, 2000);
        router.push({ path: '/dispositivos' })
        }).catch(error => {
            console.log(error)
    }) }
  },
  created() {
      // @todo load user details
  }
};
</script>