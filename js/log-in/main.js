/** @type {HTMLInputElement} **/
const usernameInput = document.getElementById("usernameInput");

/** @type {HTMLSpanElement} **/
const usernameSpan = document.getElementById("usernameSpan");



/** @type {HTMLInputElement} **/
const ageInput = document.getElementById("ageInput");

/** @type {HTMLSpanElement} **/
const ageSpan = document.getElementById("ageSpan");



usernameInput.addEventListener("change", (_) => {
    let username = usernameInput.value;
    let url = new URL("http://localhost/php/requests.php");
    url.search = new URLSearchParams({ action: "validateUsername", username });
    fetch(url)
        .then(response => response.json())
        .then(json => {
            let valid = json.valid;
            if (valid) {
                usernameSpan.innerText = "";
                usernameInput.setCustomValidity("");
            } else {
                let text = `El nombre de usuario ${username} ya está ocupado`;
                usernameSpan.innerText = text;
                usernameInput.setCustomValidity(text);
            }
        })
        .catch(_ => {
            usernameSpan.innerText = "";
            usernameInput.setCustomValidity("");
        });
});

function setError(input, message) {
    input.setCustomValidity(message);
    input.querySelector("+ span").innerText = message;
}

ageInput.addEventListener("change", (_) => {
    let age = ageInput.valueAsNumber;
    if (age < 0) {
        setError(ageInput, "Ambos sabemos que no tienes 0 años o menos")
        return;
    }
    if (age > 112) {
        setError(ageInput, "No persona viva tiene más de 112 años; comuníquese con el libro de los récords Guiness y con el desarrollador de esta página en caso contrario");
        return;
    }
    ageInput.setCustomValidity("");
});
