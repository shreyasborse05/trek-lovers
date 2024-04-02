<?php
    session_start();
    session_unset();
    session_destroy();
    echo "U r logged out successfully<br>";
    header('Location: login.php');
 
 ?>