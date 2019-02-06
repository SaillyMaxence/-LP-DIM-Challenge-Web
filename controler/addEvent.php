<?php
require("../includes/database_inc.php");

// Grabbing data from the form
$title = $_POST["title"];
$message = $_POST["message"];
$start = $_POST["start"];
$end = $_POST["end"];

$dateNow = date("Y-m-d");

// si l'event est pas encore commencé 
if($start < $dateNow){
	echo "is actif = 0";
}
else if($end < $dateNow){
	echo "is Actif = 0";
}
else if($start >= $dateNow && $end <= $dateNow){
	echo "is actif = 1";
}
else{
	echo "is actif = 0";
}

/*
try {
	// Preparing the insert/add request
   	$request = $db->prepare("INSERT INTO Events (EventTitre, EventMessage, EventDateDebut, EventDateFin) VALUES (:title, :message, :start, :end)");
	// Firing the request with some values binding
	$request->execute(array(
		':title' => $title,
		':message' => $message,
		':start' => $start,
		':end' => $end
	));
} catch (Exception $e) { // If there was an error while deleting
    throw "Error when adding: ".$e; // Display it
}*/