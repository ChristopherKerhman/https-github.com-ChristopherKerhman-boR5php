<?php
$autorisation = 3;
include 'header.php';
$requetteSQL = "SELECT `idUnivers`, `nomUnivers`, `valide`, `NT`, `login`, `emailUser`
FROM `multivers`
INNER JOIN `users` ON `idAuteur` = `idUser`
ORDER BY `nomUnivers` ASC";
$data = $conn->prepare($requetteSQL);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataUnivers = $data->fetchAll();
//Liste des utilisateurs tiper
$requetteSQL = "SELECT `idUser`, `login`
FROM `users`
WHERE `consentementUser` = 1 AND `tiper` = 1";
$data = $conn->prepare($requetteSQL);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataUsers = $data->fetchAll();
?>
<section class="conteneur_col" id="indexBox">
<h3>Les univers valide</h3>
<article>
  <ul class="listlistBox">
<?php
foreach ($dataUnivers as $key) {
  if ($key['valide'] == 1)
 echo '<li><strong>'.$key['nomUnivers'].'</strong> - NT : '.$key['NT'].' - Speudo de l\'auteur : '.$key['login'].' - Email : '.$key['emailUser'].' </li>
  <li><form action="gestionDB/edit/AdminUnivers.php" method="post">
    <input type="hidden" name="valide" value="0">
    <input type="hidden" name="idUnivers" value="'.$key['idUnivers'].'">
    <button class="buttonGestionLore" type="submit" name="button">Invalider - '.$key['nomUnivers'].'</button>
  </form></li>';
}
?>
</ul>
<h3>Les univers non-valide</h3>
<article>
  <ul class="listlistBox">
<?php
foreach ($dataUnivers as $key) {
  if ($key['valide'] == 0)
 echo '<li><strong>'.$key['nomUnivers'].'</strong> - NT : '.$key['NT'].' - Speudo de l\'auteur : '.$key['login'].' - Email : '.$key['emailUser'].' </li>
  <li><form action="gestionDB/edit/AdminUnivers.php" method="post">
    <input type="hidden" name="valide" value="1">
    <input type="hidden" name="idUnivers" value="'.$key['idUnivers'].'">
    <button class="buttonGestionLore" type="submit" name="button">Valider - '.$key['nomUnivers'].'</button>
  </form></li><li>***=***</li>';
}
?>
</ul>

</article>

</section>
<?php
  include 'footer.php';
?>
