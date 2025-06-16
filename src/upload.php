<?php
session_start();
$uploadDirectory = "./statics/images/"; // Directory to store uploaded images

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $file = $_FILES["image"];

    // Check for errors during upload
    if ($file["error"] === UPLOAD_ERR_OK) {
        // Generate a unique filename to prevent overwriting
        $filename = md5($_SESSION['user_id']) . ".png";
        $destination = $uploadDirectory . $filename;

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($file["tmp_name"], $destination)) {
            echo "Image uploaded successfully. File name: " . $filename;
        } else {
            echo "Error: Failed to move the uploaded file.";
        }
    } else {
        echo "Error: " . $file["error"];
    }
} else {
    echo "Invalid request.";
}
?>
