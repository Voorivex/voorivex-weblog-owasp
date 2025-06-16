<?php
ob_start();
session_start();
$_SESSION = array();
session_destroy();
header("Location: login.php");
ob_end_flush();
exit;
?>