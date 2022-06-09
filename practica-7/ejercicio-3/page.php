<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ejercicio 3</title>
	</head>
	<body>
		Crear un formulario que solicite la carga del nombre de usuario. Cuando se presione un botón
		crear una cookie para dicho usuario. Luego cada vez que ingrese al formulario mostrar el último
		nombre de usuario ingresado. 

		<?php
			if ($_POST['usuario']) {
    			setcookie('usuario', $_POST['usuario'], time() + (60 * 60 * 24 * 90));
				header("Refresh:0");
			}

			if(isset($_COOKIE['usuario'])){
				echo '<p>Ultimo nombre de usuario ingresado: ' . $_COOKIE['usuario'] . '</p>';
				echo '<p>Ingrese uno nuevo para cambiarlo</p>';
			} else {
				echo '<p>Ingrese un nombre de usuario:</p>';
			}

		?>

		<form action="page.php" method="post"> 
			<input type="text" name="usuario" id="usuario"> 
			<input type="submit" value="Cambiar nombre">
		</form>

	</body>
</html>