<?php
require_once( 'modules/session_api.php' );
require_once( 'modules/logging_api.php' );
require_once( 'modules/visiteur_api.php' );
$nouveauVisiteur = estJoueurNouveau();
?>
<!DOCTYPE html>
<html lang="">
  <head>
    <script src="../js/color-modes.js"></script>
  <!-- la balise viewport agit sur le look de la page, vue sur un telephone c'est mieux
  https://getbootstrap.com/docs/5.3/examples/cheatsheet/ -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>C-A-T</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
<header class="bd-header bg-dark py-3 d-flex align-items-stretch border-bottom border-dark">
  <div class="container-fluid d-flex align-items-center">
    <h1 class="d-flex align-items-center fs-4 text-white mb-0">
      <img src="img/cat_logo.png" width="38" height="38" class="me-3" alt="C-A-T">
      Chasse-Au-Trésor
    </h1>
  </div>
    <?php
if (!$nouveauVisiteur){ affichePseudo();}
?>
</header>
<?php

if ($nouveauVisiteur){

    afficheDemandePseudo();

} else {

echo ("<h1>Hello World!</h1>");


} // fin if ($nouveauVisiteur)
?>


<script src="js/bootstrap.bundle.min.js"></script>

    <script src="js/cheatsheet.js"></script></body>
</body>
</html>
