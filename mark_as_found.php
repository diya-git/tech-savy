<?php
$conn = new mysqli("localhost", "root", "", "lost_and_found");

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$sql = "UPDATE posts SET found = 1 WHERE id = ?";

if ($stmt = $conn->prepare($sql)) {
   $stmt->bind_param("i", $id);
   if ($stmt->execute()) {
       header("Location: index.php");
   } else {
       echo "Error: " . $stmt->error;
   }
}

$conn->close();
?>
