<div id="account">
	<div id=divcenter>
		<div style="width: 100%; text-align: center; font-size: 2vw; color: white;"><p><I>Mon Compte<I></p></div>
		<div style="width: 100%; text-align: center; font-size: 1.5vw; color: #E15D37;"><p><I>Bienvenue <?php echo $_SESSION['user_name']; ?><I></p></div>
		<div style="width: 100%; text-align: center;">
			<?php
			if ($_GET['modify'] == "yes")
			{
			?>
				<form method="POST" action="./contrôleur/account.php">
					<input type="Password" name="oldpasswd" placeholder="Ancien">
					<input type="Password" name="newpasswd" placeholder="Nouveau">
					<input type="Password" name="re_newpasswd" placeholder="Nouveau"><br />
					<button class="button_ins" type="submit" name="confirmer">Modif Password</button>
				</form>
			<?php 
			}
			else
				{
			?>
				<form method="POST" action="./index.php?vue=account&modify=yes"><br />
					<button class="button_ins" type="submit">Modif Password</button>
				</form><br />
			<?php
				}
			?>
		</div>
		<div style="width: 100%; text-align: center; margin-top: 15px;">
		<?php
		if ($_GET['delete'] == "yes")
		{
		?>
			<form method="POST" action="./contrôleur/account.php">
				<input type="Password" name="passwd" placeholder="password"><br /><br />
				<button class="button_ins" type="submit" name="delete">Suppression du compte</button><br />
			</form>
		<?php
		}
		else
		{
		?>
			<form method="POST" action="./index.php?vue=account&delete=yes">
				<button class="button_ins" type="submit">Supprimer Compte</button>
			</form>
		<?php
		}
		?>
		</div>
	</div>
</div>

