<script>
  const VERROUBOOL = Vue.createApp({
    data () {
      return {
      cle: true,
      cle2: false
      }
    }, methods: {
      verrouB () {
        if (this.cle2) {
          this.cle2 = false
        } else {
          this.cle2 = true
        }
      }
    }
  })
  VERROUBOOL.mount('#VERROUBOOL')
</script>
