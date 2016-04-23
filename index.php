<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>MJx3</title>

	<!-- Configuración UTF-8 -->
	<meta charset="utf-8">

	<!-- Mobile Version -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<!-- jQuery -->
	<script type="text/javascript" src="js/jquery.js"></script>

	<!-- Bootstrap -->
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

	<!-- Hammer - Touch_mode -->
	<script type="text/javascript" sc="js/hammer.js"></script>

	<!-- Iconos -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Silver Track -->
	<link rel="stylesheet" href="css/style_silver_track.css" type="text/css" media="screen" charset="utf-8">
  	<link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen" charset="utf-8">
	<script type="text/javascript" src="js/silver_track/modernizr.mediaqueries.transforms3d.js"></script>
	<script type="text/javascript" src="js/silver_track/responsive-hub.js"></script>
  	<script type="text/javascript" src="js/silver_track/jquery.silver_track.js" charset="utf-8"></script>
  	<script type="text/javascript" src="js/silver_track/jquery.silver_track.navigator.js" charset="utf-8"></script>
  	<script type="text/javascript" src="js/silver_track/jquery.silver_track.bullet_navigator.js" charset="utf-8"></script>
  	<script type="text/javascript" src="js/silver_track/jquery.silver_track.remote_content.js" charset="utf-8"></script>
  	<script type="text/javascript" src="js/silver_track/jquery.silver_track.responsive_hub_connector.js" charset="utf-8"></script>
  	<script type="text/javascript" src="js/silver_track/jquery.silver_track.css3_animation.js" charset="utf-8"></script>
  	<script type="text/javascript" src="js/silver_track/jquery.silver_track.circular_navigator.js" charset="utf-8"></script>

  	<!-- Materialize -->
	<script type="text/javascript" src="js/materialize.js"></script>
	<link rel="stylesheet" type="text/css" href="css/materialize.css">

  	<!-- My CSS -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- My JavaScript -->
	<script type="text/javascript" src="js/default.js"></script>

</head>
<body>
	

	<!-- NAVBAR -->
	<ul id="dropdown1" class="dropdown-content">
		<?php
			if ( isset($_SESSION['username']) && isset($_SESSION['userid']) && $_SESSION['username'] != '' && $_SESSION['userid'] != '0' ){
				echo '	<li><a href="#!">Mi cuenta</a></li>
  						<li><a href="#!">Mis pedidos<span class="badge">5</span></a></li>
  						<li><a href="#!">Mis recomendaciones</a></li>
  						<li><a href="#!">Configuración</a></li>
  						<li class="divider"></li>
  						<li><a href="#!" id="kill_session">Cerrar Sesión</a></li>';
			}
			else{
				echo '	<li><a href="login.php?tab=2" class="new_sesion" id="new_sesion">Iniciar Sesión</a></li>
  						<li class="divider"></li>
  						<li><a href="login.php?tab=1" class="new_sesion" id="new_sesion">Registrate!</a></li>';
			}
		?> 		
	</ul>
	<nav>
	  	<div class="nav-wrapper">
		    <a href="#!" class="logo_space"><img src="img/logo.png"> </a>
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
			    <li><a class="waves-effect waves-light btn">Productos</a></li>
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
			      	<a href="!#" class="mjx3_cart">
			      		<i class="large material-icons">shopping_cart</i>
			      	</a>
			      	<span class="mjx3_cart_counter">3</span>
			    </li>
		    </ul>
	  	</div>
	</nav>

	<!-- SLIDER -->
	<header>
		<div class="slider" id="mjx3_banner">
		    <ul class="slides">
		      	<li>
			        <img src="images/banner_pic_1.jpg"> <!-- random image -->
			        <div class="caption left-align">
			          	<h3>Venom Snake</h3>
			          	<h5 class="light grey-text text-lighten-3">Ya disponible</h5>
			        </div>
		      	</li>
		      	<li>
			        <img src="images/banner_pic_2.jpg"> <!-- random image -->
			        <div class="caption left-align">
			          	<h3>Descuentos del 20%</h3>
			          	<h5 class="light grey-text text-lighten-3 mjx3_subtile">En sección de Anime</h5>
			        </div>
		     	</li>
		    </ul>
	  	</div>
	</header>

  	<!-- Parallax content -->
	<div id="scroll-animate">
  		<div id="scroll-animate-main">
    		<div class="wrapper-parallax">
			  	<section class="content">

				  	<!-- Carrusel 1 -->
				  	<!-- <div class="track example-5">
					    <div class="inner">
					     	<h2>Articulos que podrían interesarte</h2>

					      	<div class="view-port">
						        <div id="example-1" class="slider-container">
						          	<div class="item">
							            <img src="http://ib1.huluim.com/video/60044632?size=220x124">
							            <p>Trailer 1</p>
						          	</div>
						          	<div class="item">
							            <img src="http://ib2.huluim.com/video/60063785?size=220x124">
							            <p>Trailer 2</p>
						          	</div>
						          	<div class="item">
							            <img src="http://ib2.huluim.com/video/60062745?size=220x124">
							            <p>Trailer 3</p>
						          	</div>
						          	<div class="item">
							            <img src="http://ib1.huluim.com/video/40050156?size=220x124">
							            <p>Trailer 4</p>
						          	</div>
						          	<div class="item">
							            <img src="http://ib1.huluim.com/video/60066740?size=220x124">
							            <p>Trailer 5</p>
						          	</div>
						          	<div class="item">
							            <img src="http://ib4.huluim.com/video/60062747?size=220x124">
							            <p>Trailer 6</p>
						          	</div>
						          	<div class="item">
							            <img src="http://ib3.huluim.com/video/60062746?size=220x124">
							            <p>Trailer 7</p>
						          	</div>
						          	<div class="item">
							            <img src="http://ib1.huluim.com/video/60062744?size=220x124">
							            <p>Trailer 8</p>
						          	</div>
						          	<div class="item">
							            <img src="http://ib2.huluim.com/video/60060717?size=220x124">
							            <p>Trailer 9</p>
						          	</div>
						        </div>
					      	</div>
					    </div>

					    <div class="pagination">
					      <a href="#" class="prev disabled material-icons">chevron_left</a>
					      <a href="#" class="next disabled material-icons">chevron_right</a>
					    </div>
					</div>

					Carrusel 2
				  	<div class="track example-5">
					    <div class="inner">
					     	<h2>Articulos que podrían interesarte</h2>

					      	<div class="view-port">
						        <div id="example-2" class="slider-container">
						          	<div class="item">
							            <img src="http://ib1.huluim.com/video/60044632?size=220x124">
							            <p>Trailer 1</p>
						          	</div>
						          	<div class="item">
							            <img src="http://ib2.huluim.com/video/60063785?size=220x124">
							            <p>Trailer 2</p>
						          	</div>
						          	<div class="item">
							            <img src="http://ib2.huluim.com/video/60062745?size=220x124">
							            <p>Trailer 3</p>
						          	</div>
						          	<div class="item">
							            <img src="http://ib1.huluim.com/video/40050156?size=220x124">
							            <p>Trailer 4</p>
						          	</div>
						          	<div class="item">
							            <img src="http://ib1.huluim.com/video/60066740?size=220x124">
							            <p>Trailer 5</p>
						          	</div>
						          	<div class="item">
							            <img src="http://ib4.huluim.com/video/60062747?size=220x124">
							            <p>Trailer 6</p>
						          	</div>
						          	<div class="item">
							            <img src="http://ib3.huluim.com/video/60062746?size=220x124">
							            <p>Trailer 7</p>
						          	</div>
						          	<div class="item">
							            <img src="http://ib1.huluim.com/video/60062744?size=220x124">
							            <p>Trailer 8</p>
						          	</div>
						          	<div class="item">
							            <img src="http://ib2.huluim.com/video/60060717?size=220x124">
							            <p>Trailer 9</p>
						          	</div>
						        </div>
					      	</div>
					    </div>

					    <div class="pagination">
					      <a href="#" class="prev disabled material-icons">chevron_left</a>
					      <a href="#" class="next disabled material-icons">chevron_right</a>
					    </div>
					</div> -->
				</section>

				<footer>
			        <div class="logo_container">
			        	<a href="#" class="logo_footer"></a>
			        </div>
			        <div class="clearfix contacts">
			        	<div class="contacts_content">
			        		<ul class="center-align">
					        	<li>
					        		<a class="btn-floating btn-large waves-effect waves-light icon-instagram" href="">
					        			<img src="img/instr_2.png">
					        		</a>
					        	</li>
					        	<li>
					        		<a class="btn-floating btn-large waves-effect waves-light icon-facebook" href="">
					        			<img src="img/faceb_2.png">
					        		</a>
					        	</li>		
					        	<li>
					        		<a class="btn-floating btn-large waves-effect waves-light icon-twitter" href="">
					        			<img src="img/twitt_2.png">
					        		</a>
					        	</li>
					        </ul>
			        	</div>
			        	
			        </div>
			        <div class="separator_container">
			        	<img src="img/bar.png">
			        </div>
			        <div class="copy_container">
			        	<span>Armando-Kun Development &copy;</span>
			        </div>
			    </footer>
			</div>
		</div>
	</div>		

	<!-- PRELOADER -->
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

</body>
</html>