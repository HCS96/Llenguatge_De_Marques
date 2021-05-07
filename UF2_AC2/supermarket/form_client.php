<?php
	require "header.php";
	require "common/validacions.php";
	include "config.php";

	$correcto = false;

	$textUsuari = "";
	$textpass = "";
	$textpass2= "";
	$textEmail = "";
	$textNif = "";


		if(!empty($_POST)){

			$nom = $_POST["nombre"];
			$cognom = $_POST["apellidos"];
			$usuari = $_POST["username"];
			$contraseña = $_POST["pass"];
			$repContraseña = $_POST["rp_pass"];
			$nif = $_POST["nif"];
			$adreca = $_POST["direccion"];
			$cp = $_POST["codigo_postal"];
			$poblacio = $_POST["poblacion"];
			$telf = $_POST["telefono"];
			$email = $_POST["mail"];




			if((nomUsuariValid($usuari) == true) ){

				$correcto = true;

			}else{

				$correcto = false;

				$textUsuari = "<p style=\"color:#B81736;\">Nombre de usuario incorrecto</p>";
				
			}


			if(seguretatContrasenya($contraseña) >= 3){

				$correcto=true;


			}else{

				$correcto = false;
									
				$textpass = "<p style=\"color:#B81736;\">Seguridad de contraseña débil</p>";
			}
					
							
			if ($contraseña == $repContraseña){


				$correcto=true;
			}else{

				$correcto = false;


				$textpass2 ="<p style=\"color:#B81736;\">Las contraseñas no coinciden pisha</p>";
			}
					
								
			if(NIFValid($nif) == true){

				$correcto=true;

			}else{

				$correcto = false;

				$textNif ="<p style=\"color:#B81736;\">NIF invalido</p>";

			}
		
			if(esEmail($email) == true){

				$correcto=true;


			}else{

				$correcto = false;


				$textEmail ="<p style=\"color:#B81736;\">eMail invalido</p>";
			}

			if($correcto){

				require "config.php";

				$sql = "INSERT INTO clients (nom_usuari, contrasenya, nom, cognoms, nif, adreca, codi_postal, poblacio, telefon, email) 
						VALUES ('$usuari', '$contraseña', '$nom', '$cognom', '$nif', '$adreca', '$cp', '$poblacio', '$telf', '$email') ";

						echo $sql;

				$result = $conn->query($sql);
				
			if (!$result) {
				echo "ERROR al insertar los datos";
			} else {
				echo "Datos insertados correctamente";
			}

			$conn->close();		
					
			header("Location: entrar.php");

			}

		}	
		
?>
		<div class="container m-5 mx-auto text-white">
			<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method= "post" >
				<div class="row">
					<div class="col-4 offset-2">
						<div class="form-group">
							<label for="username">Nom d'usuari (obligatori):</label>
							<input type="text" class="form-control" name="username" id="username" />
						</div>
						<?php
							echo "$textUsuari";
						?>
						
						<div class="form-group">
							<label for="pass">Contrasenya (obligatori):</label>
							<input type="password" class="form-control" name="pass" id="pass" />
						</div>

						<?php

							echo "$textpass";
						?>
						<div class="form-group">
							<label for="rp_pass">Repeteix la contrasenya (obligatori):</label>
							<input type="password" class="form-control" name="rp_pass" id="rp_pass" />
						</div>

						<?php

							echo "$textpass2";

						?>
						<div class="form-group">
							<label for="nombre">Nom (obligatori):</label>
							<input type="text" class="form-control" name="nombre" id="nombre" />
						</div>
						<div class="form-group">
							<label for="apellidos">Cognoms (obligatori):</label>
							<input type="text" class="form-control" name="apellidos" id="apellidos" />
						</div>
						<div class="form-group">
							<label for="nif">NIF (obligatori):</label>
							<input type="text" class="form-control" name="nif" id="nif" />
						</div>

						<?php

							echo "$textNif";

						?>		
					</div>
					<div class="col-4">
						<div class="form-group">
							<label for="direccion">Adreça (obligatori):</label>
							<input type="text" class="form-control" name="direccion" id="direccion" />
						</div>
						<div class="form-group">
							<label for="codigo_postal">Codi postal (obligatori):</label>
							<input type="text" class="form-control" name="codigo_postal" id="codigo_postal" />
						</div>
						<div class="form-group">
							 <?php

								require "config.php";


								$sql = "SELECT id_poblacio,nom FROM poblacions ORDER BY nom ";

								$resultat = $conn->query($sql);


								if($resultat){

										echo "<div class=\"form-group\">
										<label for=\"poblacion\">Població (obligatori):</label>
										<select class=\"form-control\" name=\"poblacion\" id=\"poblacion\">
										<option value=\"\">Selecciona una opció</option>";


									$fila = $resultat->fetch_assoc();

									while ($fila){

										$opcio = $fila["id_poblacio"];
										$poblacio = utf8_encode($fila["nom"]);

										echo "<option value=\"$opcio\">$poblacio</option>";

										$fila = $resultat->fetch_assoc();

									}

										echo "</select>
										</div>";


								}

							?>

								
						</div>
						<div class="form-group">
							<label for="telefono">Telèfon:</label>
							<input type="text" class="form-control" name="telefono" id="telefono" />
						</div>
						<div class="form-group">
							<label for="codigo_postal">Email:</label>
							<input type="text" class="form-control" name="mail" id="mail" />
						</div>

						<?php

							echo "$textEmail";
							
						?>
						<div class="form-group text-right">
							<button type="submit" class="btn btn-default">Enviar</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>