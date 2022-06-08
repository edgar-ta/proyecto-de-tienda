<?php

if (!key_exists("action", $_GET)) {
    die("No action was provided");   
}

$valid_actions = array(
    "validateUsername",
    "getNextProduct"
);
$action = $_GET["action"];

if (array_search($action, $valid_actions) === false) {
    die("The given action is not valid");
}

try {
    include_once "./connection.php";
    $result = call_user_func($action);
    echo json_encode($result);
} catch (Error $e) {
    die($e);
}

function validateUsername() {
    $username = escape($_GET["username"]);
    $query    = query("SELECT * FROM user WHERE username = '$username'");
    $result   = array("valid" => true);
    if (count($query) > 0) {
        $result["valid"] = false;
    }
    return $result;
}

function getNextProduct() {
    return array("hello-world" => "xd");
}
