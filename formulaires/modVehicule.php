<?php
// Ajout des Tableaux
include 'stockage/de.php';
include 'stockage/pointDeVie.php';
//print_r($dataOneV);
 ?>
 <h3>Modifier <?php echo $dataOneV[0]['nomVehicule'].' au prix de '.round($dataOneV[0]['valeur'], 0); ?> points</h3>
<form class="conteneur_col" action="gestionDB/edit/vehicule.php" method="post">
  <input type="hidden" name="idVehicule" value="<?php echo $dataOneV[0]['idVehicule']; ?>">
<label for="faction">La faction du véhicule</label>
<select id="faction" class="sizeInpute" name="id_faction">
  <?php include 'gestionDB/read/factions.php'; // variable de sortie : $dataFaction
    foreach ($dataFaction as $key) {
      echo '<option value="'.$key['idFaction'].'">'.$key['nomUnivers'].' - '.$key['nomFaction'].'</option>';
    }
$NT = $dataFaction[0]['NT'];
  ?>
</select>

<div class="conteneur_col marge box">
  <input type="hidden" name="id_proprietaire" value="<?php echo $_SESSION['idUser']; ?>">
  <div class=conteneur_row"">
    <label for="nom">Nom du véhicule :</label>
    <input class="sizeInpute" type="text" name="nomVehicule" value="<?php echo $dataOneV[0]['nomVehicule']; ?>">
    <label for="typeV">Type de véhicule</label>
    <select id="typeV" class="sizeInpute" name="typeVehicule">
      <?php
      include 'stockage/typeVehicule.php';
      foreach ($typeVehicule as $key) {
        echo '<option value="'.$key['index'].'">'.$key['type'].'</option>';
      }
       ?>
    </select>
    <label for="equipage">Equipage <?php echo $equipage[$dataOneV[0]['equipage']]['equipage'] ?></label>
    <select id="equipage" class="sizeInpute" name="equipage">
      <?php
      foreach ($equipage as $key) {
        echo '<option value="'.$key['index'].'">'.$key['equipage'].'</option>';
      }
       ?>
     </select>
     <label for="passager">Nbr de passager <?php echo $passager[$dataOneV[0]['passager']]['nbr']; ?></label>
     <select id="passager" class="sizeInpute" name="passager">
       <?php
       foreach ($passager as $key) {
         echo '<option value="'.$key['index'].'">'.$key['nbr'].'</option>';
       }
        ?>
     </select>

  </div>
     <label for="description">Description du véhicule</label>
     <textarea name="descriptionVehicule" rows="8" cols="80"><?php echo $dataOneV[0]['descriptionVehicule']; ?></textarea>
</div>

<div class="conteneur_row">
<div class="conteneur_row marge box">
  <div id="COURSE">
    <label for="deplacement">Déplacement tactique :  </label>
    <p>Mouvement Tactique avant modification <?php echo $dataOneV[0]['mouvementVehicule']; ?> et Course <?php echo $dataOneV[0]['courseVehicule']; ?></p>
    <input type="number" name="deplacement" v-model="deplacement" min="0" max="25" />
    <p>Mouvement : {{deplacement}}" / {{course}}" + 1D4" </p>
    <input type="hidden" name="course" v-model="course" />
    <label for="vol">Vol</label>
    <select id="vol" class="sizeInpute" name="vol">
      <option value="0" selected>Non</option>
      <option value="1">Oui</option>
    </select>
    <label for="volS">Vol stationnaire</label>
    <select id="volS" class="sizeInpute" name="station">
      <option value="0" selected>Non</option>
      <option value="1">Oui</option>
    </select>
  </div>
  </div>
  <div class="conteneur_col marge box">
    <label for="DQM">DQM <?php echo $typeDe[$dataOneV[0]['DQM']]['de']; ?></label>
    <select id="DQM" class="sizeInpute" name="DQM">
        <?php
        foreach ($typeDe as $key) {
          echo '<option value="'.$key['valeur'].'">'.$key['de'].'</option>';
        }
         ?>
    </select>
    <label for="DC">DC <?php echo $typeDe[$dataOneV[0]['DC']]['de']; ?></label>
    <select id="DC" class="sizeInpute" name="DC">
        <?php
        foreach ($typeDe as $key) {
          echo '<option value="'.$key['valeur'].'">'.$key['de'].'</option>';
        }
         ?>
    </select>
  </div>
    <div class="conteneur_col marge box">
      <label for="svg">Point de structure <?php echo $structure[$dataOneV[0]['pointStructure']]['ps']; ?> PS</label>
      <select id="svg" class="sizeInpute" name="pointStructure">
        <?php
        foreach ($structure as $key) {
          echo '<option value="'.$key['index'].'">'.$key['ps'].' Points</option>';
        }
         ?>
      </select>
      <label for="svg">Blindage <?php echo $blindage[$dataOneV[0]['svg']]['type'].' - '.$blindage[$dataOneV[0]['svg']]['svg']; ?></label>
      <select id="svg" class="sizeInpute" name="svg">
        <?php
        foreach ($blindage as $key) {
          echo '<option value="'.$key['index'].'">'.$key['svg'].' - '.$key['type'].'</option>';
        }
         ?>

      </select>
    </div>
</div>
<button class="classique" type="submit" name="button">Modifier</button>
</form>
<?php
include 'composantVueJS/courseVehicule.php';
 ?>
