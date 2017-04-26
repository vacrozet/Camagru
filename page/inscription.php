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
		<div class="inheaderborder enfant">
			<div class="enfant" ><a class="colorlink" href="../index.php"> REVENIR A LA PAGE <br /> D'ACCEUIL</a></div>
		</div>
		<div class="inheadercenter">
			<div class="enfant"><U><I><h1>Inscription | Camagru</h1></I></U></div>
		</div>
		<div class="inheaderborder">
		</div>		
	</header>
		<div class="page">
			<div class="enfant">
				<form method="Post" action="../script/add_user.php"><br />
					<input style="text-align: center;<?php if($_SESSION['erreur_1'] == 1){?>border: solid 1px red; <?php } $_SESSION['erreur_1'] = 0; ?>" type="Login"    name="Login"     placeholder="Login*"><br /><br />
					<input style="text-align: center;<?php if($_SESSION['erreur_2'] == 1){?>border: solid 1px red; <?php }?>" type="Password" name="Passwd"    placeholder="Password*"><br /><br />
					<input style="text-align: center;<?php if($_SESSION['erreur_2'] == 1){?>border: solid 1px red; <?php } $_SESSION['erreur_2'] = 0; ?>" type="Password" name="Re-passwd" placeholder="Re-Password*"><br /><br />
					<input style="text-align: center;<?php if($_SESSION['erreur_3'] == 1){?>border: solid 1px red; <?php } $_SESSION['erreur_3'] = 0; ?>" type="Prenom"   name="Prenom"    placeholder="Prenom"><br /><br />
					<input style="text-align: center;<?php if($_SESSION['erreur_4'] == 1){?>border: solid 1px red; <?php } $_SESSION['erreur_4'] = 0; ?>" type="Nom"      name="Nom"       placeholder="Nom"><br /><br />
					<input style="text-align: center;<?php if($_SESSION['erreur_5'] == 1){?>border: solid 1px red; <?php } $_SESSION['erreur_5'] = 0; ?>" type="Adresse"  name="Adresse"   placeholder="Adresse"><br /><br />
					<input style="text-align: center;<?php if($_SESSION['erreur_6'] == 1){?>border: solid 1px red; <?php } $_SESSION['erreur_6'] = 0; ?>" type="cp"       name="cp"        placeholder="cp"><br /><br />
					<input style="text-align: center;<?php if($_SESSION['erreur_7'] == 1){?>border: solid 1px red; <?php } $_SESSION['erreur_7'] = 0; ?>" type="Ville"    name="Ville"     placeholder="Ville"><br /><br />
					<input style="text-align: center;<?php if($_SESSION['erreur_8'] == 1){?>border: solid 1px red; <?php } $_SESSION['erreur_8'] = 0; ?>" type="Numero"   name="Numero"    placeholder="Numero"><br /><br />
					<input style="text-align: center;<?php if($_SESSION['erreur_9'] == 1){?>border: solid 1px red; <?php } $_SESSION['erreur_9'] = 0; ?>" type="Mail"     name="Mail"      placeholder="Mail*"><br /><br />
					<input type="checkbox" name="condition" Value="ok"><span <?php if ($_SESSION['erreur_10'] == 1){ ?> style="color: red;"<?php } $_SESSION['erreur_10'] = 0;?>> J'accepte les conditions generale d'utilisation*</span><br />
					<input type="submit" name="inscription" value="Inscription">
					<?php if ($_SESSION['erreur_login'] == 1){?> <p style="color: red;">Un compte est déjà créer</p><?php $_SESSION['erreur_login'] = 0; }?>
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