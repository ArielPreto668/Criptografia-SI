	<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "DB";


	$mysqli = new mysqli("localhost", "root", "", "DB");
	
	if ($mysqli->connect_error) {
		die("Falha na conexão: " . $mysqli->connect_error);
	}
	?>