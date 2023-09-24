<?php
session_start();
include 'header.php';
if (isset($_SESSION['is_logged']) === true) {
?>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#">Panel</a></li>
                <li><a href="#">Write</a></li>
                <li><a href="#">Posts</a></li>
                <li><a href="#">Settings</a></li>
                <li>(<?php echo $_SESSION['username']?>) <a href="#" onclick="deleteAllCookies();redirect('/login.php');">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h1>Welcome to the Panel</h1>
            <p>This is a simple and smooth HTML template for your website.</p>
        </section>

        <section>
            <h2>About Us</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eget tristique justo. Sed at massa eget nunc fringilla gravida.</p>
        </section>

        <section>
            <h2>Services</h2>
            <ul>
                <li>Service 1</li>
                <li>Service 2</li>
                <li>Service 3</li>
            </ul>
        </section>
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