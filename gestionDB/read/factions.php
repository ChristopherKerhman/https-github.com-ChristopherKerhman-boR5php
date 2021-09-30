<?php
$requetteSQL = "SELECT `idFaction`, `nomFaction`, `multivers`.`nomUnivers`, `multivers`.`idUnivers`, `multivers`.`NT` FROM `factions` INNER JOIN `multivers` ON `factions`.`idFactionUnivers` = `multivers`.`idUnivers` WHERE `id_proprietaire` = :id ORDER BY `multivers`.`nomUnivers` ASC";
$data = $conn->prepare($requetteSQL);
$data->bindParam('id', $_SESSION['idUser']);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataFaction = $data->fetchAll();

 ?>
