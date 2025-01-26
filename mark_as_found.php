<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   // Get post ID and email from form submission
   $id = $_POST['id'];
   $emailInput = $_POST['email'];

   // Check if provided email matches with post's email in database
   $sql = "SELECT email FROM posts WHERE id=?";
   if ($stmt = $conn->prepare($sql)) {
       $stmt->bind_param("i", $id);
       $stmt->execute();
       $result = $stmt->get_result();
       
       if ($post = $result->fetch_assoc()) {
           if ($post['email'] === $emailInput) {
               // Delete post if email matches
               $delete_sql = "DELETE FROM posts WHERE id=?";
               if ($delete_stmt = $conn->prepare($delete_sql)) {
                   $delete_stmt->bind_param("i", $id);
                   if ($delete_stmt->execute()) {
                       header("Location: index.php"); // Redirect after deletion
                       exit();
                   } else {
                       echo "Error deleting post: " . $conn->error;
                   }
               }
           } else {
               echo "<script>alert('Wrong email. The post will remain.'); window.history.back();</script>";
           }
       } else {
           echo "<script>alert('Post not found.'); window.history.back();</script>";
       }
       // Close statement
       $stmt->close();
   }
}
?>

