<?php
	include('conexion.php');

	$ciudadesPorPagina = 3;
	$paginaActual = isset ( $_GET['pagina']) ? $_GET['pagina'] : 1 ;
	
	if ($paginaActual == 1) {
		$inicio = 0;
	}
	else {
		$inicio = ($paginaActual - 1) * $ciudadesPorPagina;
	}

	//Arma la instrucción SQL y luego la ejecuta
	$query = "SELECT COUNT(id) as cantidadCiudades FROM ciudades";
	$result = mysqli_query($link, $query) or die (mysqli_error($link));;
	$totalCiudades = mysqli_fetch_array($result)['cantidadCiudades'];
	
	if ($totalCiudades == 0){
		echo ("No hay ciudades.<br>");
		echo ("<A href='menu.html'>VOLVER AL ABM</A>");
	}
	else {
		$totalPaginas = ceil($totalCiudades/ $ciudadesPorPagina);

		echo "Numero de registros encontrados: " . $totalCiudades . "<br>";
		echo "Se muestran paginas de " . $ciudadesPorPagina . " registros por página<br>";
		echo "Mostrando página " . $paginaActual . " de " . $totalPaginas . "<p>";
		
		$query = "SELECT * FROM ciudades" . " limit " . $inicio . "," . $ciudadesPorPagina;
		$result = mysqli_query($link, $query);
		$totalCiudades = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado con paginacion</title>
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
		
		<?php
			if ($totalPaginas > 1){
				for ($i=1; $i<=$totalPaginas; $i++) {
					if ($paginaActual == $i)
					//si muestro el índice de la página actual, no coloco enlace
					echo $paginaActual . " ";
					else
					//si la página no es la actual, coloco el enlace para ir a esa página
					echo "<a href='consultaPaginada.php?pagina=" . $i ."'>" . $i . "</a> ";
				}
			}
		?>

		<br>
		<br>

		<a href='menu.html'>VOLVER AL MENU</a>
	</body>
</html>

<?php
	}

	// Cerrar la conexion
	mysqli_close($link);
?>