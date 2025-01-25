const form = document.getElementById("lostForm");

form.addEventListener("submit", (e) => {
  e.preventDefault(); // Prevent form from submitting immediately

  const name = document.getElementById("name").value;
  const year = document.getElementById("year").value;
  const dept = document.getElementById("dept").value;
  const description = document.getElementById("description").value;

  if (!name || !year || !dept || !description) {
    alert("Please fill in all the fields!");
    return;
  }

  alert("Form submitted successfully!");
  form.submit(); // Now submit the form
});
