<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lost Item Form</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h1 class="h1head">Lost Item Form</h1>
  <form id="lostForm" action="submit_post.php" method="POST" enctype="multipart/form-data" class="frm">
    <label for="name">Your Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="contact">Contact Number:</label>
    <input type="tel" id="contact" name="contact" placeholder="Enter your contact number"><br><br>

    <label for="userType">Are you a student or staff?</label>
    <select id="userType" name="userType" required>
      <option value="">Select</option>
      <option value="student">Student</option>
      <option value="staff">Staff</option>
    </select><br><br>

    <div id="emailField" style="display:none;">
      <label for="email">Email ID:</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" required><br><br>
    </div>

    <div id="studentFields" style="display:none;">
      <label for="studentId">Student ID:</label>
      <input type="text" id="studentId" name="studentId"><br><br>

      <label for="year">Year:</label>
      <select id="year" name="year">
        <option value="">Select Year</option>
        <option value="1">First</option>
        <option value="2">Second</option>
        <option value="3">Third</option>
        <option value="4">Fourth</option>
      </select><br><br>

      <label for="dept">Department:</label>
      <select id="dept" name="dept">
        <option value="">Select Department</option>
        <option value="cs1">CS1</option>
        <option value="cs2">CS2</option>
        <option value="it">IT</option>
        <option value="ece">ECE</option>
        <option value="ere">ERE</option>
        <option value="civil">CIVIL</option>
      </select><br><br>
    </div>

    <div id="staffFields" style="display:none;">
      <label for='staffType'>Select Staff Type:</label>
      <select id='staffType' name='staffType'>
        <option value="">Select</option>
        <option value='teaching'>Teaching Staff</option>
        <option value='nonTeaching'>Non-Teaching Staff</option>
      </select><br><br>

      <!-- Staff ID -->
      <label for='staffId'>Staff ID:</label>
      <input type='text' id='staffId' name='staffId'><br><br>

      <!-- Staff Department -->
      <label for='deptStaff'>Department (Staff):</label>
      <select id='deptStaff' name='dept'>
        <option value="">Select Department</option>
        <option value='cs1'>CS1</option>
        <option value='cs2'>CS2</option>
        <option value='it'>IT</option>
        <option value='ece'>ECE</option>
        <option value='ere'>ERE</option>
        <option value='civil'>CIVIL</option>
      </select><br><br> 
    </div>

    <!-- Location and Description -->
    <label for='location'>Location of Lost Item:</label>
    <input type='text' id='location' name='location' placeholder='Enter the location where the item was lost' required><br><br>

    <!-- Description -->
    <label for='description'>Description:</label>
    <textarea id='description' name='description' rows='6' cols='50'></textarea><br><br>

    <!-- Image Upload -->
    <label for='images'>Upload Images of Lost Item:</label>
    <input type='file' id='images' name='images[]' accept='image/*' multiple required><br><br>

    <!-- Submit Button -->
    <button type='submit' class='buttnew'>Submit</button>
  </form>

  <!-- JavaScript to handle dynamic fields -->
  <script>
    const userTypeDropdown = document.getElementById("userType");
    const studentFields = document.getElementById("studentFields");
    const staffFields = document.getElementById("staffFields");
    const emailField = document.getElementById("emailField");

    userTypeDropdown.addEventListener("change", function() {
      const selectedValue = userTypeDropdown.value;
      if (selectedValue === "student") {
        studentFields.style.display = "block";
        staffFields.style.display = "none";
        emailField.style.display = "block";
      } else if (selectedValue === "staff") {
        staffFields.style.display = "block";
        studentFields.style.display = "none";
        emailField.style.display = "block";
      } else {
        studentFields.style.display = "none";
        staffFields.style.display = "none";
        emailField.style.display = "none";
      }
    });
  </script>

</body>
</html>
