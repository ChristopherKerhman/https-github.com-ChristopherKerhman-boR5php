<?php
$autorisation = 3;
include 'header.php';
include 'gestionDB/controleFormulaires.php';
// Brassage de date
function brassageDate($data) {
  $date = $data;
  $year = substr($date,0,4);
  $month = substr($date,5,2);
  $day = substr($date,8,2);
  $date = $day.'/'.$month.'/'.$year;
  return $date;
}
include 'stockage/yes.php';
// Recupération de l'idUser et lecture de sa fiche.
$idUser = filter($_GET['idUser']);
include 'gestionDB/read/adminProfilUser.php';
// $dataProfil, $dataNRBU, $dataUnivers
?>
<section class="conteneur_col" id="indexBox">
<h4>Fiche utilisateur de <?php echo $dataProfil[0]['login']; ?></h4>
  <article >
    <ul class="listBox">
      <li><strong>Prenom :</strong> <?php echo $dataProfil[0]['prenom']; ?> - <strong>Nom :</strong> <?php echo $dataProfil[0]['nom']; ?> - <strong>Tiper :</strong> <?php echo $yes[$dataProfil[0]['tiper']]['texte']; ?> </li>
      <li><strong>Date d'inscription :</strong> <?php echo brassageDate($dataProfil[0]['dateInscription']); ?>  </li>
      <li><strong>Email de sécurité : </strong><a class="lienNav" href="mailto:<?php echo $dataProfil[0]['emailUSer']; ?>"><?php echo $dataProfil[0]['emailUSer']; ?></a></li>
      <li><strong>A propos de <?php echo $dataProfil[0]['login']; ?></strong><br /><p class="paragraphe"><?php if(!empty( $dataProfil[0]['description'])){ echo  $dataProfil[0]['description'];} else { echo 'Pas de données'; } ?></p></li>
      <li><strong>Univers encore à créer :</strong> <?php echo $dataProfil[0]['createur']; ?></li>
      <li><strong>Nombre d'univers créer :</strong> <?php echo $dataNRBU[0]['totalU']; ?> </li>
      <li><strong>Accepter la RGPD :</strong> <?php echo $yes[$dataProfil[0]['consentementUser']]['texte']; ?> </li>
    </ul>
  </article>
  <article class="conteneur_row">
    <form action="gestionDB/edit/upDateFiche.php" method="post">
      <label for="AddU"><h4>Donner des univers ?</h4></label>
      <select class="sizeInpute" name="createur">
        <option value="0">0 Univers</option>
        <option value="1">1 Univers</option>
        <option value="2">2 Univers</option>
        <option value="3">3 Univers</option>
        <option value="4">4 Univers</option>
        <option value="5">5 Univers</option>
      </select>
        <input type="hidden" name="idUser" value="<?php echo $dataProfil[0]['idUser']; ?>" >
        <input type="hidden" name="addU" value="1" >
      <button class="buttonGestionLore" type="submit" name="Submit">Mettre à jour</button>
    </form>
    <form action="gestionDB/edit/upDateFiche.php" method="post">
      <label for="AddU"><h4>Tiper ?</h4></label>
      <select class="sizeInpute" name="tiper">
        <option value="0">Non</option>
        <option value="1">Oui</option>
      </select>
        <input type="hidden" name="idUser" value="<?php echo $dataProfil[0]['idUser']; ?>" >
        <input type="hidden" name="addU" value="2" >
      <button class="buttonGestionLore" type="submit" name="Submit">Mettre à jour</button>
    </form>
  </article>
    <article>
    <h4>Liste des univers de l'utilisateur</h4>
    <ul class="listBox">
      <?php foreach ($dataUnivers as $key) {
        echo '<li><strong>Nom Univers</strong> '.$key['nomUnivers'].' - <strong>NT :</strong> '.$key['NT'].' - <strong>Valide :</strong> '.$yes[$key['valide']]['texte'].'</li>';
        if ($key['valide'] == 0) {
          echo '<li>
          <form action="gestionDB/edit/AdminUnivers.php" method="post">
            <input type="hidden" name="valide" value="1">
            <input type="hidden" name="adresse" value="1" />
              <input type="hidden" name="idUser" value="'.$dataProfil[0]['idUser'].'">
            <input type="hidden" name="idUnivers" value="'.$key['idUnivers'].'">
            <button class="buttonGestionLore" type="submit" name="button">Valider</button>
          </form></li>
          </li>
          <li>
          <form action="gestionDB/del/univers.php" method="post">
            <input type="hidden" name="idUnivers" value="'.$key['idUnivers'].'">
            <input type="hidden" name="idUser" value="'.$dataProfil[0]['idUser'].'">
            <button class="buttonGestionLore" type="submit" name="button">Détruire définitivement '.$key['nomUnivers'].'</button>
          </form>
          </li>';
        } else {
          echo '<li><form action="gestionDB/edit/AdminUnivers.php" method="post">
            <input type="hidden" name="valide" value="0">
            <input type="hidden" name="adresse" value="1" />
            <input type="hidden" name="idUser" value="'.$dataProfil[0]['idUser'].'">
            <input type="hidden" name="idUnivers" value="'.$key['idUnivers'].'">
            <button class="buttonGestionLore" type="submit" name="button">Invalider</button>
          </form></li>';
        }
      } ?>
    </ul>

  </article>
</section>
<?php
  include 'footer.php';
?>
