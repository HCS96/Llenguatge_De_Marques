<?php
	require "header.php";
	require "config.php";

	if (!empty($_POST)) {
		
		$codi = $_POST["codi"];

		//echo $codi;

		$sql = "DELETE FROM productes WHERE codi = $codi";

		$resultat = $conn->query($sql);

		if ($resultat) {
			echo "<h3 style= \"color: #349409\">Eliminado con exito el producto con codigo $codi</h3>";
		}

	}


	$sql = "SELECT id_client, nom FROM clients";

	//echo $sql;

	$resultat = $conn->query($sql);

	$fila = $resultat->fetch_assoc();

	while ($fila) {
		
		$id = $fila["id_client"];
		//echo $id;



	$fila = $resultat->fetch_assoc();

	}

	if (!empty($_SESSION)) {

		echo"<div class=\"container m-5 mx-auto\">
			<div class=\"col-8 offset-2\">
				<h3>Nuestros productos</h3>";
				
					

									require "config.php";

									$sql = "SELECT nom, preu, nom_categoria, codi FROM detall_productes ORDER BY nom";

									$resultat = $conn->query($sql);
									echo "<table class=\"table\">";

									if($resultat){

										$fila = $resultat->fetch_assoc();

										

										while($fila){

											$nom = utf8_encode($fila["nom"]);
											$preu = $fila["preu"];
											$categ = utf8_encode($fila["nom_categoria"]);
											$codi = $fila["codi"];

											//echo $codi;


											$_GET = $codi;

										echo "  <tr> 
													<td class=\"align-middle\">
														<img src=\"images/productes/no-image.png\" class=\"img-thumbnail mr-2\" style=\"height: 50px;\" />
														$nom
													</td>
													<td class=\"align-middle\">$categ</td>
													<td class=\"align-middle\">$preu</td>
													<td class=\"align-middle\">
														<form class=\"form-inline\" action= \"$_SERVER[PHP_SELF]\" method=\"post\">
															<a href=\"form_producte.php?codi=$codi\" class=\"btn btn-primary\"><i class=\"fas fa-pencil-alt\"></i></a>
															<div class=\"form-group\">
																<input type=\"hidden\" name=\"codi\" value= $codi />
															</div>
															<button type=\"submit\" class=\"btn btn-primary\"><i class=\"fas fa-trash-alt\"></i></button>
														</form>
													</td> 
												</tr>";


											$fila = $resultat->fetch_assoc();

										}
									}
									echo "</table>";
		


	}










								?>
				
			</div>
		</div>
	</body>
</html>