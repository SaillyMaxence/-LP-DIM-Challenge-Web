<?php
require("../includes/database_inc.php");
require("../includes/requetes.php");
// Grabbing data from the form
$id = $_POST["id"];
$username = $_POST["username"];
try {
	// Preparing the update request
   	$request = $db->prepare($updateUserRequest);
	// Firing the request with some values binding
	$request->execute(array(
		':id' => $id,
		':username' => $username
	));
} catch (Exception $e) { // If there was an error while updating
    throw "Error when editing: ".$e; // Display it
}