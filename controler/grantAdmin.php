<?php
require("../includes/database_inc.php");
require("../includes/requetes.php");
// Preparing the request to grab everything from the event table
$request = $db->prepare($grantAdmin);
$id = $_POST['id'];
$request->execute(array(
	':id'=> $id
));

$return = json_encode("true");
echo $return;