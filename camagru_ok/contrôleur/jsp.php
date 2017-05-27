<?php  
$doc = new simple_html_dom();
$doc->load_file('http://localhost:8080/camagru/camagru_ok/index.php?vue=post');
echo $doc->find(img, 0)->src;
?>