<h4>Liste des sort génériques</h4>
<?php
  include 'stockage/sortGenerique.php';
$requetteSQL = "SELECT `idDotationSortG`, `indexSortG` FROM `sortDotationMageG` WHERE `idMage` = :id";
$data = $conn->prepare($requetteSQL);
$data->bindParam(':id', $dataOneU[0]['idUnite']);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataSortG = $data->fetchAll();
//print_r($dataSortG);
 ?>
<ul class="listSimple">
  <?php
  foreach ($dataSortG as $key) {
    echo '<li class="conteneur_row_left">
    <form action="gestionDB/del/sortGenerique.php" method="post">
      <input type="hidden" name="id" value="'.$key['idDotationSortG'].'">
      <button class="buttonGestionLore" type="submit" name="button">Effacer '.$sort[$key['indexSortG']]['nom'].'</button>
    </form>
    </li>';
  }
   ?>
</ul>
