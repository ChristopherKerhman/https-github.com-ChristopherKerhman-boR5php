<script type="text/javascript">
const MODCOURSE = Vue.createApp({
  data () {
    return {
    deplacement: <?php echo $MT; ?>,
    course: <?php echo $CTac; ?>
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
MODCOURSE.mount('#MODCOURSE')
</script>
