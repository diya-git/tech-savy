<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $email = $_POST['email'];

    // Check if the email matches the email in the post
    $sql = "SELECT email FROM posts WHERE id = $id";
    $result = $conn->query($sql);
    $post = $result->fetch_assoc();
    
    if ($post['email'] == $email) {
        $delete_sql = "DELETE FROM posts WHERE id = $id";
        if ($conn->query($delete_sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error deleting post: " . $conn->error;
        }
    }
}
