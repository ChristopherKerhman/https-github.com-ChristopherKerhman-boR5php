<?php
$autorisation = 1;
include 'header.php';
?>
  <section class="conteneur_col">
    <?php
    if(isset($_GET['message43'])) {echo $_GET['message43'];}
    // Permet de gérer les menus uniquement pour les créateur.
    if ($_SESSION['role'] == 1) {
      include 'affichages/menuListes.php';
    }
     ?>
  </section>
</section>
<?php
  include 'footer.php';
?>
