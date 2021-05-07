<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>catálogo - BNE</title>
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
	<div id="mi_compra">
       <img class="img_s" src="images/carrito.png" />
       <span class="enfasi_color enfasi_negrtita">Mi compra </span><span id="num_libros">0 libros</span>
    </div>
    <div id="lista_compra">
    	<table>
        	<tr>
            	<td class="enfasi_negrtita">importe de la compra</td>
                <td colspan="2" id="importe_compra">0 €</td>
            </tr>
        </table>
        <span </span>
    </div>
	<div class="seccion">
    	<h1>CATÁLOGO</h1>
        <form name="form_filtrar" id="form_filtrar" action="catalogo.php" method="GET">
        <div id="filtro">
            <select name="tema" id="tema" class="form_element">
                <option value="">Selecciona un tema</option>
                <option value="1">Psicología</option>
				<option value="2">Infantil</option>
				<option value="3">Historia</option>
				<option value="4">Tecnología</option>
				<option value="5">Poesía</option>
				<option value="6">Novela</option>
				<option value="7">Deportes</option>
				<option value="8">Salud</option>
				<option value="9">Ciencias</option>
				<option value="10">Economía</option>
				<option value="11">Filosofía</option>
				<option value="12">Religión</option>
            </select>
            <input type="submit" class="boton" value="filtrar" />
        </div>
        </form>
    </div>
    <div class="contenido">
	
		<?php


			require "config.php";



			if(!empty($_GET)){

				$id_tema = $_GET["tema"];

				//echo $id_cate;

				$sql ="SELECT * FROM llibres WHERE tema = $id_tema";

				$resultat = $conn->query($sql);

				if ($resultat) {
					
					$fila = $resultat->fetch_assoc();

					while ($fila) {

					$preu = $fila['preu'];
					$editorial = utf8_encode($fila['editorial']);
					$titol = utf8_encode($fila['titol']);
					$descripcio = utf8_encode($fila['descripcio']);

					$portada = $fila['portada'];

						
					echo "<div class=\"libro\">
							<table>
								<tr>
									<td rowspan=\"4\">
									<img class=\"img_libro\" src=\"$portada\" alt=\"portada\" />
									</td>
									<td class=\"precio\">$preu €</td>
									<td>
										<input type=\"number\" class=\"unidades\" value=\"1\" min=\"1\" />
										<img class=\"img_s\" alt=\"carrito\" src=\"images/carrito.png\" />
									</td>
								</tr>
								<tr>
									<td colspan=\"2\" class=\"enfasi_negrtita\">$titol</td>
								</tr>
								<tr>
									<td colspan=\"2\">$editorial</td>
								</tr>
								<tr>
									<td colspan=\"2\" class=\"resumen\">$descripcio</td>
								</tr>
							</table>						 
						</div>";


						$fila = $resultat->fetch_assoc();

					}



				}


			}else{



			$sql = "SELECT * FROM llibres";

			$resultat = $conn->query($sql);

			if ($resultat) {
				
				$fila = $resultat->fetch_assoc();

				while ($fila) {
					
					$preu = $fila['preu'];
					$editorial = utf8_encode($fila['editorial']);
					$titol = utf8_encode($fila['titol']);
					$descripcio = utf8_encode($fila['descripcio']);

					$portada = $fila['portada'];

					//echo $portada;

					echo "<div class=\"libro\">
							<table>
								<tr>
									<td rowspan=\"4\">
									<img class=\"img_libro\" src=\"$portada\" alt=\"portada\" />
									</td>
									<td class=\"precio\">$preu €</td>
									<td>
										<input type=\"number\" class=\"unidades\" value=\"1\" min=\"1\" />
										<img class=\"img_s\" alt=\"carrito\" src=\"images/carrito.png\" />
									</td>
								</tr>
								<tr>
									<td colspan=\"2\" class=\"enfasi_negrtita\">$titol</td>
								</tr>
								<tr>
									<td colspan=\"2\">$editorial</td>
								</tr>
								<tr>
									<td colspan=\"2\" class=\"resumen\">$descripcio</td>
								</tr>
							</table>						 
						</div>";



				$fila = $resultat->fetch_assoc();

				}


			}
		}	


		?>
		
		

		
		
 	</div>
    <div class="derecha">
    	<a href="#mi_compra"><img class="img_xs img_boton" src="images/arrow.png" alt="arrow" /></a>
    </div>
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
