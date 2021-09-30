<script type="text/javascript">
const COURSE = Vue.createApp({
  data () {
    return {
    deplacement: 0,
    course: 0
    }
  },
  updated () {
    this.course = Math.floor(this.deplacement * 2)
    if(this.deplacement > 25) {
      this.deplacement = 25
    }
    if(this.deplacement < 0) {
      this.deplacement = 0
    }
  }
})
COURSE.mount('#COURSE')
</script>
