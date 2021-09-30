<?php
// Ajout des Tableaux
include 'stockage/de.php';
include 'stockage/pointDeVie.php';
 ?>
<form class="conteneur_col" action="gestionDB/record/addVehicule.php" method="post">
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
    <input class="sizeInpute" type="text" name="nomVehicule" placeholder="Nom de votre véhicule.">
    <label for="typeV">Type de véhicule</label>
    <select id="typeV" class="sizeInpute" name="typeVehicule">
      <?php
      include 'stockage/typeVehicule.php';
      foreach ($typeVehicule as $key) {
        echo '<option value="'.$key['index'].'">'.$key['type'].'</option>';
      }
       ?>
    </select>
    <label for="equipage">Equipage</label>
    <select id="equipage" class="sizeInpute" name="equipage">
      <?php
      foreach ($equipage as $key) {
        echo '<option value="'.$key['index'].'">'.$key['equipage'].'</option>';
      }
       ?>
     </select>
     <label for="passager">Nbr de passager</label>
     <select id="passager" class="sizeInpute" name="passager">
       <?php
       foreach ($passager as $key) {
         echo '<option value="'.$key['index'].'">'.$key['nbr'].'</option>';
       }
        ?>
     </select>

  </div>
     <label for="description">Description du véhicule</label>
     <textarea name="descriptionVehicule" rows="8" cols="80">Description de votre nouveau véhicule.</textarea>
</div>

<div class="conteneur_row">
<div class="conteneur_row marge box">
  <div id="COURSE">
    <label for="deplacement">Déplacement tactique</label>
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
    <label for="DQM">DQM</label>
    <select id="DQM" class="sizeInpute" name="DQM">
        <?php
        foreach ($typeDe as $key) {
          echo '<option value="'.$key['valeur'].'">'.$key['de'].'</option>';
        }
         ?>
    </select>
    <label for="DC">DC</label>
    <select id="DC" class="sizeInpute" name="DC">
        <?php
        foreach ($typeDe as $key) {
          echo '<option value="'.$key['valeur'].'">'.$key['de'].'</option>';
        }
         ?>
    </select>
  </div>

    <div class="conteneur_col marge box">
      <label for="svg">Point de structure</label>
      <select id="svg" class="sizeInpute" name="pointStructure">
        <?php
        foreach ($structure as $key) {
          echo '<option value="'.$key['index'].'">'.$key['ps'].' Points</option>';
        }
         ?>
      </select>
      <label for="svg">Blindage </label>
      <select id="svg" class="sizeInpute" name="svg">
        <?php
        foreach ($blindage as $key) {
          echo '<option value="'.$key['index'].'">'.$key['svg'].' - '.$key['type'].'</option>';
        }
         ?>

      </select>
    </div>
</div>
<button class="classique" type="submit" name="button">Enregistrer</button>
</form>
<?php
include 'composantVueJS/courseVehicule.php';
 ?>
