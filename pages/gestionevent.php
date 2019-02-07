<?php session_start(); 
    if(!isset($_SESSION['user']))
        header('Location: ../index.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Challenge web - Gestionnaire d'événements</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/style.css" />
    <link rel="stylesheet" type="text/css" href="../libs\font-awesome\css\font-awesome.min.css">
    <link rel="stylesheet" href="../libs/richtext.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/style.css" />
</head>

<body>
<nav><ul><a href="affichage.php" target="_blank"><li>Affichage</li></a><a href="evenement.php"><li>Evénements</li></a><a href="user.php"><li>Admnistration</li></a><a href=""><li id="deconnexion">Déconnexion</li></a></ul></nav>
    
    <div class="container">

        <div class="grp1">
            <form id="form" action="../addEvent.php" method="post" enctype="multipart/form-data">
                <input type="text" name="titreevent" id="titreevent" placeholder="Titre de l'évènement">
                <div class="zone-image">
                    <img id="picture" src="http://placehold.it/180" alt="your image" />
                    <input type='file' name="pic" id="pictureToGet" onchange="readURL(this);" />
                </div>
                <textarea class="content description" id="description" name="description"></textarea>
                <div class="lesdates">
                    <span>Date début :</span><input type="date" name="datedeb" id="datedeb"><span>Date Fin :</span>
                    <input type="date" name="datefin" id="datefin">
                </div>

        </div>
        <div class="grp2">
            <button id="addEvent" type="submit" class="submit"> Ajouter </button>
        </div>
       
    </div>
    </form>
    <script type="text/javascript" src="../libs/jquery.js"></script>
    <script type="text/javascript" src="../libs/momentjs/moment.min.js"></script>
    <script src="../scripts/gestionevent.js"></script>
    <script src="../libs/jquery.richtext.js"></script>
    <script src="../scripts/deconnexion.js"></script>
    <script>
        $(document).ready(function () {
            $('.content').richText();
            $('.content2').richText();
        });

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