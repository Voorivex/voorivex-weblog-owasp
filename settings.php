<?php
session_start();
include 'header.php';
include 'db.php';
if (isset($_SESSION['is_logged']) === true) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_id = $_POST['user_id'];
        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $bio = mysqli_real_escape_string($conn, $_POST['bio']);
        $password_change = false;
    
        if ($password === ""){
            $sql = "UPDATE `users` SET `first_name` = '$first_name', `last_name` = '$last_name', `bio` = '$bio' where `user_id` = " . intval($user_id);
        }else{
            $sql = "UPDATE `users` SET `first_name` = '$first_name', `last_name` = '$last_name', `bio` = '$bio', `password` = $password where `user_id` = " . intval($user_id);
            $password_change = true;
        }

        try {
            $result = mysqli_query($conn, $sql);
            if ($result === true){
                if ($password_change === true) header("Location: logout.php"); 
                else header("Location: settings.php");
            }
        } catch (mysqli_sql_exception $e) {
            $message = $e->getMessage();
            print($message);
        }
        exit;
    }

    try {
        $sql = "select * from `users` where user_id = " . $_SESSION['user_id'];
        $result = mysqli_query($conn, $sql);
        $user_information = mysqli_fetch_assoc($result);

        //print_r($user_informationow);

    } catch (mysqli_sql_exception $e) {
        $message = $e->getMessage();
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
                <li>(<?php echo $_SESSION['username']?>) <a href="/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h1>Settings</h1>
            <p>This is a simple and smooth HTML template for your website.</p>
        </section>
        <img src="<?='/get_image.php?imgsrc=statics/images/' . md5($_SESSION['user_id']) . '.png';?>" onerror="this.src='/statics/images/user.png'" width="200" height="200"><img><br>
        <input type="file" id="imageUpload" accept="image/*">
        <progress id="uploadProgress" max="100" value="0"></progress>
        <div id="message"></div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="/statics/upload.js"></script>

        <br>

        <form action="" method="POST">
        <!-- User ID (usually hidden) -->
        <input type="hidden" name="user_id" value="<?=$user_information['user_id'];?>"> <!-- Replace with the actual user_id -->

        <!-- Username -->
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?=$user_information['username'];?>" disabled><br>

        <!-- Email -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?=$user_information['email'];?>" disabled><br>

        <!-- First Name -->
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?=$user_information['first_name'];?>"><br>

        <!-- Last Name -->
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?=$user_information['last_name'];?>"><br>

        <!-- Bio -->
        <label for="bio">Bio:</label>
        <textarea id="bio" name="bio"><?=$user_information['bio'];?></textarea><br>

        <!-- Password -->
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value=""><br>
        <input type="submit" value="Update">
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