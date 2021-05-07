<?php

    require "config.php";

    if(!empty($_POST)){

        $usuari = $_POST["username"];
        $contr = $_POST["password"];

        $sql = "SELECT id_usuari FROM usuaris WHERE nom_usuari = '$usuari' AND contrasenya = '$contr'";

        $resultat = $conn->query($sql);

        //$varsesion = $_SESSION['user'];

            if($resultat){

                if($resultat->num_rows > 0){

                    $fila = $resultat->fetch_assoc();


                    $_SESSION["socio"] = $fila["id_client"];

                    echo $_SESSION;

                    echo "EXITO";

                    header("Location: catalogo.php");

                }else{


                   echo "<style= color:red;>usuario o contraseña incorrectos</>";

                   
                }
            }   
    }


?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Entrar - BNE</title>
<link rel="icon" href="images/favicon.png" type="image/x-icon" />
<link rel="stylesheet" href="css/estilo.css" type="text/css" />
</head>

<body>
    <div id="logo">
    	<img id="img_logo_1" src="images/logo_1.png" />
    	<img id="img_logo_2" src="images/logo_2.png" />
    	<img id="img_logo_3" src="images/logo_3.png" />
        <span id="text_logo_1" class="enfasi_negrtita">B</span>
        <span id="text_logo_2" class="enfasi_negrtita">N</span>
        <span id="text_logo_3" class="enfasi_negrtita">E</span>
        biblioteca<span class="enfasi_color">nacional</span>española
    </div>
	<div id="menu">
        <a href="entrar.php">entrar</a><br />
        <a href="alta.php">crear cuenta</a>
    </div>
	<table class="form">
    	<tr>
        	<td>
            	<h1>No te lo pienses más, entra</h1>
                <h4>en la gran biblioteca<span class="enfasi_color">nacional</span>española tendrás acceso a más de 1000 libros digitales y podrás adquirir las grandes obras de la literatura española</h4>
            </td>
        	<td class="form">
            	<span class="enfasi_negrtita">introduce los datos de acceso:</span>
                <form name="login_user" action="entrar.php" method="post">
                    <label id="label_username" for="username">nombre de usuario</label>
                    <input type="text" name="username" id="username" class="form_element" placeholder="Introduce el nombre de usuario" required />
                	<label id="label_password" for="password">contraseña</label>
                    <input type="password" name="password" id="password" class="form_element" placeholder="Introduce la contraseña" required />
                    <div class="derecha"><input type="submit" class="boton" value="entrar" /></div>
            </td>
      	</tr>
    </table>
    <div id="footer">
    	<div>
        	<ul>
                <li><a href="index.html">home</a></li>
                <li><a href="catalogo.php">catálogo</a></li>
                <li><a href="#">servicios</a></li>
                <li><a href="#">actividades</a></li>
                <li><a href="index.html">conócenos</a></li>
                <li><a href="#">prensa</a></li>
            </ul>
    	</div>
        <div>
        	©2014 BNE - Pº de Recoletos 20-22<br />
			28071 Madrid Tel.: (34) 91 580 78 00
        </div>
        <div>
        	<img class="img_m" src="images/salamanca.png" alt="salamanca" />
           	<img class="img_m" src="images/madrid.png" alt="madrid" /><br />
        </div>
    </div>
    <div id="by">
    	Designed and developed by marcasru © 2014-2015 Graphic Resources SL. All rights reserved
    </div>
</body>
</html>
