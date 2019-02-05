<?php session_start() ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Challenge web</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/style.css" />
    <link rel="stylesheet" type="text/css" href="../libs/datatable/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="../libs\font-awesome\css\font-awesome.min.css">
</head>

<body>
    <div class="container">
        <nav>
            <ul><a href=""><li>Affichage</li></a><a href="evenement.php"><li>Evénements</li></a><a href=""><li>Deconnection</li></a>
            </ul>
        </nav>
        <div class="grp1">
            <table id="datatable"></table>
<br>
           <a href="" id="newevent">Nouvel événement</a>
        </div>

    </div>
    <script src="../libs/jquery.js"></script>
    <script type="text/javascript" src="../libs/datatable/datatables.min.js"></script>
    <script src="../scripts/evenement.js"></script>
</body>

</html>