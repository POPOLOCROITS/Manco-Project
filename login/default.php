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
	}

	
?>