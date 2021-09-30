<?php
$autorisation = 1;
include 'header.php';
?>
<section class="conteneur_col" id="indexBox">
  <h3>Changer votre mot de passe ?</h3>
  <p class="paragraphe"><i class="fas fa-exclamation-triangle doublesize"></i> Changer votre mot de passe implique que vous vous reconnectiez immédiatement. Pensez à le noter. <i class="fas fa-exclamation-triangle doublesize"></i></p>
  <br />
  <form action="gestionDB/edit/mdp.php" method="post">
    <div id="randomMDP">
    <label for="mdp">Votre mot de passe :</label><input id="mdp" class="sizeInpute" type="txt" name="mdp" value="construct" v-model="construct" required><a class="boxe" v-on:click="randomPS">Rand</a>
    <div>
    <label for="mdpV">Retaper votre mot de passe :</label>
      <input id="mdpV" class="sizeInpute" type="password" name="mdpVerif" required>
    <button class="buttonGestionLore" type="submit" name="button">Changer votre mot de passe</button>
    </div>
  </form>
</section>
<?php
  include 'composantVueJS/randomMDP.php';
  include 'footer.php';
?>
