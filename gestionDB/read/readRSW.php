<?php
  include 'gestionDB/identifiantDB.php';
  include 'gestionDB/controleFormulaires.php';
  include 'gestionDB/readDB.php';
  $requetteSQL = "SELECT `idRS`, `nomRS`, `descriptionRS`, `valeurRS` FROM `reglesSpeciales` WHERE `valide` = 1 AND `typeRS` = 1 ORDER BY `nomRS` ASC";
  include 'gestionDB/readDB.php';
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataRS = $data->fetchAll();
?>
