<?php
var_dump($_POST);
require("../includes/database_inc.php");
$path = '../src/image/'; // upload directory

if($_FILES['pic']['error'] == 0){
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
	$id = $_POST['id'];
	$isActif = 1;
	try {
		// Preparing the update request
		   $request = $db->prepare("UPDATE Events SET EventTitre = :title, EventMessage = :message, EventDateDebut = :start, EventDateFin = :end, EventIsActiv = :isActivEvent, photo = :photo WHERE EventId = :id");
		// Firing the request with some values binding
		$request->execute(array(
			':title' => $title,
			':message' => $message,
			':start' => $start,
			':end' => $end,
			':isActivEvent' => $isActif,
			':photo' => $path,
			':id' => $id
		));
	} catch (Exception $e) { // If there was an error while deleting
		throw $e; // Display it
	}
	}
	
	}	
}else {
	echo "ici";
	$title = $_POST['titreevent'];
	$message  = $_POST['description'];
	$start = $_POST['datedeb'];
	$end = $_POST['datefin'];
	$id = $_POST['id'];
	$isActif = 1;
	$photo = "";
	try {
		if ($_POST["imgpresent"]) { // If there was an image on the event
			// Preparing the update request
			$request = $db->prepare("UPDATE Events SET EventTitre = :title, EventMessage = :message, EventDateDebut = :start, EventDateFin = :end, EventIsActiv = :isActivEvent WHERE EventId = :id");
			// Firing the request with some values binding
			$request->execute(array(
				':title' => $title,
				':message' => $message,
				':start' => $start,
				':end' => $end,
				':isActivEvent' => $isActif,
				':id' => $id
			));
		} else { // If there was no image on the event
			// Preparing the update request
			$request = $db->prepare("UPDATE Events SET EventTitre = :title, EventMessage = :message, EventDateDebut = :start, EventDateFin = :end, EventIsActiv = :isActivEvent, photo = :photo WHERE EventId = :id");
			// Firing the request with some values binding
			$request->execute(array(
				':title' => $title,
				':message' => $message,
				':start' => $start,
				':end' => $end,
				':isActivEvent' => $isActif,
				':photo' => $photo,
				':id' => $id
			));
		}
	} catch (Exception $e) { // If there was an error while deleting
		throw $e; // Display it
	}
	
	
}
