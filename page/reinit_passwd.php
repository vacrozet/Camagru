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
			<div class="enfant"><U><I><h1>Récup Password</h1></I></U></div>
		</div>
		<div class="inheaderborder">
		</div>	
	</header>
		<div class="page">
			<div class="enfant">
				<form method="Post" action="../script/reinit_passwd.php"><br />
					<input style="text-align: center;<?php if($_SESSION['erreur_1'] == 1){?>border: solid 1px red; <?php } $_SESSION['erreur_1'] = 0; ?>" type="Login"    name="Login"     placeholder="Login*"><br /><br />
					<input style="text-align: center;<?php if($_SESSION['erreur_2'] == 1){?>border: solid 1px red; <?php }?>" type="Password" name="Passwd"    placeholder="Password*"><br /><br />
					<input style="text-align: center;<?php if($_SESSION['erreur_2'] == 1){?>border: solid 1px red; <?php } $_SESSION['erreur_2'] = 0; ?>" type="Password" name="Re-passwd" placeholder="Re-Password*"><br /><br />
					<input type="submit" name="submit" value="Changer mon mot de passe">
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