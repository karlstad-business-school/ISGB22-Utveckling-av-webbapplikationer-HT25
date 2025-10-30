<?php

function dbConnect() {
    try {
        $dns = "mysql:dbname=F9;host=localhost";
        $user = "root";
        $password = "";
        $options = array( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $db = new PDO($dns, $user, $password, $options);
        return $db;
    } catch( PDOException $e ) {
        throw $e;
    }
}

?>