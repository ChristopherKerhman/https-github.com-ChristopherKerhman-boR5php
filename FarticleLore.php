<?php
include 'Fheader.php';
include 'gestionDB/read/FLore.php';
//$dataLore
?>
<section>
  <h4>Les articles du Lore de l'univers : <?php echo $_SESSION['nomUnivers'] ?></h4>
  <article class="conteneur_Wrap">
    <?php
      foreach ($dataLore  as $key) {
        echo '<a class="lienNav marge" href="FlectureLore.php?idAL='.$key['idLore'].'"><i class="fas fa-book"></i>'.$key['titreLore'].'</a>';
      }
     ?>

  </article>
</section>
<?php
  include 'footer.php';
?>
