<script>
    import { Line, mixins  } from 'vue-chartjs'
    const { reactiveProp } = mixins

export default {
    extends: Line,
    mixins: [mixins.reactiveProp],
  props: {
       chartData: {
        type: Array ,
        required: false
      },
       chartDataH: {
        type: Array ,
        required: false
      },
      chartLabels: {
        type: Array,
        required: true
      },
      labelT:{
          type: String,
          required: true
      },
      labelH:{
          type: String,
          required: true
      }
    },
  mounted () {
    this.renderChart({
        labels: this.chartLabels,
        label: this.label,
        datasets: [
          {
            label: this.labelT,
            borderColor: '#f22718',
            pointBackgroundColor: 'white',
            borderWidth: 4,
            pointBorderColor: '#f22718',
            backgroundColor: 'transparent',
            data: this.chartData
          },
          {
            label: this.labelH,
            borderColor: '#249EBF',
            pointBackgroundColor: 'white',
            borderWidth: 4,
            pointBorderColor: '#249EBF',
            backgroundColor: 'transparent',
            data: this.chartDataH
          }
        ]
      }, this.options)
  }
}
</script>
<style>
</style>
