<?php
session_start();
include 'header.php';
include 'db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Get post ID from URL
$post_id = isset($_GET['post_id']) ? intval($_GET['post_id']) : 0;

if ($post_id <= 0) {
    echo "Invalid post ID.";
    exit();
}

// Fetch post from database
$sql = "SELECT * FROM posts WHERE post_id = $post_id";
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