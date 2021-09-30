<script type="text/javascript">
const COURSE = Vue.createApp({
  data () {
    return {
    deplacement: 0,
    course: 0
    }
  },
  updated () {
    this.course = Math.floor(this.deplacement * 1.5)
    if(this.deplacement > 18) {
      this.deplacement = 18
    }
    if(this.deplacement < 0) {
      this.deplacement = 0
    }
  }
})
COURSE.mount('#COURSE')
</script>
