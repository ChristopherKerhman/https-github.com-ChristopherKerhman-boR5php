<?php include 'restriction/session.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="<?php echo $vueJSCDN; ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/grapesjs/0.12.17/css/grapes.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/grapesjs/0.12.17/grapes.min.js"></script>-->
    <link rel="stylesheet" href="<?php echo $css; ?>">
    <title><?php echo $titre; ?></title>
  </head>
<body>
  <div id="content">
  <header class="conteneur_col">
    <?php echo '<h1>'.$titre.'</h1><h2>'.$slogan.'</h2>'; ?>
    <?php include 'affichages/menuNavigation.php'; ?>
  </header>
