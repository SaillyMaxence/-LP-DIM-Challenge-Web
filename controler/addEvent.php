<?php
var_dump($_POST);
require("../includes/database_inc.php");
$path = '../src/image/'; // upload directory

if(!isset($_FILES['pic'])){
	if(!empty($_POST['titreevent']) || !empty($_POST['description']) || !empty($_POST['datedeb']) || !empty($_POST['datefin']) || !empty($_FILES['pic']))
	{
	$img = $_FILES['pic']['name'];
	$tmp = $_FILES['pic']['tmp_name'];
	
	
	
	// get uploaded file's extension
	$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
	 
	// can upload same image using rand function
	$final_image = rand(1000,1000000).$img;
	 
	// check's valid format
	
	$path = $path.strtolower($final_image); 
	 
	if(move_uploaded_file($tmp,$path)) 
	{
	$title = $_POST['titreevent'];
	$message  = $_POST['description'];
	$start = $_POST['datedeb'];
	$end = $_POST['datefin'];
	$isActif = 1;
	try {
		// Preparing the insert/add request
		   $request = $db->prepare("INSERT INTO Events (EventTitre, EventMessage, EventDateDebut, EventDateFin, EventIsActiv, photo) VALUES (:title, :message, :start, :end,:isActivEvent,:photo)");
		// Firing the request with some values binding
		$request->execute(array(
			':title' => $title,
			':message' => $message,
			':start' => $start,
			':end' => $end,
			':isActivEvent' => $isActif,
			':photo' => $path
		));
	} catch (Exception $e) { // If there was an error while deleting
		throw "Error when adding: ".$e; // Display it
	}
	}
	
	}	
}else{
	echo "ici";
	$title = $_POST['titreevent'];
	$message  = $_POST['description'];
	$start = $_POST['datedeb'];
	$end = $_POST['datefin'];
	$isActif = 1;
	$photo = "";
	try {
		// Preparing the insert/add request
		   $request = $db->prepare("INSERT INTO Events (EventTitre, EventMessage, EventDateDebut, EventDateFin, EventIsActiv, photo) VALUES (:title, :message, :start, :end,:isActivEvent,:photo)");
		// Firing the request with some values binding
		$request->execute(array(
			':title' => $title,
			':message' => $message,
			':start' => $start,
			':end' => $end,
			':isActivEvent' => $isActif,
			':photo' => $photo
		));
	} catch (Exception $e) { // If there was an error while deleting
		throw "Error when adding: ".$e; // Display it
	}
	
	
}

