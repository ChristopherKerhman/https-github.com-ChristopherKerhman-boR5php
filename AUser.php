<?php
$autorisation = 3;
include 'header.php';
include 'gestionDB/controleFormulaires.php';
include 'stockage/yes.php';
?>
<section class="conteneur_col" id="indexBox">
<h3>Administration des utilisateurs</h3>
<form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
 <input class="sizeInpute" type="text" name="search" size="30" placeholder="Recherche un utilisateur par login">
 <button class="buttonGestionLore" type="submit" name="button">Rechercher</button>
</form>
<?php
// Recherche de l'utilisateur
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $search = filter($_POST['search']);
    $requetteSQL = "SELECT `idUser`, `login`, `nom`, `prenom`, `emailUser`,
    `createur`, `tiper`
    FROM `users`
    WHERE `login` LIKE :search";
    $data = $conn->prepare($requetteSQL);
    $data->bindParam(':search', $search);
    $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);
    $dataUser = $data->fetchAll();
  }
 ?>
</section>
<section>
  <article>
      <ul class="listBoxe">
      <?php if(isset($dataUser)) {
        foreach ($dataUser as $key) {
          echo '<li><a class="lienNav" href="FicheUser.php?idUser='.$key['idUser'].'">'.$key['login'].'</a> - <strong>Nom :</strong> '.$key['nom'].'
          <strong>Prenom :</strong> '.$key['prenom'].' <strong>Email :</strong>'.$key['emailUser'].' <strong> Nombre d\'univers restant :</strong>'.$key['createur'].'
          <strong>Tiper :</strong>'.$yes[$key['tiper']]['texte'].'</li>';
        }
      } else {
        echo 'Pas de donnée';
      } ?>
    </ul>
  </article>

</section>
<?php
  include 'footer.php';
?>
