<?php
require("../includes/database_inc.php");
require("../includes/requetes.php");
// Grabbing the event's ID
$id = $_POST["id"];
try {
	// Preparing the request to delete the event
    $request = $db->prepare($deleteUserRequest);

    // Binding values and firing the request
    $request->execute(array(
    	':id' => $id
    ));
    
    echo json_encode("suppress ok");

} catch (Exception $e) { // If there was an error while deleting
	throw "Error when deleting: ".$e; // Display it
}