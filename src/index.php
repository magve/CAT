<?php
require_once( 'modules/session_api.php' );
?>
<!DOCTYPE html>
<html lang="">
  <head>
  <!-- la balise viewport agit sur le look de la page, vue sur un telephone c'est mieux
  https://www.alsacreations.com/astuce/lire/1177-Une-feuille-de-styles-de-base-pour-le-Web-mobile.html -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
<?php
// si l'ensemble fonctionne on verra ce message 
echo('Hello World ! ');

// Demonstration de la session
// Un nouveau visiteur ne dispose pas de session

$dejavu = session_get( 'dejavu' );
if (!isset($dejavu)){
    session_set( 'dejavu', 'oui' );
    echo("<br/> c'est votre premiere visite." );
	
// en php on peut faire "echo" ou bien ecrire directement du html entre des balises 'php'
?>
        <p>Cette page dispose d'une session et peut conserver des informations</p>
        <form method="post" action="index.php">
        <label for="memoire">Valeur</label>
        <input type="text" name="memoire" pattern="[ 0-9a-zA-ZÀ-ÿ]*" title="(uniquement des chiffres ou des lettres)">
        <br/><input type="submit" value="Envoyer">
        </form>
	
<?php	
	
} else {

   if (!isset($memoire) && isset($_POST['memoire'])){
	$memoire = $_POST['memoire'];
	session_set( 'memoire', $memoire );
	
	echo( " je vais me souvenir de '" . $memoire ."'" );
   } else {
        $memoire = session_get( 'memoire');
        echo(" je me souviens de '" . $memoire ."'" );
   }
?>
<p>Si vous rappeler la même la page, je garde ma mémoire dans une session.</p>
<p><a href="?deconnexion=">... pour que j'oublie appuyer ici</a></p>
<?php
} // fin isset($dejavu)
?>


</body>
</html>
