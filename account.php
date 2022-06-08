<?php

if (!key_exists("type", $_GET)) {
    $page = "./html/error/page-not-found.html";
} else {
    $type = $_GET["type"];
    $page = "./html/account/$type.php";
    if (array_search($type, array("log-in", "admin", "sign-in")) === false) {
        $page = "./html/error/page-not-found.html";
    }
}

include_once $page;
