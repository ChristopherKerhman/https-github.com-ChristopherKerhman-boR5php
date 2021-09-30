<form class="" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<?php
  include 'affichages/universDuCreateur.php';
 ?>
 <label for="level">Niveau de publication</label>
 <select id="level" class="sizeInpute" name="levelP">
   <option value="0" selected>Privé</option>
   <option value="1">Contributeur uniquement</option>
   <option value="2">Publique</option>
 </select>
    <button class="classique" type="submit" name="button">Recherche</button>
</form>
<?php
$dataSearch = null;
$dataU = null;
include 'gestionDB/identifiantDB.php';
include 'gestionDB/controleFormulaires.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = intval($_SESSION['idUser']);
  if (empty($_POST['idMultivers'])) {
  header('location:index.php');  
  }
  $univers = filter($_POST['idMultivers']);
  if(!isset($_POST['levelP'])) {
    echo 'Pas encore de recherche d\'article.';
  } else {
  $levelP = intval(filter($_POST['levelP']));
  // Pour l'affichage du nom de l'univers rechercher.
  $requetteSQL = "SELECT`nomUnivers` FROM `multivers` WHERE `idUnivers` = :univers";
  include 'gestionDB/readDB.php';
  $data->bindParam(':univers', $univers);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataU = $data->fetchAll();
  }
  $requetteSQL = "SELECT `idLore`, `idAuteur`, `idMultivers`, `titreLore`, `valide`, `niveauPublication` FROM `lore` WHERE `idAuteur` = :id AND `idMultivers` = :univers AND `niveauPublication` = :levelP ORDER BY `idLore` DESC";
  include 'gestionDB/readDB.php';
  $data->bindParam(':id', $id);
  $data->bindParam(':univers', $univers);
  $data->bindParam(':levelP', $levelP);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataSearch = $data->fetchAll();
}
if ($dataSearch == null) {
    echo 'Pas encore de recherche d\'article.';
} else {
  echo '<h3>Article de l\'univers : '.$dataU[0]['nomUnivers'].'</h3>';
// Affichage des articles & gestion des article (effacer et ouvrir pour modifier)
  foreach ($dataSearch as $key) {
    if ($key['niveauPublication'] == 0) {
      $levelP = 'Privé';
    }
    if ($key['niveauPublication'] == 1) {
      $levelP = 'Contributeur uniquement';
    }
    if ($key['niveauPublication'] == 2) {
      $levelP = 'Publique';
    }
    echo '<ul class="listSimple">';
      echo '<li>'.$key['titreLore'].' Niveau de publication : '.$levelP.' <a class="lienNav" href="updateLore.php?id='.$key['idLore'].'">Modifier</a>
        <form class="" action="gestionDB/del/delLore.php" method="post">
         <input type="hidden" name="idLore" value="'.$key['idLore'].'">
         <button class="buttonGestionLore" type="submit" name="button">Effacer</button>
       </form>

      </li>';
    echo '</ul>';
  }
}
 ?>
