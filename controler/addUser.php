<?php
require("../includes/database_inc.php");
require("../includes/requetes.php");
include("LDAP.php");

// Grabbing data from the form
$username = $_POST["user"];

$ldap = new LDAP(); // Create new Object LDAP
$con = $ldap->Connexion("10.10.28.101",389); // Connexion server LDAP

if($con) { // If connexion Server ldap is tru
	if($ldap->VerifGroupEnseigant($username)) {
		// Adding an user
		try {
			// Request to know if the user already exists
			$request = $db->prepare("SELECT UserName FROM Users WHERE UserName = :username");
			$request->execute(array( // Binding values & firing the request
				':username' => $username
			));

			if($request->rowCount() == 0) { // Checking if there is nothing in the request
				// Preparing the insert/add request
			   	$request = $db->prepare($addUserRequest);
				// Firing the request with some values binding
				$request->execute(array(
					':username' => $username
				));
				echo json_encode("0");
			} else {
				echo json_encode("2");
			}

		} catch (Exception $e) { // If there was an error while deleting
		    throw "Error when adding: ".$e; // Display it
		}
		// Adding the permissions to the user
		/*try {
			// Preparing the insert/add request
		   	$request = $db->prepare("INSERT INTO Users (UserName) VALUES (:username)");
			// Firing the request with some values binding
			$request->execute(array(
				':username' => $username
			));
		} catch (Exception $e) { // If there was an error while deleting
		    throw "Error when adding: ".$e; // Display it
		}*/
	} else {
		echo json_encode("1");
	}
}