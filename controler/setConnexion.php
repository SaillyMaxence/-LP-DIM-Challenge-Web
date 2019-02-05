<?php
session_start();
if(isset($_POST["login"]) && isset($_POST["pass"])){
   
    $loginUser = $_POST["login"];

    $passwordUser = $_POST["pass"];


    if($loginUser == "test" || $passwordUser == "pass"){
        $return = json_encode("true");
          $_SESSION["user"] = $loginUser;
        echo $return;
    }else{
        $return = json_encode("false");
        echo $return;
    }

}