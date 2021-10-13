<?php
$autorisation = 3;
include 'header.php';
include 'gestionDB/controleFormulaires.php';
include 'stockage/yes.php';
$id = filter($_GET['idRS']);
  $requetteSQL = "SELECT `idRS`, `nomRS`, `descriptionRS`, `valeurRS`, `valide`, `typeRS`
  FROM `reglesSpeciales`
  WHERE `idRS`= :id";
  $data = $conn->prepare($requetteSQL);
  $data->bindParam(':id', $id);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataRS = $data->fetchAll();
?>
<section class="conteneur_col" id="indexBox">
  <article>
      <h4>Fiche de la la règle spécial : <?php echo $dataRS[0]['nomRS']; ?></h4>
      <p class="paragraphe">
        <?php echo $dataRS[0]['descriptionRS']; ?>
      </p>
      <ul class="listArme">
        <li><strong>Valeur en pourcentage de l'arme : </strong><?php echo 100 * $dataRS[0]['valeurRS']; ?> %</li>
        <li><strong>Valide :</strong> <?php echo $yes[$dataRS[0]['valide']]['texte']; ?> </li>
      </ul>
  </article>
</section>
<?php
  include 'footer.php';
?>
