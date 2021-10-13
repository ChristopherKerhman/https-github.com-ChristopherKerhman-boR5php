<?php
  //include 'gestionDB/identifiantDB.php';
  //include 'gestionDB/controleFormulaires.php';
//  include 'gestionDB/readDB.php';
  if ($lock === 0) {
    $requetteSQL = "SELECT `idArme`, `nomArme`, `rangeMax`, `puissance`, `lourde`, `assaut`, `couverture`, `sort`, `cadence`,
    `type`, `valeur`, `explosif`, `dExplosive`, `verrou`, `armeVehicule`
    FROM `armes`
    WHERE `idUnivers` = :idU AND `idCreateur` = :idUser AND `verrou` = 0 ORDER BY `idArme` DESC";
  } else {
    $requetteSQL = "SELECT `idArme`, `nomArme`, `rangeMax`, `puissance`, `lourde`, `assaut`, `couverture`, `sort`, `cadence`,
    `type`, `valeur`, `explosif`, `dExplosive`, `verrou`, `armeVehicule`
    FROM `armes`
    WHERE `idUnivers` = :idU AND `idCreateur` = :idUser AND `verrou` = 1 ORDER BY `nomArme` ASC";
  }
  include 'gestionDB/readDB.php';
  $data->bindParam('idU', $idU);
  $data->bindParam(':idUser', $_SESSION['idUser']);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataWeapon = $data->fetchAll();
?>
