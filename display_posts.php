<?php
include('connect.php'); // Make sure the path is correct
?>

<?php
$result = $conn->query("SELECT * FROM posts");
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row['name'] . "<br>";
        echo "Year: " . $row['year'] . "<br>";
        echo "Department: " . $row['dept'] . "<br>";
        echo "Description: " . $row['description'] . "<br>";
        echo "Images: " . $row['images'] . "<br>";
        echo "Posted on: " . $row['date_created'] . "<br><br>";
    }
} else {
    echo "No posts found.";
}
?>
