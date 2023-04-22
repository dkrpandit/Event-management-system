// const form = document.getElementById('contact_form');

// form.addEventListener('submit', (event) => {
//   // prevent the form from submitting if any errors are found
//   event.preventDefault();

//   // validate the form fields
//   const username = document.querySelector('.usernamei').value.trim();
//   const firstName = document.querySelector('.FirstNamei').value.trim();
//   const lastName = document.querySelector('.form-control[name="LastName"]').value.trim();
//   const password2 = document.querySelector('.form-control[name="Password2"]').value.trim();
//   const confirmPassword = document.querySelector('.form-control[name="confirm_password"]').value.trim();
//   const email = document.querySelector('.form-control[name="email"]').value.trim();
//   const contactNo = document.querySelector('.form-control[name="contactNo"]').value.trim();

//   // check if the fields are empty
//   if (!username || !firstName || !lastName || !password2 || !confirmPassword || !email || !contactNo) {
//     alert('Please fill in all fields');
//     return;
//   }

//   // check if the passwords match
//   if (password2 !== confirmPassword) {
//     alert('Passwords do not match');
//     return;
//   }

//   // check if the email is valid
//   const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//   if (!emailRegex.test(email)) {
//     alert('Please enter a valid email address');
//     return;
//   }

//   // check if the contact number is valid
//   const contactNoRegex = /^[0-9]{10}$/;
//   if (!contactNoRegex.test(contactNo)) {
//     alert('Please enter a valid 10-digit contact number');
//     return;
//   }

//   // if all validations pass, submit the form
//   form.submit();
// });





// function to validate form fields
function validateForm() {
  // get form fields
  const username = document.getElementById("username").value;
  const firstName = document.getElementById("firstName").value;
  const lastName = document.getElementById("lastName").value;
  const branch = document.getElementById("branch").value;
  const year = document.getElementById("year").value;
  const password = document.getElementById("password").value;
  const confirmPassword = document.getElementById("confirmPassword").value;
  const email = document.getElementById("email").value;
  const contactNo = document.getElementById("contactNo").value;

  // regular expression to validate email
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  // regular expression to validate contact number
  const contactRegex = /^\+?[0-9]{10,}$/;

  // check if all fields are filled
  if (
    !username ||
    !firstName ||
    !lastName ||
    !branch ||
    !year ||
    !password ||
    !confirmPassword ||
    !email ||
    !contactNo
  ) {
    alert("Please fill in all the fields");
    return false;
  }

  // check if email is valid
  if (!emailRegex.test(email)) {
    alert("Please enter a valid email address");
    return false;
  }

  // check if contact number is valid
  if (!contactRegex.test(contactNo)) {
    alert("Please enter a valid contact number");
    return false;
  }

  // check if password and confirm password match
  if (password !== confirmPassword) {
    alert("Passwords do not match");
    return false;
  }

  // if all validations pass, submit the form
  return true;
}

// handle form submission
const form = document.getElementById("contact_form");
form.addEventListener("submit", (event) => {
  event.preventDefault(); // prevent default form submission

  if (validateForm()) {
    // if form validation passes, submit the form
    const formData = new FormData(form);
    const xhr = new XMLHttpRequest();
    xhr.open("POST", form.action);
    xhr.send(formData);
    alert("Form submitted successfully");
  }
});
