<?php
	
	session_start();

	if($_POST["identification"] == 1){
		if ( @$idcnx = @mysql_connect('localhost','root','') ){
		
			if ( @mysql_select_db('ajaxtests',$idcnx) ){

				$new_psw = md5($_POST['pass']);

				$sql = "INSERT INTO ajaxusers(user,first_name,last_name,passwd,email)
						VALUES('".$_POST['username']."','".$_POST['first']."','".$_POST['last']."','".$new_psw."','".$_POST['mail']."');";
				$result = mysql_query($sql);

				echo $sql;

				if(!$result){
					echo "Something went wrong :(";
				}else{
					$sql = 'SELECT user,passwd,id FROM ajaxusers WHERE user="' . $_POST['username']. '" && passwd="' . md5($_POST['pass']) . '" LIMIT 1';
					if ( @$res = @mysql_query($sql) ){
						if ( @mysql_num_rows($res) == 1 ){
							
							$user = @mysql_fetch_array($res);
							
							$_SESSION['username']	= $user['user'];
							$_SESSION['userid']	= $user['id'];
							echo 1;
							
						}
						else
							echo 0;
					}
					else
						echo 0;
					
				}
			}
		}
	}else if($_POST["identification"] == 2){
		session_destroy();
		exit(0);
	}else if($_POST["identification"] == 3){
		if ( !isset($_SESSION['username']) && !isset($_SESSION['userid']) ){
			if ( @$idcnx = @mysql_connect('localhost','root','') ){
				
				if ( @mysql_select_db('ajaxtests',$idcnx) ){
					
					$sql = 'SELECT user,passwd,id FROM ajaxusers WHERE user="' . $_POST['username']. '" && passwd="' . md5($_POST['pass']) . '" LIMIT 1';
					if ( @$res = @mysql_query($sql) ){
						if ( @mysql_num_rows($res) == 1 ){
							
							$user = @mysql_fetch_array($res);							

							$_SESSION['username']	= $user['user'];
							$_SESSION['userid']	= $user['id'];						
						}
						else
							echo "fourth 0";
					}
					else
						echo "thirth 0";
					
					
				}
				
				mysql_close($idcnx);
			}
			else
				echo "second 0";
		}
		else{
			echo "first 0";
		}
	}else if($_POST["identification"] == 4){
		if ( $link = mysqli_connect("localhost", "root", "") ){
			
			$db = conectar();
			
			$sql = "SELECT name, url, id from products";

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