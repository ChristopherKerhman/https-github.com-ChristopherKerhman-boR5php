<?php
$requetteSQL = "SELECT `idVehicule`, `vehicule`.`id_proprietaire`, `id_faction`, `nomVehicule`, `descriptionVehicule`, `typeVehicule`, `mouvementVehicule`, `courseVehicule`,
`vol`, `stationnaire`, `equipage`, `passager`, `DQM`, `DC`, `svg`, `pointStructure`, `valeur`, `fixer`, `valide`, `factions`.`nomFaction` FROM `vehicule`
INNER JOIN `factions` ON `vehicule`.`id_faction` = `factions`.`idFaction`
WHERE `idVehicule` = :id";
  $data = $conn->prepare($requetteSQL);
  $data->bindParam(':id', $id);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataOneV = $data->fetchAll();

 ?>
