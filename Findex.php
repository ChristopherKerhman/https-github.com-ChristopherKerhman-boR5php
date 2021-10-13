<?php
include 'Fheader.php';
include 'gestionDB/read/Findex.php';
$_SESSION['idUniversVisite'] = NULL;
$_SESSION['nomUnivers'] = NULL;
?>
<section>
  <h4>Les règles spéciales</h4>
  <div id="RS">
  <article class="conteneur_Wrap">
<button v-for="listing in RS" v-bind:key="listing" class="buttonGestionLore" type="button" name="button" v-on:click="actionRS(listing.nomRS,listing.descriptionRS)">{{listing.nomRS}}</button>
  </article>
  <h4>{{titreRS}}</h4>
    <p class="paragraphe" v-if="RStext != ''">{{RStext}}</p>
      </div>
</section>
<section>
  <h4>Les univers crées par les utilisateurs</h4>
  <article class="conteneur_Wrap">
    <?php
    foreach ($dataUnivers as $key) {
      echo '<a class="lienButton" href="FFicheUnivers.php?idU='.$key['idUnivers'].'&nomU='.$key['nomUnivers'].'">
      <button class="buttonGestionLore" type="button" name="button">'.$key['nomUnivers'].'</button></a>';
    }
     ?>
  </article>
</section>
<!--Affichage des règles spéciales-->
<script>
  const RS = Vue.createApp({
    data () {
      return {
      RS: <?php echo $data = json_encode($dataRS); ?>,
      titreRS: '',
      RStext: ''
      }
    },
    methods: {
      actionRS ($dataTitre, $data) {
      this.titreRS = $dataTitre
      this.RStext = $data
    }

    }
  })
  RS.mount('#RS')
</script>
<?php
  include 'footer.php';
?>
