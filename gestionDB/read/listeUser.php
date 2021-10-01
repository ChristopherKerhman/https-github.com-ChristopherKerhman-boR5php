<?php
$requetteSQL = "SELECT `idListeArmee`, `nomUnivers`, `nomFaction`, `nomListe`, `valeurListe`, `listeArmee`.`valide`
FROM `listeArmee`
INNER JOIN `multivers` ON `listeArmee`.`id_univers` = `multivers`.`idUnivers`
INNER JOIN `factions` ON `listeArmee`.`id_faction` = `factions`.`idFaction`
WHERE `proprietaire`= :id";
  $data = $conn->prepare($requetteSQL);
  $data->bindParam(':id', $_SESSION['idUser']);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataListe = $data->fetchAll();
 ?>
