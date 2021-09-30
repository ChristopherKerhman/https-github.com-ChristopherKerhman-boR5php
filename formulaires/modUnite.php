<!--Element pour créer la présentation des textes.
<script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script>
<script type="text/javascript">bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });</script>
Fin-->
<?php
// Ajout des Tableaux
include 'stockage/de.php';
include 'stockage/typeTroupe.php';
include 'stockage/typeFigurine.php';
include 'stockage/sauvegarde.php';
include 'stockage/pointDeVie.php';
// Rendre les données exploitable pour le module VueJS CDN
$MT = intval($dataOneU[0]['deplacement']);
$CTac = intval($dataOneU[0]['course']);
 ?>
 <h3>Faction de l'unité : <?php echo $dataOneU[0]['nomFaction']; ?></h3>
<form action="gestionDB/edit/unite.php" method="post">
  <input type="hidden" name="idUnite" value=" <?php echo $dataOneU[0]['idUnite']; ?>">
<label for="nom">Nom de l'unité :</label>
  <input class="sizeInpute" type="text" name="nomFigurine" value=" <?php echo $dataOneU[0]['nomFigurine']; ?>">
    <p>Valeur actuel de l'unité : <strong><?php echo $dataOneU[0]['valeurUnite']; ?></strong></p>
<div>
    <label for="description">Description de l'unité</label>
    <textarea name="Description" rows="8" cols="80"> <?php echo $dataOneU[0]['Description']; ?></textarea>
</div>
<div class="conteneur_row marge box">

  <div id="MODCOURSE">
    <label for="deplacement">Déplacement tactique</label>
    <input type="number" name="deplacement" v-model="deplacement" min="0" max="18" />
    <p>Mouvement : {{deplacement}}" / {{course}}" + 1D4" </p>
    <input type="hidden" name="course" v-model="course" />
    <label for="vol">Vol</label>
    <select id="vol" class="sizeInpute" name="vol">
<?php  $dataOneU[0]['vol'];
if ($dataOneU[0]['vol'] == '1') {
  echo '<option value="0">Non</option><option value="1" selected>Oui</option>';
} else {
  echo '<option value="0" selected>Non</option><option value="1">Oui</option>';
}
?>
    </select>
    <label for="volS">Vol stationnaire</label>
    <select id="volS" class="sizeInpute" name="station">
      <?php  $dataOneU[0]['station'];
      if ($dataOneU[0]['vol'] == '1') {
        echo '<option value="0">Non</option><option value="1" selected>Oui</option>';
      } else {
        echo '<option value="0" selected>Non</option><option value="1">Oui</option>';
      }
      ?>
    </select>
  </div>
  <div id="VERROU" class="conteneur_col box marge">
    <h4>Element à valider à nouveau</h4>
<label for="type">Type de troupe</label>
  <select id="type" class="sizeInpute" v-model="type" name="typeTroupe">
    <?php
    foreach ($typeTroupe as $key) {
      echo '<option value="'.$key['valeur'].'">'.$key['troupe'].'</option>';
    }
    ?>
  </select>
  <p>Etat actuel : <strong><?php echo $typeTroupe[$dataOneU[0]['typeTroupe']]['troupe']; ?></strong></p>
<label for="taille">Type de figurine</label>
  <select id="taille" class="sizeInpute" name="taille">
    <?php
    foreach ($typeFigurine as $key) {
      echo '<option value="'.$key['valeur'].'">'.$key['taille'].'</option>';
    }
    ?>
  </select>
  <p>Etat actuel : <strong><?php echo $typeFigurine[$dataOneU[0]['taille']]['taille']; ?></strong></p>
  <label v-if="cle" for="niveauMage">Niveau si l'unité est un Mage</label>
  <select v-if="cle" id="niveauMage" class="sizeInpute" name="niveauMage">
<?php
  if ($dataOneU[0]['niveauMage'] == '0') {
  echo '<option value="1">Mage niveau 1</option><option value="2">Mage niveau 2</option><option value="3">Mage niveau 3</option>';
  }
  if ($dataOneU[0]['niveauMage'] == '1') {
    echo '<option value="1" selected>Mage niveau 1</option><option value="2">Mage niveau 2</option><option value="3">Mage niveau 3</option>';
  }
  if ($dataOneU[0]['niveauMage'] == '2'){
    echo '<option value="1">Mage niveau 1</option><option value="2" selected>Mage niveau 2</option><option value="3">Mage niveau 3</option>';
  }
  if ($dataOneU[0]['niveauMage'] == '3'){
    echo '<option value="1">Mage niveau 1</option><option value="2">Mage niveau 2</option><option value="3" selected>Mage niveau 3</option>';
  }
?>
  </select>
  <p v-if="cle" >Niveau actuel : <strong><?php echo $dataOneU[0]['niveauMage']; ?></strong></p>
</div>
<div class="conteneur_col marge box">
    <h4>Element à valider à nouveau</h4>
  <label for="DC">Dé de combat</label>
  <select id="DC" class="sizeInpute" name="DC">
    <?php
    foreach ($typeDe as $key) {
      echo '<option value="'.$key['valeur'].'">'.$key['de'].'</option>';
    }
     ?>
  </select>
  <p>Etat actuel : <strong><?php echo $typeDe[$dataOneU[0]['DC']]['de']; ?></strong></p>
  <label for="DQM">Dé de qualité martial</label>
  <select id="DQM" class="sizeInpute" name="DQM">
    <?php
    foreach ($typeDe as $key) {
      echo '<option value="'.$key['valeur'].'">'.$key['de'].'</option>';
    }
     ?>
  </select>
  <p>Etat actuel : <strong><?php echo $typeDe[$dataOneU[0]['DQM']]['de']; ?></strong></p>
</div>
<div class="conteneur_col marge box">
<h4>Element à valider à nouveau</h4>
  <label for="pdv">Point de vie ou structure</label>
  <select id="pdv" class="sizeInpute" name="pointDeVie">
    <?php
    foreach ($pdv as $key) {
      echo '<option value="'.$key['index'].'">Point de vie = '.$key['pdv'].'</option>';
    }
     ?>
  </select>
  <p>Etat actuel : <strong><?php echo $pdv[$dataOneU[0]['pointDeVie']]['pdv']; ?> point de vie.</strong></p>
  <label for="svg">Sauvegarde</label>
  <select id="pdv" class="sizeInpute" name="sauvegarde">
    <?php
    foreach ($sauvegarde as $key) {
      echo '<option value="'.$key['index'].'">sauvegarde = '.$key['Type'].' - '.$key['message'].'</option>';
    }
     ?>
  </select>
  <p>Etat actuel : <strong><?php echo $sauvegarde[$dataOneU[0]['sauvegarde']]['Type'].' - '.$sauvegarde[$dataOneU[0]['sauvegarde']]['message']; ?></strong></p>
    </div>
</div>
<button class="classique" type="submit" name="button">Enregistrer</button>
</form>
<?php
include 'composantVueJS/verrouMage.php';
include 'composantVueJS/courseMOD.php';
?>
