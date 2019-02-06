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
    <link rel="stylesheet" href="../libs/richtext.min.css">
</head>

<body>
    <div class="container">
        <nav>
            <ul><a href="">
                    <li>Affichage</li>
                </a><a href="evenement.php">
                    <li>Evénements</li>
                </a><a href="">
                    <li>Deconnection</li>
                </a></ul>
        </nav>
<input type="text" name="titreevent" id="titreevent" placeholder="Titre de l'évènement">
        <input type='file' onchange="readURL(this);" />
        <img id="picture" src="http://placehold.it/180" alt="your image" />
        <textarea class="content" name="example"></textarea>
    
    </div>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="../libs/datatable/datatables.min.js"></script>
    <script src="../scripts/evenement.js"></script>
    <script src="../libs/jquery.richtext.js"></script>
    <script>
        $(document).ready(function () {
            $('.content').richText();
            $('.content2').richText();
        });
    </script>


</body>

</html>