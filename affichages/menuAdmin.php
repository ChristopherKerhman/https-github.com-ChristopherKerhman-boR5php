
<?php
if ($_SESSION['role'] >= 2) {

} else {
  include 'gestionDB/identifiantDB.php';
  }
  include 'gestionDB/readDB.php';
  // Administrateur
  if (isset($_SESSION['role']) && ($_SESSION['role'] > 2)) {
  $requetteSQL = "SELECT  `navD`, `navLien`, `navFont` FROM `nav` WHERE `lienValide` = 12  ORDER BY `ordre` ASC";
  $data = $conn->prepare($requetteSQL);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataAdmin = $data->fetchAll();}
 ?>
<ul class="listSimple">
    <h3>Menu d'administration</h3>
  <ul>
    <?php
    foreach ($dataAdmin as $key) {
      echo '<li class="conteneur_menu_verticale"><a class="lienNav" href="'.$key['navLien'].'">'.$key['navFont'].' '.$key['navD'].'</a></li>';
    }
    ?>
  </ul>
</ul>
