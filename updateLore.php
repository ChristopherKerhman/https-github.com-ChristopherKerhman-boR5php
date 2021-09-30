<?php
$autorisation = 1;
include 'header.php';
?>
<section class="tool">
  <?php
  if (isset($_GET['id'])){ $id = intval($_GET['id']); }
  include 'gestionDB/read/readLore.php';
  include 'formulaires/articleLore.php';
  ?>
</section>
<?php
  include 'footer.php';
?>
