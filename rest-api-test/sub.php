<?php

include_once "./common.php";

if (isset($_GET["action"])) {
    $action = $_GET["action"];
    switch ($action) {
        case "getStudents":
            $last_fetched = $_GET["lastFetched"];
            $students = query("SELECT * FROM estudiantes WHERE id_de_estudiante > $last_fetched LIMIT $STUDENT_FETCHING_LIMIT");
            $last_fetched += count($students);
            $done = count($students) < $STUDENT_FETCHING_LIMIT;
            echo json_encode(array(
                "students"    => $students,
                "lastFetched" => $last_fetched,
                "done"        => $done
            ));
            break;
    }
}
