<!--Element pour créer la présentation des textes.
<script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script>
<script type="text/javascript">bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });</script>
En attendant grapeJS-->
<h3>Création d'une nouvelle arme de tir</h3>
<article class="conteneur_col">
<form action="gestionDB/record/weaponT.php" method="post">
<div class="conteneur_row">
  <?php include 'affichages/universDuCreateur.php';
  // name="idMultivers"
  ?>
  <br />
  <label for="vehicule">Arme monté sur véhicule ?</label>
  <select id="vehicule" class="sizeInpute" name="armeVehicule">
    <?php include 'stockage/yes.php';
    foreach ($yes as $key) {
      echo '<option value="'.$key['index'].'">'.$key['texte'].'</option>';
    }
     ?>
  </select>
</div>
<div id="RANGE">
<label for="nom">Nom de votre arme :</label>
<input id="nom" class="sizeInpute" type="text" name="nomArme" required>
<label for="range">Portée maximal de votre armes :</label>
  <input type="range" name="rangeMax" v-bind:value="rangeActuel" v-model="rangeActuel" min="3" max="55">
  {{rangeActuel}} pouces {{Math.floor(rangeActuel * 2.54)}} cm
<div class="conteneur_col">
<label for="description">Description de l'arme :</label>
<textarea id="description" class="backgroundTextarea" name="descriptionArme" rows="4" cols="40">
Description de la nouvelle arme.
</textarea>
</div>
<label for="puissance">Puissance :</label>
<select id="puissance" class="sizeInpute" name="puissance">
  <option value="1">Puissance 1D</option>
  <option value="2">Puissance 2D</option>
  <option value="3">Puissance 3D</option>
  <option value="4">Puissance 4D</option>
  <option value="5">Puissance 5D</option>
</select>
<div class="conteneur_row marge">
<div class="conteneur_col marge box">
  <label for="sort">Sort</label>
  <select id="sort" class="sizeInpute" name="sort">
    <option value="0" selected>Non</option>
    <option value="1">Oui</option>
  </select>
  <label for="lourd">Arme lourde</label>
  <select id="lourd" class="sizeInpute" name="lourde">
    <option value="0" selected>Non</option>
    <option value="1">Oui</option>
  </select>
</div>
<div class="conteneur_col box">
  <label for="assaut">Arme d'assaut</label>
  <select id="assaut" class="sizeInpute" name="assaut">
    <option value="0" selected>Non</option>
    <option value="1">Oui</option>
  </select>
  <label for="couverture">Arme de couverture</label>
  <select id="couverture" class="sizeInpute" name="couverture">
    <option value="0" selected>Non</option>
    <option value="1">Oui</option>
  </select>
</div>
</div>
<label for="range">cadence de tir :</label>
  <input type="range" name="cadence" v-bind:value="cadenceActuel" v-model="cadenceActuel" min="-2" max="12">
  {{cadenceActuel}} tir(s) / round <p v-if="cadenceActuel < 0">Arme nécessitant un rechargement d'une durée de {{cadenceActuel - cadenceActuel*2}} round.</p>
</div>
<input type="hidden" name="idCreateur" value="<?php echo $_SESSION['idUser']; ?>" />
<button class="classique" type="submit" name="button">Enregistrer</button>
</form>
</article>
<?php
include 'composantVueJS/range.php';
?>
