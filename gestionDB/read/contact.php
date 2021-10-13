<?php
  include 'gestionDB/identifiantDB.php';
  $requetteSQL = "SELECT `idContact`, `email`, `objet`, `message`, `traitement`, `dateEnvois` FROM `contact` ORDER BY `dateEnvois`";
  include 'gestionDB/readDB.php';
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataTraiter = $data->fetchAll();
?>
