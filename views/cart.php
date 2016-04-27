<?php session_start()?>

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
			<div class="row row_product_container">
				<div class="col-md-2 row_product">
					<img src="http://schoolido.lu/static/idols/chibi/Nishikino_Maki.png">
				</div>
				<div class="col-md-6 row_info">
					<ul>
						<li>
							<h5>Nishikino Maki</h5>
						</li>
						<li>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus porta metus in interdum scelerisque. Curabitur in elit sed ligula egestas fermentum quis vel ante. Suspendisse vitae ipsum aliquet, feugiat mauris sed, varius ex. Vestibulum condimentum faucibus fermentum. Nam eu bibendum ipsum. Vestibulum quis rutrum libero. Aenean ac libero finibus, vulputate leo sagittis, egestas felis. Maecenas porttitor interdum urna in tristique.</p>
						</li>
						<li>
							<a class="product_price">
								<div>
									<h5>$850.00</h5>
								</div>							
							</a>
						</li>
					</ul>									
				</div>
				<div class="col-md-2 row_plus">
					<div class="btn_delete">
						<a class="waves-effect waves-light btn"><i class="material-icons">&#xE5CD;</i></a>
					</div>	
				</div>
			</div>
		</div>
	</div>
</body>
</html>