<script type="text/javascript">
  const VERROU = Vue.createApp({
    data () {
      return {
        type: 0,
      cle: false
      }
    },
    updated () {
      if (this.type != 6) {
        this.cle = false
      }
      if (this.type == 6) {
        this.cle = true
      }
    }
  })
  VERROU.mount('#VERROU')
</script>
