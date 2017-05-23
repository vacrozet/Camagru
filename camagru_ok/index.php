<?php 
session_start();
include('./vue/header.php');
if ($_SESSION['user_name'] == "")
{
?>
<div id="acceuil">
	<div style="width: 50%; text-align: center; vertical-align: middle;">
		<I><p style="color: white; font-size: 4vw;">Bienvenue sur<br /> Camagru</p></I>
		<img style="width: 15vw;" src="./img/insta-orange.png">
		<?php if ($_SESSION['erreur'] == 12){?> <p style="color: white; font-size: 3vw;">Compte Créer!!<br />Merci de vérifier vos mails.</p><?php $_SESSION['erreur'] = 0; }?>
		<?php if ($_SESSION['erreur'] == 11){?> <p style="color: white; font-size: 3vw;">Un compte est<br /> déjà créer</p><?php }?>
	</div>
	<div style="width: 50%; display: flex; height: 100%; ">
		<div class="formulaire">
			<img style="margin-top: 10px;" src="./img/user.png">
			<form method="Post" action="../script/add_user.php"><br />
					<input style="text-align: center;<?php if($_SESSION['erreur'] == 1 || $_SESSION['erreur'] == 11 ){?>border: solid 1px red; <?php }?>" type="Login"    name="Login"     placeholder="Login*"><br /><br />
					<input style="text-align: center;<?php if($_SESSION['erreur'] == 2){?>border: solid 1px red; <?php }?>" type="Password" name="Passwd"    placeholder="Password*"><br /><br />
					<input style="text-align: center;<?php if($_SESSION['erreur'] == 2){?>border: solid 1px red; <?php }?>" type="Password" name="Re-passwd" placeholder="Re-Password*"><br /><br />
					<input style="text-align: center;<?php if($_SESSION['erreur'] == 9){?>border: solid 1px red; <?php }?>" type="Mail"     name="Mail"      placeholder="Mail*"><br /><br />
					<input type="checkbox" name="condition" Value="ok"><span <?php if ($_SESSION['erreur'] == 10){ ?> style="color: red;"<?php }?>> J'accepte les conditions generale d'utilisation*</span><br /><br />
					<input type="submit" name="inscription" value="Inscription">
					<?php if ($_SESSION['erreur'] == 11){?> <p style="color: red;">Un compte est déjà créer</p><?php }?>
					<?php if ($_SESSION['erreur'] == 12){?> <p style="color: red;">Compte Créer !!</p><?php $_SESSION['erreur'] = 0; }?>
				</form><br />
		</div>	
	</div>
</div>
<?php
}
else
{ ?>



<?php 
}
//include('./vue/footer.html'); ?>