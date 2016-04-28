<?php 
	session_start();

	if($_SESSION){

		mysql_connect("localhost", "root", "") or die("No se pudo conectar: " . mysql_error());
		mysql_select_db("ajaxtests");
		$register = 'SELECT * FROM cart WHERE id_user ='.$_SESSION['userid'];
		$result = mysql_query($register); 
		$cart = mysql_num_rows($result);

		$_SESSION["cart"] = $cart;
	} 
?>

<!DOCTYPE html>
<html>
<head>

	<!-- Configuración UTF-8 -->
	<meta charset="utf-8">

	<!-- Iconos -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
	<script type="text/javascript" src="../js/indiv.js"></script>

	<!-- Fancy Box -->
	<script type="text/javascript" src="../js/jquery.fancybox.js?v=2.1.5"></script>
	<script type="text/javascript" src="../js/jquery.fancybox-thumbs.js?v=1.0.7"></script>
	<link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css?v=2.1.5" media="screen" />
	<link rel="stylesheet" type="text/css" href="../css/jquery.fancybox-thumbs.css?v=1.0.7" />

	<title></title>
</head>
<body>
	<nav>
	  	<div class="nav-wrapper">
		    <a href="#!" class="logo_space"><img src="../img/logo.png"> </a>
		 	<ul class="right hide-on-med-and-down">
			    <!-- Dropdown Trigger -->
			    <li>
			    	<div class="nav-wrapper">
					    <form>
					        <div class="input-field">
					          	<input id="search" type="search" required>
					          	<label for="search"><i class="material-icons">search</i></label>
					          	<i class="material-icons">close</i>
					        </div>
					    </form>
				    </div>
			    </li>
			    <li>
			    	<!-- <a class="mjx3_account dropdown-button" href="#!" data-activates="dropdown1">Mi cuenta<i class="material-icons right">arrow_drop_down</i></a> -->
			    	<a class="mjx3_account dropdown-button" href="#!" data-activates="dropdown1">
			    		<?php if($_SESSION){
			    				echo $_SESSION["username"];
			    			}else{
			    				echo "Mi cuenta";
			    			}
			    		?>
			    		<i class="material-icons right">arrow_drop_down</i>
			    	</a>
			    </li>
			    <li>
			      	<a href="../views/cart.php" class="mjx3_cart">
			      		<i class="large material-icons">shopping_cart</i>
			      	</a>
			      	<?php
			      		if($_SESSION){
			      			if($_SESSION["cart"]==0){
			      				echo '';
			      			}else{
			      				echo '<span class="mjx3_cart_counter">'.$_SESSION["cart"].'</span>';
			      			}			      			
			      		}else{
			      			echo '';
			      		}
			      	?>
			    </li>
		    </ul>
	  	</div>
	</nav>
	<div class="product_indv_container">
		<div class="info_container">
			<div class="title_container">
				<a class="waves-effect waves-light btn add_product"><i class="material-icons">add_shopping_cart</i></a>
				<h3></h3>
				<h5></h5>
			</div>
			<div class="desc_container">
				<p></p>
			</div>
			<div class="details_container">
				<div class="name_container"></div>
			</div>
		</div>
		<div class="visual_container">
			<div class="images_container"></div>
			<div class="preloader_container">
		  		<div class="preloader_subcontainer">
		  			<div class="preloader-wrapper big active">
					    <div class="spinner-layer spinner-blue-only">
						    <div class="circle-clipper left">
						        <div class="circle"></div>
						    </div><div class="gap-patch">
						        <div class="circle"></div>
						    </div><div class="circle-clipper right">
						        <div class="circle"></div>
						    </div>
					    </div>
					</div>
		  		</div>
		  	</div>	
		</div>
		
</body>
</html>