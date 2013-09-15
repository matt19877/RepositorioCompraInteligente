<?php

define("_HOST", "localhost");
define("_USER", "root");
define("_PWD", "");
define("_DB", "comprainteligente");


function connect_db() {

    $db = new mysqli(_HOST, _USER, _PWD, _DB);
    if (mysqli_connect_errno()) {
        return 0;
    } else {
        return $db;
    }
}


?>
