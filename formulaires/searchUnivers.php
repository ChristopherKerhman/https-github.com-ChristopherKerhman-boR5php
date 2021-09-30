<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<?php
// Tri des armes par univers
include 'affichages/universDuCreateur.php';
?>
<button class="classique" type="submit" name="button">Rechercher toute les armes</button>
</form>
<?php
include 'gestionDB/controleFormulaires.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $idU = filter($_POST['idMultivers']);
  if (empty($_POST['idMultivers'])) {
  header('location:index.php');
  }
  include 'gestionDB/read/readWeapon.php';
  // donnée de sortie : $dataWeapon
}
 ?>
