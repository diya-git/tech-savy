<?php
include('connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Delete post from database
    $sql = "DELETE FROM posts WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Post deleted successfully!";
        header("Location: index.php"); // Redirect to main page after deletion
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
