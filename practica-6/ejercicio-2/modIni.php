<html>
	<head>
		<title>Modificacion Ciudad</title>
	</head>
	<body>
		<?php
			include("conexion.php");

			$ciudad = $_POST['ciudad'];
			$query = "SELECT * FROM ciudades WHERE ciudad='$ciudad'";
			$result = mysqli_query($link, $query) or die (mysqli_error($link));

			if(mysqli_num_rows($result) == 0) {
				echo("La ciudad ingresada no existe<br>");
				echo("<A href='menu.html'>VOLVER AL MENU</A>");
			}
			else {
				$fila = mysqli_fetch_array($result);
		?>

		<form action="modificacion.php" method="post">
			<fieldset>
				<label for="ciudad">Ciudad:</label>
				<input id="ciudad" name="ciudad" type="text" value="<?php echo($fila['ciudad']); ?>" readonly>

				<label for="pais">País:</label>
				<input id="pais" name="pais" type="text" value="<?php echo($fila['pais']); ?>" required>
			</fieldset>
			<fieldset>
				<label for="habitantes">Cantidad de habitantes:</label>
				<input id="habitantes" name="habitantes" type="text" value="<?php echo($fila['habitantes']); ?>" required>

				<label for="superficie">Superficie:</label>
				<input id="superficie" name="superficie" type="text" value="<?php echo($fila['superficie']); ?>" required>

				<label for="metro">Tiene metro?</label>

				<?php
					if($fila['tieneMetro'] == 1) {
						echo(
							'<input type="radio" name="metro" id="metro" value="1" checked required> Si
							<input type="radio" name="metro" id="metro" value="0" required> No'
						);
					} else {
						echo(
							'<input type="radio" name="metro" id="metro" value="1" required> Si
							<input type="radio" name="metro" id="metro" value="0" checked required> No'
						);
					}
				?>
			</fieldset>
			<input type="submit" value="Modificar">
		</form>
		
		<p><a href="menu.html">Volver al menu</a></p>
		
		<?php
			}
			
			// Cerrar la conexion
			mysqli_close($link);
		?>
	</body>
</html>