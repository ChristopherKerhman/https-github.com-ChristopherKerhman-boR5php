<?php
include 'Fheader.php';
include 'gestionDB/read/Findex.php';
include 'stockage/sortGenerique.php';
$_SESSION['idUniversVisite'] = NULL;
$_SESSION['nomUnivers'] = NULL;
?>
<section>

  <div id="RS">
    <h4 v-if="!cle" v-on:click="cle = true" class="lienNav">Les règles spéciales</h4><h4 v-else v-on:click="cle = false" class="lienNav">Les règles spéciales <i class="far fa-window-close"></i></h4>
    <article v-if="cle" class="conteneur_col">
        <div  class="justify largeur1" v-if="RStext != ''"><h4 >{{titreRS}}</h4><p>{{RStext}}</p></div>
    </article>
  <article v-if="cle" class="conteneur_Wrap">
    <ul class="listRSPublication">
      <li v-for="listing in RS" v-bind:key="listing" type="button" name="button" v-on:click="actionRS(listing.nomRS,listing.descriptionRS)"><h4 class="lienNav">{{listing.nomRS}}</h4></li>
    </ul>
  </article>
  <article>
    <h4 v-if="!cle2" v-on:click="cle2 = true" class="lienNav">Les sorts génériques</h4><h4 v-else v-on:click="cle2 = false" class="lienNav">Les sortes génériques<i class="far fa-window-close"></i></h4>
    <div v-if="cle2" class="conteneur_col">
      <div class="justify largeur1 conteneur_col" v-if="titreSort != ''">
        <h4>{{titreSort}} - Niveau {{niveauSort}}</h4>
        <p>{{textSort}}</p>
      </div>
    <ul class="left">
      <li class="lienNav" v-for="abra in SG" v-bind:key="abra" v-on:click="affichageSort(abra.nom, abra.description, abra.niveau)"><strong>Nom du sort : {{abra.nom}}</strong> - <strong>Niveau : {{abra.niveau}}</strong></li>
    </ul>
    </div>
  </article>
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
      cle2: false,
      SG: <?php echo $data = json_encode($sort); ?>,
      titreSort: '',
      textSort: '',
      niveauSort: '',
      cle: false,
      RS: <?php echo $data = json_encode($dataRS); ?>,
      titreRS: '',
      RStext: ''
      }
    },
    methods: {
      actionRS ($dataTitre, $data) {
      this.titreRS = $dataTitre
      this.RStext = $data
    },
    affichageSort ($nom, $description, $niveau) {
      this.titreSort = $nom
      this.textSort = $description
      this.niveauSort = $niveau
    }


    }
  })
  RS.mount('#RS')
</script>
<?php
  include 'footer.php';
?>
