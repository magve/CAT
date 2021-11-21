<div id="identification">
<?php
// identification
if (!isset($_POST["pseudo"])){
?>
<div>
	<label>Choisissez un pseudo<input type="text" name="pseudo"></label>
	<input type="submit" value="Envoyer">
</div>
<?php 
} else {
	$pseudo=$_POST['pseudo']; 
?>
<p><?= $pseudo ?>, vous êtes connecté-e.</p>
<input type="hidden" name="pseudo" value="<?= $pseudo ?>">
<?php 
}
?>
</div>
