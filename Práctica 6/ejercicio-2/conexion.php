<?php

$link = mysqli_connect('localhost', 'root', 'root') or die('Hubo problemas de conexion');
mysqli_select_db($link , 'capitales');

?>