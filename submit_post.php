

<?php
include('connect.php');if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $year = $_POST['year'];
    $dept = $_POST['dept'];
    $description = $_POST['description'];
    $location = $_POST['location']; // Add location to the form data
    
    // Handling image uploads
    $uploaded_images = [];
    foreach ($_FILES['images']['name'] as $key => $image_name) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image_name);
        move_uploaded_file($_FILES['images']['tmp_name'][$key], $target_file);
        $uploaded_images[] = $image_name; // Store the image name in an array
    }
    $images = implode(",", $uploaded_images); // Store images as a comma-separated string
    
    // Inserting into the database
    $sql = "INSERT INTO posts (name, year, dept, description, images, location) 
            VALUES ('$name', '$year', '$dept', '$description', '$images', '$location')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redirect to the index page after submitting
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>


