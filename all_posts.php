<?php
session_start();
include 'header.php';
include 'db.php';

function author_id_to_name($conn, $id) {
    $result = mysqli_query($conn, "SELECT * FROM `users` where `user_id` = " . $id);
    $author = mysqli_fetch_assoc($result);
    return $author['username'];
}

function category_id_to_name($conn, $id) {
    $result = mysqli_query($conn, "SELECT * FROM `categories` where `category_id` = " . $id);
    $author = mysqli_fetch_assoc($result);
    return $author['category_name'];
}

if (array_key_exists('author_id', $_GET)) {
    # unsafe query led to SQLi vulnerability:
    # $sql = "SELECT * FROM `posts` where author_id = " . $_GET['author_id'];
    # safe query:
    $sql = "SELECT * FROM `posts` where author_id = " . intval($_GET['author_id']);
} else {
    $sql = "SELECT * FROM `posts`";
}


$result = mysqli_query($conn, $sql);

$rows = array(); // Initialize an empty array to store the rows

while ($row = mysqli_fetch_assoc($result)) {
    // Append each row as an associative array to the $rows array
    $rows[] = $row;
}

?>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Index</a></li>
                <li><a href="/all_posts.php">All Posts</a></li>
                <li><a href="/user_panel.php">User Panel</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h1>All blog posts</h1>
            <?php foreach ($rows as $row) { ?>
            <p>- <a href="/show.php?post_id=<?php echo $row['post_id']; ?>"><?php echo $row['title']; ?></a>, published in <?php echo $row['publication_date']; ?> in <b><?php echo category_id_to_name($conn, $row['category_id']); ?></b> by <a href="all_posts.php?author_id=<?php echo $row['author_id']; ?>"><?php echo author_id_to_name($conn, $row['author_id']);?></a></p>
            <?php } ?>
        </section>

</script>
<footer>
    <p>&copy; 2023 Voorivex Weblog System. All rights reserved.</p>
</footer>
</body>
</html>