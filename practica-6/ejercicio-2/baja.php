<html>
	<head>
		<title>Baja Ciudad</title>
	</head>
	<body>
		<?php
			include("conexion.php");

			$ciudad = $_POST['ciudad'];

			$result = mysqli_query($link, "select * from ciudades where ciudad ='$ciudad'");
		
			if (mysqli_num_rows($result)) {
				$query = "DELETE FROM ciudades WHERE ciudad='$ciudad'";
				mysqli_query($link, $query) or die (mysqli_error($link));

				echo ("La ciudad fue eliminada correctamente<br>");
				echo ("<A href='menu.html'>VOLVER AL ABM</A>");
			}
			else {
				echo("La ciudad ingresada no existe<br>");
				echo("<A href='menu.html'>VOLVER AL MENU</A>");
			}
			// Cerrar la conexion
			mysqli_close($link);
		?>
	</body>
</html>