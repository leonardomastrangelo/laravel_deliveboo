import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**", "../fonts/**"]);

const btn = document.querySelector("#register-btn");
const password = document.querySelector("#password");
const confirmPassword = document.querySelector("#password-confirm");
const error_pass = document.querySelector("#error_pass");
const checkboxes = document.querySelectorAll('input[type=checkbox]');
const prod_btn = document.querySelector('#product_button');
let checked = false;

prod_btn.addEventListener("click", (e) => {
    const price = document.querySelector('#price');
    if (isNaN(price.value) || price.value <= 0) {
        console.log(price.value);
        // Impedisci l'invio del form
        e.preventDefault();
        // Mostra un messaggio di errore
        let price_error =
            "<div class='text-danger'> Il prezzo non è valido </div>";
        document.querySelector("#wario").innerHTML = price_error;
        // Resetta il valore del campo input
    }
})

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






