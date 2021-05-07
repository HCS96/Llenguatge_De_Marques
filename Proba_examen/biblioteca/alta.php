<?php

    require "common/funciones.php";

    $correct = true;
    
    if (!empty($_POST)) {
        
            $correct = null;
            $error = null;

            $usuari = $_POST["username"];
            $contrasena = $_POST["password"];
            $repContraseña = $_POST["password_r"];
            $email = $_POST["email"];

            //print_r($_POST);

            if (esSocio($email) == true && !empty($_POST)) {

                $correct = true;

                require "config.php";


                $sql = "INSERT INTO usuaris(nom_usuari, contrasenya,email)     
                 VALUES('$usuari','$contrasena', '$email')";

                 echo $sql;

                 $result = $conn->query($sql);


                if ($result) {

                     header("Location:entrar.php");
                }else{

                    echo "No se ha podido realizar";
                }

               


            }else{

                $correct = false;
                $error = 1;

            }

            

    }




?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>alta - BNE</title>
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
            	<h1>No te lo pienses más, regístrate</h1>
                <h4>una vez registrado en la gran biblioteca<span class="enfasi_color">nacional</span>española tendrás acceso a más de 1000 libros digitales y podrás adquirir las grandes obras de la literatura española</h4>
            </td>
        	<td class="form">
            	<span class="enfasi_negrtita">introduce los datos de tu nueva cuenta:</span>
                <form name="new_user" id="new_user" action="alta.php" method="post">
                    <label id="label_username" for="username" >nombre de usuario</label>
                    <input type="text" name="username" id="username" class="form_element" placeholder="Introduce el nombre de usuario" required 
                    <?php 

                    if (!empty($_POST)) {

                        
                        echo "value= \"$usuari\"";

                       
                    }

                    ?>/>
                	<label id="label_email" for="email">email</label>
                    <input type="email" name="email" id="email" class="form_element" placeholder="Introduce el email" required

                    <?php 

                    if (!empty($_POST)) {

                        
                        echo "value= \"$email\"";

                       
                    }

                    ?> />
                    
                    <?php
                        if ($correct == false) {
                             echo "<p style= color:red;>EMAIL INVALIDO</p>";
                        }

                    ?>                    
                	<label id="label_password" for="password">contraseña</label>
                    <input type="password" name="password" id="password" class="form_element" placeholder="Introduce la contraseña" required />
                	<label id="label_password_r" for="password_r">repite la contraseña</label>
                    <input type="password" name="password_r" id="password_r" class="form_element" placeholder="Introduce la contraseña otra vez" required />
                    <div class="derecha"><input type="submit" class="boton" value="enviar datos" /></div>
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
