<?php
  include 'gestionDB/identifiantDB.php';
  include 'gestionDB/controleFormulaires.php';
  $id = filter($id);
  include 'gestionDB/readDB.php';
  $requetteSQL = "SELECT `idLore`, `titreLore`, `articleLore`, `niveauPublication` FROM `lore` WHERE `idLore` = :id";
  include 'gestionDB/readDB.php';
  $data->bindParam(':id', $id);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataTraiter = $data->fetchAll();
?>
