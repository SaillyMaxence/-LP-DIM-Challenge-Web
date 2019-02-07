<?php
session_start();
require("../includes/database_inc.php");
include "LDAP.php";

if(isset($_POST["login"]) && isset($_POST["pass"])){
   
    $loginUser = $_POST["login"]; // GET LOGIN

    $passwordUser = $_POST["pass"]; // GET PASSWORD

    $ldap = new LDAP(); // Create new Object LDAP

    $con = $ldap->Connexion("10.10.28.101",389); // Connexion server LDAP

    if($con) // If connexion Server ldap is true
    {
        /// if user exist with this password AND verify if user belongs of a specific group
        if($ldap->VerifUserGroup($loginUser,$passwordUser,"lpdim") || $ldap->VerifUserGroup($loginUser,$passwordUser,"enseignant")) 
        {
            // The query requete SQL, SELECT user where userName is user login
            $query= "SELECT * FROM users WHERE UserName=:UserName"; 
            $stmt = $db->prepare($query); // prepare query requete sql
            $stmt->bindValue('UserName', $loginUser); // insert value in query requete sql
            $stmt->execute(); // execute query
            $data=$stmt->fetch(); // Get first value in response of sql server
            if($data['UserName'] == $loginUser) // if this response equal user login
            {
                $return = json_encode("true"); // create fromat json of true
                $_SESSION["user"] = $loginUser; // create session user with login user
            }else
                $return = json_encode("badRight"); // create fromat json of false

            echo $return;
            
        }else{
            $return = json_encode("false"); // create fromat json of false
            echo $return; // json data
        }
    }

}