<!--Element pour créer la présentation des textes
<script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script>
<script type="text/javascript">bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });</script>
En attendant grapeJS-->
<h3>Création d'une nouvelle arme de mêlée</h3>
<article class="conteneur_col">
<form action="gestionDB/record/weaponM.php" method="post">
<?php include 'affichages/universDuCreateur.php';
// name="idMultivers"
// Tableau de oui / non
include 'stockage/yes.php';
?>
<br />
<label for="nom">Nom de votre arme :</label>
<input id="nom" class="sizeInpute" type="text" name="nomArme" required>
<label for="vehicule">Arme monté sur véhicule ?</label>
<select id="vehicule" class="sizeInpute" name="armeVehicule">
  <?php
  foreach ($yes as $key) {
    echo '<option value="'.$key['index'].'">'.$key['texte'].'</option>';
  }
   ?>
</select>
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
<label for="sort">Sort :</label>
<select id="sort" class="sizeInpute" name="sort">
  <option value="0">Non</option>
  <option value="1">Oui</option>
</select>
<input type="hidden" name="idCreateur" value="<?php echo $_SESSION['idUser']; ?>" />
<button class="classique" type="submit" name="button">Enregistrer</button>
</form>
</article>
