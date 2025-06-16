<?php
session_start();
include 'access.php';
include '../db.php';
include '../header.php';
include 'mysql-backup.php';

$result = False;
$sql = False;
if (array_key_exists('operation', $_GET)) {
    $op = $_GET['operation'];
    if ($op == 'search' && array_key_exists('keyword', $_GET)) {
        $sql = "SELECT * FROM `users` where username like '%$_GET[keyword]%' or email like '%" . $_GET['keyword'] . "%'";
        $result = mysqli_query($conn, $sql);
    } elseif ($op == 'delete' && array_key_exists('user_id', $_GET)) {
        $sql = "DELETE FROM `users` where user_id = " . $_GET['user_id'];
        $result = mysqli_query($conn, $sql);
    } elseif ($op == 'export-user' && array_key_exists('user_id', $_GET)) {
        $sql = "SELECT * FROM `users` where user_id = " . $_GET['user_id'];
        $result = mysqli_query($conn, $sql);
        $export = true;
    } elseif ($op == 'import-user' && array_key_exists('obj', $_GET)) {
        $import = unserialize(base64_decode($_GET['obj']));
    }
} else {
    $sql = "SELECT * FROM `users` limit 0,50";
    $result = mysqli_query($conn, $sql);
}

$boolean_operation = False;
$msg = False;
if($result === True || $result === True){
    $boolean_operation = True;
}

if ($boolean_operation) {
    $msg = "Operation has been done";
} else {
    if ($result !== FALSE) {
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            // Append each row as an associative array to the $rows array
            $rows[] = $row;
        }
    }
}

?>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Index</a></li>
                <li><a href="backup.php">Database Backup</a></li>
                <li><a href="all_users.php">All Users</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h1>All Users</h1>
            <?php 
            if ($msg) {
                echo '<p>' . $msg . '</p><meta http-equiv="refresh" content="0;url=all_users.php">';
            } else {
            ?>
                <?php
                    if (@$rows !== NULL) {
                    foreach ($rows as $row) { ?>
                        <p> <a href="?operation=search&keyword=<?=$row['username']?>"><?=$row['username']?></a>, <a href="?operation=delete&user_id=<?=$row['user_id']?>">delete</a> | <a href="?operation=export-user&user_id=<?=$row['user_id']?>">export</a><br>
                        <?php 
                    }
                }
                if (@$export) echo '<a href="?operation=import-user&obj=' . base64_encode(serialize($row)) . '">Exported, load the user?</a>';
                if (@$import) { echo "<pre>"; var_dump($import); }
            } 
            ?>
        </section>

</script>
<footer>
    <p>&copy; 2023 Voorivex Weblog System. All rights reserved.</p>
</footer>
</body>
</html>