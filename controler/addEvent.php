<?php
require("../includes/database_inc.php");

// Grabbing data from the form
$title = $_POST["title"];
$message = $_POST["message"];
$start = $_POST["start"];
$end = $_POST["end"];
try {
	// Preparing the insert/add request
   	$request = $db->prepare("INSERT INTO Events (EventTitre, EventMessage, EventDateDebut, EventDateFin) VALUES (:title, :message, :start, :end)");
   	// Binding values
	$request->bindValue(":title", $title);
	$request->bindValue(":message", $message);
	$request->bindValue(":start", $start);
	$request->bindValue(":end", $end);
	// Firing the request
	$request->execute();
} catch (Exception $e) { // If there was an error while deleting
    throw "Error when adding: ".$e; // Display it
}