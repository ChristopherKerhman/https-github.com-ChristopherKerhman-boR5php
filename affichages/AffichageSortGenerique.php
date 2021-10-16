<h4>Liste des sort génériques</h4>
<?php
include 'stockage/sortGenerique.php';
$requetteSQL = "SELECT `idDotationSortG`, `indexSortG` FROM `sortDotationMageG` WHERE `idMage` = :id ORDER BY `indexSortG`";
$data = $conn->prepare($requetteSQL);
if (isset($dataOneU[0]['idUnite'])) {
$data->bindParam(':id', $dataOneU[0]['idUnite']);
} else {
  $data->bindParam(':id', $idU);
}
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataSortG = $data->fetchAll();
 ?>
<ul class="listSimple">
  <?php
  foreach ($dataSortG as $key) {
    echo '<li class="conteneur_row_left">
  <strong>'.$sort[$key['indexSortG']]['nom'].' - Niveau '.$sort[$key['indexSortG']]['niveau'].' </strong>
    </li>';
  }
   ?>
</ul>
