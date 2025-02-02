document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    
    form.addEventListener("submit", function (event) {
        let isValid = true;

        const username = document.getElementById("username");
        const password = document.getElementById("password");
        const role = document.getElementById("Role");
        const terms = document.getElementById("terms");

        // Clear previous error messages
        clearErrors();

        // Username validation
        if (username.value.trim() === "") {
            showError(username, "Username is required.");
            isValid = false;
        }

        // Password validation
        if (password.value.trim() === "") {
            showError(password, "Password is required.");
            isValid = false;
        }

        // Role selection validation
        if (role.value.trim() === "") {
            showError(role, "Please select a role.");
            isValid = false;
        }

        // Terms and Conditions validation
        if (!terms.checked) {
            showError(terms, "You must agree to the terms and conditions.");
            isValid = false;
        }

        // Prevent form submission if any validation fails
        if (!isValid) {
            event.preventDefault();
        }
    });

    // Function to show error messages
    function showError(input, message) {
        const error = document.createElement("p");
        error.className = "error-message";
        error.style.color = "red";
        error.style.fontSize = "12px";
        error.textContent = message;
        input.parentNode.appendChild(error);
    }

    // Function to clear error messages
    function clearErrors() {
        const errors = document.querySelectorAll(".error-message");
        errors.forEach(error => error.remove());
    }
});
