<div class="post">
	<div id=formulairepass>
	<?php $login = $_GET['login']?>
		<form id=passform method="post" action="./controleur/reinit.php">
			<input type="hidden" name="login" value=<?php echo $login;?>>
			<input style="text-align: center;<?php if($_SESSION['erreur'] == 2){?>border: solid 1px red; <?php }?>" type="Password" name="Passwd"    placeholder="Password*"><br /><br />
			<input style="text-align: center;<?php if($_SESSION['erreur'] == 2){?>border: solid 1px red; <?php }?>" type="Password" name="Re-passwd" placeholder="Re-Password*"><br /><br />
			<button id=but class=button_ins >Reinitialiser</button>
		</form>
	</div>
</div>