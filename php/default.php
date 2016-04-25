<?php
	session_start();

	if($_POST["identification"] == 5){
		if ( $link = mysqli_connect("localhost", "root", "") ){
			
			$db = conectar();
			
			$sql = "SELECT * from products WHERE id=".$_POST["id"];

			$valores = array();

			$query = $db->prepare($sql);
			$query->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);

			echo json_encode($resultado);			
		}
	}

	function conectar() {
	    $db_host = "localhost"; //host donde se encuentra la base de datos
	    $db_user = "root"; //Usuario de la base de datos
	    $db_password = ""; //Contraseña de la base de datos
	    $db_database = "ajaxtests"; //Nombre de base de datos
	    return new PDO('mysql:host='.$db_host.';dbname='.$db_database.';charset=latin1', $db_user, $db_password); //Cadena de conexión al PDO
	}
?>