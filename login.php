<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voorivex Weblog System</title>
    <link rel="stylesheet" href="/statics/styles.css">
    <!-- Add any additional CSS or JavaScript links here -->
</head>
<body>
<h1>Login</h1>
<?php
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
        setcookie("is_logged", "true", time() + (7 * 24 * 60 * 60), "/");
        setcookie("username", $row['username'], time() + (7 * 24 * 60 * 60), "/");
        setcookie("user_id", $row['user_id'], time() + (7 * 24 * 60 * 60), "/");
        header("Location: user_panel.php"); // Redirect to a welcome page or dashboard
    } else {
        // Authentication failed
        $error_message = "Invalid username or password. Please try again.";
    }
}
?>
<form action="login.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" value="Login">
</form>
<?php 
if (!is_null($error_message)) {
    echo "<p>$error_message</p>";
}
?>
</body>
<footer>
    <p>&copy; 2023 Voorivex Weblog System. All rights reserved.</p>
</footer>
</body>
</html>