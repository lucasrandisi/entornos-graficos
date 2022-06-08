<html>
<head>
<title>Modificacion Ciudad</title>
</head>
<body>
<?php
    include("conexion.php");
    //Captura datos desde el Form anterior
    $ciudad = $_POST['ciudad'];
    $pais = $_POST['pais'];
    $habitantes = $_POST['habitantes'];
    $superficie = $_POST['superficie'];
    $tieneMetro = $_POST['metro'];
    //Arma la instrucción SQL y luego la ejecuta
    $vSql = "UPDATE ciudades SET pais='$pais', habitantes='$habitantes', superficie='$superficie', tieneMetro='$tieneMetro' 
                WHERE ciudad='$ciudad'";
    $vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));;
    echo("La ciudad fue modificada correctamente<br>");
    echo("<A href='menu.html'>VOLVER AL MENU</A>");
    // Cerrar la conexion
    mysqli_close($link);
?>
</body>
</html>