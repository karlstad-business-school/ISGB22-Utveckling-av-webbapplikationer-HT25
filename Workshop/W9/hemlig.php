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

session_start();

if(isset($_SESSION["inloggad"]))  {

    //echo("id : " . $_SESSION["id"]);

    $id = $_SESSION["id"];

    $dbh = dbConnect();

    $sql = "SELECT * FROM tblkund WHERE id=:id";

    $stmt=$dbh->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $krypterat_persnr = $data[0]["personnummer"];
    $nyckel = "valfristrang1234";
    $dekrypterat_pernr = openssl_decrypt($krypterat_persnr, "AES-128-ECB", $nyckel);
    echo("persnr: " . $dekrypterat_pernr);

    $data = null;
    $stmt = null;
    $dbh = null;




} 
else {
    header("Location:uppgift.php");
}





?>