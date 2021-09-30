<?php
$autorisation = 1;
include 'header.php';
?>
<section class="conteneur_col">
  <?php
  // Permet de gérer les menus uniquement pour les créateur.
  if ($_SESSION['role'] == 1) {
    include 'formulaires/creatUnivers.php';
    include 'composantVueJS/verrouBool.php';
    include 'affichages/menuCreateur.php';
  }
   ?>
</section>
<?php
  include 'footer.php';
?>
