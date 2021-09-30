<?php
include 'header.php';
if (empty($_SESSION['role'])) {
  header('location:index.php');
}
?>
<section class="conteneur_col">
  <h3>Profil de <?php echo $_SESSION['login']; ?></h3>
  <?php
  if(isset($_GET['error22'])) {
    echo $_GET['error22'];
  }
  include 'gestionDB/read/profil.php';
  include 'formulaires/profil.php';
     ?>

</section>
<?php
  include 'footer.php';
?>
