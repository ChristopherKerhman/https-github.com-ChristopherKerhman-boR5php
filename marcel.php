<?php
// Sécuristation lier a plusieurs critères.
include 'header.php';
?>
<section class="conteneur_col" id="indexBox">
  <h3>Vous souhaitez peut être modifier votre mot de passe ?</h3>
  <p class="paragraphe">
    Vous venez de recevoir un email de sécurité ? Vous désirez changer votre mot de passe ? Vous avez votre token de sécurité ? Votre mail de sécurité ? Votre nouveau mot de passe ?
  </p>
<form class="conteneur_col" action="gestionDB/edit/marcel.php" method="post">
  <label for="email">Votre mail de sécurité :</label>
  <input id="email" class="sizeInpute" type="text" name="emailUser">
  <label for="toktok">Votre token de sécurité :</label>
  <input id="toktok" class="sizeInpute" type="password" name="token6">
  <label for="mdp">Votre mot de passe :</label>
  <div id="randomMDP">
    <input id="mpd" class="sizeInpute" type="txt" name="mdp" value="construct" v-model="construct"><a class="boxe" v-on:click="randomPS">Rand</a>
    <p v-if="construct != ''" class="paragraphe">Noté votre nouveau mot de passe quelques part. Histoire de vous en souvenir pour plus tard ? Parce que {{construct}} ce n'est pas simple de s'en souvenir.</p>
  </div>
  <button  class="buttonGestionLore" type="submit" name="button">Changer le mot de passe ?</button>
</form>
</section>
<?php
  include 'composantVueJS/randomMDP.php';
  include 'footer.php';
?>
