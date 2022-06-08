<?php

$STUDENT_FETCHING_LIMIT = 10;

function query(string $statement) {
    $connection = new mysqli(username: "root", database: "escuela");
    $query = $connection->query($statement);
    $result = array();
    while ($fetching = $query->fetch_assoc()) {
        array_push($result, $fetching);
    }
    $connection->close();
    return $result;
}
