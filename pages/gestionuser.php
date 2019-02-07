<?php session_start() ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Challenge web - Gestionnaire d'utilisateurs</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../libs\font-awesome\css\font-awesome.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="../styles/style.css" />
    </head>
    <body>
        <nav>
            <ul><a href="">
                    <li>Affichage</li>
                </a>
                <a href="evenement.php">
                    <li>Evénements</li>
                </a>
                    <li id="deconnexion" >Déconnexion</li>
            </ul>
        </nav>
        <div class="container">
            <div class="grp1">
                <label for="username">ID utilisateur LDAP</label>
                <input type="text" name="username" id="username">
                <div class="zone-image">
                    <img id="picture" src="http://placehold.it/180" alt="your image" />
                    <input type='file'id="pictureToGet" onchange="readURL(this);" />
                </div>
            </div>
            <button id="addUser"> ajout </button>
        </div>
        <script type="text/javascript" src="../libs/jquery.js"></script>
        <script type="text/javascript" src="../libs/momentjs/moment.min.js"></script>
        <script src="../scripts/gestionuser.js"></script>
        <script src="../scripts/deconnexion.js"></script>
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
            
                    reader.onload = function (e) {
                        $('#picture')
                            .attr('src', e.target.result);
                    };
            
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </body>
</html>