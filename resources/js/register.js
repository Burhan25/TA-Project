document
    .getElementById("togglePassword")
    .addEventListener("click", function (e) {
        // Toggle the type attribute
        const password = document.getElementById("password");
        const type =
            password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        // Toggle the eye slash icon
        this.classList.toggle("fa-eye-slash");
    });

document
    .getElementById("toggleConfirmPassword")
    .addEventListener("click", function (e) {
        // Toggle the type attribute
        const confirmPassword = document.getElementById("confirmPassword");
        const type =
            confirmPassword.getAttribute("type") === "password"
                ? "text"
                : "password";
        confirmPassword.setAttribute("type", type);

        // Toggle the eye slash icon
        this.classList.toggle("fa-eye-slash");
    });
