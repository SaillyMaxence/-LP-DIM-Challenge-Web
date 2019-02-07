<?php
    session_start();
    if(isset($_POST['deconnexion']) && isset($_SESSION['user']))
        session_destroy($_SESSION['user']); // Destroy session user