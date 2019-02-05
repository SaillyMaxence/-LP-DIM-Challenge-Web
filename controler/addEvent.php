<?php
require("../includes/database_inc.php");

if(isset($_POST["submit"])) {
	$title = $_POST["title"];
	$message = $_POST["message"];
	$start = $_POST["start"];
	$end = $_POST["end"];

	try {
    	$request = $db->prepare("INSERT INTO Events (EventTitre, EventMessage, EventDateDebut, EventDateFin) VALUES (:title, :message, :start, :end)");

		$request->bindValue(":title", $title);
		$request->bindValue(":message", $message);
		$request->bindValue(":start", $start);
		$request->bindValue(":end", $end);

		$request->execute();
	} catch (Exception $e) {
	    throw "Error when adding: ".$e;
	}
}