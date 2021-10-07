<?php
include 'Fheader.php';
include 'gestionDB/read/Funivers.php';
$_SESSION['idUniversVisite'] = NULL;
//$dataUnivers
?>
<section>
  <h4>Les univers crées par les utilisateurs</h4>
  <article class="conteneur_Wrap">
    <?php
    foreach ($dataUnivers as $key) {
      echo '<a class="lienButton" href="FFicheUnivers.php?idU='.$key['idUnivers'].'&nomU='.$key['nomUnivers'].'">
      <button class="buttonGestionLore" type="button" name="button">'.$key['nomUnivers'].'</button></a>';
    }
     ?>
  </article>
</section>
<?php
  include 'footer.php';
?>
