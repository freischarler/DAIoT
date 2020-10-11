<template>

    <div class="container">
        <div class="row justify-content-center">
            <div class="publish">
                <h1><b>Websocket</b><small> UI</small></h1>
                <input id="trama_topic" v-model="trama.topic" placeholder="Topico">
                <input id="trama_message" v-model="trama.message" placeholder="Mensaje">

                <button @click="publish1">Publicar</button>
            </div>
        </div>
    </div>
</template>

<script>



export default {
    data() {
        return {
            trama: {
                topic : '',
                menssage : ''
            }
        };
    },
    methods: {
        publish1 () {
            console.log(this.trama);
        this.$mqtt.publish(this.trama.topic, this.trama.message)
    }
    },
    mqtt: {
        'VueMqtt/publish1' (data, topic) {
        console.log(topic + ': ' + String.fromCharCode.apply(null, data))
    }
  }
}
</script>

