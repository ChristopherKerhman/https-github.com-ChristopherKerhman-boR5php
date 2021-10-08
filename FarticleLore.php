<?php
include 'Fheader.php';
include 'gestionDB/read/FLore.php';
//$dataLore
?>
<section>
  <h4>Les articles du Lore de l'univers : <?php echo $_SESSION['nomUnivers'] ?></h4>
  <article class="conteneur_Wrap">
    <?php
    if (empty($dataLore)) {
      echo 'Pas encore d\'article de pour cette univers.';
    } else {
      foreach ($dataLore  as $key) {
        echo '<a class="lienNav marge" href="FlectureLore.php?idAL='.$key['idLore'].'"><i class="fas fa-book"></i>'.$key['titreLore'].'</a>';
      }
    }
     ?>
  </article>
  <a class="lienNav" href="FFicheUnivers.php?idU=<?php echo $_SESSION['idUniversVisite'] ?>&nomU=<?php echo $_SESSION['nomUnivers']; ?>"><i class="fas fa-arrow-left"></i>Retour au menu de l'univers <?php echo $_SESSION['nomUnivers']; ?></a>
</section>
<?php
  include 'footer.php';
?>
