<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Affichage</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="../libs/responsiveslides.css">
    <script type="text/javascript" src="../libs/jquery.js"></script>
    <script type="text/javascript" src="../scripts/affichages.js"></script>
    <script type="text/javascript" src="../libs/responsiveslides.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/style.css" />
    <script>
        // You can also use "$(window).load(function() {"
        $(function () {

            // Slideshow 1
            $("#slider1").responsiveSlides({
                maxwidth: 800,
                speed: 800
            });
        });
    </script>
</head>

<body>
    <div class="affichage">
        <ul class="rslides" id="slider1">
            <li>
                <div class="ecran">
                    <h1>OUI</h1>
                    <div class="annonce">
                    <div id="photo"><img src="../src/image/iut_logo.png" alt=""></div>
                    <div id="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate eaque saepe maiores nobis omnis earum non beatae fuga harum assumenda, sequi magnam quam eos reprehenderit maxime accusantium aspernatur modi optio.</div></div>
                </div>
            </li>
        </ul>
    </div>
</body>
</html>