<?php
    $date=date("d-m-Y");
    $hour= date("H :i:s");

    $to="lucasrandisi@gmail.com";
    $subject="Consulta en su página";
    $from='From:' .$_POST['email'];
    $body= "
		\n
		Nombre: $_POST[nombre]\n
		Email: $_POST[email]\n
		Consulta: $_POST[consulta]\n
		Enviado: $date a las $hour\n
		\n
    ";

    mail($to, $subject, $body, $from);
    echo "Su consulta ha sido enviada, en breve recibirá nuestra respuesta.";
?>