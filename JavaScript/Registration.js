const form = document.getElementById('contact_form');

form.addEventListener('submit', (event) => {
  // prevent the form from submitting if any errors are found
  event.preventDefault();

  // validate the form fields
  const username = document.querySelector('.usernamei').value.trim();
  const firstName = document.querySelector('.FirstNamei').value.trim();
  const lastName = document.querySelector('.form-control[name="LastName"]').value.trim();
  const password = document.querySelector('.form-control[name="Password"]').value.trim();
  const confirmPassword = document.querySelector('.form-control[name="confirm_password"]').value.trim();
  const email = document.querySelector('.form-control[name="email"]').value.trim();
  const contactNo = document.querySelector('.form-control[name="contactNo"]').value.trim();

  // check if the fields are empty
  if (!username || !firstName || !lastName || !password || !confirmPassword || !email || !contactNo) {
    alert('Please fill in all fields');
    return;
  }

  // check if the passwords match
  if (password !== confirmPassword) {
    alert('Passwords do not match');
    return;
  }

  // check if the email is valid
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    alert('Please enter a valid email address');
    return;
  }

  // check if the contact number is valid
  const contactNoRegex = /^[0-9]{10}$/;
  if (!contactNoRegex.test(contactNo)) {
    alert('Please enter a valid 10-digit contact number');
    return;
  }

  // if all validations pass, submit the form
  form.submit();
});
