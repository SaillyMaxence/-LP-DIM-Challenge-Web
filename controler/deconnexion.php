<?php
    session_start();
    if(isset($_POST['deconnexion']) && isset($_SESSION['user']))
        session_destroy(); // Destroy session user