<?php
    define('DB_NAME', 'id13687385_werecycle'); //'id13026142_werecycle'
    define('DB_USER', 'id13687385_dagda'); //'id13026142_dagda'
    define('DB_PASSWORD', '81857818577Cr1571@n'); //'81857818577Cr1571@n'
    define('DB_HOST', 'localhost');

    $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);


    date_default_timezone_set('America/Bogota');
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
?>