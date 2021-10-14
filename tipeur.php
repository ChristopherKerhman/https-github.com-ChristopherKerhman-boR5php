<?php
include 'Fheader.php';
include 'gestionDB/read/Findex.php';
$_SESSION['idUniversVisite'] = NULL;
$_SESSION['nomUnivers'] = NULL;
$requetteSQL = "SELECT `login` FROM `users` WHERE `consentementUser`= 1 AND `role` = 1 AND `tiper` = 1 ORDER BY `login` ASC";
$data = $conn->prepare($requetteSQL);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataUser = $data->fetchAll();
 ?>
<section>
  <article>
    <h4>Merci aux tipers de faire vivre le site et participer au frais de mise en ligne</h4>
    <ul class="listTipeur ">
      <?php foreach ($dataUser as $key) {
        echo '<li><strong class="famous">'.$key['login'].'</strong></li>';
      } ?>
    </ul>
  </article>
</section>
 <?php
   include 'footer.php';
 ?>
