<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Challenge web</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="styles/style.css" />
    <link rel="stylesheet" type="text/css" href="libs/datatable/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="libs\font-awesome\css\font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/libs/bootstrap-4.3.1-dist/css/bootstrap.min.css">
</head>
<body>
<div  class="container">
    <?php
    require("includes/login_inc.php");
    ?>
</div>
    <script src="libs/jquery.js"></script>
    <script type="text/javascript" src="libs/datatable/datatables.min.js"></script>
    <script src="index.js"></script>     
    <script type="text/javascript" src="/libs/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
</body>
</html>