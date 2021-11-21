<?php
// identification
if (isset($_POST["pseudo"]) && !isset($_SESSION["pseudo"])){
	setcookie("pseudo",$_POST["pseudo"]);
}
?>
<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="shortcut icon" href="/img/favicon.png">
	<link rel="stylesheet" href="https://bootswatch.com/5/sketchy/bootstrap.min.css">
    <title>C-A-T</title>
  </head>
  <body>
    <noscript>
      <strong>We're sorry but 'C-A-T' doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
    </noscript>
    <div id="app">
	<h1>Titre</h1>
	<form method="post" action="\index.php">
	<?php require 'modules\identification.php'; ?>
	<?php require 'modules\recherche.php'; ?>
	<?php require 'modules\map.php'; ?>
	</form>
	</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php
error_log('page transmise, tout va bien...');
?>