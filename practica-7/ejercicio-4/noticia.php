<?php
    setcookie('noticia', $_POST['noticiaActual'], time() + (60 * 60 * 24 * 90));
    header('Location: Ejercicio4.php');
?>