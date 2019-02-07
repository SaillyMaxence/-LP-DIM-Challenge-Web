<?php session_start() ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Challenge web</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/style.css" />
    <link rel="stylesheet" type="text/css" href="../libs\font-awesome\css\font-awesome.min.css">
    <link href="../libs/tabulator/dist/css/tabulator.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <nav>
            <ul><a href=""><li>Affichage</li></a><a href="evenement.php"><li>Evénements</li></a><a href=""><li>Déconnexion</li></a></ul>
        </nav>
        <div class="grp1">
        <div id="example-table"></div>
<br>
           <a href="gestionevent.php" id="newevent">Nouvel événement</a>
        </div>

    </div>
    <script src="../libs/jquery.js"></script>
    <script type="text/javascript" src="../libs/tabulator/dist/js/tabulator.min.js"></script>
    <script src="../scripts/evenement.js"></script>
</body>

</html>