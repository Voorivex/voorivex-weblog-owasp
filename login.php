<?php
session_start();
include 'header.php';
echo '<h1>Login</h1>';
include 'db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get user input from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['is_logged'] = true;
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_id'] = $row['user_id'];
        header("Location: user_panel.php"); // Redirect to a welcome page or dashboard
    } else {
        // Authentication failed
        $message = "Invalid username or password, Please try again. <br>If you cannot remember your password please <a href='forget_password.php?username=$username'>click here</a>";
        $username = $_POST["username"];
    }
}
?>
<form action="login.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <input type="submit" value="Login"><br>
    <a href='register.php'>Need a registration?</a><br>
</form>
<?php
if (array_key_exists('msg', $_GET)) {
    $message = $_GET['msg'];
}
if (isset($message)) {
    echo "<p>$message</p>";
}
include 'footer.php';
?>