<!--<template>

<div class="container">
       <div id="LineChart">
        <GChart
      type="LineChart"
      :data="chartData"
      :options="chartOptions"
        />    
        </div>
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
    import { GChart } from "vue-google-charts";

    export default {
        name: 'LineChart',
        components: { GChart },
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


<template>
  <div class="container">
    <line-chart
      v-if="loaded"
      :chartData="chartData"
      :options="options"/>
  </div>
</template>

!-->
<template>
  <div class="container">
    <line-chart
      v-if="loaded"
      :chartData="chartData"
      :chartDataH="chartDataH" 
      :chart-labels="labels"
      :labelT="labelT"
      :labelH="labelH" 
      :height="150"
      />

  <!--div>
    <div class="overflow-auto">
    <b-pagination
      v-model="currentPage"
      :total-rows="rows"
      :per-page="perPage"
      aria-controls="my-table"
    ></b-pagination>

    <p class="mt-3">Current Page: {{ currentPage }}</p>

    <b-table
      id="my-table"
      :sensores="sensores"
      :per-page="perPage"
      :current-page="currentPage"
      small
      ></b-table>
    </div>

  </div-->
    
    <div class="row justify-content-center">
        

        <div class="col-md-10">

          <p style="padding-top: 20px; padding-bottom:20px">
            <a href="javascript:history.go(-1)" class="btn btn-primary  btn-block btn-lg active" role="button" aria-pressed="true">REGRESAR</a>
          </p>

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

                
                </div>
            </div>

            

        </div>
    </div>
  </div>

  
</template>

<script>
import LineChart from './Chart.vue'

export default {
  name: 'LineChartContainer',
  components: { LineChart },
  data: () => ({
    loaded: false,
    chartData: null,
    chartDataH: null,
    sensores: [],
    perPage: 20,
    currentPage: 1,
  }),
    async mounted () {
        this.loaded = false;
        axios.get('/api/log/'+this.$route.params.id)
            .then(response => {
                this.sensores = response.data.data;
                this.chartData = response.data.data.map(temp => temp.temperatura);
                this.chartDataH = response.data.data.map(hum => hum.humedad);
                this.labels = response.data.data.map(temp=> temp.tiempo);
            
            this.loaded = true;
            console.log(response.data);
            this.labelT="Temperatura";
            this.labelH="Humedad";
        })
        .catch(error => {
          console.log(error)
      })
    },
    computed: {
      rows() {
        return this.sensores.length
      }
    }
  }
</script>