<?php
// Ajout des Tableaux
include 'stockage/de.php';
include 'stockage/typeTroupe.php';
include 'stockage/typeFigurine.php';
include 'stockage/sauvegarde.php';
include 'stockage/pointDeVie.php';
 ?>
<form action="gestionDB/record/addUnite.php" method="post">
  <label for="faction">La faction de l'unité</label>
  <select id="faction" class="sizeInpute" name="id_faction">
<?php
include 'gestionDB/read/factions.php'; // variable de sortie : $dataFaction
foreach ($dataFaction as $key) {
  echo '<option value="'.$key['idFaction'].'">'.$key['nomUnivers'].' - '.$key['nomFaction'].'</option>';
}
?>
  </select>
  <input type="hidden" name="idP" value="<?php echo $_SESSION['idUser']; ?>">
  <label for="nom">Nom de l'unité :</label>
  <input class="sizeInpute" type="text" name="nomFigurine" placeholder="Nom de votre unité.">
  <div>
    <label for="description">Description de l'unité</label>
    <textarea name="Description" rows="8" cols="80">Description de votre nouvelle unité.</textarea>
  </div>

<div class="conteneur_row marge box">
  <div id="COURSE">
    <label for="deplacement">Déplacement tactique</label>
    <input type="number" name="deplacement" v-model="deplacement" min="0" max="18" />
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
  <div id="VERROU" class="conteneur_col box marge">
    <label for="type">Type de troupe</label>
      <select id="type" class="sizeInpute" v-model="type" name="typeTroupe">
        <?php
        foreach ($typeTroupe as $key) {
          echo '<option value="'.$key['valeur'].'">'.$key['troupe'].'</option>';
        }
        ?>
      </select>
    <label for="taille">Type de figurine</label>
      <select id="taille" class="sizeInpute" name="taille">
        <?php
        foreach ($typeFigurine as $key) {
          echo '<option value="'.$key['valeur'].'">'.$key['taille'].'</option>';
        }
        ?>
      </select>
      <label v-if="cle" for="niveauMage">Niveau si l'unité est un Mage</label>
      <select v-if="cle" id="niveauMage" class="sizeInpute" name="niveauMage">
        <option value="1">Mage niveau 1</option>
        <option value="2">Mage niveau 2</option>
        <option value="3">Mage niveau 3</option>
      </select>
  </div>
  <div class="conteneur_col marge box">
    <label for="DC">Dé de combat</label>
    <select id="DC" class="sizeInpute" name="DC">
      <?php
      foreach ($typeDe as $key) {
        echo '<option value="'.$key['valeur'].'">'.$key['de'].'</option>';
      }
       ?>
    </select>
    <label for="DQM">Dé de qualité martial</label>
    <select id="DQM" class="sizeInpute" name="DQM">
      <?php
      foreach ($typeDe as $key) {
        echo '<option value="'.$key['valeur'].'">'.$key['de'].'</option>';
      }
       ?>
    </select>
  </div>
  <div class="conteneur_col marge box">
    <label for="pdv">Point de vie ou structure</label>
    <select id="pdv" class="sizeInpute" name="pointDeVie">
      <?php
      foreach ($pdv as $key) {
        echo '<option value="'.$key['index'].'">Point de vie = '.$key['pdv'].'</option>';
      }
       ?>
    </select>
    <label for="svg">Sauvegarde</label>
    <select id="pdv" class="sizeInpute" name="sauvegarde">
      <?php
      foreach ($sauvegarde as $key) {
        echo '<option value="'.$key['index'].'">sauvegarde = '.$key['Type'].' - '.$key['message'].'</option>';
      }
       ?>
    </select>
      </div>
</div>
<button class="classique" type="submit" name="button">Enregistrer</button>
</form>
<?php
include 'composantVueJS/verrouMage.php';
include 'composantVueJS/course.php';
 ?>
