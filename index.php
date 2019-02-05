<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Challenge web</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="styles/style.css" />
    <link rel="stylesheet" type="text/css" href="dataTables/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="libs\font-awesome\css\font-awesome.min.css">
</head>
<body>
    <?php
    if(isset($_SESSION["user"])){
   
    
    
    
    }else{

    require("includes/login_inc.php");
 
    }
    ?>

 
    <script type="text/javascript" src="dataTables/datatables.min.js"></script>
    <script src="libs/jquery.js"></script>
    <script src="index.js"></script>       
</body>
</html>