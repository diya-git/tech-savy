<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $year = $_POST['year'];
    $dept = $_POST['dept'];
    $description = $_POST['description'];
    
    // Handling image uploads
    $uploaded_images = [];
    foreach ($_FILES['images']['name'] as $key => $image_name) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image_name);
        move_uploaded_file($_FILES['images']['tmp_name'][$key], $target_file);
        $uploaded_images[] = $image_name; // Store the image name in an array
    }

    $images = implode(",", $uploaded_images); // Store images as comma-separated string
    
    $sql = "INSERT INTO posts (name, year, dept, description, images) VALUES ('$name', '$year', '$dept', '$description', '$images')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New post created successfully!";
        header("Location: index.php"); // Redirect to the main page after submitting
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
