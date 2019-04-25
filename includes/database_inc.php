<?php
$host = "localhost"; // Server/database host
$dbname = "web_challenge"; // Database name
$login = "tutur"; // Database login
$pwd = ""; // Database password
 // Database charset

$dsn = "mysql:host=$host;dbname=$dbname;";
$options = [ // Set your PDO's attributes here
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Attribute meant to catch errors
];

try {
	// Creating a PDO object to connect to the DB
    $db = new PDO($dsn, $login, $pwd, $options);
} catch(PDOException $e) { // If the code above had an error
    throw "Error when connection to the database: ".$e; // Display it
}
?>