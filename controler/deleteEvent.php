<?php
require("../includes/database_inc.php");

if(isset($_POST["delete"])) {
	$id = $_POST["id"];

	try {
    	$request = $db->prepare("DELETE FROM Events WHERE EventId = :id");

    	$request->bindValue(":id", $id);

		$request->execute();
	} catch (Exception $e) {
	    throw "Error when deleting: ".$e;
	}
}