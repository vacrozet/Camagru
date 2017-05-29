<?php  
session_start();

if (!empty($_POST['img_prec']) && !empty($_POST['png_prec']) && !empty($_POST['top_prec']) && !empty($_POST['left_prec']))
{

	$photo = $_POST['img_prec'];
	$png = $_POST['png_prec'];
	$top = $_POST['top_prec'];
	$left = $_POST['left_prec'];
	imagecopymerge($photo, $png, $left, $top, 0, 0, 128, 128, 100);
	echo "<img src=".$photo.">";

}
else
	header('Location: ../index.php?vue=post');
?>