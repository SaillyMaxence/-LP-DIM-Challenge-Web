<?php
$host = "localhost"; // Server/database host
$dbname = "web_challenge"; // Database name
$login = "root"; // Database login
$pwd = ""; // Database password
try {
    $db = new PDO('mysql:host='.$host.';dbname='.$dbname, $login, $pwd); // Creating a PDO object to connect to the DB
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Setting attributes meant to catch errors
} catch(PDOException $e) { // If the code above had an error
    throw "Error when connection to the database: ".$e; // Display it
}
?>