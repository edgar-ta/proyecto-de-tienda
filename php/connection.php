<?php

function get_connection() {
    return new mysqli("localhost", "root", database: "proyecto_de_tienda");
}

/**
 * Escapes a variable to be inserted in a query
 */
function escape(string $variable) {
    $connection = get_connection();
    return mysqli_real_escape_string($connection, $variable);
}

function query(string $statement) {
    $connection = get_connection();
    $query      = $connection->query($statement);
    $result     = array();
    if ($query === false) {
        return $result;
    }
    while ($row = $query->fetch_assoc()) {
        array_push($result, $row);
    }
    $connection->close();
    return $result;
}

