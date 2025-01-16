// JavaScript for validation

// Add event listener for form submission
document.querySelector('form').addEventListener('submit', function(event) {
    let isValid = true;

    // Clear previous error messages
    document.querySelectorAll('.error-message').forEach(function(msg) {
        msg.textContent = '';
    });

    // Validate Provider Name
    const sellerName = document.getElementById('seller_name');
    if (sellerName.value.length <= 4) {
        showError(sellerName, 'Name must be more than 4 characters');
        isValid = false;
    }

    // Validate Email
    const email = document.getElementById('email');
    if (!email.value.endsWith('@gmail.com')) {
        showError(email, 'Email must end with @gmail.com');
        isValid = false;
    }

    // Validate Phone Number
    const phone = document.getElementById('phone');
    if (!/^[0-9]{11}$/.test(phone.value)) {
        showError(phone, 'Phone number must be 11 digits and numeric');
        isValid = false;
    }

    // Validate Password
    const password = document.getElementById('password');
    if (!/[A-Z]/.test(password.value)) {
        showError(password, 'Password must contain at least one uppercase letter');
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
