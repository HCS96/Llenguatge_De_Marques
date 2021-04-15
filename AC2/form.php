<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>PH i MySQL</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<body>

		<!--<?php

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "videojocs";

			$conn = mysqli_connect($servername, $username, $password, $dbname);

			if(!$conn){

				die("ERROR al conectar con la BD");

			}else{

				echo "les go";
			}


			$sql = "INSERT INTO videojocs 
					VALUES ('123456789012', 'Torrente 2', 69.00, 'PC', 21)";

			//echo $sql;


			$result = mysqli_query($conn, $sql);		

			if(!$result){

				echo "error";

			}else{

				echo "Introducido correctamente";
			}

			mysqli_close($conn);
		?>-->

		<!-- /////////////////////////////////////////////////////////////-->


		<?php

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "videojocs";

			$conn = new mysqli($servername, $username, $password, $dbname);

			if($conn->connect_error){

				die("ERROR al conectar con la BD");

			}else{

				echo "les go";
			}


			$sql = "INSERT INTO videojocs 
					VALUES ('123456389012', 'Torrente 3', 69.00, 'PC', 21)";

			//echo $sql;


			$result = $conn->query($sql);		

			if(!$result){

				echo "error";

			}else{

				echo "Introducido correctamente";
			}

			mysqli_close($conn);
		?>


		<!-- /////////////////////////////////////////////////////////////-->


		<?php

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "videojocs";

			$conn = new mysqli($servername, $username, $password, $dbname);

			if($conn->connect_error){

				die("ERROR al conectar con la BD");

			}else{

				echo "les go";
			}


			$sql = "SELECT * FROM usuaris";

			//echo $sql;


			$result = $conn->query($sql);		

			if($result){

				var_dump($result);
				if($result->num_rows > 0){

					echo "hay cosillas";	

				}else{

					echo "no hay nah";
				}

			}else{

				echo "errorr";
			}

			mysqli_close($conn);
		?>

	</body>
</html>