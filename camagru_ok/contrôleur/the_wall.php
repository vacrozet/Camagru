<?php  
session_start();
require_once dirname(__DIR__)."/modèle/user.class.php";

$sql = "SELECT * FROM `Picture`";

$allPicture = Database::getInstance()->request($sql, false, true);

foreach ($allPicture as $key => $value) {
	$tab[] = $value;
}
echo "<pre>";
print_r($allPicture);
echo "</pre>";
echo "<pre>";
print_r($allPicture[0]);
echo "</pre>";

// print_r($tab[0]);

// foreach ($tab as $key => $value) {
// 	print_r( $value);
// }



// for ($i=0; $i < count($allPicture); $i++) { 
// 	foreach ($tab[$i] as $key => $value) {
// 		if($key == "index");
// 			$index = $value;
// 		if($key == "author")
// 			$author = $value;
// 		if($key == "path")
// 			$path = $value;
// 		if($key == "date")
// 			$date = $value;
// 	}

// 	echo "<div id=wall>";
// 	echo "	<div id=logdate>";
// 	echo "	<p class=\"text\" style=\"margin-left: 20px;\">".$author."</p>";
// 	echo "	<p class=\"text\" style=\"margin-right: 20px;\">".$date."</p>";
// 	echo "	</div>";
// 	echo "	<div id=\"wall_photo\">";
// 	echo "	<!-- foreach des photos-->";
// 	echo "		<img id=imgwall src=".substr($path, 1).">";
// 	echo "	</div>";
// 	echo "	<div id=likecomment>";
// 	echo "		<div id=like>";
// 	echo "			<form method=\"POST\" action=\".contrôleur/like.php\">";
// 	echo "				<button id=buttonlike>LIKE(<!--Nombre de like-->)</button>";
// 	echo "			</form>";
// 	echo "		</div>";
// 	echo "		<form id=formcomment method=\"POST\" action=\"./contrôleur/comment.php\">";
// 	echo "			<div id=comment>";
// 	echo "				<div style=\"height: 100%; width: 20%;\"><button id=buttoncomment>Commente</button></div>";
// 	echo "				<div style=\"height: 100%; width: 80%;\"><input id=inputcomment type=\"commentaire\" name=\"commentaire\" placeholder=\"Commentaire...\"></div>";
// 	echo "			</div>";
// 	echo "		</form>";
// 	echo "	</div>";
// 	echo "	<div id=commentaire>";
// 	echo "	<!-- Foreach pour les commentaires ICI -->";
// 	echo "		<p class=text style=\"margin-top: 10px;\"><U>login :</U></p>";
// 	echo "		<p class=text>commentaire</p>";
// 	echo "	</div>";
// 	echo "</div><br />";
// }
?>