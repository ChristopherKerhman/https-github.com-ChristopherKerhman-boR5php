<div id="VERROUBOOL">
  <?php if ($_SESSION['createur'] == 0) {echo '<strong>Vous ne pouvez plus créer de nouveaux univers.<br /><br /> Pour ajouter des univers, devenez Tippeur et </strong><a class="lienNav" href="contact.php">contacter moi</a><strong> pour avoir de 1 à 3 nouveaux univers par mois si besoin.</strong>'; } ?>

   <article v-show="cle">
       <br />
     <button class="buttonGestionLore" type="button" name="button" v-on:click="cle = false">Afficher les univers déjà créer</button>
       <h3>Création d'un nouvelle univers ?</h3>
       <p>Il vous reste <?php echo $_SESSION['createur'] ?> univers à créer.</p>
     <form class="conteneur_col" action="gestionDB/record/addMultivers.php" method="post">
     <label  for="nameUnivers">Le nom de votre univers :</label>
     <input id="nameUnivers" class="sizeInpute" type="text" name="nomUnivers" placeholder="Nom de l'univers" required>
     <label for="NT" class="lienNav" v-on:click="verrouB">Niveau technologique :</label>
     <input id="NT" class="sizeInpute" type="number" name="NT" min="1" max="9" required>
     <br />
     <button class="classique" type="submit" name="button">Enregistrer</button>
   </form>
   </article>
   <article v-show="!cle">
     <button class="buttonGestionLore" type="button" name="button" v-on:click="cle = true">Afficher les univers restant à créer</button>
    <?php include 'affichages/listeUnivers.php'; ?>
   </article>
   <article v-if="cle2">
<ul class="listBox">
  <li><h4>Les NT</h4></li>
  <li class="titreNT">NT 1 : univers pré-historique</li>
  <li>Les peuplades ne maîtrisent pas de technologie à base de métaux, les armes sont en bois, en pierre ou en os. Le niveau des magiciens est limité à niveau 2. </li>
  <li class="titreNT">NT 2 : Antiquité ou antiquité fantastique</li>
  <li>Les armes en bronze ou en fer sont disponible, les peuplades antique se font la guerre très efficacement. Certain univers peuvent être fantastique et donc, la magie est possible, dans ce cas, les magiciens sont limités à niveau 3.</li>
  <li class="titreNT">NT 3 : Médiévale ou médiévale fantastique </li>
  <li>Les armes en fer sont disponible, la magie est présente et n’a pas de limite. On peut voir aussi, dans ces univers des armes à poudre noir.</li>
  <li class="titreNT">NT 4 : Époque napoléonienne</li>
  <li class="titreNT">Les armes à poudre noir se généralise, les armes de contact sont plus marginalement employé. Pas de magie disponible. </li>
  <li class="titreNT">NT 5 : Steampunk</li>
  <li>Les armes à poudre noir côtoie des armes à énergie, la science permet des miracles technologique et la magie est possible dans ce type d’univers.</li>
  <li class="titreNT">NT 6 : Première guerre mondiale</li>
  <li>Au début du 1900 siècle, s’opère un tournant dans la technologie des armes. Les armes à feu standard sont disponible, sauf les pistolets mitrailleur et les fusils mitrailleur et les fusils d’assaut.
  Dans les armes explosives, les armes à plasma ou à fusion, sont non disponible.</li>
  <li class="titreNT">NT 7 : Époque moderne</li>
  <li>De la seconde guerre mondiale à 2020 environs. Dans les armes explosives, les armes à plasma ou à fusion, sont non disponible.</li>
  <li class="titreNT">NT ? : Post-apocalyptique</li>
  <li>Les survivants s’organisent en bande de pillards, en milice para-militaire ou en fermiers armés jusqu’aux dents. Dans ces univers, tous est recyclé, modifié, bidouillé.
  On peut rencontrer dans ces univers des hordes de zombie, des extra-terrestres envahisseur etc.</li>
  <li class="titreNT">NT 8 : Cyberpunk</li>
  <li>Le futur post 2030, corps modifier, arme de combat clairement futuriste.</li>
  <li class="titreNT">NT 9 : Monde SF très avancée</li>
  <li>Le futur lointain, aucune restriction d’arme, d’armure et d’équipement ou de magie si ça s’y prête. </li>
</ul>
   </article>
 </div>
