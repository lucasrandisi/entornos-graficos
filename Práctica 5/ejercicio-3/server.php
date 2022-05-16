<?php
    $to="lucasrandisi@gmail.com";
    $subject="Recomendación de sitio";
    $from='From:' .$_POST['email'];
    $body= "
		\n
		Hola $_POST[nombre] !\n
		
		$_POST[mensaje]\n

		Asi que pasese por nuestro sitio *****.com.ar
		\n
    ";
	
    mail($to,$subject,$body,$from);
    echo "Recomendación enviada con éxito.";
?>