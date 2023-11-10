<?php
$imagePath = $_GET['imgsrc'];
# $imagePath = str_replace('../', '', $imagePath);
if (strstr($imagePath, '../') != False) {
    die('security failed!');
}
$imageData = file_get_contents('/var/www/html/' . $imagePath);
echo $imageData;
?>