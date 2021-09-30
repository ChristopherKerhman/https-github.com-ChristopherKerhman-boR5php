<?php
  include 'gestionDB/identifiantDB.php';
  include 'gestionDB/controleFormulaires.php';
  $id = $_SESSION['idUser'];
  include 'gestionDB/readDB.php';
  $requetteSQL = "SELECT `idLore`, `idMultivers`, `nomUnivers`, `titreLore`
FROM `lore`
INNER JOIN `multivers` ON `lore`.`idMultivers` = `multivers`.`idUnivers`
WHERE `lore`.`idAuteur` = :id AND `lore`.`niveauPublication` = 2";
  include 'gestionDB/readDB.php';
  $data->bindParam(':id', $id);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataTitreLore = $data->fetchAll();
?>
