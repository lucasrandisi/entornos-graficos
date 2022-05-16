<?php 
    $to = "lucasrandisi@gmail.com";
    $subject = "Ejercicio 1 - Enviar email con HTML";
    $body = ' 
		<html> 
		<head> 
			<title>Envio de mail</title> 
		</head> 
		<body> 
			<h1>Entornos gráficos</h1>
			<h2>Ejercicio 1</h2> 
			<b>Esto es parte del Ejercicio 1 de la práctica 5 de PHP</b>
		</body> 
		</html> 
    '; 
    // Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	$headers .= 'From: <testphp@gmail.com>' . "\r\n";
	$headers .= 'Cc: myboss@example.com' . "\r\n";
    
    mail($to, $subject, $body, $headers)
?>