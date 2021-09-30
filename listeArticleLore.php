<?php
$autorisation = 1;
include 'header.php';
?>
<section class="conteneur_col">
  <h3>La liste de vos articles</h3>
  <?php
    if (isset($_GET['error8'])){ echo '<p class="avertissement">'.$_GET['error8'].'</p>'; }
  ?>
<?php
  include 'formulaires/rechercheArticle.php';
?>

</section>
<?php
  include 'footer.php';
?>
