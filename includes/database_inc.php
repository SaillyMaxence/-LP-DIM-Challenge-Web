<?php
$host = "localhost";
$dbname = "web_challenge";
$login = "root";
$pwd = "";

try {
    $databaseConnection = new PDO('mysql:host='.$host.';dbname='.$dbname, '$login', '$pwd');
    $databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    $e->getMessage();
}
?>