<?php
require("../includes/database_inc.php");

if(isset($_POST["update"])) {
	$id = $_POST["id"];
	$title = $_POST["title"];
	$message = $_POST["message"];
	$start = $_POST["start"];
	$end = $_POST["end"];

	try {
    	$request = $db->prepare("UPDATE Events SET EventTitre = :title, EventMessage = :message, EventDateDebut = :start, EventDateFin = :end WHERE EventId = :id");

    	$request->bindValue(":id", $id);
		$request->bindValue(":title", $title);
		$request->bindValue(":message", $message);
		$request->bindValue(":start", $start);
		$request->bindValue(":end", $end);

		$request->execute();
	} catch (Exception $e) {
	    throw "Error when editing: ".$e;
	}
}