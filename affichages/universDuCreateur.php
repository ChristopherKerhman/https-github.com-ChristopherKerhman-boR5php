<?php
include 'gestionDB/identifiantDB.php';
$requetteSQL = "SELECT `idUnivers`, `nomUnivers`, `NT` FROM `multivers` WHERE `idAuteur` = :id";
include 'gestionDB/readDB.php';
$data->bindParam(':id', $_SESSION['idUser']);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataTraiter = $data->fetchAll();
 ?>
 <label for="univers">Univers : </label>
 <select id="univers" class="sizeInpute" name="idMultivers">
  <?php
  foreach ($dataTraiter as $key) {
    echo '<option value="'.$key['idUnivers'].'">'.$key['nomUnivers'].' - Niveau Technologique: '.$key['NT'].'</option>';
  }
  ?>
 </select>
