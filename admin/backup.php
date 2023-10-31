<?php
session_start();
include 'access.php';
include '../db.php';
include 'mysql-backup.php';

new MySQLBackup($db_username, $db_password, $db_database, $backupPath);
?>