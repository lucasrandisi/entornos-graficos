<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
	<head>
		<title>Ejercicio 4</title>
	</head>
<body>
    Confeccionar una página que simule ser la de un periódico. La misma debe permitir configurar qué
    tipo de titular deseamos que aparezca al visitarla, pudiendo ser:
    Noticia política, Noticia económica o Noticia deportiva.
    Mediante tres objetos de tipo radio, permitir seleccionar qué titular debe mostrar el periódico.
    Almacenar en una cookie el tipo de titular que desea ver el cliente. La primera vez que visita el
    sitio deben aparecer los tres titulares. Disponer un hipervínculo a una tercer página que borre la
    cookie creada.

    <br>
    <br>
    <br>
    <br>
    <br>

    <?php
		if ($_POST['noticia']) {
			setcookie('noticia', $_POST['noticia'], time() + (60 * 60 * 24 * 90));
    		header('Refresh: 0');
		}


		if(isset($_COOKIE['noticia'])){
			if($_COOKIE['noticia'] == 'politica') {
				echo '<h1>Se vienen las elecciones</h1>';
				echo '<h2>Titular ' . $_COOKIE['noticia'] . '</h2>';
			} else if($_COOKIE['noticia'] == 'economica') {
				echo '<h1>Inflación del 50%</h1>';
				echo '<h2>Titular ' . $_COOKIE['noticia'] . '</h2>';
			} else if($_COOKIE['noticia'] == 'deportiva') {
				echo '<h1>Argentina campeón</h1>';
				echo '<h2>Titular ' . $_COOKIE['noticia'] . '</h2>';
			}
		} else {
			echo '
			<table border=1 padding=5>
				<tr>
					<td>
						<h1>Inflación del 50%</h1>
						<h2>Titular económico</h2>
					</td>
					<td>
						<h1>Argentina campeón</h1>
						<h2>Titular deportivo</h2>
					</td>
					<td>
						<h1>Se vienen las elecciones</h1>
						<h2>Titular político</h2>
					</td>
				</tr>
			</table>
			';
		}

    ?>

    <form action="page.php" method="post"> 
        
        Aquí puedes seleccionar el titular que deseas que aparezca en el diario:<br>

        <input type="radio" name="noticia" value="politica" <?php if ($_COOKIE['noticia'] == 'politica') echo 'checked' ?> > Noticia política <br>
        <input type="radio" name="noticia" value="economica" <?php if ($_COOKIE['noticia'] == 'economica') echo 'checked' ?>> Noticia económica<br>
        <input type="radio" name="noticia" value="deportiva" <?php if ($_COOKIE['noticia'] == 'deportiva') echo 'checked' ?>> Noticia deportiva

		<br>
        <input type="submit" value="Confirmar">

    </form>

    <form action="borrar-cookie.php" method="post">
        <input type="submit" value="Borrar cookies">
    </form>
</body>
</html>