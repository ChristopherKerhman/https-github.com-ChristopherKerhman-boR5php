<?php
  include 'gestionDB/identifiantDB.php';
  include 'gestionDB/controleFormulaires.php';
  include 'gestionDB/readDB.php';
  $requetteSQL = "SELECT `idContact`, `email`, `objet`, `message`, `traitement`, `dateEnvois` FROM `contact` WHERE `traitement` < 2 ORDER BY `dateEnvois`";
  include 'gestionDB/readDB.php';
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataTraiter = $data->fetchAll();
?>
