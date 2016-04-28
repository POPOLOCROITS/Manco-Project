<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>

	<!-- Configuración UTF-8 -->
	<meta charset="utf-8">

	<!-- jQuery -->
	<script type="text/javascript" src="../js/jquery.js"></script>

	<!-- Bootstrap -->
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">

	<!-- Materialize -->
	<script type="text/javascript" src="../js/materialize.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/materialize.css">

	<!-- My CSS -->
	<link rel="stylesheet" type="text/css" href="../css/style.css">

	<!-- My JavaScript -->
	<script type="text/javascript" src="../js/cart.js"></script>

	<!-- Iconos -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<title>
		<?php 
			if($_SESSION){
				echo $_SESSION["username"];
			}else{
				echo "Carrito";
			}
		?>
	</title>
</head>
<body>
	<div class="cart_container">
		<div class="title_container"></div>
		<div class="cart_products">			
		</div>
	</div>
</body>
</html>