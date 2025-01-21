function validateForm() {
  const name = document.getElementById("name").value.trim();
  const username = document.getElementById("username").value.trim();
  const email = document.getElementById("email").value.trim();
  const dob = document.getElementById("dob").value;
  const phone = document.getElementById("phone").value.trim();
  const password = document.getElementById("password").value.trim();
  const confirmPassword = document.getElementById("confirm_password").value.trim();
  const adminRole = document.getElementById("admin_Role").value;
  const address = document.getElementById("address").value.trim();
  const file = document.getElementById("file").files[0];
  const refNameOne = document.getElementById("reference_name").value.trim();
  const refEmailOne = document.getElementById("reference_email").value.trim();
  const refNameTwo = document.getElementById("reference_name_two").value.trim();
  const refEmailTwo = document.getElementById("reference_email_two").value.trim();
  const refPhoneOne = document.getElementById("reference_phone").value.trim();
  const refPhoneTwo = document.getElementById("reference_phone_two").value.trim();
  const terms = document.getElementById("terms").checked;

  // Clear previous error messages
  document.querySelectorAll(".error").forEach(el => el.textContent = "");

  let isValid = true;

  if (name.length < 3) {
      document.getElementById("error_Name").textContent = "Name must be at least 3 characters.";
      isValid = false;
  }

  if (username.length < 3) {
      document.getElementById("error_Username").textContent = "Username must be at least 3 characters.";
      isValid = false;
  }

  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
      document.getElementById("error_email").textContent = "Invalid email address.";
      isValid = false;
  }

  if (!dob) {
      document.getElementById("error_dob").textContent = "Date of Birth is required.";
      isValid = false;
  }

  if (!/^\d{11}$/.test(phone)) {
      document.getElementById("error_phone").textContent = "Phone number must be 11 digits.";
      isValid = false;
  }

  if (password.length < 6) {
      document.getElementById("error_password").textContent = "Password must be at least 6 characters.";
      isValid = false;
  }

  if (password !== confirmPassword) {
      document.getElementById("error_conPass").textContent = "Passwords do not match.";
      isValid = false;
  }

  if (adminRole === "") {
      document.getElementById("error_admin").textContent = "Please select an admin role.";
      isValid = false;
  }

  if (address.length < 10) {
      document.getElementById("error_address").textContent = "Address must be at least 10 characters.";
      isValid = false;
  }

  if (!file) {
      document.getElementById("error_file").textContent = "Profile picture is required.";
      isValid = false;
  }

  if (refNameOne.length < 3 || refEmailOne.length === 0) {
      document.getElementById("error_refName_One").textContent = "Valid Reference 1 details are required.";
      isValid = false;
  }

  if (refNameTwo.length < 3 || refEmailTwo.length === 0) {
      document.getElementById("error_refName_two").textContent = "Valid Reference 2 details are required.";
      isValid = false;
  }

  if (!terms) {
      document.getElementById("error_terms").textContent = "You must agree to the Terms and Conditions.";
      isValid = false;
  }
  if (!/^\d{11}$/.test(refPhoneOne)) {
    document.getElementById("error_refPhone").textContent = "Reference 1 phone number must be 11 digits.";
    isValid = false;
}

if (!/^\d{11}$/.test(refPhoneTwo)) {
    document.getElementById("error_refPhone_two").textContent = "Reference 2 phone number must be 11 digits.";
    isValid = false;
}

  // Final validation result
  if (isValid) {
    return true;
  } else {
    alert("Please correct the errors in the form before submitting.");
    return false;
  }
}
