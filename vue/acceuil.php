<div id="acceuil">
	<div style="width: 50%; text-align: center; display: flex;">
		<div style="margin: auto;">
			<I><p style="color: white; font-size: 3vw">Bienvenue sur<br /> Camagru</p></I>
			<img style="width: 10vw;" src="./img/insta-orange.png">
			<p style="color: white; font-size: 2vw;" >Inscrit toi -></p>
			<?php if ($_SESSION['erreur'] == 12){?> <p style="color: white; font-size: 3vw;">Compte Créer!!<br />Merci de vérifier vos mails.</p><?php }?>
			<?php if ($_SESSION['erreur'] == 11){?> <p style="color: white; font-size: 3vw;">Un compte est<br /> déjà créer</p><?php }?>
		</div>
	</div>
	<div style="width: 50%; display: flex; height: 100%; ">
		<div class="formulaire">
			<img style="margin-top: 10px;" src="./img/user.png">
			<form method="Post" action="./controleur/add_user.php"><br />
					<input style="text-align: center; height: 20px;<?php if($_SESSION['erreur'] == 1){?>border: solid 1px red; <?php }?>" type="Login"    name="Login"     placeholder="Login*"><br /><br />
					<input style="text-align: center; height: 20px;<?php if($_SESSION['erreur'] == 2){?>border: solid 1px red; <?php }?>" type="Password" name="Passwd"    placeholder="Password*"><br /><br />
					<input style="text-align: center; height: 20px;<?php if($_SESSION['erreur'] == 2){?>border: solid 1px red; <?php }?>" type="Password" name="Re-passwd" placeholder="Re-Password*"><br /><br />
					<input style="text-align: center; height: 20px;<?php if($_SESSION['erreur'] == 9){?>border: solid 1px red; <?php }?>" type="Mail"     name="Mail"      placeholder="Mail*"><br /><br />
					<input type="checkbox" name="condition" Value="ok"><span <?php if ($_SESSION['erreur'] == 10){ ?> style="color: red;"<?php }?>> J'accepte les conditions generale d'utilisation*</span><br /><br />
					<button class="button_ins" type="submit" name="inscription" value="Inscription">Inscription</button>
				</form><br />
				<?php $_SESSION['erreur'] = 0; ?>
		</div>	
	</div>
</div>