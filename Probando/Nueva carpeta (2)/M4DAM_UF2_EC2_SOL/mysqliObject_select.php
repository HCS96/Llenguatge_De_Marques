<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>PHP i MySQL</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<body>
		<?php

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "videojocs";

		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
			die("ERROR al connectar con la base de datos");
		}

		$sql = "SELECT * FROM usuaris";

		//echo $sql;

		$result = $conn->query($sql);

		if ($result) {

			if ($result->num_rows > 0) {
				
				echo "<table border=\"1\">";
				echo "<tr>";
				echo "<th>USUARIO</th>";
				echo "<th>CONTRASEÑA</th>";
				echo "<th>NOMBRE</th>";
				echo "<th>APELLIDOS</th>";
				echo "</tr>";

				$row = $result->fetch_assoc();
				while($row) {

					$usuario = $row["nom_usuari"];
					$contrasenya = $row["contrasenya"];
					$nom = $row["nom"];
					$cognoms = $row["cognoms"];

					echo "<tr>";
					echo "<td>$usuario</td>";
					echo "<td>$contrasenya</td>";
					echo "<td>$nom</td>";
					echo "<td>$cognoms</td>";
					echo "</tr>";

					$row = $result->fetch_assoc();
				}

				echo "</table>";


			} else {
				echo "<p>No hay ningún/a usuario/a</p>";
			}

		} else {
			echo "ERROR al seleccionar los datos";
		}

		$conn->close();

		?>
	</body>
</html>