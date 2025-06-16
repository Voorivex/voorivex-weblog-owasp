<?php
session_start();
include 'access.php';
include '../header.php';
include '../db.php';
?>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Index</a></li>
                <li><a href="/admin/backup.php">Database Backup</a></li>
                <li><a href="/admin/all_users.php">All Users</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h1>Administration Panel</h1>
            <p>Welcome admin</p>
        </section>

</script>
<footer>
    <p>&copy; 2023 Voorivex Weblog System. All rights reserved.</p>
</footer>
</body>
</html>