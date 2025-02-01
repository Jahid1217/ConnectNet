document.querySelector('form').addEventListener('submit', function(event) {
    let isValid = true;

    // Clear previous error messages
    document.querySelectorAll('.error-message').forEach(function(msg) {
        msg.textContent = '';
    });

    // Validate Full Name (should not contain numbers)
    const fullName = document.querySelector('[name="name"]');
    if (fullName.value.trim().length <= 4 || /[0-9]/.test(fullName.value)) {
        showError(fullName, 'Full Name must be more than 4 characters and cannot contain numbers');
        isValid = false;
    }

    // Validate Email
    const email = document.querySelector('[name="email"]');
    if (!email.value.endsWith('@gmail.com')) {
        showError(email, 'Email must end with @gmail.com');
        isValid = false;
    }

    // Validate Phone Number
    const phone = document.querySelector('[name="phone"]');
    if (!/^[0-9]{11}$/.test(phone.value)) {
        showError(phone, 'Phone number must be 11 digits and numeric');
        isValid = false;
    }

    // Validate Username (must be at least 4 characters)
    const username = document.querySelector('[name="username"]');
    if (username.value.trim().length < 4) {
        showError(username, 'Username must be at least 4 characters long');
        isValid = false;
    }

    // Validate Password (must contain one uppercase letter and one special character)
    const password = document.querySelector('[name="password"]');
    if (!/[A-Z]/.test(password.value) || !/[!@#$%^&*(),.?":{}|<>]/.test(password.value)) {
        showError(password, 'Password must contain at least one uppercase letter and one special character');
        isValid = false;
    }

    // Validate Installation Address
    const instAddress = document.querySelector('[name="inst_address"]');
    if (instAddress.value.trim().length < 10) {
        showError(instAddress, 'Installation Address must be at least 10 characters long');
        isValid = false;
    }

    // Validate Terms and Conditions
    const terms = document.querySelector('[name="terms"]');
    if (!terms.checked) {
        showError(terms, 'You must agree to the terms and conditions');
        isValid = false;
    }

    // Stop form submission if validation fails
    if (!isValid) {
        event.preventDefault();
    }
});

// Function to show error messages
function showError(inputElement, message) {
    let errorElement = inputElement.nextElementSibling;
    if (!errorElement || !errorElement.classList.contains('error-message')) {
        errorElement = document.createElement('span');
        errorElement.className = 'error-message';
        errorElement.style.color = 'red';
        errorElement.style.marginLeft = '10px';
        inputElement.parentNode.appendChild(errorElement);
    }
    errorElement.textContent = message;
}
