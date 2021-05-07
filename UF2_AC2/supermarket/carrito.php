<?php
	require "header.php";
?>
		<div class="container m-5 mx-auto">
			<div class="col-8 offset-2">
				<h3 class="text-white">Contingut del carrito</h3>
				<table class="table">        
					<tr> 
						<th>Producte</th> 
						<th class="text-right">Preu</th>
						<th class="text-right">Unitats</th>
						<th class="text-right">Import</th>
					</tr>
					<tr> 
						<td class="align-middle">
							Arroz Golden Sun 1 kg
						</td>
						<td class="align-middle text-right">0.75 €</td>
						<td class="align-middle text-right">2 u.</td>
						<td class="align-middle text-right">1.50 €</td>
					</tr>

					<?php 

					require "config.php";

						if (!empty($_POST)) {
						
							$codi = $_POST["codi"];

							$sql = "SELECT * FROM detall_productes WHERE codi = $codi";
							

							$resultat = $conn->query($sql);

						if($resultat)	{

							$fila = $resultat->fetch_assoc();

										

										while($fila){

											$nom = utf8_encode($fila["nom"]);
											$preu = $fila["preu"];
											$categ = utf8_encode($fila["nom_categoria"]);

									echo "<tr> 
									<td class=\"align-middle\">
										$codi
									</td>
									<td class=\"align-middle text-right\">$preu 0.75 €</td>
									<td class=\"align-middle text-right\">2 u.</td>
									<td class=\"align-middle text-right\">$preu €</td>
								</tr>";											

											$fila = $resultat->fetch_assoc();
										}
						}				
											

							
						}


					?>

					<tr class="bg-info"> 
						<th colspan="3" scope="row" class="text-right">							
							Import total
						</td>
						<td class="align-middle text-right">7.50 €</td>
					</tr>
				</table>
				<div class="text-right">
					<a href="comprar.php" class="btn btn-outline-secondary mx-2">Afegir més productes</a>
					<a href="index.php" class="btn btn-secondary">Finalitzar la compra</a>
				</div>
			</div>
		</div>
	</body>
</html>
