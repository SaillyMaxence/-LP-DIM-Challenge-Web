<?php
session_start();
require("../includes/database_inc.php");
require("../includes/requetes.php");

// Récupération des différents paramètres 
$id = $_POST['id'];
$title = $_POST['title'];
$message = $_POST['message'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$public = $_POST['public'];
$priority = $_POST['priority'];
$createdBy = $_SESSION['user'];

// Formatage des dates
$startDate = strtotime($startDate);
$startDate =  date('Y-m-d H:i:s', $startDate);
$endDate = strtotime($endDate);
$endDate =  date('Y-m-d H:i:s', $endDate);


$request = $db->prepare($updateEventRequest);

$request->execute(array(
	':title'        => $title,
	':message'      => $message,
	':start'        => $startDate,
	':end'          => $endDate,
	':priority'      => $priority,
	':visibility'   =>$public,
	':creator'      => $createdBy,
	':id'			=> $id
));


$return = json_encode("true");
echo $return;