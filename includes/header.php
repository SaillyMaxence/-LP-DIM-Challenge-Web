<?php session_start(); 
    if(!isset($_SESSION['user']))
        header('Location: ../index.php');
        $path= $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Challenge web - Gestionnaire d'utilisateurs</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../libs\font-awesome\css\font-awesome.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="../libs/bootstrap-4.3.1-dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../libs/jquery-ui-1.12.1.custom/jquery-ui.min.css">
        <link rel="stylesheet" type="text/css" href="../libs/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.css">
        <link rel="stylesheet" type="text/css" href="../libs/tabulator/dist/css/tabulator.min.css">
        <link rel="stylesheet" type="text/css" href="../libs/DataTables-1.10.18/css/dataTables.foundation.min.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
          <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link <?php if($path=="/pages/affichage.php"){ echo "active";} ?>" href="affichage.php" target="_blank">Affichage</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($path=="/pages/evenement.php"||$path=="/pages/gestionevent.php"||$path=="/pages/updateevent.php"){ echo "active";} ?>" href="evenement.php">Evénements</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($path=="/pages/user.php"||$path=="/pages/gestionuser.php"){ echo "active";} ?>" href="user.php">Administration</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="deconnexion.php">Déconnexion</a>
              </li>
            </ul>
          </div>
        </nav>
        <div class="container" style="padding-top:35px">
            
        
        
        