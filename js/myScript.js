function validateForm() {
    
    var name = document.getElementById("name").value.trim();
    var username = document.getElementById("username").value.trim();
    var email = document.getElementById("email").value.trim();
    var dob = document.getElementById("dob").value;
    var phone = document.getElementById("phone").value.trim();
    var password = document.getElementById("password").value.trim();
    var confirmPassword = document.getElementById("confirm_password").value.trim();
    var adminRole = document.getElementById("admin_Role").value;
    var address = document.getElementById("address").value.trim();
    var file = document.getElementById("file").files[0];
    var refNameOne = document.getElementById("reference_name").value.trim();
    var refEmailOne = document.getElementById("reference_email").value.trim();
    var refNameTwo = document.getElementById("reference_name_two").value.trim();
    var refEmailTwo = document.getElementById("reference_email_two").value.trim();
    var refPhoneOne = document.getElementById("reference_phone").value.trim();
    var refPhoneTwo = document.getElementById("reference_phone_two").value.trim();
    var terms = document.getElementById("terms").checked;

    // Error elements
    var nameErr = document.getElementById("error_Name");
    var userErr = document.getElementById("error_Username");
    var emailErr = document.getElementById("error_email");
    var dobErr = document.getElementById("error_dob");
    var phoneErr = document.getElementById("error_phone");
    var passErr = document.getElementById("error_password");
    var conPassErr = document.getElementById("error_conPass");
    var adminErr = document.getElementById("error_admin");
    var addrErr = document.getElementById("error_address");
    var fileErr = document.getElementById("error_file");
    var refNameErr = document.getElementById("error_refName_One");
    var refNameTwoErr = document.getElementById("error_refName_two");
    var refEmailErr = document.getElementById("error_refEmail");
    var refEmailTwoErr = document.getElementById("error_refEmail_two");
    var refPhoneErr = document.getElementById("error_refPhone");
    var refPhoneTwoErr = document.getElementById("error_refPhone_two");
    var termsErr = document.getElementById("error_terms");
  
    // Clear previous errors
    nameErr.textContent = "";
    userErr.textContent = "";
    emailErr.textContent = "";
    dobErr.textContent = "";
    phoneErr.textContent = "";
    passErr.textContent = "";
    conPassErr.textContent = "";
    adminErr.textContent = "";
    addrErr.textContent = "";
    fileErr.textContent = "";
    refNameErr.textContent = "";
    refNameTwoErr.textContent = "";
    refEmailErr.textContent = "";
    refEmailTwoErr.textContent = "";
    refPhoneErr.textContent = "";
    refPhoneTwoErr.textContent = "";
    termsErr.textContent = "";
  
    let isValid = true;
  
    Validations
    if (name.length < 3) {
        nameErr.textContent = "Name must be at least 3 characters.";
        isValid = false;
    }
  
    if (username.length < 3) {
        userErr.textContent = "Username must be at least 3 characters.";
        isValid = false;
    }
  
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        emailErr.textContent = "Invalid email address.";
        isValid = false;
    }
  
    if (!dob) {
        dobErr.textContent = "Date of Birth is required.";
        isValid = false;
    }
  
    if (!/^\d{11}$/.test(phone)) {
        phoneErr.textContent = "Phone number must be exactly 11 digits and contain no letters or special characters.";
        isValid = false;
    }
    
  
    if (password.length < 6) {
        passErr.textContent = "Password must be at least 6 characters.";
        isValid = false;
    }
  
    if (password !== confirmPassword) {
        conPassErr.textContent = "Passwords do not match.";
        isValid = false;
    }
  
    if (adminRole === "") {
        adminErr.textContent = "Please select an admin role.";
        isValid = false;
    }
  
    if (address ==="") {
        addrErr.textContent = "Address must be at least 10 characters.";
        isValid = false;
    }
  
    if (!file) {
        fileErr.textContent = "Profile picture is required.";
        isValid = false;
    }
  
    if (refNameOne.length < 3 || refEmailOne.length === "") {
        refNameErr.textContent = "Valid Reference 1 details are required.";
        isValid = false;
    }
  
    if (refNameTwo.length < 3 || refEmailTwo.length === "") {
        refNameTwoErr.textContent = "Valid Reference 2 details are required.";
        isValid = false;
    }
  
    if (!/^\d{11}$/.test(refPhoneOne)) {
        refPhoneErr.textContent = "Reference 1 phone number must be 11 digits.";
        isValid = false;
    }
  
    if (!/^\d{11}$/.test(refPhoneTwo)) {
        refPhoneTwoErr.textContent = "Reference 2 phone number must be 11 digits.";
        isValid = false;
    }
  
    if (!terms) {
        termsErr.textContent = "You must agree to the Terms and Conditions.";
        isValid = false;
    }
  
    // Final validation result
    if (isValid) {
        header("Location:../view/login.php");
      return true;
    } else {
      return false;
    }
  }
  

  function searchUser() {
    var uname = document.getElementById("search").value.trim(); 
      if (uname === "") {
        document.getElementById("print").innerHTML = ""; 
        return;
    }

    var xhr = new XMLHttpRequest(); 
    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("print").innerHTML = this.responseText; 
        }
    };
    xhr.open("GET", "../control/searchUser_control.php?uname=" + uname, true); 
    xhr.send();
}

