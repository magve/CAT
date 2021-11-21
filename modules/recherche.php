<?php
// recherche 
$debugHidden="hidden"; //hidden
//si identification N'est PAS faite, on initialise la recherche
if (!isset($_POST["pseudo"])){
	$listeIndicesTrouves = ",1,";
?>
<input type="<?=$debugHidden?>" name="listeIndicesTrouves" value="<?=$listeIndicesTrouves?>" />
<input type="<?=$debugHidden?>" name="hypotheseIndice" />
<?php
} else {
	$listeIndicesTrouves = $_POST["listeIndicesTrouves"];
	// 48.763168 , 2.045142
	// 48.763799 , 2.044273
	// 48.767304 , 2.043485
	$indices = json_decode('[{
	"id_indice": "1",
	"lib_indice": "Départ de la Chasse au Trésor",
	"data_type": "url",
	"data_indice": "https://drive.google.com/file/d/130VD7AvjDcwZFlrWC4YEoNXG_1xKdzY4/view?usp=sharing",
	"id_secret": "E5-517G-337K",
	"latitude": "48.763168",
	"longitude": "2.045142"
},{
	"id_indice": "E5-517G-337K",
	"lib_indice": "sens de la lecture, sans espace",
	"data_type": "url",
	"data_indice": "https://drive.google.com/file/d/1382Qa24Lr4mQ72aOy-vuZjrse1xpBdkO/view?usp=sharing",
	"id_secret":"B0021519",
	"latitude":"48.763799",
	"longitude":"2.044273"
},{
	"id_indice": "B0021519",
	"lib_indice": "découvrez son code",
	"data_type": "url",
	"data_indice": "https://drive.google.com/file/d/13BASUqGLSQCxGG5CMUfPfmS0CnHymY3S/view?usp=sharing",
	"id_secret":"Voilure",
	"latitude":"48.767304",
	"longitude":"2.043485"
},{
	"id_indice": "Voilure",
	"lib_indice": "Message",
	"data_type": "text",
	"data_indice": "Vous avez gagné !",
	"id_secret":"1",
	"latitude":"48.763168",
	"longitude":"2.045142"
}]', false);
	
	$hypotheseIndice = $_POST["hypotheseIndice"];
	if (isset($hypotheseIndice)
	  && strlen($hypotheseIndice) > 0)
		foreach ($indices as $elem) { 
			if(strcasecmp($elem->id_indice,$hypotheseIndice)==0){
				$listeIndicesTrouves .= $hypotheseIndice.",";
			}
	}
?>
<div id="recherche">
<h2>Recherche</h2>
	<input type="<?=$debugHidden?>" name="listeIndicesTrouves" value="<?=$listeIndicesTrouves?>" /> 
	<div id="indicesTrouves">
		<table> 
		  <tr>
			<td>code</td>
			<td>indice</td>
		  </tr>
		<?php
		$i = 0;
		foreach ($indices as $elem) { 
		error_log("cherche ".$listeIndicesTrouves." dans ".$elem->id_indice.":".stripos($listeIndicesTrouves,$elem->id_indice));
		if (stripos($listeIndicesTrouves,$elem->id_indice)>0){
			$i += 1;
		?> 
		  <tr>  
			<td><?= $elem->id_indice ?></td>
			<td><a href="<?= $elem->data_indice ?>"><?= $elem->lib_indice ?></a></td>
		  </tr>
		<?php }} ?>
		</table>
	</div>
	<div>
    <label>Hypothèse :<input type="text" name="hypotheseIndice"></label>
    <input type="submit" value="?">
	</div>
</div>
<?php
}
?>
<script src="https://cdn.jsdelivr.net/npm/exif-js"></script>
