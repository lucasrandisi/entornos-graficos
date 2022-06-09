<?php
	session_start();

	$conn = mysqli_connect("localhost", "root", "root"); 
	mysqli_select_db($conn, "compras");

	$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : null;

	$result = mysqli_query($conn,"select * from catalogo order by producto asc");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<form action="guardar.php" method="post">
		<table>
			<?php
				while ($row = mysqli_fetch_array($result)) {
			?>
				<tr>
					<td>
						<?php
							echo $row['producto'];
						?>
					</td>
					<td>
						<input name=<?php echo $row['producto']; ?> type="number" 
							value="<?php if (isset($carrito[$row['producto']])) echo $carrito[$row['producto']]; ?>">
					</td>
				</tr>
				
			<?php
				}
			?>
		</table>
		<input type="submit" value="Guardar carrito">
	</form>
</body>
</html>
