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
  <form action="submit.php" method="POST" enctype="multipart/form-data">

    <label for="name">Your Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <!-- Contact Number field (required for all users) -->
    <label for="contact">Contact Number:</label>
    <input type="tel" id="contact" name="contact" placeholder="Enter your contact number" required><br><br>

    <!-- Radio buttons for choosing student or staff -->
    <label for="userType">Are you a student or staff?</label><br>
    <input type="radio" id="student" name="userType" value="student" required>
    <label for="student">Student</label>
    <input type="radio" id="staff" name="userType" value="staff">
    <label for="staff">Staff</label><br><br>

    <!-- Email field (mandatory for Student and Teaching Staff) -->
    <div id="emailField" style="display:none;">
      <label for="email">Email ID:</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" required><br><br>
    </div>

    <!-- The student-specific fields -->
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

    <!-- Staff-specific fields -->
    <div id="staffFields" style="display:none;">
      <!-- Radio buttons for Teaching or Non-Teaching Staff -->
      <label for="staffType">Select Staff Type:</label><br>
      <input type="radio" id="teaching" name="staffType" value="teaching">
      <label for="teaching">Teaching Staff</label>
      <input type="radio" id="nonTeaching" name="staffType" value="nonTeaching">
      <label for="nonTeaching">Non-Teaching Staff</label><br><br>

      <!-- Staff ID Field (Initially visible only for Teaching Staff) -->
      <div id="staffIdField" style="display:block;">
        <label for="staffId">Staff ID:</label>
        <input type="text" id="staffId" name="staffId" required><br><br>
      </div>

      <!-- Department field (Initially visible only for Teaching Staff) -->
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

    <label for="images">Upload Images of Lost Item:</label>
    <input type="file" id="images" name="images[]" accept="image/*" multiple><br><br>

    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="6" cols="50"></textarea><br><br>

    <!-- Location Field (new field) -->
    <label for="location">Location of Lost Item:</label>
    <input type="text" id="location" name="location" placeholder="Enter the location where the item was lost" required><br><br>

    <button type="submit">Submit</button>
  </form>

  <script>
    // Get references to the radio buttons and form sections
    const studentRadio = document.getElementById("student");
    const staffRadio = document.getElementById("staff");
    const studentFields = document.getElementById("studentFields");
    const staffFields = document.getElementById("staffFields");
    const emailField = document.getElementById("emailField");

    // Event listeners to show/hide fields based on user type selection
    studentRadio.addEventListener("change", function() {
      if (studentRadio.checked) {
        studentFields.style.display = "block";
        staffFields.style.display = "none";
        emailField.style.display = "block"; // Show email field for students
      }
    });

    staffRadio.addEventListener("change", function() {
      if (staffRadio.checked) {
        staffFields.style.display = "block";
        studentFields.style.display = "none";
        emailField.style.display = "block"; // Show email field for staff
      }
    });

    // Get references to the staff type radio buttons and related fields
    const teachingRadio = document.getElementById("teaching");
    const nonTeachingRadio = document.getElementById("nonTeaching");
    const staffIdField = document.getElementById("staffIdField");
    const deptField = document.getElementById("deptField");

    // Event listeners to show/hide fields based on staff type selection
    teachingRadio.addEventListener("change", function() {
      if (teachingRadio.checked) {
        staffIdField.style.display = "block";  // Show Staff ID for Teaching Staff
        deptField.style.display = "block";  // Show Department field for Teaching Staff
      }
    });

    nonTeachingRadio.addEventListener("change", function() {
      if (nonTeachingRadio.checked) {
        staffIdField.style.display = "none";  // Hide Staff ID for Non-Teaching Staff
        deptField.style.display = "none";  // Hide Department field for Non-Teaching Staff
      }
    });
  </script>
</body>
</html>
