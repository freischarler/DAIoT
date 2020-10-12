<template>
  <div class="container">
        <div class="row justify-content-center">
            <form @submit.prevent="onSubmit($event)">
                <div class="form-group">
                    <h1>DESEA ELIMINAR EL SENSOR {{this.$route.params.id}} ?</h1>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger  btn-block btn-lg active" type="submit">ELIMINAR</button>
                <a href="javascript:history.go(-1)" class="btn btn-primary  btn-block btn-lg active" role="button" aria-pressed="true">REGRESAR</a>
            </div>
            </form>
        </div>
    </div>
</template>
<script>
import router from '../router'

export default {
  methods: {
    onSubmit(event) {
        console.log(this.sensor);
        axios.post('/api/sensor/delete/'+this.$route.params.id).then((response) => {
        console.log(response);
        this.message = 'User updated';
        setTimeout(() => this.message = null, 2000);
        router.push({ path: '/sensores' })

        //this.sensor = response.data.data;
        }).catch(error => {
            console.log(error)
    })
    }
  },
  created() {
      // @todo load user details
  }
};
</script>