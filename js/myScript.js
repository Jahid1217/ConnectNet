function validateForm() {
    // Get form values
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
    const errors = {
        nameErr: "error_Name",
        userErr: "error_Username",
        emailErr: "error_email",
        dobErr: "error_dob",
        phoneErr: "error_phone",
        passErr: "error_password",
        conPassErr: "error_conPass",
        adminErr: "error_admin",
        addrErr: "error_address",
        fileErr: "error_file",
        refNameErr: "error_refName_One",
        refNameTwoErr: "error_refName_two",
        refEmailErr: "error_refEmail",
        refEmailTwoErr: "error_refEmail_two",
        refPhoneErr: "error_refPhone",
        refPhoneTwoErr: "error_refPhone_two",
        termsErr: "error_terms",
    };

    // Clear previous errors
    Object.values(errors).forEach((id) => {
        document.getElementById(id).textContent = "";
    });

    let isValid = true;

    // Validations
    if (name.length < 3) {
        document.getElementById(errors.nameErr).textContent = "Name must be at least 3 characters.";
        isValid = false;
    }

    if (username.length < 3) {
        document.getElementById(errors.userErr).textContent = "Username must be at least 3 characters.";
        isValid = false;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        document.getElementById(errors.emailErr).textContent = "Invalid email address.";
        isValid = false;
    }

    if (!dob) {
        document.getElementById(errors.dobErr).textContent = "Date of Birth is required.";
        isValid = false;
    }

    if (!/^\d{11}$/.test(phone)) {
        document.getElementById(errors.phoneErr).textContent =
            "Phone number must be exactly 11 digits and contain no letters or special characters.";
        isValid = false;
    }

    if (password.length < 6) {
        document.getElementById(errors.passErr).textContent = "Password must be at least 6 characters.";
        isValid = false;
    }

    if (password !== confirmPassword) {
        document.getElementById(errors.conPassErr).textContent = "Passwords do not match.";
        isValid = false;
    }

    if (adminRole === "") {
        document.getElementById(errors.adminErr).textContent = "Please select an admin role.";
        isValid = false;
    }

    if (address.length < 3) {
        document.getElementById(errors.addrErr).textContent = "Address must be at least 3 characters.";
        isValid = false;
    }

    if (!file) {
        document.getElementById(errors.fileErr).textContent = "Profile picture is required.";
        isValid = false;
    }

    if (refNameOne.length < 3 || !emailRegex.test(refEmailOne)) {
        document.getElementById(errors.refNameErr).textContent = "Valid Reference 1 details are required.";
        isValid = false;
    }

    if (refNameTwo.length < 3 || !emailRegex.test(refEmailTwo)) {
        document.getElementById(errors.refNameTwoErr).textContent = "Valid Reference 2 details are required.";
        isValid = false;
    }

    if (!/^\d{11}$/.test(refPhoneOne)) {
        document.getElementById(errors.refPhoneErr).textContent = "Reference 1 phone number must be 11 digits.";
        isValid = false;
    }

    if (!/^\d{11}$/.test(refPhoneTwo)) {
        document.getElementById(errors.refPhoneTwoErr).textContent = "Reference 2 phone number must be 11 digits.";
        isValid = false;
    }

    if (!terms) {
        document.getElementById(errors.termsErr).textContent = "You must agree to the Terms and Conditions.";
        isValid = false;
    }

    // Final validation result
    if (isValid) {
        // alert("Form successfully submitted!");
        header("Location:../view/admin.php");
        header("Location:../view/login.php");
        return true;
    } else {
        // alert("Please correct the errors in the form.");
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

// Get references to the input and preview elements
const profileInput = document.getElementById('profileInput');
const profilePreview = document.querySelector('.profile-picture img');

// Check if the elements exist before adding event listeners
if (profileInput && profilePreview) {
    profileInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        
        // Ensure a file is selected and check if it is an image
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();

            // Load the file and update the preview
            reader.onload = (e) => {
                profilePreview.src = e.target.result;
            };

            reader.onerror = () => {
                
            };

            reader.readAsDataURL(file);
        } else {
            
        }
    });
} else {
    // console.error('Profile input or preview element not found.');
}


function searchUserCustomer() {
    var uname = document.getElementById("customerUser").value.trim(); 
      if (uname === "") {
        document.getElementById("customerPrint").innerHTML = ""; 
        return;
    }
    var xhr = new XMLHttpRequest(); 
    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("customerPrint").innerHTML = this.responseText; 
        }
    };
    xhr.open("GET", "../control/customer_searchUser_control.php?uname=" + uname, true); 
    xhr.send();
}

function searchUserEmployee() {
    var uname = document.getElementById("employeeUser").value.trim(); 
      if (uname === "") {
        document.getElementById("employeePrint").innerHTML = ""; 
        return;
    }
    var xhr = new XMLHttpRequest(); 
    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("employeePrint").innerHTML = this.responseText; 
        }
    };
    xhr.open("GET", "../control/employee_searchUser_control.php?uname=" + uname, true); 
    xhr.send();
}

function searchUserSeller() {
    var uname = document.getElementById("sellerUser").value.trim(); 
      if (uname === "") {
        document.getElementById("sellerPrint").innerHTML = ""; 
        return;
    }
    var xhr = new XMLHttpRequest(); 
    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("sellerPrint").innerHTML = this.responseText; 
        }
    };
    xhr.open("GET", "../control/seller_searchUser_control.php?uname=" + uname, true); 
    xhr.send();
}

function validateFormLogin() {
    var username = document.getElementById("username").value.trim();
    var password = document.getElementById("password").value.trim();

    // Error message elements
    var usernameError = document.getElementById("error_username");
    var passwordError = document.getElementById("error_password");

    // Clear previous error messages
    usernameError.textContent = "";
    passwordError.textContent = "";

    let isValid = true;

    // Validate Username
    if (username === "") {
        usernameError.textContent = "Username is required.";
        isValid = false;
    }

    if (password === "") {
        passwordError.textContent = "Password is required.";
        isValid = false;
    }

    if (!isValid) {
            return false; 
    }

    return true; 
}

function validateFormUpdateAdmin() {
    // Get form values
    var name = document.getElementById("name").value.trim();
    var username = document.getElementById("username").value.trim();
    var email = document.getElementById("email").value.trim();
    var dob = document.getElementById("dob").value;
    var phone = document.getElementById("phone").value.trim();
    var password = document.getElementById("password").value.trim();
    var address = document.getElementById("address").value.trim();
    var role = document.getElementById("role").value;
    var refNameOne = document.getElementById("reference_name").value.trim();
    var refEmailOne = document.getElementById("reference_email").value.trim();
    var refPhoneOne = document.getElementById("reference_phone").value.trim();
    var refNameTwo = document.getElementById("reference_name_two").value.trim();
    var refEmailTwo = document.getElementById("reference_email_two").value.trim();
    var refPhoneTwo = document.getElementById("reference_phone_two").value.trim();

    // Error elements
    const errors = {
        nameErr: "error_name",
        userErr: "error_username",
        emailErr: "error_email",
        dobErr: "error_dob",
        phoneErr: "error_phone",
        passErr: "error_password",
        addrErr: "error_address",
        roleErr: "error_role",
        refNameErr: "error_reference_name",
        refEmailErr: "error_reference_email",
        refPhoneErr: "error_reference_phone",
        refNameTwoErr: "error_reference_name_two",
        refEmailTwoErr: "error_reference_email_two",
        refPhoneTwoErr: "error_reference_phone_two",
    };

    // Clear previous errors
    Object.values(errors).forEach((id) => {
        var element = document.getElementById(id);
        if (element) element.textContent = "";
    });

    let isValid = true;

    // Validations
    if (name.length < 3) {
        document.getElementById(errors.nameErr).textContent = "Name must be at least 3 characters.";
        isValid = false;
    }

    if (username.length < 3) {
        document.getElementById(errors.userErr).textContent = "Username must be at least 3 characters.";
        isValid = false;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        document.getElementById(errors.emailErr).textContent = "Invalid email address.";
        isValid = false;
    }

    if (!dob) {
        document.getElementById(errors.dobErr).textContent = "Date of Birth is required.";
        isValid = false;
    }

    if (!/^\d{11}$/.test(phone)) {
        document.getElementById(errors.phoneErr).textContent = "Phone number must be exactly 11 digits.";
        isValid = false;
    }

    if (password.length < 6) {
        document.getElementById(errors.passErr).textContent = "Password must be at least 6 characters.";
        isValid = false;
    }

    if (role === "") {
        document.getElementById(errors.roleErr).textContent = "Please select a role.";
        isValid = false;
    }

    if (address.length < 3) {
        document.getElementById(errors.addrErr).textContent = "Address must be at least 3 characters.";
        isValid = false;
    }

    if (!refNameOne || refNameOne.length < 3) {
        document.getElementById(errors.refNameErr).textContent = "Reference 1 Name is required.";
        isValid = false;
    }

    if (!emailRegex.test(refEmailOne)) {
        document.getElementById(errors.refEmailErr).textContent = "Invalid Reference 1 Email.";
        isValid = false;
    }

    if (!/^\d{11}$/.test(refPhoneOne)) {
        document.getElementById(errors.refPhoneErr).textContent = "Reference 1 Phone must be 11 digits.";
        isValid = false;
    }

    if (!refNameTwo || refNameTwo.length < 3) {
        document.getElementById(errors.refNameTwoErr).textContent = "Reference 2 Name is required.";
        isValid = false;
    }

    if (!emailRegex.test(refEmailTwo)) {
        document.getElementById(errors.refEmailTwoErr).textContent = "Invalid Reference 2 Email.";
        isValid = false;
    }

    if (!/^\d{11}$/.test(refPhoneTwo)) {
        document.getElementById(errors.refPhoneTwoErr).textContent = "Reference 2 Phone must be 11 digits.";
        isValid = false;
    }

    console.log("Validation Result:", isValid); 

    return isValid;
}
