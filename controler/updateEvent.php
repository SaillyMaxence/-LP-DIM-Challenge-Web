<?php
require("../includes/database_inc.php");

// Grabbing data from the form
$id = $_POST["id"];
$title = $_POST["title"];
$message = $_POST["message"];
$start = $_POST["start"];
$end = $_POST["end"];
try {
	// Preparing the update request
   	$request = $db->prepare("UPDATE Events SET EventTitre = :title, EventMessage = :message, EventDateDebut = :start, EventDateFin = :end WHERE EventId = :id");
   	// Binding values
 	$request->bindValue(":id", $id);
	$request->bindValue(":title", $title);
	$request->bindValue(":message", $message);
	$request->bindValue(":start", $start);
	$request->bindValue(":end", $end);
	// Firing the request
	$request->execute();
} catch (Exception $e) { // If there was an error while updating
    throw "Error when editing: ".$e; // Display it
}