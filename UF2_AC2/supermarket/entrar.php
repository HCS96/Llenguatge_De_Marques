<?php
	require "header.php";
	require "config.php";

	if(!empty($_POST)){

		$usuari = $_POST["username"];
		$contra = $_POST["pass"];

		$sql = "SELECT id_client FROM clients WHERE nom_usuari = '$usuari' AND contrasenya = '$contra'";

		$resultat = $conn->query($sql);

		//$varsesion = $_SESSION['user'];

			if($resultat){

				if($resultat->num_rows > 0){

					$fila = $resultat->fetch_assoc();


					$_SESSION["user"] = $fila["id_client"];

					echo "EXITO";

					header("Location: comprar.php");

				}else{


					$error = 1;

					session_destroy();
				}
			}	
	}


?>
		<div class="container m-5 mx-auto col-4 offset-4 text-white">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<?php

				if(isset($error)){

					echo "<p style= \"color: red\";>Acceso denegado, usuario o contraseña incorrectos</p>";
				}

				 ?>
				<div class="form-group">
					<label for="username">Nom d'usuari:</label>
					<input type="text" class="form-control" name="username" id="username" />
				</div>
				<div class="form-group">
					<label for="pass">Contrasenya:</label>
					<input type="password" class="form-control" name="pass" id="pass" />
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-default">Entrar</button>
				</div>
			</form>
		</div>
	</body>
</html>