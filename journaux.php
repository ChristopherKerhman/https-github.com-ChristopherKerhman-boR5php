<?php
$autorisation = 3;
$del = 0;
include 'header.php';
include 'gestionDB/controleFormulaires.php';
include 'stockage/yes.php';
include 'stockage/brassageDate.php';
?>
<section class="conteneur_col" id="indexBox">

<?php
// Paramètre de pagination
if(isset($_GET['page']) && (!empty($_GET['page']))) {
  $currentPage = filter($_GET['page']);
} else {
$currentPage = 1;
}
$parPage = 25;
// Recherche de nombre de connexion dans la DB
    $requetteSQL = "SELECT COUNT(`idConnexion`) AS `nbrConnexion` FROM `journaux`";
    $data = $conn->prepare($requetteSQL);
    $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);
    $nbr = $data->fetchAll();
    $nbrArticle = $nbr[0]['nbrConnexion'];
  // nombre de page total arrondit au chiffre suppérieur.
  $pages = ceil($nbrArticle/$parPage);
  // Calcul du premier article dans la page.
  $premier = ($currentPage * $parPage) - $parPage;
$requetteSQL = "SELECT * FROM `journaux` ORDER BY `idConnexion` DESC LIMIT {$premier}, {$parPage}";
  $data = $conn->prepare($requetteSQL);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataTraiter = $data->fetchAll();
 ?>
 <article>
   <h3>Journaux de connexions</h3>
<form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      $del = filter($_POST['del']);
  if ($del == 1){
  $requetteSQL = "DELETE FROM `journaux`";
  $data = $conn->prepare($requetteSQL);
  $data->execute();}
} ?>
  <input type="hidden" name="del" value="1">
  <button class="buttonGestionLore" type="submit" name="button" v-on:click="valider"><i class="fas fa-trash-alt"></i></button>
</form>


   <table>
     <tr>
       <th>id Connexion</th>
       <th>login</th>
       <th>Ip de l'utilisateur</th>
       <th>Connexion réussit</th>
       <th>date et heure de connexion</th>
     </tr>
     <?php
     foreach ($dataTraiter as $key) {
       $date = $key['dateheurConnexion'];
       echo '<tr>
              <td>'.$key['idConnexion'].'</td>
              <td><a class="lienNav" href="FicheUser.php?idUser='.$key['idUser'].'">'.$key['login'].'</a></td>
              <td>'.$key['ip_client'].'</td>
              <td>'.$key['idUser'].'</td>
              <td>'.brassageDate($date).' - heure = '.substr($date,10,6).'</td>
            </tr>';
     }
      ?>
   </table>
   <?php
   for ($page=1; $page <= $pages ; $page++ ) {
     echo '<a class="page" href="journaux.php?page='.$page.'">'.$page.'</a>';
   }
    ?>
 </article>
</section>




<?php
  include 'footer.php';
?>
