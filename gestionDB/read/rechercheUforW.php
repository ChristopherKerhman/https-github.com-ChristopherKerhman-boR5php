<?php
include 'stockage/yes.php';
$requetteSQL = "SELECT `idFaction`, `idFactionUnivers` FROM `factions` WHERE `idFaction` = :id";
$data = $conn->prepare($requetteSQL);
$data->bindParam(':id', $search);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataUnivers = $data->fetchAll();
$idUnivers = $dataUnivers[0]['idFactionUnivers'];
$requetteSQL = "SELECT `idArme`, `nomArme`, `descriptionArme`, `rangeMax`, `puissance`, `armes`.`valide`,
`lourde`, `assaut`, `couverture`, `sort`, `cadence`, `idCreateur`, `idUnivers`, `valeur`, `explosif`,
`dExplosive`, `typeArme`.`typeDescription` FROM `armes` INNER JOIN `typeArme` ON `armes`.`type` = `typeArme`.`idTypeArme`
WHERE `idUnivers`= :id AND `verrou` = 1 AND `armeVehicule` = 0";
$data = $conn->prepare($requetteSQL);
$data->bindParam(':id', $idUnivers);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataWeapon = $data->fetchAll();
 ?>
