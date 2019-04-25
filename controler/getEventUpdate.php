<?php
require("../includes/database_inc.php");
require("../includes/requetes.php");

// Preparing the request to grab one event from the event table
$request = $db->prepare($selectEventUpdateRequest);
// Binding values and firing the request
$request->execute(array(
	':id' => $_POST["id"]
));
// Fetching data from the request
$response = $request->fetchAll(PDO::FETCH_ASSOC);
// Returning everything in json format

$startDate =  $response[0]['EventDateDebut'];
$startDate = strtotime($startDate);
$startDate =  date('d-m-Y H:i', $startDate);
$response[0]['EventDateDebut'] = $startDate;


$endDate = $response[0]['EventEndDate'];
$endDate = strtotime($endDate);
$endDate =  date('d-m-Y H:i', $endDate);
$response[0]['EventEndDate'] = $endDate;

echo json_encode($response);

