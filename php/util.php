<?php

function basic($path) {
    include_once dirname(__DIR__) . "/partitions/header.php" ;
    include_once $path;
    include_once dirname(__DIR__) . "/partitions/footer.php";
}

