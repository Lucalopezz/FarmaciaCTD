<?php

if (!isset($_SESSION)){
    session_start();
}

if (!isset($_SESSION['user'])){
    die('Você não pode acessar esta página. Faça o login em:  <a href="login.php">Login</a> ');
}


?>