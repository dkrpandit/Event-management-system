// // function to validate form fields
// function validateForm() {
//   // get form fields
//   const username = document.getElementById("username").value;
//   const firstName = document.getElementById("firstName").value;
//   const lastName = document.getElementById("lastName").value;
//   const branch = document.getElementById("branch").value;
//   const year = document.getElementById("year").value;
//   const password = document.getElementById("password").value;
//   const confirmPassword = document.getElementById("confirmPassword").value;
//   const email = document.getElementById("email").value;
//   const contactNo = document.getElementById("contactNo").value;

//   // regular expression to validate email
//   const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

//   // regular expression to validate contact number
//   const contactRegex = /^\+?[0-9]{10,}$/;

//   // check if all fields are filled
//   if (
//     !username ||
//     !firstName ||
//     !lastName ||
//     !branch ||
//     !year ||
//     !password ||
//     !confirmPassword ||
//     !email ||
//     !contactNo
//   ) {
//     alert("Please fill in all the fields");
//     return false;
//   }

//   // check if email is valid
//   if (!emailRegex.test(email)) {
//     alert("Please enter a valid email address");
//     return false;
//   }

//   // check if contact number is valid
//   if (!contactRegex.test(contactNo)) {
//     alert("Please enter a valid contact number");
//     return false;
//   }

//   // check if password and confirm password match
//   if (password !== confirmPassword) {
//     alert("Passwords do not match");
//     return false;
//   }

//   // if all validations pass, submit the form
//   return true;
// }

// // handle form submission
// const form = document.getElementById("contact_form");
// form.addEventListener("submit", (event) => {
//   event.preventDefault(); // prevent default form submission

//   if (validateForm()) {
//     // if form validation passes, submit the form
//     const formData = new FormData(form);
//     const xhr = new XMLHttpRequest();
//     xhr.open("POST", form.action);
//     xhr.send(formData);
//     alert("Form submitted successfully");
//   }
// });
function validateForm() {
  var username = document.getElementById("username").value;
  var firstName = document.getElementById("firstName").value;
  var lastName = document.getElementById("lastName").value;
  var branch = document.getElementById("branch").value;
  var year = document.getElementById("year").value;
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("confirmPassword").value;
  var email = document.getElementById("email").value;
  var contactNo = document.getElementById("contactNo").value;

  // Check if required fields are empty
  if (username == "" || firstName == "" || lastName == "" || branch == "" || year == "" || password == "" || confirmPassword == "" || email == "" || contactNo == "") {
    alert("All fields are required.");
    return false;
  }

  // Check if password matches confirm password
  if (password != confirmPassword) {
    alert("Passwords do not match.");
    return false;
  }

  // Check if the user already exists in the database
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "connect.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      if (xhr.responseText == "exists") {
        alert("This user already exists.");
        return false;
      }
    }
  };
  xhr.send("username=" + username + "&email=" + email);
}
