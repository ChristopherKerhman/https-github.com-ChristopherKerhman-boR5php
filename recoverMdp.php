<?php include 'header.php'; ?>
<section>
  <h3>Créer un nouveau mot de passe ?</h3>
  <p class="paragraphe">
    Vous avez oublier votre mot de passe ? Mais pas votre mail de sécurité ? Parce que là, c'est essentiel pour ce qui va suivre.
    Si vous avez oublier les deux... Ce sera compliqué de retrouver votre compte.
  </p>
  <form action="gestionDB/read/mailUser.php" method="post">
    <label for="email">Email de sécurité ?</label>
    <input id="email" class="sizeInpute" type="text" name="emailUser" size="60">
    <button class="classique" type="submit">Lancer la procédure</button>
  </form>
<?php


 ?>
</section>
<?php
  include 'footer.php';
?>
