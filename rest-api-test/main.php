<?php

include_once "./common.php";

$result = query("SELECT * FROM estudiantes LIMIT $STUDENT_FETCHING_LIMIT");
$last_fetched = end($result)["id_de_estudiante"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Edgar Trejo Avila">
    <link rel="stylesheet" href="./main.css">
    <script>
        var LAST_FETCHED = <?= $last_fetched ?>;
        var FETCH_DONE   = false;
    </script>
    <script defer src="./main.js"></script>
    <title>Document</title>
</head>
<body>
    <table data-id="mainTable">
        <thead>
            <tr>
                <?php if(count($result) > 0):  ?>
                    <?php foreach(array_keys($result[0]) as $key): ?>
                        <th><?= $key ?></th>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody data-id="tableBody">
            <?php foreach($result as $query_result): ?>
                <tr>
                    <?php foreach($query_result as $_ => $value): ?>
                        <td><?= $value ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button data-id="fetchMoreButton">Fetch More</button>
</body>
</html>

<?php
