<article>
  <h4>Formulaire de contact des administrateurs</h4>
  <p class="paragraphe">Vous désirez nous contacter pour toutes questions concernant R-5 ou les sites web associer à R-5 ? Ce formulaire de contact est fait pour vous.</p>
  <form class="conteneur_col" action="gestionDB/record/contact.php" method="post">
    <label for="email">E mail pour la réponse</label>
    <input id="email" class="sizeInpute" type="text" name="email" placeholder="Votre email" required>
    <label for="object">L'objet de votre demande</label>
    <input id="object" class="sizeInpute" type="text" name="objet" placeholder="Objet de votre demande" required>
    <!--Element pour créer la présentation des textes.-->
    <script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script>
    <script type="text/javascript">bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });</script>
    <!--En attendant grapeJS-->
    <textarea name="message" rows="8" cols="80">Votre message.</textarea>
    <div class="conteneur_row">
      <button class="classique marge" type="submit" name="button">Envoyer</button>
      <button class="classique marge" type="reset" name="button">Effacer</button>
    </div>
  </form>
</article>
