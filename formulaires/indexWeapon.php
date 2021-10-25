<article class="conteneur_col">
<h3>Les armes créer sur R5 et disponible dans les listes</h3>
  <?php
  // Paramètre de limite
  $limit = 10;
function filter($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = filter($_POST['id']);
  $requetteSQL = "SELECT `idArme`, `nomArme`, `nomUnivers` FROM `armes`
  INNER JOIN `multivers` ON `armes`.`idUnivers` = `multivers`.`idUnivers`
  WHERE `idArme` > :id LIMIT $limit";
  $data = $conn->prepare($requetteSQL);
  $data->bindParam(':id', $id);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $listeWeapon = $data->fetchAll();
} else {
  $requetteSQL = "SELECT `idArme`, `nomArme`, `nomUnivers` FROM `armes`
  INNER JOIN `multivers` ON `armes`.`idUnivers` = `multivers`.`idUnivers`
  WHERE `idArme` > 0 LIMIT $limit";
  $data = $conn->prepare($requetteSQL);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $listeWeapon = $data->fetchAll();

}
  ?>
<ul class="listBox">
<?php
if (empty($listeWeapon)) {
$requetteSQL = "SELECT `idArme`, `nomArme`, `nomUnivers` FROM `armes`
  INNER JOIN `multivers` ON `armes`.`idUnivers` = `multivers`.`idUnivers`
  WHERE `idArme` > 0 LIMIT $limit";
  $data = $conn->prepare($requetteSQL);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $listeWeapon = $data->fetchAll();

  foreach ($listeWeapon as $key) {
    echo '<li>'.$key['nomUnivers'].' - '.$key['nomArme'].'</li>';
  }
} else {
  foreach ($listeWeapon as $key) {
    echo '<li>'.$key['nomUnivers'].' - '.$key['nomArme'].'</li>';
  }
}
?>
</ul>
<div class="conteneur_row">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
       <input type="hidden" name="id" value="
       <?php
       if (empty($listeWeapon[$limit - 1]['idArme'])) {
         echo '1';
       } else {
          echo $listeWeapon[$limit - 1]['idArme'];
       }
        ?>">
       <button class="buttonGestionLore" type="submit" name="button"><?php echo $limit; ?> <i class="fas fa-arrow-right"></i></button>
  </form>

</div>
</article>
