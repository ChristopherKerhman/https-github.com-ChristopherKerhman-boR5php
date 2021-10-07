<?php
$requetteSQL = "SELECT `idLore`, `titreLore` FROM `lore` WHERE `idMultivers` = :id AND `valide` = 1 AND `niveauPublication` = 2";
$data = $conn->prepare($requetteSQL);
$data->bindParam(':id', $_SESSION['idUniversVisite']);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataLore = $data->fetchAll();
 ?>
