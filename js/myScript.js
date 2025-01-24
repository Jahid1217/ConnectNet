function validateForm() {
  var name = document.getElementById("name").value.trim();
  var username = document.getElementById("username").value.trim();
  var email = document.getElementById("email").value.trim();
  var dob = document.getElementById("dob").value.trim();
  var phoneNum = document.getElementById("phone_number").value.trim();
  var department = document.getElementById("Department").value;
  var conPass = document.getElementById("confirm_password").value;
  var password = document.getElementById("password").value;
  var role = document.getElementById("role").value;
  var file = document.getElementById("file").files[0];
  var Emptype = document.getElementsByName("Emptype");
  var supervisor = document.getElementById("supervisor").value.trim();
  const division = document.getElementById("division").value;
  const district = document.getElementById("district").value;
  var termsCheckbox = document.getElementById("terms");

  // Error elements
  var nameErr = document.getElementById("error_Name");
  var userErr = document.getElementById("error_Username");
  var emailErr = document.getElementById("error_email");
  var dobErr = document.getElementById("error_dob");
  var phoneErr = document.getElementById("error_phone");
  var PassErr = document.getElementById("error_Password");
  var conPassErr = document.getElementById("error_Confirm_Password");
  var roleErr = document.getElementById("error_Role");
  var departmentErr = document.getElementById("error_Department");
  var fileErr = document.getElementById("error_CV");
  var emptypeErr = document.getElementById("error_Emptype");
  var supervisorErr = document.getElementById("error_Supervisor");
  var divisionError = document.getElementById("error_division");
  var districtError = document.getElementById("error_district");
  
  var termsErr = document.getElementById("error_terms");

  // Reset error messages
  nameErr.textContent = "";
  userErr.textContent = "";
  emailErr.textContent = "";
  dobErr.textContent = "";
  phoneErr.textContent = "";
  PassErr.textContent = "";
  conPassErr.textContent = "";
  roleErr.textContent = "";
  departmentErr.textContent = "";
  fileErr.textContent = "";
  emptypeErr.textContent = "";
  supervisorErr.textContent = "";
  divisionError.textContent = "";
  districtError.textContent = "";
  termsErr.textContent = "";

  let isValid = true;

  // Name validation
  if (name === "" ) {
    nameErr.textContent = "Name is required.";
    isValid = false;
  }
  else if (!/^[A-Za-z\s]+$/.test(name) || name.length < 3) {
    nameErr.textContent = "Name must only contain alphabets and spaces.";
    isValid = false;
  }
  else if (name.length < 3) {
    nameErr.textContent = "Name must be at least 3 characters long.";
    isValid = false;
  }

  // Username validation
  if (username === "" ) {
    userErr.textContent = "Username is required";
    isValid = false;
  }
  else if (username.length < 3) {
    userErr.textContent = "Username must be at least 3 characters long.";
    isValid = false;
  }

  // Email validation
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    emailErr.textContent = "Please enter a valid email address.";
    isValid = false;
  }
  else if(!email.endsWith("@gmail.com"||"@yahoo.com")) {
    emailErr.textContent = "The email must belong to the Gmail or Yahoo domain.";
    isValid = false;
  }

  // Date of Birth validation
  var today = new Date();
  var dobDate = new Date(dob);

  if (dob === "") {
    dobErr.textContent = "Date of Birth is required.";
    isValid = false;
  }
  else if (dobDate > today) {
    dobErr.textContent = "Date of Birth cannot be a future date.";
    isValid = false;
}

  // Phone number validation
  if (phoneNum === "" ) {
    phoneErr.textContent = "Phone number is required.";
    isValid = false;
  }
  else if (phoneNum.length !== 11) {
    phoneErr.textContent = "Phone number must contain 11 digits.";
    isValid = false;
  }
  else if (!/^\d+$/.test(phoneNum)) {
    phoneErr.textContent = "Phone number must contain only digits.";
    isValid = false;
  }
  //Password Validation
  const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
  if (password === "") {
    PassErr.textContent = "Password is required.";
    isValid = false;
  }
  else if (!passwordRegex.test(password)) {
    PassErr.textContent = "Password must be at least 8 characters, include uppercase, lowercase, number, and special character.";
    isValid = false;
  }

  // Confirm Password validation
  if (conPass === "" || conPass !== password) {
    conPassErr.textContent = "Passwords do not match.";
    isValid = false;
  }

  if (!validateDepartment()) {
    isValid = false;
}

// Validate role
if (!validateRole()) {
    isValid = false;
}

  // Division and District validation
  if (!division) {
    divisionError.textContent = "Please select a division.";
    isValid = false;
  }

  if (!district) {
    districtError.textContent = "Please select a district.";
    isValid = false;
  }

  // File validation
if (file) {
  const allowedExtensions = /\.(pdf|docx)$/i;
  const maxFileSize = 2 * 1024 * 1024; 

  if (!allowedExtensions.test(file.name)) {
    fileErr.textContent = "Only PDF and DOCX files are allowed.";
    isValid = false;
  }

  else if (file.size > maxFileSize) {
    fileErr.textContent = "File size must not exceed 2 MB.";
    isValid = false;
  }
} 
else {
  fileErr.textContent = "Please upload a file.";
  isValid = false;
}

  // Employee Type validation
  var selectedEmptype = false;
  for (var i = 0; i < Emptype.length; i++) {
    if (Emptype[i].checked) {
      selectedEmptype = true;
      break;
    }
  }
  if (!selectedEmptype) {
    emptypeErr.textContent = "Please select an employee type.";
    isValid = false;
  }

  // Supervisor validation
  if (supervisor === "") {
    supervisorErr.textContent = "Supervisor name is required.";
    isValid = false;
  }

  if (!termsCheckbox.checked) {
    termsErr.textContent = "You must agree to the Terms and Conditions.";
    isValid = false;
  } 

  // If all validations pass
  if (isValid) {
    return true;
  } else {
    return false;
  }
}

// Function to open the Terms and Conditions modal
function openTermsPopup() {
  document.getElementById("termsModal").style.display = "block";
}

// Function to close the Terms and Conditions modal
function closeTermsPopup() {
  document.getElementById("termsModal").style.display = "none";
}

// Close the modal when clicking outside of it
window.onclick = function(event) {
  var modal = document.getElementById("termsModal");
  if (event.target === modal) {
    modal.style.display = "none";
  }
};

// Function to update District dropdown dynamically
function updateDistricts() {
  const division = document.getElementById("division").value;
  const districtDropdown = document.getElementById("district");

  // Districts by division mapping
  const districtsByDivision = {
    Dhaka: ["Dhaka City", "Gazipur", "Narayanganj", "Manikganj"],
    Chittagong: ["Chittagong City", "Cox's Bazar", "Rangamati"],
    Khulna: ["Khulna City", "Jessore", "Satkhira"],
    Sylhet: ["Sylhet City", "Moulvibazar", "Habiganj"],
    Barisal: ["Barisal City", "Bhola", "Patuakhali"],
    Rajshahi: ["Rajshahi City", "Bogra", "Pabna"],
    Rangpur: ["Rangpur City", "Dinajpur", "Thakurgaon"],
    Mymensingh: ["Mymensingh City", "Netrokona", "Sherpur"],
  };

  // Clear existing district options
  districtDropdown.innerHTML = '<option value="" disabled selected>Select your district</option>';

  // Populate District dropdown
  if (districtsByDivision[division]) {
    districtsByDivision[division].forEach((district) => {
      const option = document.createElement("option");
      option.value = district;
      option.textContent = district;
      districtDropdown.appendChild(option);
    });
    districtDropdown.disabled = false;
  } else {
    districtDropdown.disabled = true;
  }
}

function updateRoles() {
  const department = document.getElementById("Department").value;
  const roleDropdown = document.getElementById("role");

  // Roles by department mapping
  const rolesByDepartment = {
      "Technical Support": ["Technician", "Support Engineer", "Maintenance Engineer"],
      Sales: ["Sales Rep.", "Sales Manager", "Account Manager"],
      Billing: ["Billing Specialist", "Billing Manager", "Accountant"]
  };

  // Clear existing role options
  roleDropdown.innerHTML = '<option value="" disabled selected>Select Role</option>';

  // Populate role dropdown based on selected department
  if (rolesByDepartment[department]) {
      rolesByDepartment[department].forEach((role) => {
          const option = document.createElement("option");
          option.value = role;
          option.textContent = role;
          roleDropdown.appendChild(option);
      });
      roleDropdown.disabled = false; // Enable the role dropdown
  } else {
      roleDropdown.disabled = true; // Disable if no valid department selected
  }
}

// Role Validation
function validateRole() {
  const role = document.getElementById("role").value;
  if (role === "") {
      document.getElementById("error_Role").textContent = "Please select a role.";
      return false;
  }
  document.getElementById("error_Role").textContent = ""; // Clear error
  return true;
}

// Department Validation
function validateDepartment() {
  const department = document.getElementById("Department").value;
  if (department === "") {
      document.getElementById("error_Department").textContent = "Please select a department.";
      return false;
  }
  document.getElementById("error_Department").textContent = ""; // Clear error
  return true;
}



