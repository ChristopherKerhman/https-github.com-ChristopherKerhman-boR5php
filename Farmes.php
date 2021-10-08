<?php
include 'Fheader.php';
include 'gestionDB/controleFormulaires.php';
include 'stockage/gabarit.php';
include 'stockage/yes.php';
// Lecture de la fiche d'armes
if (empty($_GET['idW'])) {
  header('location:index.php');
} else {
  $idA = filter($_GET['idW']);
  $requetteSQL = "SELECT `idArme`, `nomArme`, `descriptionArme`, `rangeMax`, `puissance`, `armes`. `lourde`,
  `assaut`, `couverture`, `armeVehicule`, `sort`, `cadence`, `type`, `idCreateur`, `idUnivers`, `valeur`, `explosif`, `dExplosive`, `verrou`, `typeArme`.`typeDescription`
  FROM `armes`
  INNER JOIN `typeArme` ON `type` = `idTypeArme`
  WHERE `idArme` = :idA AND `verrou` = 1 AND `armes`.`valide` = 1";
  $data = $conn->prepare($requetteSQL);
  $data->bindParam(':idA', $idA);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
    $dataArme = $data->fetchAll();
  //  print_r($dataArme);
    if (empty($dataArme)) {
      header('location:index.php');
    } else {
    $requetteSQL ="SELECT `nomRS`
    FROM `RSArme`
    INNER JOIN `reglesSpeciales` ON `id_RS` = `idRS`
    WHERE `id_arme` = :idA";
    $data = $conn->prepare($requetteSQL);
    $data->bindParam(':idA', $idA);
    $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);
    $dataRS = $data->fetchAll();

    }
}
?>
<section>
  <h4>La fiche de l'arme : <?php echo $dataArme[0]['nomArme']; ?></h4>
  <article class="conteneur_Wrap">
    <ul class="listBox">
        <li><strong>Type d'arme :</strong><?php echo $dataArme[0]['typeDescription']; ?></li>
         <li><strong>Puissance :</strong><?php echo $dataArme[0]['puissance']; ?>D</li>
         <?php
          if ($dataArme[0]['type'] > 0) {
            echo '<li><strong>Portée : </strong> '.$dataArme[0]['rangeMax'].' " / '.intval(2.54 * $dataArme[0]['rangeMax']).' cm</li>';
          }
          ?>
          <li><strong>Arme lourde :</strong> <?php echo $yes[$dataArme[0]['lourde']]['texte']; ?></li>
          <li><strong>Arme d'assaut :</strong>  <?php echo $yes[$dataArme[0]['assaut']]['texte']; ?></li>
          <li><strong>Arme de couverture :</strong>  <?php echo $yes[$dataArme[0]['couverture']]['texte']; ?></li>
          <li><strong>Cadence de tir :</strong> <?php echo $dataArme[0]['cadence']; ?> tir(s) / tour</li>
          <li><strong>Sort :</strong> <?php echo $yes[$dataArme[0]['sort']]['texte']; ?></li>
          <li><strong>Arme montée sur véhicule :</strong> <?php echo $yes[$dataArme[0]['armeVehicule']]['texte']; ?></li>
          <?php if ($dataArme[0]['dExplosive'] > 0) {
            echo '<li><strong>Gabarit d\'explosion :</strong> '.$gabarit[$dataArme[0]['explosif']]['texte'].' <strong>Dé d\'explosion :</strong> '.$explosion[$dataArme[0]['dExplosive']]['texte'].'</li>';
          } ?>
          <li><h4>Règles spéciales</h4></li>
          <li>
          <?php foreach ($dataRS as $key) {
            echo $key['nomRS'].' ';
          } ?>
          </li>
     </ul>
  </article>
  <div class="paragrapheArticle">
    <?php echo $dataArme[0]['descriptionArme']; ?>
  </div>
  <a class="lienNav" href="FratelierArme.php?idU=<?php echo $_SESSION['idUniversVisite']; ?>" ><i class="fas fa-arrow-left"></i>Retour</a><br />
  <a class="lienNav" href="FFicheUnivers.php?idU=<?php echo $_SESSION['idUniversVisite'] ?>&nomU=<?php echo $_SESSION['nomUnivers']; ?>"><i class="fas fa-arrow-left"></i>Retour au menu de l'univers <?php echo $_SESSION['nomUnivers']; ?></a>
</section>
<?php
  include 'footer.php';
?>
