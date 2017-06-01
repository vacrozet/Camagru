<div id="acceuil_2">
<?php  
session_start();
require_once dirname(__DIR__)."/modele/user.class.php";

$index_user =  $_SESSION['index_user'];
$sql = "SELECT * FROM `Picture`";

$allPicture = Database::getInstance()->request($sql, false, true);

$start = $_GET['vue'] - 10;
$end = $_GET['vue'];

$ret = $_GET['vue'];

if ($end > count($allPicture))
	$end = count($allPicture);

for ($i = $start; $i < $end; $i++) { 
	foreach ($allPicture[$i] as $key => $value) {

		if($key == "index")
			$index = $value;
		if($key == "author")
			$author = $value;
		if($key == "path")
			$path = $value;
		if($key == "date")
			$date = $value;
	}
	$sql = "SELECT * FROM `like` WHERE `index_photo` LIKE :index";

	$fields = ['index' => $index];
	$allLike = Database::getInstance()->request($sql, $fields, true);
	if (count($allLike) != 0)
		$nb_like = count($allLike);
	else
		$nb_like = 0;
	$sql = "SELECT * FROM `like`
			WHERE `index_photo` LIKE :index 
			AND `index_login` LIKE :index_login";

	$fields = [
				'index' => $index,
				'index_login' => $index_user
			];

	$alreadylike = Database::getInstance()->request($sql, $fields, true);
	if (count($alreadylike) == 1)
		$alreadylike = 1;
	else
		$alreadylike = 0;



	echo "<div id=wall>";
	echo "	<div id=logdate>";
	echo "	<p class=\"text\" style=\"margin-left: 20px;\">".$author."</p>";
	echo "	<p class=\"text\" style=\"margin-right: 20px;\">".$date."</p>";
	echo "	</div>";
	echo "	<div id=\"wall_photo\">";
	echo "	<!-- foreach des photos-->";
	echo "		<img id=imgwall src=".substr($path, 1).">";
	echo "	</div>";
	echo "	<div id=likecomment>";
	echo "		<div id=like>";
	echo "			<div id=likelike>";
	if ($alreadylike == 1)
	{
		echo "			<form method=\"POST\" action=\"./controleur/dislike.php\">";
		echo "				<input type=\"hidden\" name=\"id_photo\" value=\"".$index."\">";
		echo "				<input type=\"hidden\" name=\"id_user\" value=\"".$index_user."\">";
		echo "				<button id=buttonlike>dislike(".$nb_like.")</button>";
		echo "			</form>";
	}
	else
	{
		echo "			<form method=\"POST\" action=\"./controleur/like.php\">";
		echo "				<input type=\"hidden\" name=\"author\" value=\"".$author."\">";
		echo "				<input type=\"hidden\" name=\"id_photo\" value=\"".$index."\">";
		echo "				<input type=\"hidden\" name=\"id_user\" value=\"".$index_user."\">";
		echo "				<button id=buttonlike>like(".$nb_like.")</button>";
		echo "			</form>";
	}
	echo "		</div>";
	if ($_SESSION['user_name'] == $author)
	{
		echo "		<div id=supp>";
		echo "			<form method=\"POST\" action=\"./controleur/delete_picture.php\">";
		echo "				<input type=\"hidden\" name=\"id_photo\" value=\"".$index."\">";
		echo "				<button id=buttonlike>Supp</button>";
		echo "			</form>";
		echo "		</div>";
	}
	echo "		</div>";
	echo "		<form id=formcomment method=\"POST\" action=\"./controleur/comment.php\">";
	echo "			<div id=comment>";
	echo "				<input type=\"hidden\" name=\"id_photo\" value=\"".$index."\">";
	echo "				<input type=\"hidden\" name=\"author\" value=\"".$author."\">";
	echo "				<input type=\"hidden\" name=\"id_user\" value=\"".$index_user."\">";
	echo "				<input type=\"hidden\" name=\"login_user\" value=\"".$_SESSION['user_name']."\">";
	echo "				<div style=\"height: 100%; width: 20%;\"><button id=buttoncomment>Commente</button></div>";
	echo "				<div style=\"height: 100%; width: 80%;\"><input id=inputcomment type=\"commentaire\" name=\"commentaire\" placeholder=\"Commentaire...\"></div>";
	echo "			</div>";
	echo "		</form>";
	echo "	</div>";
	echo "	<div id=commentaire>";

	$sql = "SELECT * FROM `comment` WHERE `id_photo` LIKE :id_photo";

	$fields = ['id_photo' => $index];

	$allComment = Database::getInstance()->request($sql, $fields, true);
	if (count($allComment) > 1)
	{
		for ($d=0; $d < count($allComment); $d++) { 
			foreach ($allComment[$d] as $key => $value) {
				if ($key == "login") {
					$login_comment = $value;
				}
				if ($key == "comment") {
					$comment = $value;
				}			
			}
		echo "		<p class=text style=\"margin-top: 10px;\">login: ".$login_comment."</p>";
		echo "		<p class=text>".$comment."</p>";
		}
	}
	if (count($allComment) == 1)
	{
		foreach ($allComment[0] as $key => $value) {
			if ($key == "login") {
				$login_comment = $value;
			}
			if ($key == "comment") {
				$comment = $value;
			}			
		}
		echo "		<p class=text style=\"margin-top: 10px;\">login: ".$login_comment."</p>";
		echo "		<p class=text>".$comment."</p>";
	}
	echo "	</div>";
	echo "</div><br />";

}
if ($end < count($allPicture))
{
	$index_page = $ret + 10;
echo" <div>";
echo"  	<a style=\"text-decoration: none;\" href=\"./index.php?vue=".$index_page."\"><p class=\"text\" style=\"text-align: center;\">Page Suivante -></p></a>";
echo" </div>";
}
if ($ret >= 20)
{
	$index_page = $ret - 10;
echo" <div>";
echo"  	<a style=\"text-decoration: none;\" href=\"./index.php?vue=".$index_page."\"><p class=\"text\" style=\"text-align: center;\"><--Page Précédente </p></a>";
echo" </div>";
}

?>
 </div>