<?php
include_once "D:\high-school\semester-4\programming-male\proyecto-de-tienda\html\general\header.php";
?>
<link rel="stylesheet" href="./css/log-in/form.css">
<form action="account.php?action=validate" method="post" class="log-in-form">
    <label class="log-in-form__label" style="grid-column: 1 / 3;">
        Nombre
        <input type="text" name="name" id="nameInput" autocomplete="given-name">
    </label>
    <label class="log-in-form__label" style="grid-column: 3 / 5">
        Apellido Paterno
        <input type="text" name="nameMiddle" id="nameMiddleInput" autocomplete="additional-name">
    </label>
    <label class="log-in-form__label" style="grid-column: 5 / 7">
        Apellido Materno
        <input type="tel" name="nameLast" id="nameLastInput" autocomplete="additional-name">
    </label>



    <!-- MAKE THE INPUT DO REQUESTS TO THE DATABASE TO CHECK FOR USERNAMES ALREADY OCCUPIED -->
    <label class="log-in-form__label" style="grid-column: 1 / 5">
        Nombre de Usuario
        <input type="text" name="username" id="usernameInput" placeholder="Usuario" autocomplete="username" pattern="^\w+([-_\.][\w]+)+?$">
    </label>
    <!-- ADD A CUSTOM MESSAGE WHEN THE AGE IS TOO LARGE (GREATER THAN THE OLDEST
    PERSON IN THE WORLD) OR TOO SMALL (NEGATIVE NUMBERS) -->
    <label class="log-in-form__label" style="grid-column: 5 / 7">
        Edad
        <input type="number" name="age" id="ageInput" max="112" min="0">
    </label>



    <label style="grid-column: 1 / 3; grid-row: 3 / 6">
        Género
        <div class="log-in-form__gender-div">
            <input type="radio" name="gender" id="genderMaleRadio" required>
            <label for="genderMaleRadio">Masculino</label>
            <input type="radio" name="gender" id="genderFemaleRadio">
            <label for="genderFemaleRadio">Femenino</label>
            <input type="radio" name="gender" id="genderOtherRadio">
            <label for="genderOtherRadio">Otro</label>
        </div>
    </label>
    <label class="log-in-form__label" style="grid-column: 3 / 5;">
        Email
        <input type="email" name="email" id="emailInput" placeholder="algun.usuario@ejemplo.com" autocomplete="email">
    </label>
    <label class="log-in-form__label" style="grid-column: 5 / 7;">
        Teléfono
        <input type="tel" name="phone" id="phoneInput" autocomplete="tel-local">
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

    <label class="log-in-form__label" style="grid-column: 1 / 4;">
        Contraseña
        <input type="password" name="password" id="passwordInput" autocomplete="new-password">
    </label>
    <label class="log-in-form__label" style="grid-column: 4 / 7;">
        Confirmación de la Contraseña
        <input type="password" name="passwordConfirmation" id="passwordConfirmationInput" autocomplete="new-password">
    </label>

    <input type="submit" value="Enviar" class="log-in-form__submit-button hoverable pointerable">
</form>

<?php
include_once "D:\high-school\semester-4\programming-male\proyecto-de-tienda\html\general\\footer.php";
