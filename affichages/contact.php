<section>
  <article>
    <h4><i class="far fa-envelope"></i> Les messages à traiter</h4>
    <ul class="listRS">
      <?php
      function brassageDate ($date) {
        $year = substr($date,0,4);
        $month = substr($date,5,2);
        $day = substr($date,8,2);
        $hour = substr($date,11,2);
        $minute = substr($date,14,2);
        $date = $hour.'h'.$minute.' - '.$day.'/'.$month.'/'.$year;
        return $date;
      }
      // donnée dans :  $dataTraiter
      foreach ($dataTraiter as $key) {
        if ($key['traitement'] == 0) {
          echo '<li><strong>Mail de réponse :</strong> '.$key['email'].'</li>
          <li><strong>Date d\'envois :</strong> '.brassageDate($key['dateEnvois']).'</li>
          <li><strong>Object :</strong> '.$key['objet'].'</li>
          <li><strong>Message :</strong><br />'.$key['message'].'</li>
          <li>
            <form action="gestionDB/edit/contact.php" method="post">
              <select class="sizeInpute" name="traitement">
                <option value="0" selected>A traiter</option>
                <option value="1">Traité</option>
                <option value="2">Archivé</option>
              </select>
              <input type="hidden" name="id" value="'.$key['idContact'].'">
              <button class="buttonGestionLore" type="submit" name="button">Modifier</button>
            </form>
          </li>' ;
        }
      }
      ?>
    </ul>
        <h4><i class="far fa-envelope-open"></i> Les messages traités</h4>
    <ul class="listTraiter">
      <?php
      foreach ($dataTraiter as $key) {
        if ($key['traitement'] == 1) {
          echo '<li><strong>Mail de réponse :</strong> '.$key['email'].'</li>
          <li><strong>Object :</strong> '.$key['objet'].'</li>
          <li><strong>Message :</strong><br />'.$key['message'].'</li>
          <li><strong>Date d\'envois :</strong> '.brassageDate($key['dateEnvois']).'</li>
          <li>
            <form action="gestionDB/edit/contact.php" method="post">
              <select class="sizeInpute" name="traitement">
                <option value="0">A traiter</option>
                <option value="1"selected>Traité</option>
                <option value="2">Archivé</option>
              </select>
              <input type="hidden" name="id" value="'.$key['idContact'].'">
              <button class="buttonGestionLore" type="submit" name="button">Modifier</button>
            </form>
          </li>' ;
        }
      }
      ?>
    </ul>
    <h4><i class="far fa-envelope-open"></i>Archive</h4>
<ul class="listTraiter">
  <?php
  foreach ($dataTraiter as $key) {
    if ($key['traitement'] == 2) {
      echo '<li><strong>Mail de réponse :</strong> '.$key['email'].'</li>
      <li><strong>Object :</strong> '.$key['objet'].'</li>
      <li><strong>Date d\'envois :</strong> '.brassageDate($key['dateEnvois']).'</li>
      <li>
        <form action="gestionDB/edit/contact.php" method="post">
          <select class="sizeInpute" name="traitement">
            <option value="0">A traiter</option>
            <option value="1">Traité</option>
            <option value="2"selected>Archivé</option>
            <option value="3">Verrouiller</option>
          </select>
          <input type="hidden" name="id" value="'.$key['idContact'].'">
          <button class="buttonGestionLore" type="submit" name="button">Modifier</button>
        </form>
      </li>' ;
    }
  }
  ?>
</ul>
  </article>
</section>
