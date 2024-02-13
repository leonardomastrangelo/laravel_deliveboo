import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**", "../fonts/**"]);

const btn = document.querySelector("#register-btn");
const password = document.querySelector("#password");
const confirmPassword = document.querySelector("#password-confirm");
const error_pass = document.querySelector("#error_pass");
const checkboxes = document.querySelectorAll('input[type=checkbox]')
let checked = false;
btn.addEventListener("click", (e) => {
    checkboxes.forEach((el) => {
        if (el.checked) {
            checked = true
        }
    });
    if (!checked) {
        e.preventDefault();
        let cuisine_error =
            "<div class='text-danger'> Seleziona almeno una opzione prima di inviare il form </div>";
        document.querySelector("#luigi").innerHTML = cuisine_error;
    }
    if (password.value !== confirmPassword.value) {
        e.preventDefault();
        let password_error =
            "<div class='text-danger'> Le password non corrispondono </div>";
        document.querySelector("#mario").innerHTML = password_error;
    }

});


