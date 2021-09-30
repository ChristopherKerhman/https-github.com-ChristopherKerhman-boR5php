<?php
$autorisation = 1;
include 'header.php';

?>
<section class="conteneur_col paragraphe">
  <h3>Ajouter un mail de sécurité</h3>
  <p>
    Le mail de sécurité n'a qu'une utilité, récupérer votre compte en cas de perte de votre mot de passe.<br />
     La procédure est la suivante :
    <ul class="boxe">
      <li>Donner un email valide.</li>
      <li>Le serveur va vous envoyé une clé de sécurité unique à 6 chiffres par mail</li>
      <li>Entrer cette clé pour valider votre email de sécurité.</li>
    </ul>
    <br />
    En cas de perte d'email, vous pourrez ainsi, changer votre mot de passe. Ne perdez pas votre email de sécurité.<br />
    Il va vous servir à modifier votre mot de passe, si besoin en cas de perte de celui-ci.
  </p>
</section>
<section class="conteneur_col">
<?php
$requetteSQL = "SELECT  `emailValide` FROM `users` WHERE `idUser` = :id AND `token6` = 0 AND `emailValide` = 2";
$data = $conn->prepare($requetteSQL);
$data->bindParam(':id', $_SESSION['idUser']);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataSecurite = $data->fetchAll();
if((!empty($dataSecurite)) && $dataSecurite[0]['emailValide'] == 2) {
  echo '  <form action="gestionDB/edit/mailUser.php" method="post">
      <label for="emailUSer">Email de secours</label>
      <input class="sizeInpute" type="text" name="emailUSer" required>
      <button class="buttonGestionLore" type="submit" name="button">Envoyer</button>
    </form>';
    echo '<p class="paragraphe">Votre mail de sécurité n\'est pas enregistré.</p>';
}

if(isset($_GET['message'])) {  echo $_GET['message']; }
$requetteSQL = "SELECT  `emailValide` FROM `users` WHERE `idUser` = :id AND `token6` > 99999";
  $data = $conn->prepare($requetteSQL);
  $data->bindParam(':id', $_SESSION['idUser']);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataSecurite = $data->fetchAll();

if(($dataSecurite)){
if ($dataSecurite[0]['emailValide'] == 0) {
  echo '<form action="gestionDB/edit/valideMail.php" method="post">
   <label for="token">Token de sécurité</label>
   <input class="sizeInpute" type="text" name="token" size="6">
     <button class="buttonGestionLore" type="submit" name="button">Verifier</button>
  </form>';
  echo '<p class="paragraphe">Votre mail de sécurité est enregistré.</p>';

}} 

?>
</section>
<?php
  include 'footer.php';
?>
