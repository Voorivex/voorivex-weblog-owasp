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

// First, check if the post exists and belongs to the logged in user
$sql = "SELECT author_id FROM posts WHERE post_id = $post_id";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) === 0) {
    echo "Post not found.";
    exit();
}

$post = mysqli_fetch_assoc($result);

// Check if the current user is authorized to delete the post
if ($_SESSION['user_id'] != $post['author_id']) {
    echo "You are not authorized to delete this post.";
    exit();
}

// Delete the post
$sql = "DELETE FROM posts WHERE post_id = $post_id";
if (mysqli_query($conn, $sql)) {
    header("Location: my_posts.php?msg=Your post has been deleted successfully!");
    exit();
} else {
    echo "Error deleting the post: " . mysqli_error($conn);
}
?>