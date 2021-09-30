<?php
$requetteSQL = "SELECT `unites`.`idUnite`, `unites`.`idP`, `unites`.`nomFigurine`, `unites`.`Description`, `unites`.`typeTroupe`, `unites`.`taille`, `unites`.`niveauMage`, `unites`.`deplacement`,
`unites`.`course`, `unites`.`vol`, `unites`.`station`, `unites`.`DQM`, `unites`.`DC`, `unites`.
`sauvegarde`, `unites`.`pointDeVie`, `unites`.`valeurUnite`, `unites`.`id_faction`, `factions`.`nomFaction`
FROM `unites` INNER JOIN `factions` ON `unites`.`id_faction` = `factions`.`idFaction` WHERE `idUnite`= :id";
  $data = $conn->prepare($requetteSQL);
  $data->bindParam(':id', $id);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataOneU = $data->fetchAll();

 ?>
