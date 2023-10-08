<?php
$imagePath = $_GET['imgsrc'];
$imageData = file_get_contents($imagePath);
echo $imageData;
?>