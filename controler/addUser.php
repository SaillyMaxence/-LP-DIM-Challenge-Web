<?php
require("../includes/database_inc.php");

// Grabbing data from the form
$username = $_POST["username"];
try {
	// Preparing the insert/add request
   	$request = $db->prepare("INSERT INTO Users (UserName) VALUES (:username)");
	// Firing the request with some values binding
	$request->execute(array(
		':username' => $username
	));
} catch (Exception $e) { // If there was an error while deleting
    throw "Error when adding: ".$e; // Display it
}