<html>
	<head>
		<title>Alta Ciudad</title>
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
			$result = mysqli_query($link, "select * from ciudades where ciudad ='$ciudad'");

			if (mysqli_num_rows($result)){
				echo ("La ciudad ya existe<br>");
				echo ("<A href='menu.html'>VOLVER AL ABM</A>");
			}
			else {
				$query = "INSERT INTO ciudades (`ciudad`, `pais`, `habitantes`, `superficie`, `tieneMetro`)
							values ('$ciudad', '$pais', '$habitantes', '$superficie', '$tieneMetro')";
				
				mysqli_query($link, $query) or die (mysqli_error($link));
				
				echo("La ciudad fue agregada correctamente<br>");
				echo("<A href='menu.html'>VOLVER AL MENU</A>");
			}

			// Cerrar la conexion
			mysqli_close($link);
		?>
	</body>
</html>