<?php include('connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lost and Found</title>
  <link href="styles.css" rel="stylesheet">
</head>
<body class="bg-color">
<div class="magnifier-container">
  <div class="magnifier">
    <div class="magnifier-lens"></div>
 
</div>

    
<br>
  <h1 class="lf">Lost and Found</h1><break>

  <!-- Button to navigate to form to create a new post -->
  <a href="create_post.php"><button class="butt">Create New Post</button></a><break>

  <br>
<h3 class="new-head">List</h3>
  <?php
  // Fetch lost items that are not marked as found
  $sql = "SELECT * FROM posts WHERE found = FALSE"; 
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          echo "<div>";
          echo "<h3>" . htmlspecialchars($row['name']) . " - Year: " . htmlspecialchars($row['year']) . ", Dept: " . htmlspecialchars($row['dept']) . "</h3>";
          echo "<p>" . htmlspecialchars($row['description']) . "</p>";
          
          // Display images if available
          if (!empty($row['images'])) {
              foreach (explode(",", $row['images']) as $image) {
                  echo "<img src='uploads/" . htmlspecialchars($image) . "' alt='Image' width='200'>";
              }
          }

          // Mark as found button with email prompt
          echo "<form action='mark_as_found.php' method='POST'>
                  Email: 
                  <input type='email' name='email' required />
                  <input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "' />
                  <button type='submit' class='buttnew' >Mark as Found</button> 
                </form>";
          echo "</div><hr>";
      }
  } else {
      echo "No lost items found.";
  }
  ?>
  
</body>
</html>
