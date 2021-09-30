<?php
  //include 'gestionDB/identifiantDB.php';
  include 'gestionDB/controleFormulaires.php';
  $idArme = filter($idArme);
  $requetteSQL = "SELECT `idArme`, `nomArme`, `descriptionArme`, `rangeMax`, `puissance`, `armes`.`valide`, `lourde`, `assaut`, `couverture`, `sort`, `cadence`, `idCreateur`,
`idUnivers`, `valeur`, `explosif`, `dExplosive`, `typeArme`.`typeDescription`, `verrou`
FROM `armes`
INNER JOIN `typeArme` ON `armes`.`type` = `typeArme`.`idTypeArme`
WHERE `idCreateur` = :idUser AND `idArme` = :id AND `verrou` = 0";
  $data = $conn->prepare($requetteSQL);
  $data->bindParam(':id', $idArme);
  $data->bindParam(':idUser', $_SESSION['idUser']);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataWeapon = $data->fetchAll();
?>
