<?php
	
	if (!empty($_POST)) {

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "videojocs";

		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
			die("ERROR al connectar con la base de datos");
		}

		$username = $_POST["username"];
		$pass = $_POST["pass"];
		$nombre = $_POST["nombre"];
		$apellidos = $_POST["apellidos"];

		$sql = "INSERT INTO usuaris(nom_usuari, contrasenya, nom, cognoms)
				VALUES('$username', '$pass', '$nombre', '$apellidos')";

		//echo $sql;

		$result = $conn->query($sql);

		if ($result) {
			header("Location: form_login.html");
		} else {
			$error = 1;
		}

		$conn->close();

	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Videojocs</title>
		<link rel="icon" type="image/png" href="images/favicon.png">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body class="bg-dark">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="index.html">Videojocs</a>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item ">
						<a class="nav-link" href="form_usuari.php">Nou usuari</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="videojocs.php">Llistat de videojocs</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="form_login.html">Inici de sessió</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="container m-5 mx-auto text-white">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<div class="col-4 offset-4">
					<h3 class="text-success my-2">Nou usuari</h3>
					<?php

						if (isset($error)) {
							echo "<div class=\"alert alert-danger\" role=\"alert\">
								  No se ha podido registrar el usuario
								</div>";
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
					<div class="form-group">
						<label for="rp_pass">Repeteix la contrasenya:</label>
						<input type="password" class="form-control" name="rp_pass" id="rp_pass" />
					</div>
					<div class="form-group">
						<label for="nombre">Nom:</label>
						<input type="text" class="form-control" name="nombre" id="nombre" />
					</div>
					<div class="form-group">
						<label for="apellidos">Cognoms:</label>
						<input type="text" class="form-control" name="apellidos" id="apellidos" />
					</div>
					<div class="form-group text-right">
						<button type="submit" class="btn btn-default">Enviar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
