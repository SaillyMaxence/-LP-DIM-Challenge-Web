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
            <a href="affichage.php" target="_blank"><li>Affichage</li>
            </a><a href="evenement.php"><li>Evénements</li></a><a href=""><li>Déconnexion</li>
            </a> 
        </ul>
    </nav>
    <div class="container">
        <div class="grp1">Bonjour <?php echo $_SESSION["user"];?></div>
    </div>
    <script src="../libs/jquery.js"></script>
    <script src="../index.js"></script>
</body>

</html>