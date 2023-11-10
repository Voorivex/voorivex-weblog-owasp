<?php
session_start();
include 'header.php';
include 'db.php';

# unsafe query led to SQLi vulnerability:
# $sql = "SELECT * FROM `posts` where post_id = " . $_GET['post_id'];

# safe query:
$sql = "SELECT * FROM `posts` where post_id = " . intval($_GET['post_id']);

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Index</a></li>
                <li><a href="/all_posts.php">All Posts</a></li>
                <li><a href="/user_panel.php">User Panel</a></li>
            </ul>
    </header>

    <main>
        <section>
            <h1><?php echo $row['title']; ?></h1>
            <p><?php echo $row['content']; ?></p>
        </section>

</script>
<footer>
    <p>&copy; 2023 Voorivex Weblog System. All rights reserved.</p>
</footer>
</body>
</html>