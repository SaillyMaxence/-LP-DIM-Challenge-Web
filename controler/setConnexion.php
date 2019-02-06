<?php
session_start();
include "LDAP.php";

if(isset($_POST["login"]) && isset($_POST["pass"])){
   
    $loginUser = $_POST["login"]; // GET LOGIN

    $passwordUser = $_POST["pass"]; // GET PASSWORD

    $ldap = new LDAP(); // Create new Object LDAP

    $con = $ldap->Connexion("10.10.28.101",389); // Connexion server LDAP

    if($con) // If connexion Server ldap is true
    {
        /// if user exist with this password AND verify if user belongs of a specific group
        if($ldap->VerifUserGroup($loginUser,$passwordUser,"lpdim")) 
        {
            $return = json_encode("true"); // create fromat json of true
            $_SESSION["user"] = $loginUser; // create session user with login user
            echo $return; //return json data
        }else{
            $return = json_encode("false"); // create fromat json of false
            echo $return; // json data
        }
    }

}