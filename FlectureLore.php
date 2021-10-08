<?php
include 'Fheader.php';
include 'gestionDB/controleFormulaires.php';
$idLore = filter($_GET['idAL']);
// Recherche de l'article
$requetteSQL = "SELECT `lore`.`idAuteur`, `idMultivers`, `nomUnivers`, `titreLore`, `articleLore`, `login`
FROM `lore`
INNER JOIN `users` ON `lore`.`idAuteur` = `users`.`idUser`
INNER JOIN `multivers` ON `idMultivers` = `idUnivers`
WHERE `idLore` = :id AND `lore`.`valide` = 1 AND `niveauPublication` = 2";
$data = $conn->prepare($requetteSQL);
$data->bindParam(':id', $idLore);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataArticle = $data->fetchAll();
?>
<section class="conteneur_col" id="indexBox">
  <h3> <?php echo $dataArticle[0]['nomUnivers']; ?> </h3>
<article>
  <h4><?php echo $dataArticle[0]['titreLore']; ?> par <?php echo $dataArticle[0]['login'] ?></h4>
<div class="paragrapheArticle">
  <?php echo $dataArticle[0]['articleLore']; ?>
</div>
</article>
<a class="lienNav" href="FarticleLore.php?idU=<?php echo $dataArticle[0]['idMultivers'] ?>"><i class="fas fa-arrow-left"></i>Retour</a><br />
<a class="lienNav" href="FFicheUnivers.php?idU=<?php echo $_SESSION['idUniversVisite'] ?>&nomU=<?php echo $_SESSION['nomUnivers']; ?>"><i class="fas fa-arrow-left"></i>Retour au menu de l'univers <?php echo $_SESSION['nomUnivers']; ?></a>
</section>
<?php
  include 'footer.php';
?>
