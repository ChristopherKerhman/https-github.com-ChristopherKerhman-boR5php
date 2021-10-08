<?php
include 'Fheader.php';
$idU = $_SESSION['idUniversVisite'];
//Recherche des armes verrouillé de l'univers non véhicule (3 Requêtes pour 3 types d'armes)
$requetteSQL = "SELECT `idArme`, `nomArme`, `type`
FROM `armes`
WHERE `idUnivers` = :idU AND `verrou` = 1 AND  `armeVehicule` = 0 AND `sort` = 0
ORDER BY `nomArme` ASC";
  $data = $conn->prepare($requetteSQL);
  $data->bindParam(':idU', $idU);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataArmesU = $data->fetchAll();
    $requetteSQL = "SELECT `idArme`, `nomArme`, `type`
FROM `armes`
WHERE `idUnivers` = :idU AND `verrou` = 1 AND  `armeVehicule` = 0 AND `sort` = 1
ORDER BY `nomArme` ASC";
  $data = $conn->prepare($requetteSQL);
  $data->bindParam(':idU', $idU);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
    $dataSort = $data->fetchAll();
$requetteSQL = "SELECT `idArme`, `nomArme`, `type`
FROM `armes`
WHERE `idUnivers` = :idU AND `verrou` = 1 AND  `armeVehicule` = 1
ORDER BY `nomArme` ASC";
  $data = $conn->prepare($requetteSQL);
  $data->bindParam(':idU', $idU);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
    $dataArmeV = $data->fetchAll();
?>
<section>
  <h4>Le ratelier d'arme de l'univers <?php echo $_SESSION['nomUnivers']; ?></h4>
    <h4>Armes individueles</h4>
    <article class="conteneur_Wrap">
  <?php
  if (empty($dataArmesU)) {
    echo 'Pas d\'élément dans cette catégorie.';
  } else {
    foreach ($dataArmesU as $key) {
      echo '<a class="lienNav decal_R" href="Farmes.php?idW='.$key['idArme'].'">'.$key['nomArme'].'</a>';
    }
  }
  ?>
  </article>
  <h4>Les sorts</h4>
  <article class="conteneur_Wrap">
    <?php
    if (empty($dataSort)) {
      echo 'Pas d\'élément dans cette catégorie.';
    } else {
      foreach ($dataSort as $key) {
        echo '<a class="lienNav decal_R" href="Farmes.php?idW='.$key['idArme'].'">'.$key['nomArme'].'</a>';
      }
    }
    ?>
</article>
</article>
<h4>Les armes monté sur véhicules</h4>
<article class="conteneur_Wrap">
  <?php
  if (empty($dataArmesV)) {
    echo 'Pas d\'élément dans cette catégorie.';
  } else {
    foreach ($dataArmesU as $key) {
      echo '<a class="lienNav decal_R" href="Farmes.php?idW='.$key['idArme'].'">'.$key['nomArme'].'</a>';
    }
  }
  ?>
</article>
</section>
<a class="lienNav" href="FFicheUnivers.php?idU=<?php echo $_SESSION['idUniversVisite'] ?>&nomU=<?php echo $_SESSION['nomUnivers']; ?>"><i class="fas fa-arrow-left"></i>Retour au menu de l'univers <?php echo $_SESSION['nomUnivers']; ?></a>
<?php
  include 'footer.php';
?>
