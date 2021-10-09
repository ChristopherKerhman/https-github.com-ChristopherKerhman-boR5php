<?php
$idUnite = $dataOneU[0]['idUnite'];
$requetteSQL = "SELECT `unite_armes`.`idDotation`,`armes`.`nomArme`, `typeArme`.`typeDescription`, `armes`.`type`,
`armes`.`idArme`, `armes`.`nomArme`, `armes`.`rangeMax`, `armes`.`puissance`, `armes`.`lourde`, `armes`.`assaut`,
`armes`.`couverture`, `armes`.`sort`, `armes`.`cadence`, `armes`.`type`, `armes`.`idCreateur`,  `armes`.`valeur`, `armes`.`explosif`, `armes`.`dExplosive`
FROM `unite_armes`
INNER JOIN `armes` ON `unite_armes`.`id_arme` = `armes`.`idArme`
INNER JOIN `typeArme` ON `armes`.`type` = `typeArme`.`idTypeArme`
WHERE `id_unite` = :id ORDER BY `armes`.`type` DESC";
$data = $conn->prepare($requetteSQL);
$data->bindParam(':id', $idUnite);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataDotationUnite = $data->fetchAll();
 ?>
