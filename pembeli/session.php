<?php
    // session_start(); 
    if (!isset($_SESSION['username'])) 
    {
        echo "Anda belum login <br>";
        echo "<a href=login-pembeli.php>Login</a>"; 
        exit; 
    } 
?>