<?php
require("../includes/database_inc.php");

// Preparing the request to grab one event from the event table
$request = $db->prepare("SELECT * FROM Events WHERE EventId = :id");
// Binding values and firing the request
$request->execute(array(
	':id' => $_POST["id"]
));
// Fetching data from the request
$response = $request->fetchAll(PDO::FETCH_ASSOC);
// Returning everything in json format
echo json_encode($response);