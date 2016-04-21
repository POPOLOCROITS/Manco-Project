<?php
	session_start();
	if ( !isset($_SESSION['username']) && !isset($_SESSION['userid']) ){
		if ( @$idcnx = @mysql_connect('localhost','root','') ){
			
			if ( @mysql_select_db('ajaxtests',$idcnx) ){
				
				$sql = 'SELECT user,passwd,id FROM ajaxusers WHERE user="' . $_POST['login_username']. '" && passwd="' . md5($_POST['login_userpass']) . '" LIMIT 1';
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
			
			mysql_close($idcnx);
		}
		else
			echo 0;
	}
	else{
		echo 0;
	}
?>