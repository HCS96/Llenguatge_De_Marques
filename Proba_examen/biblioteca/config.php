<?php


	$servidor = "localhost";
	$username = "root";
	$pass = "";
	$database = "biblioteca";


	$conn = new mysqli($servidor, $username, $pass, $database) or die("Error al conectar en la base de datos");


?> 