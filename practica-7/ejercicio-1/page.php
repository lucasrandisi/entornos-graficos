<?php
    if(isset($_POST["estilo"])){
	    $estilo = $_POST["estilo"];
	    
		setcookie("estilo", $estilo, time() + (60 * 60 * 24 * 90));
    }
	else {
    	if(isset($_COOKIE["estilo"])) {
	    	$estilo = $_COOKIE["estilo"];
    	}
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
	<head>
		<title>Ejercicio 1</title>
		<?php
		//miro si he tengo un estilo definido, porque entonces tengo que cargar la correspondiente hoja de estilos
		if (isset($estilo)) {
			echo '<link rel="stylesheet" type="text/css" href="' . $estilo . '.css">';
		}
		?>
	</head>
	<body>
		Crear una página que puede configurarse con distintos estilos CSS. El usuario es quien decide qué
		aspecto desea que tenga la página, por medio de un formulario. Luego la página es capaz de
		recordar, entre los distintos accesos que realice el usuario, el aspecto que había elegido para
		mostrar la web. 
		<form action="page.php" method="post"> 
			<label for="estilo">Seleccionar el estilo que prefieres en la página:</label>
			<select name="estilo">
				<option value="verde" <?php if ($estilo === 'verde') echo 'selected'; ?>>Verde
				<option value="rojo"  <?php if ($estilo === 'rojo') echo 'selected';  ?>> Rojo
				<option value="azul"  <?php if ($estilo === 'azul') echo 'selected';  ?>>Azul
			</select>
			<input type="submit" value="Actualizar el estilo">
		</form>
	</body>
</html>