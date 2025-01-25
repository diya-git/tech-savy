<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $email = $_POST['email'];

    // Check if the email matches the email in the post
    $sql = "SELECT email FROM posts WHERE id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($post = $result->fetch_assoc()) {
            if ($post['email'] == $email) {
                // Delete post if email matches
                $delete_sql = "DELETE FROM posts WHERE id = ?";
                if ($delete_stmt = $conn->prepare($delete_sql)) {
                    $delete_stmt->bind_param("i", $id);
                    if ($delete_stmt->execute()) {
                        header("Location: index.php");
                        exit();
                    } else {
                        echo "Error deleting post: " . $conn->error;
                    }
                }
            } else {
                echo "<script>alert('Email does not match.'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('Post not found.'); window.history.back();</script>";
        }
        
        $stmt->close();
    }
}
?>
