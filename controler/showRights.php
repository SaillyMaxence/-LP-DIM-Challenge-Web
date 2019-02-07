<?php
require("../includes/database_inc.php");

// Preparing the request to grab everything from the rights table
$request = $db->prepare("SELECT * FROM Rights");
// Firing the request
$request->execute();
// Fetching data from the request
$response = $request->fetchAll(PDO::FETCH_ASSOC);
// Returning everything in json format
echo json_encode($response);