<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lost Item Form</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h1>Lost Item Form</h1>
  <form action="submit_post.php" method="POST" enctype="multipart/form-data">

  <form id="lostForm" action="submit_post.php" method="POST" enctype="multipart/form-data">
    <label for="name">Your Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="contact">Contact Number:</label>
    <input type="tel" id="contact" name="contact" placeholder="Enter your contact number" required><br><br>

    <label for="userType">Are you a student or staff?</label><br>
    <input type="radio" id="student" name="userType" value="student" required>
    <label for="student">Student</label>
    <input type="radio" id="staff" name="userType" value="staff">
    <label for="staff">Staff</label><br><br>

    <div id="emailField" style="display:none;">
      <label for="email">Email ID:</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" required><br><br>
    </div>

    <div id="studentFields" style="display:none;">
      <label for="studentId">Student ID:</label>
      <input type="text" id="studentId" name="studentId" required><br><br>

      <label for="year">Year:</label>
      <select id="year" name="year">
        <option value="1">First</option>
        <option value="2">Second</option>
        <option value="3">Third</option>
        <option value="4">Fourth</option>
      </select><br><br>

      <label for="dept">Department:</label>
      <select id="dept" name="dept">
        <option value="cs1">CS1</option>
        <option value="cs2">CS2</option>
        <option value="it">IT</option>
        <option value="ece">ECE</option>
        <option value="ere">ERE</option>
        <option value="civil">CIVIL</option>
      </select><br><br>
    </div>

    <div id="staffFields" style="display:none;">
      <label for="staffType">Select Staff Type:</label><br>
      <input type="radio" id="teaching" name="staffType" value="teaching">
      <label for="teaching">Teaching Staff</label>
      <input type="radio" id="nonTeaching" name="staffType" value="nonTeaching">
      <label for="nonTeaching">Non-Teaching Staff</label><br><br>

      <div id="staffIdField" style="display:block;">
        <label for="staffId">Staff ID:</label>
        <input type="text" id="staffId" name="staffId" required><br><br>
      </div>

      <div id="deptField" style="display:block;">
        <label for="deptStaff">Department (Staff):</label>
        <select id="deptStaff" name="dept">
          <option value="cs1">CS1</option>
          <option value="cs2">CS2</option>
          <option value="it">IT</option>
          <option value="ece">ECE</option>
          <option value="ere">ERE</option>
          <option value="civil">CIVIL</option>
        </select><br><br>
      </div>
    </div>

    <label for="location">Location of Lost Item:</label>
    <input type="text" id="location" name="location" placeholder="Enter the location where the item was lost" required><br><br>

    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="6" cols="50"></textarea><br><br>

    <label for="images">Upload Images of Lost Item:</label>
    <input type="file" id="images" name="images[]" accept="image/*" multiple><br><br>

    <button type="submit">Submit</button>
  </form>

  <script>
    const studentRadio = document.getElementById("student");
    const staffRadio = document.getElementById("staff");
    const studentFields = document.getElementById("studentFields");
    const staffFields = document.getElementById("staffFields");
    const emailField = document.getElementById("emailField");

    studentRadio.addEventListener("change", function() {
      if (studentRadio.checked) {
        studentFields.style.display = "block";
        staffFields.style.display = "none";
        emailField.style.display = "block"; 
      }
    });

    staffRadio.addEventListener("change", function() {
      if (staffRadio.checked) {
        staffFields.style.display = "block";
        studentFields.style.display = "none";
        emailField.style.display = "block";
      }
    });
  </script>
</body>
</html>
