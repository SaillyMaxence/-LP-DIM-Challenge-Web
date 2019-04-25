<?php
require("../includes/database_inc.php");
require("../includes/requetes.php");
// Preparing the request to grab everything from the users table
$request = $db->prepare($selectShowUserRequest);
// Firing the request
$request->execute();
// Fetching data from the request
$response = $request->fetchAll(PDO::FETCH_ASSOC);
// Returning everything in json format
echo json_encode($response);