<?php
	include('conexion.php');

	//Arma la instrucción SQL y luego la ejecuta
	$query = "SELECT * FROM ciudades";
	$result = mysqli_query($link, $query) or die (mysqli_error($link));;

	if (mysqli_num_rows($result) === 0){
		echo ("No hay ciudades.<br>");
		echo ("<A href='menu.html'>VOLVER AL ABM</A>");
	}
	else {
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Listado</title>
	</head>
	<body>
		<h1>Lista de ciudades</h1>  
		<table border="1">
			<tr align="center">
				<td>Id</td>
				<td>Ciudad</td>
				<td>País</td>
				<td>Habitantes</td>
				<td>Superficie</td>
				<td>Tiene metro?</td>
			</tr>

			<?php
				while($fila = mysqli_fetch_array($result)) {        
			?>

			<tr align="center">
				<td><?php echo($fila['id']); ?></td>
				<td><?php echo($fila['ciudad']); ?></td>
				<td><?php echo($fila['pais']); ?></td>
				<td><?php echo($fila['habitantes']); ?></td>
				<td><?php echo($fila['superficie']); ?></td>
				<td> <?php if($fila['tieneMetro']) { echo("Si"); } else { echo("No"); } ?> </td>
			</tr>
			
			<?php

				}
			?>
			
		</table>
		<A href='menu.html'>VOLVER AL MENU</A>
	</body>
</html>

<?php
	}

	mysqli_close($link);
?>