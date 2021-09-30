<?php
$autorisation = 1;
include 'header.php';
?>
<section class="conteneur_col">
  <h3>Création d'une nouvelle arme</h3>
<?php
include 'affichages/typeWeaponMenu.php';
foreach ($dataTraiter as $key) {
  if (!empty($_GET['id'])) {
    if ($_GET['id'] == $key['idTypeArme']) {
      include $key['lien'];
    }
  }
}
?>
</section>
<?php
  include 'footer.php';
?>
