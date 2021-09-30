
<form action="gestionDB/record/creatList.php" method="post">
  <div class="conteneur_menu">
<label for="nom">Nom de votre liste :</label>
<input class="sizeInpute" type="text" name="nomListe" required>
    <label for="faction">La faction et univers de la liste</label>
    <select id="faction" class="sizeInpute" name="id_faction">
    <?php
    include 'gestionDB/read/factions.php'; // variable de sortie : $dataFaction
    foreach ($dataFaction as $key) {
      echo '<option value="'.$key['idFaction'].'">'.$key['nomUnivers'].' - '.$key['nomFaction'].'</option>';
    }
    ?>
  </select>
  <label for="lore">Rattacher un article à votre liste ?</label>
  <select id="lore" class="sizeInpute" name="loreAssocier">
    <option value="0">Pas d'article</option>
    <?php include 'gestionDB/read/readLoreForList.php';
    foreach ($dataTitreLore as $key) {
      echo '<option value="'.$key['idLore'].'">'.$key['nomUnivers'].' - '.$key['titreLore'].'</option>';
    }
    ?>
  </select>
  <button class="classique" type="submit" name="button">Enregistrer</button>
  </div>
</form>
