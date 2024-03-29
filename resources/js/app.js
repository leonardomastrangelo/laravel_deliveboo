import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**", "../fonts/**"]);

document.addEventListener('DOMContentLoaded', function () {
    const prod_btn = document.querySelector('#product_button');
    prod_btn.addEventListener("click", (event) => {
        const price = document.querySelector('#price');
        if (isNaN(price.value) || price.value <= 0) {
            console.log(price.value);
            // Impedisci l'invio del form
            event.preventDefault();
            // Mostra un messaggio di errore
            let price_error =
                "<div class='text-danger'> Il prezzo non è valido </div>";
            document.querySelector("#wario").innerHTML = price_error;
            // Resetta il valore del campo input
        }
    })
})



document.addEventListener('DOMContentLoaded', function () {
    const registerBtn = document.querySelector("#register-btn");
    const password = document.querySelector("#password");
    const confirmPassword = document.querySelector("#password-confirm");
    const checkboxes = document.querySelectorAll('input[type=checkbox]');
    let checked = false;
    registerBtn.addEventListener("click", (e) => {
        document.querySelector("#luigi").innerHTML = '';
        document.querySelector("#mario").innerHTML = '';
        checked = false
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
            confirmPassword.value = ''
        }

    });
})

document.addEventListener('DOMContentLoaded', function () {
    const deleteBtn = document.querySelector("#button_deletep");
    const modal = new bootstrap.Modal(document.getElementById("deleteModal"));

    deleteBtn.addEventListener("click", (e) => {
        // Preventing form submission
        e.preventDefault();

        // Take title from attribute in modal
        const dataTitle = deleteBtn.getAttribute("data-item-title");

        // Show the modal
        modal.show();

        // Take and set title
        const title = document.querySelector("#data-item-title");
        title.textContent = dataTitle;
    });

    const modalDeleteBtn = document.getElementById("modal_delete_btn");
    modalDeleteBtn.addEventListener("click", (e) => {
        // Prevent default form submission
        e.preventDefault();

        // Submit the form
        deleteBtn.parentElement.submit();
    });
});









