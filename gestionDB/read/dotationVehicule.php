<?php
$idVehicule = $dataOneV[0]['idVehicule'];
$requetteSQL = "SELECT `vehicule_armes`.`idDotationVehicule`, `armes`.`idArme`, `armes`.`nomArme`, `armes`.`descriptionArme`, `armes`.`rangeMax`, `armes`.`puissance`,
`armes`.`valide`, `armes`.`lourde`, `armes`.`assaut`, `armes`.`couverture`, `armes`.`armeVehicule`, `armes`.`sort`, `armes`.`cadence`, `armes`.`type`, `armes`.`idCreateur`,
`armes`.`idUnivers`, `armes`.`valeur`, `armes`.`explosif`, `armes`.`dExplosive`, `armes`.`verrou`
FROM `vehicule_armes`
INNER JOIN `armes` ON `vehicule_armes`.`id_arme` = `armes`.`idArme`
WHERE `id_vehicule` = :id ORDER BY `armes`.`type`";
$data = $conn->prepare($requetteSQL);
$data->bindParam(':id', $idVehicule);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataDotationVehicule = $data->fetchAll();
 ?>
