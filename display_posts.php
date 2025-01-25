<?php
include('connect.php');

$result = $conn->query("SELECT * FROM posts");
if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
       echo "<div class='post'>";
       echo "<h2>Name: " . htmlspecialchars($row['name']) . "</h2>";
       echo "<p>Year: " . htmlspecialchars($row['year']) . "</p>";
       echo "<p>Department: " . htmlspecialchars($row['dept']) . "</p>";
       echo "<p>Description: " . htmlspecialchars($row['description']) . "</p>";
       
       // Display images if available
       if (!empty($row['images'])) {
           foreach (explode(",", $row['images']) as $image) {
               echo "<img src='uploads/" . htmlspecialchars($image) . "' alt='Lost Item' style='width:200px;height:auto;'><br>";
           }
       }

       echo "<p>Posted on: " . htmlspecialchars($row['date_created']) . "</p>";
       
       // Add delete form
       echo "<form action='delete_post.php' method='POST'>
               <input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "' />
               Email: 
               <input type='email' name='email' required />
               <button type='submit'>Delete Post</button>
             </form>";
       
       echo "</div>";
   }
} else {
   echo "No posts found.";
}
?>
