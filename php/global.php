<?php

function startSession() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

function getLoggedIn() {
    startSession();
    return key_exists("id", $_SESSION);
}

