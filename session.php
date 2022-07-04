<?php
    // session_start(); 
    if (!isset($_SESSION['username'])) 
    {
        echo "Anda belum login <br>";
        echo "<a href=login.php>Login</a>"; 
        exit; 
    } 
?>