<?php  
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Camagru</title>
	<link rel="stylesheet" type="text/css" href="./index.css">
</head>
<body>
	<header class="header">
		<div class="inheaderborder">
 			<div class="enfant sizeborderleft" style="align-items: center;">
  				<div style="height: 100%; margin-left: 10px;">
	 				<a style="height: 100%;" href="../index.php"><img style="" src="../img/web-page-home.png" title=""></a>
	 			</div>
	 			<div style="height: 100%;">
	 				<a style="margin-left: 10px;" href="../script/logout.php"><img src="../img/logout.png"></a>
		 		</div>
	 			<?php
	 			if ($_SESSION['admin'] == "OUI")
	 			{
	 			?>
	 				<div style="height: 100%;">
		 				<a style="margin-left: 10px;" href="./script/admin.php"><img src="../img/database.png"></a>
			 		</div>
	 			<?php	
	 			}
	 			?>
	 		</div>
 		</div>
		<div class="inheadercenter">
			<div class="enfant"><U><I><h1>Camagru</h1></I></U></div>
		</div>
		<div class="inheaderborder">
			<div class="enfant" style="">
				<a href="./page/take_picture.php">
					<img  style="max-height: 78px; max-width: 78px;" class="appareil" src="../img/insta.png">
				</a>
			</div>
		</div>		
	</header>
	<div class="divcenter">
		<div class="enfant divcentermoncompte">
			<div style="height: 15%; width: 90%; margin: auto; min-height: 50px; max-height: 80px; text-align: center; display: flex">
				<div class="enfant" style="font-size: 30px; color: white;">
					<I><B><U>Mon Compte</U></B></I>
				</div>
			</div>
			<div style="height: 90%; width: 60%; margin: auto; display: flex; flex-direction: column; min-height: 400px;min-width: 350px;">
				<div style="height: 50%; width: 100%; display: flex; flex-direction: row; min-height: 350px;">
					<div style="text-align: right; height: 50%; width: 40%; min-width: 100px; min-height: 320px; max-height: 350px;">
						<p style=" color: white; margin-right: 10px;">Login :</p>
						<p style=" color: white; margin-right: 10px;">Prenom :</p>
						<p style=" color: white; margin-right: 10px;">Nom :</p>
						<p style=" color: white; margin-right: 10px;">adresse :</p>
						<p style=" color: white; margin-right: 10px;">Code Postal :</p>
						<p style=" color: white; margin-right: 10px;">Ville :</p>
						<p style=" color: white; margin-right: 10px;">Numero :</p>
						<p style=" color: white; margin-right: 10px;">Mail :</p>
					</div>
					<?php 
					if ($_SESSION['changement'] == 0)
					{
					?>
					<div style="height: 80%; width: 60%; min-width: 250px; min-height: 320px; max-height: 350px;">
						<p style=" color: white; margin-left: 10px;"><?php echo $_SESSION['login'];?></p>
						<p style=" color: white; margin-left: 10px;"><?php if ($_SESSION['prenom'] != ""){echo $_SESSION['prenom'];} else {echo "Not Completed";}?></p>
						<p style=" color: white; margin-left: 10px;"><?php if ($_SESSION['nom'] != ""){echo $_SESSION['nom'];} else {echo "Not Completed";}?></p>
						<p style=" color: white; margin-left: 10px;"><?php if ($_SESSION['adresse'] != ""){echo $_SESSION['adresse'];} else {echo "Not Completed";}?></p>
						<p style=" color: white; margin-left: 10px;"><?php if ($_SESSION['CP'] != ""){echo $_SESSION['CP'];} else {echo "Not Completed";}?></p>
						<p style=" color: white; margin-left: 10px;"><?php if ($_SESSION['Ville'] != ""){echo $_SESSION['Ville'];} else {echo "Not Completed";}?></p>
						<p style=" color: white; margin-left: 10px;"><?php if ($_SESSION['numero'] != ""){echo $_SESSION['numero'];} else {echo "Not Completed";}?></p>
						<p style=" color: white; margin-left: 10px;"><?php echo $_SESSION['mail'];?></p>
						<form method="Post" action="../script/script.php">
							<input type="submit" name="modify" value="Modifier les données">
						</form>
						<?php if ($_SESSION['pass_ok'] == 1) {?><p style="color: red;"><U><I>Changement effectuer</I></U></p><?php } $_SESSION['pass_ok'] = 0;?>
					</div>
					<?php  
					}
					else
					{
					?>
					<div style="height: 80%; width: 60%; min-width: 250px; min-height: 320px; max-height: 350px;">
						<form method="Post" action="../script/modify_account.php">
							<p style=" color: white; margin-left: 10px;"><?php echo $_SESSION['login'];?></p>
							<p style=" color: white; margin-left: 10px;"><input type="text" name="prenom" placeholder="<?php if ($_SESSION['prenom'] != ""){echo $_SESSION['prenom'];} else {echo "Not Completed";}?>"</p>
							<p style=" color: white; margin-left: 10px;"><input type="text" name="nom" placeholder="<?php if ($_SESSION['nom'] != ""){echo $_SESSION['nom'];} else {echo "Not Completed";}?>"</p>
							<p style=" color: white; margin-left: 10px;"><input type="text" name="adresse" placeholder="<?php if ($_SESSION['adresse'] != ""){echo $_SESSION['adresse'];} else {echo "Not Completed";}?>"</p>
							<p style=" color: white; margin-left: 10px;"><input type="text" name="cp" placeholder="<?php if ($_SESSION['CP'] != ""){echo $_SESSION['CP'];} else {echo "Not Completed";}?>"</p>
							<p style=" color: white; margin-left: 10px;"><input type="text" name="Ville" placeholder="<?php if ($_SESSION['Ville'] != ""){echo $_SESSION['Ville'];} else {echo "Not Completed";}?>"</p>
							<p style=" color: white; margin-left: 10px;"><input type="text" name="numero" placeholder="<?php if ($_SESSION['numero'] != ""){echo $_SESSION['numero'];} else {echo "Not Completed";}?>"</p>
							<p style=" color: white; margin-left: 10px;"><?php echo $_SESSION['mail'];?></p><br />
								<input type="submit" name="modify" value="Confirmer les changements">
						</form>
					</div>
					<?php
					}
					?>
				</div>
				<div style="height: 30%; width: 100%; display: flex; min-height: 200px;">
					<div style="margin: auto; height: 70%; width: 80%; text-align: center;">
						<p style="color: white;"><U><I>Changement de mot de passe</I></U></p>
						<form method="Post" action="../script/modify_passwd_account.php">
							<input <?php if($_SESSION['erreur_pass_2'] == 1){?> style="border: solid 1px red;" <?php } $_SESSION['erreur_pass_2'] = 0;?> type="passwd" name="oldpasswd" placeholder="ancien">
							<input <?php if($_SESSION['erreur_pass_1'] == 1){?> style="border: solid 1px red;" <?php }?> type="passwd" name="newpasswd" placeholder="Nouveau">					
							<input <?php if($_SESSION['erreur_pass_1'] == 1){?> style="border: solid 1px red;" <?php } $_SESSION['erreur_pass_1'] = 0; ?>type="passwd" name="re_newpasswd" placeholder="Nouveau">
							<input type="submit" name="confirmer" value="confirmer">						
						</form>
						<?php if ($_SESSION['pass_ok'] == 1) {?><p style="color: red;"><U><I>Changement effectuer</I></U></p><?php } $_SESSION['pass_ok'] = 0;?>
					</div>
				</div>
				<div style="height: 20%; width: 100%; display: flex; min-height: 125px;">
					<div style="margin: auto; height: 70%; width: 80%; text-align: center;">
						<p style="color: white;"><U><I>Suppression de compte</I></U></p>
						<form method="Post" action="../script/supp_account.php">
							<input type="passwd" name="passwd" placeholder="mot de passe">
							<input type="submit" name="suppresion"; value="Supprimer le compte">						
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="bdfooter">
		<div class="auteur">
		<div class="enfant">@vacrozet 2017 | Camagru</div>
		</div>
	</footer>
</body>
</html>