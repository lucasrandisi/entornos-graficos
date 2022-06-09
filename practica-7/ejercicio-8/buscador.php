<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
<?php
	include("conexion.php");
	
	$cancion = $_POST['cancion'];
	
	$result = mysqli_query($link, "select * from buscador where canciones LIKE '%$cancion%'");

	if(mysqli_num_rows($result) == 0) {
     	echo "No hay canciones con ese nombre";
    } 
	else {
?>
		<table>
			<?php
				while($row = mysqli_fetch_array($result)) {
					echo "<tr>";
						echo "<td>" . $row['canciones'] . "</td>";
					echo "</tr>";
				}
			?>
		</table>

		<a href="index.html">Volver al Buscador de Canciones</a>
<?php
	}
?>
</body>
</html>