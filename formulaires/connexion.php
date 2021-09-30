<form class="conteneur_col" action="gestionDB/read/verificationUser.php" method="post">
<?php
  if (isset($_GET['error2'])){ echo '<p>'.$_GET['error2'].'</p>'; }
  if (isset($_GET['error3'])){ echo '<p>'.$_GET['error3'].'</p>'; }
?>
  <label for="speudo">Votre speudo :</label>
  <input id="speudo" class="sizeInpute" type="text" name="login" placeholder="Votre speudo" required>
  <label for="mdp">Votre mot de passe :</label>
  <input id="speudo" class="sizeInpute" type="password" name="motDePasse" placeholder="Votre mot de passe" required>
  <br />
  <button class="classique" type="submit" name="button">Connexion</button>
</form>
