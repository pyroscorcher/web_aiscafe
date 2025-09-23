document.addEventListener("DOMContentLoaded", () => {
    const togglePassword = document.getElementById("togglePassword");
    const password = document.getElementById("password");

    const togglePasswordConfirm = document.getElementById("togglePasswordConfirm");
    const passwordConfirm = document.getElementById("password_confirmation");

    togglePassword.addEventListener("click", () => {
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        togglePassword.textContent = type === "password" ? "👁" : "🙈";
    });

    togglePasswordConfirm.addEventListener("click", () => {
        const type = passwordConfirm.getAttribute("type") === "password" ? "text" : "password";
        passwordConfirm.setAttribute("type", type);
        togglePasswordConfirm.textContent = type === "password" ? "👁" : "🙈";
    });
});
