<?php  
session_start();

if (!empty($_POST['img_prec']) && !empty($_POST['png_prec']) && !empty($_POST['top_prec']) && !empty($_POST['left_prec']))
{

	$photo = substr($_POST['img_prec'], 22);
	$png = $_POST['png_prec'];
	$top = $_POST['top_prec'];
	$left = $_POST['left_prec'];

	$photo = base64_decode($photo);
	$photo = imagecreatefromstring($photo);
	$png = imagecreatefrompng($png);
	imagecopymerge($photo, $src, 0, 0, 0, 0, 128, 128, 100);	
}
else
	header('Location: ../index.php?vue=post');
?>