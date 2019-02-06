<?php
session_start();
include "LDAP.php";
if(isset($_POST["login"]) && isset($_POST["pass"])){
   
    $loginUser = $_POST["login"];

    $passwordUser = $_POST["pass"];

    $ldap = new LDAP();

    $con = $ldap->Connexion("10.10.28.101",389);

    if($con)
    {
        if($ldap->VerifUserGroup($loginUser,$passwordUser,"lpdim"))
        {
            $return = json_encode("true");
            $_SESSION["user"] = $loginUser;
            echo $return;
        }else{
            $return = json_encode("false");
            echo $return;
        }
    }

}