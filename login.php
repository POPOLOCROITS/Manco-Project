<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>

		<!-- jQuery -->
		<script type="text/javascript" src="js/jquery.js"></script>
		
		<!-- Materialize -->
		<script type="text/javascript" src="js/materialize.js"></script>
		<link rel="stylesheet" type="text/css" href="css/materialize.css">

	  	<!-- My CSS -->
		<link rel="stylesheet" type="text/css" href="css/style.css">

		<!-- My JavaScript -->
		<script type="text/javascript" src="js/login.js"></script>

		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>MJX3 - Login</title>
	</head>
	<body>

		<div id="allContent">
			<table cellpadding="0" cellspacing="0" border="0" height="100%" width="100%">
				<tr>
					<td align="center" valign="middle" height="100%" width="100%">
		
						<div id="alertBoxes"></div>
						<span class="loginBlock">
							<span class="inner">
											
							</span>
						</span>		
					</td>
				</tr>
			</table>
		</div>

		<div class="registration">
			<div class="row form_container">
				<div class="row">
				    <div class="col s12">
				      	<ul class="tabs">
					        <li class="tab col s3" id="regis"><a href="#registration_mj">Regístrate</a></li>
					        <li class="tab col s3" id="login"><a href="#login_mj">Iniciar Sesión</a></li>
				      	</ul>
				    </div>
				</div>
				<div id="registration_mj">
					<form class="col s12">
				    	<div class="row">
					        <div class="input-field col s12">
					          	<input id="username" type="text" class="validate" name="username">
					          	<label for="first_name">Nombre de Usuario</label>
					        </div>
				      	</div>
				      	<div class="row">
					        <div class="input-field col s6">
					          	<input id="first_name" type="text" class="validate" name="first">
					          	<label for="first_name">First Name</label>
					        </div>
					        <div class="input-field col s6">
					          	<input id="last_name" type="text" class="validate" name="last">
					          	<label for="last_name">Last Name</label>
					        </div>
				      	</div>
				      	<div class="row">
					        <div class="input-field col s6">
					          	<input id="password" type="password" class="validate" name="pass">
					          	<label for="password">Contraseña</label>
					        </div>
					        <div class="input-field col s6">
					          	<input id="conpassword" type="password" class="validate">
					          	<label for="password">Confirmar Contraseña</label>
					        </div>
				      	</div>
				      	<div class="row mailmail">
					        <div class="input-field col s12">
					          	<input id="email" type="email" class="validate" name="mail">
					          	<label for="email">Correo Electronico</label>
					        </div>
				      	</div>
				      	<div class="row">
					        <div class="input-field col s12">
					          	<input id="conemail" type="email" class="validate">
					          	<label for="email">Confirmar Correo Electronico</label>
					        </div>
				      	</div>				      	
				    </form>
				    <div class="row submit_container">		      		
		      			<button class="btn waves-effect waves-light" id="submit_reg">Regístrate</button>
			      	</div>
				</div>
				<div id="login_mj">
					<form class="col s12">
						<div class="row">
							<div class="input-field col s12">
					          	<input id="username_log" type="text" class="validate" name="username_log">
					          	<label for="first_name">Nombre de Usuario</label>
					        </div>
						</div>
						<div class="row">
					        <div class="input-field col s12">
					          	<input id="password_log" type="password" class="validate" name="password_log">
					          	<label for="password">Contraseña</label>
					        </div>
				      	</div>
					</form>
					<div class="row submit_container">		      		
		      			<button class="btn waves-effect waves-light" id="submit_log">Iniciar Sesión
						</button>
			      	</div>
				</div>    
		    </div>
	  	</div>
	</body>
</html>

<!-- <form method="post" action="">
	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td>Usuario:</td>
			<td><input type="text" name="login_username" id="login_username" /></td>
		</tr>
		<tr>
			<td>Contrase&ntilde;a:</td>
			<td><input type="password" name="login_userpass" id="login_userpass" /></td>
		</tr>
		<tr>
			<td colspan="2" align="right"><span class="timer" id="timer"></span><button id="login_userbttn">Login</button></td>
		</tr>
	</table>
</form> -->

