#!/usr/bin/php
<?php
if (preg_match('#^[a-zA-Zéèêëàâîïôöûü-]+$#', $argv[1]))
{
	echo "nom de ville correct";
}
else
	echo "ville not ok";

?> 