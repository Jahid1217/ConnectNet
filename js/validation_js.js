document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");
    const fields = {
        username: {
            input: document.querySelector("#username"),
            error: null,
            validate: (value) => /[A-Z]/.test(value) || "Username must contain at least one uppercase letter."
        },
        phoneNumber: {
            input: document.querySelector("#phoneNumber"),
            error: null,
            validate: (value) => /^\d{11,}$/.test(value) || "Phone number must be at least 11 digits."
        },
        gender: {
            input: document.querySelectorAll('input[name="gender"]'),
            error: null,
            validate: () => Array.from(document.querySelectorAll('input[name="gender"]')).some(radio => radio.checked) || "Please select a gender."
        }
    };

    // Initialize error containers
    for (const key in fields) {
        const field = fields[key];
        if (field.input instanceof NodeList) {
            // For inputs like gender radio buttons
            const firstRadio = field.input[0];
            field.error = document.createElement("span");
            field.error.style.color = "red";
            firstRadio.parentNode.appendChild(field.error);
        } else {
            // For single inputs like username or phone number
            field.error = document.createElement("span");
            field.error.style.color = "red";
            field.input.parentNode.appendChild(field.error);
        }
    }

    form.addEventListener("submit", (event) => {
        let isValid = true;

        for (const key in fields) {
            const field = fields[key];
            const value = field.input instanceof NodeList ? null : field.input.value.trim();
            const errorMessage = field.validate(value);
            if (errorMessage !== true) {
                field.error.textContent = errorMessage;
                isValid = false;
            } else {
                field.error.textContent = "";
            }
        }

        if (!isValid) {
            event.preventDefault();
        }
    });
});
