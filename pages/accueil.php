<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Challenge web - Accueil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/style.css" />
    <link rel="stylesheet" type="text/css" href="libs\font-awesome\css\font-awesome.min.css">
</head>
<body>
    <nav>
        <ul>
            <a href=""><li>Affichage</li>
            </a><a href="evenement.php"><li>Evénements</li></a><li id="deconnexion">Déconnexion</li> 
        </ul>
    </nav>
    <div class="container">
        <div class="grp1">Bonjour <?php echo $_SESSION["user"];?></div>
    </div>
    <script src="../libs/jquery.js"></script>
    <script src="../index.js"></script>
    <script src="../scripts/deconnexion.js"></script>
</body>

</html>