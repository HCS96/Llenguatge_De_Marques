<?php

	require "header.php";
	require "config.php";


		if (!empty($_GET)) { //ex 11

			$codi = $_GET["codi"];

			$sql = "SELECT * FROM productes WHERE codi = '$codi'";

			//echo $sql;

			$resulta = $conn->query($sql);

			if ($resulta) {

				$row = $resulta->fetch_assoc();
				
					$nomG = utf8_encode($row["nom"]);
					$cateG = $row["categoria"];
					$preuG = $row["preu"];
					$stockG = $row["unitats_stock"];

				$fila = $resulta->fetch_assoc();
			}

				//echo $nomG;
				//echo $stockG;
		
		}


	



	if(!empty($_POST)){

		$codi = $_POST["codi"];
		$nom = $_POST["nom"];
		$categoria = $_POST["categoria"];
		$preu = $_POST["preu"];
		$stock = $_POST["stock"];

		$resultado = null;
		
		$nomImatge = $_FILES["imatge"]["name"];
		$ruta = $_FILES["imatge"]["tmp_name"];
		$error = $_FILES["imatge"]["error"];
		$size = $_FILES["imatge"]["size"];
		$type = $_FILES["imatge"]["type"];

		//echo $type;


		$rutilla = "images/productes/"."$nomImatge";

		

		if($error){

			$resultado = "Ha ocurrido un error";

		}else if($type != 'image/jpeg' && $type != 'image/gif' && $type != 'image/png' && $type != 'image/jpg' ){


			$resultado = "Error de tipo";

		}

		//print_r($_POST);

		$sql = "INSERT INTO productes (codi, categoria, nom, preu, unitats_stock, imatge) 
				VALUES ('$codi', '$categoria', '$nom','$preu', '$stock', '$rutilla')";

		//echo "$sql";

		$result = $conn->query($sql);
		$correct = "";
		$error = null;

		if(!$result){

			$error = 1;
		}else{

			echo "<h4 style = \"color: green\";>Datos insertados correctamente</h4>";
		}	
			
	}

	//var_dump($_FILES);
?>
		<div class="container m-5 mx-auto text-white">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-4 offset-2">
						<div class="form-group">
							<label for="codi">Codi:</label>
							<input type="text" class="form-control" name="codi" id="codi" 
							<?php 
							if ($_GET) {
								
								echo "value= \"$codi\"";

							}
							
							?>/>
						</div>
						<div class="form-group">
							<label for="nom">Nom:</label>
							<input type="text" class="form-control" name="nom" id="nom" 
							<?php 
							if ($_GET) {
								
								echo "value= \"$nomG\"";
							}
							
							?>
							/>
						</div>
						<div class="form-group">
							<label for="categoria">Categoria:</label>
							<select class="form-control" name="categoria" id="categoria">
								<option value="">Selecciona una opció</option>
								<?php

									require "config.php";

									$sql = "SELECT id_categoria, nom FROM categories ORDER BY nom";

									$resultat = $conn->query($sql);

									if($resultat){

										$fila = $resultat->fetch_assoc();

										

										while($fila){

											$id = $fila["id_categoria"];
											$nom = utf8_encode($fila["nom"]);

											echo "<option value= $id>$nom</option>";

											$fila = $resultat->fetch_assoc();

										}
									}


								?>
							</select>
						</div>
						<div class="form-group">
							<label for="preu">Preu:</label>
							<input type="number" class="form-control" name="preu" id="preu"
							<?php 
							if ($_GET) {
								
								echo "value= \"$preuG\"";
							}
							
							?>
							/>
						</div>
						<div class="form-group">
							<label for="stock">Unitats en stock:</label>
							<input type="number" class="form-control" name="stock" id="stock"
							<?php 
							if ($_GET) {
								
								echo "value= \"$stockG\"";
							}
							
							?>
							/>
						</div>
						<div class="form-group text-right">
							<a href="productes.php" class="btn btn-outline-secondary mx-2">Tornar</a>
							<button type="submit" class="btn btn-default">Guardar</button>
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label for="imatge">Imatge:</label>
							<input type="file" class="form-control" name="imatge" id="imatge" />
						</div>
						<div class="text-center">
							<?php 

							

							if(isset($_FILES["imatge"])){

								echo "<img src=\"$rutilla\" class=\"img-thumbnail\" style=\"height: 250px;\" />"; 
							}else{

								echo "<img src=\"images/productes/no-image.png\" class=\"img-thumbnail\" style=\"height: 250px;\" />";
							}

	
								 

							if(isset($error)){

								echo "<br><br>";
								echo "<h4 style = \"color: #B81736;\">Error al insertar los datos</h4>";

							}
							

							?>
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
