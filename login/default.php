<?php
	
	print_r($_POST);

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
				echo "All ok!";
			}
		}
	}
?>