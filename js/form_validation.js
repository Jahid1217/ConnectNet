document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");
    const username = document.querySelector("#username");
    const phoneNumber = document.querySelector("#phoneNumber");
    const genderRadios = document.querySelectorAll('input[name="gender"]');

    const usernameError = document.createElement("div");
    usernameError.style.color = "red";
    usernameError.style.fontSize = "0.9em";
    usernameError.style.marginTop = "5px";
    usernameError.style.display = "none";
    username.parentNode.appendChild(usernameError);

    const phoneError = document.createElement("div");
    phoneError.style.color = "red";
    phoneError.style.fontSize = "0.9em";
    phoneError.style.marginTop = "5px";
    phoneError.style.display = "none";
    phoneNumber.parentNode.appendChild(phoneError);

    const genderError = document.createElement("div");
    genderError.style.color = "red";
    genderError.style.fontSize = "0.9em";
    genderError.style.marginTop = "5px";
    genderError.style.display = "none";
    // Add gender error message under the last gender radio button
    const genderContainer = genderRadios[genderRadios.length - 1].parentNode;
    genderContainer.appendChild(genderError);

    form.addEventListener("submit", (event) => {
        // Clear previous errors
        usernameError.style.display = "none";
        phoneError.style.display = "none";
        genderError.style.display = "none";
        let isValid = true;

        // Username validation
        if (!/[A-Z]/.test(username.value)) {
            usernameError.textContent = "Username must contain at least one uppercase letter.";
            usernameError.style.display = "block";
            isValid = false;
        }

        // Phone number validation
        if (!/^\d{11,}$/.test(phoneNumber.value)) {
            phoneError.textContent = "Phone number must be at least 11 digits.";
            phoneError.style.display = "block";
            isValid = false;
        }

        // Gender validation
        const isGenderSelected = Array.from(genderRadios).some(radio => radio.checked);
        if (!isGenderSelected) {
            genderError.textContent = "Please select a gender.";
            genderError.style.display = "block";
            isValid = false;
        }

        // Prevent form submission if any validation fails
        if (!isValid) {
            event.preventDefault();
        }
    });
});
