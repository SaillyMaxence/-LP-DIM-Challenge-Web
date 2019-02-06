<?php
require("../includes/database_inc.php");

// Grabbing the event's ID
$id = $_POST["id"];
try {
	// Preparing the request to delete the event
    $request = $db->prepare("DELETE FROM Events WHERE EventId = :id");
    // Firing the request with the ID binded
	$request->execute(array(
		':id' => $id
	));
} catch (Exception $e) { // If there was an error while deleting
	throw "Error when deleting: ".$e; // Display it
}