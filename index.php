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
    <h1>Lost and Found</h1><break>
    <br>
    
    <!-- Button to navigate to form to create a new post -->
    <a href="create_post.php"><button class="butt">Create New Post</button></a><break>

    <section>
        <h2 class="head2">Lost Items</h2><break>
    </section>
    <?php
    $sql = "SELECT * FROM posts WHERE found = 0"; // Get lost items that are not marked as found
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h3>" . $row['name'] . " - " . $row['dept'] . " - Year " . $row['year'] . "</h3>";
            echo "<p>" . $row['description'] . "</p>";
            $images = explode(",", $row['images']);
            foreach ($images as $image) {
                echo "<img src='uploads/$image' alt='Image' width='200'>";
            }

            echo "<br><a href='delete_post.php?id=" . $row['id'] . "'><button>Mark as Found</button></a>";
            echo "</div><hr>";
        }
    } else {
        echo "No lost items found.";
    }
    ?>
</body>
</html>
