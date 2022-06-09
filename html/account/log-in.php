<?php
include_once "D:\high-school\semester-4\programming-male\proyecto-de-tienda\html\general\header.php";
?>
<link rel="stylesheet" href="./css/form/form.css">
<link rel="stylesheet" href="./css/form/log-in.css">
<script defer src="js/log-in/main.js"></script>

<div class="log-in-form__container">
    <h1 style="margin-bottom: 0;">Regístrate</h1>
    <p>O <a href="/account.php?action=log-in">inicia sesión</a> si ya tienes una cuenta</p>
    <form action="account.php?type=log-in" method="get" class="log-in-form">
        <label class="form__label form__label--container" style="grid-column: 1 / 3;">
            Nombre
            <input type="text" class="form__input" name="name" id="nameInput" autocomplete="given-name" required maxlength="64">
        </label>
        <label class="form__label form__label--container" style="grid-column: 3 / 5">
            Apellido Paterno
            <input type="text" class="form__input" name="nameMiddle" id="nameMiddleInput" autocomplete="additional-name" required maxlength="64">
        </label>
        <label class="form__label form__label--container" style="grid-column: 5 / 7">
            Apellido Materno
            <input type="tel" class="form__input" name="nameLast" id="nameLastInput" autocomplete="additional-name" maxlength="64">
        </label>
    
        <!-- MAKE THE INPUT DO REQUESTS TO THE DATABASE TO CHECK FOR USERNAMES ALREADY OCCUPIED -->
        <label class="form__label form__label--container" style="grid-column: 1 / 5">
            Nombre de Usuario
            <input type="text" class="form__input" name="username" id="usernameInput" placeholder="Usuario" autocomplete="username" pattern="^\w+([-_\.]+[\w]+)*$" required maxlength="32">
            <span id="usernameSpan" class="form__error-span"></span>
        </label>
        <!-- ADD A CUSTOM MESSAGE WHEN THE AGE IS TOO LARGE (GREATER THAN THE OLDEST
        PERSON IN THE WORLD) OR TOO SMALL (NEGATIVE NUMBERS) -->
        <label class="form__label form__label--container" style="grid-column: 5 / 7">
            Edad
            <input type="number" class="form__input" name="age" id="ageInput" max="112" min="0">
            <span id="ageSpan" class="form__error-span"></span>
        </label>
    
    
    
        <label class="form__label" style="grid-column: 1 / 3; grid-row: 3 / 6">
            Género
            <div class="log-in-form__gender-div">
                <input type="radio" name="gender" id="genderMaleRadio" required>
                <label class="form__label form__label--large-font-size" for="genderMaleRadio">Masculino</label>
                <input type="radio" name="gender" id="genderFemaleRadio">
                <label class="form__label form__label--large-font-size" for="genderFemaleRadio">Femenino</label>
                <input type="radio" name="gender" id="genderOtherRadio">
                <label class="form__label form__label--large-font-size" for="genderOtherRadio">Otro</label>
            </div>
        </label>
        <label class="form__label form__label--container" style="grid-column: 3 / 5;">
            Email
            <input type="email" class="form__input" name="email" id="emailInput" placeholder="algun.usuario@ejemplo.com" autocomplete="email" required>
        </label>
        <label class="form__label form__label--container" style="grid-column: 5 / 7;">
            Teléfono
            <input type="tel" class="form__input" name="phone" id="phoneInput" autocomplete="tel-local" required>
            <!-- FORMAT THE INPUT PROGRAMATICALLY:
            3 s 3 s 2 s 2
            ^The numbers represent the number of digits, while the s means space
    
            * The user can only insert digits
    
            * When the user inserts a digit, if the
            length of the input is the same as before a space,
            insert a space and the digit
    
            * When the user deletes a digit, if the
            current character is a space, remove the space
            and the digit
        -->
        </label>
    
        <label class="form__label form__label--container" style="grid-column: 1 / 4;">
            Contraseña
            <input type="password" class="form__input" name="password" id="passwordInput" autocomplete="new-password" required>
        </label>
        <label class="form__label form__label--container" style="grid-column: 4 / 7;">
            Confirmación de la Contraseña
            <input type="password" class="form__input" name="passwordConfirmation" id="passwordConfirmationInput" autocomplete="new-password" required>
        </label>
    
        <input type="submit" class="form__input form__input--submit hoverable pointerable" value="Enviar" class="log-in-form__submit-button pointerable">
    </form>
</div>

<?php
include_once "D:\high-school\semester-4\programming-male\proyecto-de-tienda\html\general\\footer.php";
