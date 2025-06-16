<?php
session_start();
include 'header.php';
include 'db.php';
if (isset($_SESSION['is_logged']) === true) {

    $sql = "SELECT * FROM posts where author_id = " . $_SESSION['user_id'];
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_all($result);

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
                <li>(<?php echo $_SESSION['username']?>) <a href="/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h1>My blog posts</h1>
        </section>
        <?php
            foreach ($rows as $row) {
                echo '- ', $row[1], ', published in: ', $row[5], ' | <a href="/view_post.php?post_id=' . $row[0] . '">view</a>',' <a href="/edit_post.php?post_id=' . $row[0] . '">edit</a> <a href="/delete_post.php?post_id=' . $row[0] . '">delete</a><br>';
            }

            echo '<br>';

            if (array_key_exists('msg', $_GET)) {
                $message = $_GET['msg'];
            }
            if (isset($message)) {
                echo "<p>$message</p>";
            }
        ?>
    </form>
    </main>
<?php } else { ?>
<p>Redirecting you to login page...</p>
<script>
    // Delay the redirection for 3 seconds (adjust as needed)
    setTimeout(function () {
        // Specify the URL you want to redirect to
        window.location.href = '/login.php';

        // Display a message (optional)
        document.body.innerHTML = '<p>You are now being redirected to the new page.</p>';
    }, 3000); // 3000 milliseconds (3 seconds)
</script>
<?php } ?>
<footer>
    <p>&copy; 2023 Voorivex Weblog System. All rights reserved.</p>
</footer>
</body>
</html>