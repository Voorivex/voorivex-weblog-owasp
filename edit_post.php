<?php
session_start();
include 'header.php';
include 'db.php';

// Ensure the user is logged in
if (!isset($_SESSION['is_logged']) || $_SESSION['is_logged'] !== true) {
    header('Location: login.php');
    exit();
}

// Validate post_id
if (!isset($_GET['post_id'])) {
    echo "No post ID provided.";
    exit();
}
$post_id = intval($_GET['post_id']);
if ($post_id <= 0) {
    echo "Invalid post ID.";
    exit();
}

// Fetch the post and ensure it exists
$sql = "SELECT * FROM posts WHERE post_id = $post_id";
$result = mysqli_query($conn, $sql);
if (!$result || mysqli_num_rows($result) === 0) {
    echo "Post not found.";
    exit();
}
$post = mysqli_fetch_assoc($result);

// Check if the current user is authorized to edit the post
if ($_SESSION['user_id'] != $post['author_id']) {
    echo "You are not authorized to edit this post.";
    exit();
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve updated values, sanitize accordingly
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    // Optional: Add update for category if needed
    // $category_id = intval($_POST['category']);

    $sql_update = "UPDATE posts SET title = '$title', content = '$content' WHERE post_id = $post_id";
    if (mysqli_query($conn, $sql_update)) {
        header("Location: my_posts.php?msg=Your post has been updated successfully!");
        exit();
    } else {
        $error = "Error updating the post: " . mysqli_error($conn);
    }
}
?>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Main</a></li>
                <li><a href="user_panel.php">Panel</a></li>
                <li><a href="wirte_post.php">Write</a></li>
                <li><a href="my_posts.php">Posts</a></li>
                <li><a href="settings.php">Settings</a></li>
                <li>(<?php echo $_SESSION['username']; ?>) <a href="/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h1>Edit Post</h1>
            <?php
            if (isset($error)) {
                echo "<p>$error</p>";
            }
            ?>
            <form action="" method="POST">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required><br><br>
                
                <label for="content">Content:</label><br>
                <textarea id="content" name="content" rows="10" cols="50" required><?php echo htmlspecialchars($post['content']); ?></textarea><br><br>
                
                <!-- If you want to update the category field, uncomment and adjust the following code.
                <label for="category">Category:</label>
                <select id="category" name="category">
                    <?php
                    /*
                    $categories_sql = "SELECT * FROM categories";
                    $categories_result = mysqli_query($conn, $categories_sql);
                    while ($cat = mysqli_fetch_assoc($categories_result)) {
                        $selected = ($cat['id'] == $post['category_id']) ? 'selected' : '';
                        echo "<option value='{$cat['id']}' $selected>{$cat['name']}</option>";
                    }
                    */
                    ?>
                </select><br><br>
                -->
                
                <input type="submit" value="Update Post">
            </form>
        </section>
    </main>
    
    <footer>
        <p>&copy; 2023 Voorivex Weblog System. All rights reserved.</p>
    </footer>
</body>
</html>