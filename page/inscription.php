<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inscription | Camagru</title>
	<link rel="stylesheet" type="text/css" href="./index.css">
</head>
<body>
	<header class="header">
		<div class="inheaderborder">
 			<div class="enfant sizeborderleft" style="align-items: center;">
 				<div style="height: 100%; margin-left: 10px;">
	 				<a style="height: 100%;" href="../index.php"><img style="" src="../img/web-page-home.png" title=""></a>
	 			</div>

	 		</div>			
 		</div>
		<div class="inheadercenter">
			<div class="enfant"><U><I><h1>Bienvenue sur Camagru</h1></I></U></div>
		</div>
		<div class="inheaderborder">
		</div>	
	</header>
		<div class="page">
			<div class="enfant">
				<form method="Post" action="../script/add_user.php"><br />
					<input style="text-align: center;<?php if($_SESSION['erreur'] == 1 || $_SESSION['erreur'] == 11 ){?>border: solid 1px red; <?php }?>" type="Login"    name="Login"     placeholder="Login*"><br /><br />
					<input style="text-align: center;<?php if($_SESSION['erreur'] == 2){?>border: solid 1px red; <?php }?>" type="Password" name="Passwd"    placeholder="Password*"><br /><br />
					<input style="text-align: center;<?php if($_SESSION['erreur'] == 2){?>border: solid 1px red; <?php }?>" type="Password" name="Re-passwd" placeholder="Re-Password*"><br /><br />
					<input style="text-align: center;<?php if($_SESSION['erreur'] == 3){?>border: solid 1px red; <?php }?>" type="Prenom"   name="Prenom"    placeholder="Prenom"><br /><br />
					<input style="text-align: center;<?php if($_SESSION['erreur'] == 4){?>border: solid 1px red; <?php }?>" type="Nom"      name="Nom"       placeholder="Nom"><br /><br />
					<input style="text-align: center;<?php if($_SESSION['erreur'] == 5){?>border: solid 1px red; <?php }?>" type="Adresse"  name="Adresse"   placeholder="Adresse"><br /><br />
					<input style="text-align: center;<?php if($_SESSION['erreur'] == 6){?>border: solid 1px red; <?php }?>" type="cp"       name="cp"        placeholder="cp"><br /><br />
					<input style="text-align: center;<?php if($_SESSION['erreur'] == 7){?>border: solid 1px red; <?php }?>" type="Ville"    name="Ville"     placeholder="Ville"><br /><br />
					<input style="text-align: center;<?php if($_SESSION['erreur'] == 8){?>border: solid 1px red; <?php }?>" type="Numero"   name="Numero"    placeholder="Numero"><br /><br />
					<input style="text-align: center;<?php if($_SESSION['erreur'] == 9){?>border: solid 1px red; <?php }?>" type="Mail"     name="Mail"      placeholder="Mail*"><br /><br />
					<input type="checkbox" name="condition" Value="ok"><span <?php if ($_SESSION['erreur'] == 10){ ?> style="color: red;"<?php }?>> J'accepte les conditions generale d'utilisation*</span><br />
					<input type="submit" name="inscription" value="Inscription">
					<?php if ($_SESSION['erreur'] == 11){?> <p style="color: red;">Un compte est déjà créer</p><?php }?>
					<?php if ($_SESSION['erreur'] == 12){?> <p style="color: red;">Compte Créer !!</p><?php $_SESSION['erreur'] = 0; }?>
				</form><br />
			</div>
 		</div>
	<footer class="bdfooter">
		<div class="auteur">
		<div class="enfant">@vacrozet 2017 | Camagru</div>
		</div>
	</footer>
</html>
</body>