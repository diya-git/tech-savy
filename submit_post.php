<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
	$contact = $_POST['contact'];
	$userType = $_POST['userType'];
	$email = $_POST['email'];
	$studentId = isset($_POST['studentId']) ? $_POST['studentId'] : null;
	$year = isset($_POST['year']) ? $_POST['year'] : null;
	$dept = $_POST['dept'];
	$description = $_POST['description'];
	$location = $_POST['location']; // Add location to the form data
	
	// Handling image uploads
	$uploaded_images = [];
	foreach ($_FILES['images']['name'] as $key => $image_name) {
	    $target_dir = "uploads/";
	    $target_file = $target_dir . basename($image_name);
	    
	    if(move_uploaded_file($_FILES['images']['tmp_name'][$key], $target_file)) {
	        $uploaded_images[] = $image_name; // Store the image name in an array
	    }
	}

	$images = implode(",", $uploaded_images); // Store images as a comma-separated string
	
	// Inserting into the database including email and department
	$sql = "INSERT INTO posts (name, contact, userType, email, studentId, year, dept, description, images, location) 
	        VALUES ('$name', '$contact', '$userType', '$email', '$studentId', '$year', '$dept', '$description', '$images', '$location')";
	
	if ($conn->query($sql) === TRUE) {
	    header("Location: index.php"); // Redirect to index page after submitting
	    exit();
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>
