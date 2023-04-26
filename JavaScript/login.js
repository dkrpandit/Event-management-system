document.addEventListener("DOMContentLoaded", function() {
  const form = document.getElementById("form1");
  form.addEventListener("submit", function(event) {
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    if (username === "" || password === "") {
      alert("Please fill out all fields before submitting the form.");
      event.preventDefault();
    }
  });
});