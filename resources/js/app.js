import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**", "../fonts/**"]);

const btn = document.querySelector("#register-btn");
const password = document.querySelector("#password");
const confirmPassword = document.querySelector("#password-confirm");
const error_pass = document.querySelector("#error_pass");
btn.addEventListener("click", (e) => {
    if (password.value !== confirmPassword.value) {
        e.preventDefault();
        let password_error =
            "<div class='text-danger'> Le password non corrispondono </div>";
        document.querySelector("#mario").innerHTML = password_error;
    }
    console.log(password.value);
});
