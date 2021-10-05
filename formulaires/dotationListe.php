<article class="box marge">
<?php
  $idFaction = $dataListe[0]['id_faction'];
  $requetteSQL = "SELECT `idUnite`, `nomFigurine`, `typeTroupe`, `DQM`, `DC`, `sauvegarde`, `pointDeVie`, `valeurUnite`
  FROM `unites`
  WHERE `fixer` = 1 AND `id_faction` = :id";
    $data = $conn->prepare($requetteSQL);
    $data->bindParam(':id', $idFaction);
    $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataUnite = $data->fetchAll();
//print_r($dataUnite);
?>
<h4>Dotation unitées</h4>
<?php
  if (empty($dataUnite)) {
    echo 'Pas d\'unité disponible pour cette faction.<br /><a class="lienNav" href="nouvelleUnite.php">Créer une unité</a>';
  } else {
  foreach ($dataUnite as $key) {
    echo  '
      <ul class="listBox">
        <li><strong>Nom unite :</strong> '.$key['nomFigurine'].' <strong>Valeur :</strong> '.round($key['valeurUnite'], 0).' points</li>
        <li><strong>DQM :</strong> '.$typeDe[$key['DQM']]['de'].' <strong>DC :</strong> '.$typeDe[$key['DC']]['de'].'</li>
        <li><strong>Armure :</strong> '.$sauvegarde[$key['sauvegarde']]['message'].' - '.$sauvegarde[$key['sauvegarde']]['Type'].'</li>
        <li><strong>Point de vie :</strong> '.$pdv[$key['pointDeVie']]['pdv'].'</li>
        <li><a class="lienNav" href="fichesUnite.php?id='.$key['idUnite'].'">Voir fiche '.$key['nomFigurine'].'</a></li>
        <li>
          <form action="gestionDB/record/addList.php" method="post">
          <input type="hidden" name="idListe" value="'.$dataListe[0]['idListeArmee'].'">
          <input type="hidden" name="id_Unite" value="'.$key['idUnite'].'">
          <input type="hidden" name="valeur" value="'.$key['valeurUnite'].'">
          <input type="hidden" name="typeElement" value="1" />
            <div class="conteneur_row">
              <label for="numbre">Nombre de figurine</label>
              <input id="number" class="sizeInpute" type="number" name="nbr" min="1" max="24">
              <button class="buttonGestionLore " type="submit" name="button">Ajouter</button>
            </div>
          </form>
        </li>
      </ul>';
  }
  echo '<a class="lienNav" href="nouvelleUnite.php">Créer une unité</a>';
  }
// Créer le ficher AddList.php
?>
</article>
<article class="box marge">
<h4>Dotation Véhicule</h4>
<?php
$requetteSQL = "SELECT `idVehicule`, `nomVehicule`, `typeVehicule`, `vol`,
`stationnaire`, `equipage`, `passager`, `DQM`, `DC`, `svg`, `pointStructure`, `valeur`
FROM `vehicule`
WHERE `id_faction` = :id AND `fixer` = 1";
  $data = $conn->prepare($requetteSQL);
  $data->bindParam(':id', $idFaction);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
$dataVehicules = $data->fetchAll();
  if (empty($dataVehicules)) {
    echo 'Pas de véhicule disponible pour cette faction.<br /><a class="lienNav" href="addVehicule.php">Créer un véhicule</a>';
  } else {
  //    print_r($dataVehicules);
  foreach ($dataVehicules as $key) {
    echo '<ul class="listBox">
      <li><strong>Nom Vehicule :</strong> '.$key['nomVehicule'].' <strong>Valeur :</strong> '.round($key['valeur'], 0).' points</li>
      <li><strong>Vol :</strong>'.$yes[$key['vol']]['texte'].' - <strong>Vol stationnaire :</strong>'.$yes[$key['stationnaire']]['texte'].'</li>
      <li><strong>DQM :</strong> '.$typeDe[$key['DQM']]['de'].' <strong>DC :</strong> '.$typeDe[$key['DC']]['de'].'</li>
      <li><strong>Equipage :</strong> '.$equipage[$key['equipage']]['equipage'].' <strong>Passager :</strong> '.$passager[$key['passager']]['nbr'].'</li>
      <li><strong>Blindage :</strong> '.$blindage[$key['svg']]['svg'].'</li>
      <li><strong>Point de structure :</strong>'.$structure[$key['pointStructure']]['ps'].'</li>
      <li><a class="lienNav" href="ficheVehicule.php?id='.$key['idVehicule'].'">Voir fiche '.$key['nomVehicule'].'</a></li>
      <li>
        <form action="gestionDB/record/addList.php" method="post">
        <input type="hidden" name="idListe" value="'.$dataListe[0]['idListeArmee'].'">
        <input type="hidden" name="id_Unite" value="'.$key['idVehicule'].'">
        <input type="hidden" name="valeur" value="'.$key['valeur'].'">
        <input type="hidden" name="typeElement" value="0" />
          <div class="conteneur_row">
            <label for="numbre">Nombre de vehicule</label>
            <input id="number" class="sizeInpute" type="number" name="nbr" min="1" max="12">
            <button class="buttonGestionLore " type="submit" name="button">Ajouter</button>
          </div>
        </form>
      </li>
    </ul>';
  }
  echo '<a class="lienNav" href="addVehicule.php">Créer un véhicule</a>';
  }
?>
</article>
