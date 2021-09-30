<h3>Liste des univers que vous avez créer :</h3>
<?php
include 'gestionDB/identifiantDB.php';
$requetteSQL = "SELECT `idUnivers`, `nomUnivers`, `NT` FROM `multivers` WHERE `idAuteur` = :id";
include 'gestionDB/readDB.php';
$data->bindParam(':id', $_SESSION['idUser']);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataTraiter = $data->fetchAll();
  foreach ($dataTraiter as $key) {
    echo '<p><strong>'.$key['nomUnivers'].'</strong> - Niveau Technologique: '.$key['NT'].'</p>';
  }
?>
