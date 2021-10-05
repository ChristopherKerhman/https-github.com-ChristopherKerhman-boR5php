<?php
include 'gestionDB/controleFormulaires.php';
include 'gestionDB/identifiantDB.php';
$idListe = filter($_GET['idListe']);
$requetteSQL = "SELECT `nomListe`, `valeurListe` FROM `listeArmee` WHERE  `idListeArmee` = :idListe";
include 'gestionDB/readDB.php';
$data->bindParam(':idListe', $idListe);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataListeName = $data->fetchAll();
$requetteSQL = "SELECT `idDotationListe`, `idListe`, `id_Unite`, `nbr`, `TotalValeur`, `nomFigurine`
FROM `doterListeArmee`
INNER JOIN `unites` ON `doterListeArmee`.`id_Unite` = `unites`.`idUnite`
WHERE `idListe` = :idListe AND `id_Unite` > 0";
$data = $conn->prepare($requetteSQL);
$data->bindParam(':idListe', $idListe);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataListeUnite = $data->fetchAll();
$requetteSQL = "SELECT `idDotationListe`, `idListe`, `id_Vehicule`, `nbr`, `TotalValeur`, `nomVehicule`
FROM `doterListeArmee`
INNER JOIN `vehicule` ON `doterListeArmee`.`id_Vehicule` = `vehicule`.`idVehicule`
WHERE `idListe` = :idListe AND `id_Vehicule` > 0";
$data = $conn->prepare($requetteSQL);
$data->bindParam(':idListe', $idListe);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataListeVehicule = $data->fetchAll();
 ?>
