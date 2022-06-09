<?php
	include('conexion.php');

    session_start();
    

    $query = "SELECT nombre FROM alumnos WHERE mail='" . $_POST['mail'] . "'";
    $result = mysqli_query($link, $query) or die (mysqli_error($link));
	
    if(mysqli_num_rows($result) == 0) {
		echo("El mail ingresado no existe en la base<br>");
        echo("<a href='index.html'>VOLVER AL INICIO</a>");
    } 
	else {
		$fila = mysqli_fetch_array($result);
        $_SESSION['nombre'] = $fila['nombre'];
?>

		<a href="bienvenido.php">Ir a la página siguiente</a>
<?php
    }
?>