<?php


function esSocio($pEmail) {

	$mail = false;
	$text = "@bnac.es";

	if ((strpos ($pEmail, $text) !== false) && (strpos ($pEmail, ".") !==false))
            {                   
                $mail= true;
            }
            else
            {
                $mail = false;
            }




	return $mail;

}



?>

