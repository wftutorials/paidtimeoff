<?php

function get_connection(){
    $dsn = "mysql:host=localhost;dbname=timeoff";
    $user = "root";
    $passwd = "";
    $conn = new PDO($dsn, $user, $passwd);
    return $conn;
}

get_connection();
