<?php
$requetteSQL = "SELECT `idVehicule`, `id_proprietaire`, `id_faction`, `nomVehicule`, `descriptionVehicule`, `typeVehicule`, `mouvementVehicule`,
`courseVehicule`, `vol`, `stationnaire`, `equipage`, `passager`, `DQM`, `DC`, `svg`, `pointStructure`, `valeur`, `fixer`, `valide`
FROM `vehicule`
WHERE `id_faction` = :id";
$data = $conn->prepare($requetteSQL);
$data->bindParam(':id', $id_faction);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataVehicule = $data->fetchAll();
 ?>
