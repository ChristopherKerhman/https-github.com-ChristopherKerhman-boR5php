<form class="conteneur_col" action="gestionDB/record/newUser.php" method="post">
  <h3>Inscription nouvel utilisateur</h3>
<label for="prenom">Votre prenom :</label>
<input id="prenom" class="sizeInpute" type="text" name="prenom" placeholder="Votre prenom" required>
<label for="nom">Votre nom :</label>
<input id="nom" class="sizeInpute" type="text" name="nom" placeholder="Votre nom" required>
<label for="speudo">Votre speudo :</label> <?php if (isset($_GET['error'])){ echo $_GET['error']; } ?>
<input id="speudo" class="sizeInpute" type="text" name="login" placeholder="Votre speudo" required>
<label for="mdp">Votre mot de passe :</label>
<div id="randomMDP">
  <input class="sizeInpute" type="txt" name="mdp" value="construct" v-model="construct"><a class="boxe" v-on:click="randomPS">Rand</a>
</div>
<div id="RGPD" class="conteneur_col">
  <div>
    <?php if (isset($_GET['error1'])){ echo '<p>'.$_GET['error1'].'</p>'; } ?>
    <label for="conditionRGPD" class="lienNav">Acceptez-vous les conditions de la <strong v-if="!seeRGPD" v-on:click="seeRGPD = true">RGPD et de la Charte de bonne conduite </strong><strong v-else v-on:click="seeRGPD = false">RGPD et de la Charte de bonne conduite </strong> ?</label>
    <input id="conditionRGPD" type="checkbox" name="consentementUser">
  </div>
    <div class="zone" v-show="seeRGPD">
    <p>En savoir plus sur la RGPD ?</p>
    <p>L'inscription à ce site nécessite que l'on collecte vos données personnelles (nom, prenom, mail, speudonyme). Vous pourrez à tous moment, effacer votre compte et effacer toute vos contributions passé au jeu R5.<br />
      Ces données n'ont pas la vocation d'être vendues, commercialisées, diffusées à un tier. Vous avez aussi le droit de rectifier, effacer, modifier ces données a tous moment via votre page de profil.
      Chaque années nous vous demanderont un renouvellement de votre consentement à conserver ces données dans nos bases de données.
      L'inscription à ce site nécessite que vous acceptiez les conditions de la RGPD. Vous pourrez à tout moment, les refusez, via votre profil. A ce moment là, votre compte ne sera plus visible en publique.<br />
      <a class="lienNav" href="https://eur-lex.europa.eu/legal-content/FR/TXT/HTML/?uri=CELEX%3A32016L0680&from=FR">Vers le texte sur la RGPD</a>
    </p>
  <?php include 'stockage/chartes.php'; ?>
    </p>
  </div>
</div>
<br />
<button class="classique" type="submit" name="button">Enregistrer votre profil</button>
</form>
<?php
  include 'composantVueJS/randomMDP.php';
  include 'composantVueJS/rgpd.php';
?>
