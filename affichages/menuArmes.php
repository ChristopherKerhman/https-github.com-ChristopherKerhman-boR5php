<?php
if ($_SESSION['role'] >= 2) {

} else {
  include 'gestionDB/identifiantDB.php';

// Utilisateur connecté
  if (isset($_SESSION['role']) && ($_SESSION['role'] == 1)) {
    $requetteSQL = "SELECT  `navD`, `navLien`, `navFont` FROM `nav` WHERE `lienValide` = 6 ORDER BY `ordre` ASC";
  }
  include 'gestionDB/readDB.php';
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataTraiter = $data->fetchAll();
 ?>
<ul class="listSimple">
  <h3>Gestion des armes</h3>
  <ul>
    <?php
    foreach ($dataTraiter as $key) {
      echo '<li class="conteneur_menu_verticale"><a class="lienNav" href="'.$key['navLien'].'">'.$key['navFont'].' '.$key['navD'].'</a></li>';
    }
}

    ?>
  </ul>

</ul>
