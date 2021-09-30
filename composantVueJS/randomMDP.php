<script>
// Application MDP en vueJS
  const randomMDP = Vue.createApp({
    data () {
      return {
         ALPHAUp: ['A', 'B', 'C', 'D','E','F','G','H','I', 'J','K', 'L', 'M','N','O', 'P', 'Q', 'R', 'S', 'T','U','V','W','X','Y','Z'],
         ALPHAmin: ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'w', 'x', 'y', 'z'],
         NUM: ['1', '2', '3', '4', '5', '6', '7', '8', '9'],
         CP:['@', '&', '!', '?', '$'],
        construct: ''
      }
    },
    methods: {
      randomPS () {
        this.construct = ''
    for (let i = 0; i < 8; i++) {
    const K = Math.random()
    if (K < 0.25) {
     this.construct = this.ALPHAUp[Math.floor(Math.random()* this.ALPHAUp.length)] + this.construct;
    }
      if (K < 0.5) {
      this.construct = this.ALPHAmin[Math.floor(Math.random()* this.ALPHAmin.length)] + this.construct
        }
       if (K < 0.75) {
        this.construct = this.NUM[Math.floor(Math.random()* this.NUM.length)] + this.construct
       }
        if (K > 0.75) {
         this.construct = this.CP[Math.floor(Math.random()* this.CP.length)] + this.construct
      }
    }
  }
}
})
  randomMDP.mount('#randomMDP');
</script>
