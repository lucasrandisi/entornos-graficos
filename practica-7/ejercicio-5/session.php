<?php
    session_start();


    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['clave'] = $_POST['clave'];
?>

<a href="perfil.php">Ir al perfil</a>