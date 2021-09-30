<?php
  include 'gestionDB/identifiantDB.php';
  // Visiteur non connecté
if (!isset($_SESSION['role']) || ($_SESSION['role'] == 0)) {
  $requetteSQL = "SELECT `navD`, `navLien`, `navFont` FROM `nav` WHERE `lienValide` = 0 ORDER BY `ordre` ASC";
}
// Utilisateur connecté
  if (isset($_SESSION['role']) && ($_SESSION['role'] == 1)) {
    $requetteSQL = "SELECT  `navD`, `navLien`, `navFont` FROM `nav` WHERE `lienValide` = 1 ORDER BY `ordre` ASC";
  }
  // Modérateur
  if (isset($_SESSION['role']) && ($_SESSION['role'] == 2)) {
    $requetteSQL = "SELECT  `navD`, `navLien`, `navFont` FROM `nav` WHERE `lienValide` = 2 ORDER BY `ordre` ASC";
  }
  // Administrateur
  if (isset($_SESSION['role']) && ($_SESSION['role'] > 2)) {
    $requetteSQL = "SELECT  `navD`, `navLien`, `navFont` FROM `nav` WHERE `lienValide` = 3  ORDER BY `ordre` ASC";
  }
  include 'gestionDB/readDB.php';
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataTraiter = $data->fetchAll();
 ?>
<ul class="listRow">
  <?php
  if (isset($_SESSION['login'])) {
      echo '<li class="conteneur_menu"><a class="lienNav" href="profilUser.php"><i class="fas fa-user-check"></i> '.$_SESSION['login'].' Connecter</a></li>';
  }
  foreach ($dataTraiter as $key) {
    echo '<li class="conteneur_menu"><a class="lienNav" href="'.$key['navLien'].'">'.$key['navFont'].' '.$key['navD'].'</a></li>';
  }
  ?>
</ul>
