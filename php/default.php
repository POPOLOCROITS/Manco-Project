<?php
	session_start();

	if($_POST["identification"] == 5){

		mysql_connect("localhost", "root", "") or die("No se pudo conectar: " . mysql_error());
		mysql_select_db("ajaxtests");

		$counter = 0;

		$resultado = mysql_query(
					"SELECT p.*, pi.url_thumbnail, pi.url_photo FROM products AS p, products_images AS pi WHERE p.id=".$_POST["id"]." AND pi.product_id=".$_POST["id"]
				);
		$valores = array();
		$return = "";
		$obj_images = "";

		while ($fila = mysql_fetch_array($resultado, MYSQL_ASSOC)) {

		    $valores["name"] = 			$fila["name"];
		    $valores["serie"] = 		$fila["serie"];
		    $valores["description"] = 	$fila["description"];

		    $obj_images .= '
		    	<a class="fancybox-thumbs" data-fancybox-group="thumb" href="'.$fila["url_thumbnail"].'">
		    		<img src="'.$fila["url_photo"].'">
		    	</a>
			';

		    if($counter == 0){
		    	if(!$fila["product_name"]==""){$return.="<dt>Nombre del Producto<dd>".$fila["product_name"];}else{$return.="";}
			    if(!$fila["series_product"]==""){$return.="<dt>Serie<dd>".$fila["series_product"];}else{$return.="";}
			    if(!$fila["manufacturer"]==""){$return.="<dt>Fabricante<dd>".$fila["manufacturer"];}else{$return.="";}
			    if(!$fila["category"]==""){$return.="<dt>Categoría<dd>".$fila["category"];}else{$return.="";}
			    if(!$fila["price"]==""){$return.="<dt>Precio<dd>$".$fila["price"];}else{$return.="";}
			    if(!$fila["date_rel"]==""){$return.="<dt>Fecha de Salida<dd>".$fila["date_rel"];}else{$return.="";}
			    if(!$fila["height"]==""){$return.="<dt>Altura Aproximada<dd>".$fila["height"]."cm";}else{$return.="";}
			    if(!$fila["sculptor"]==""){$return.="<dt>Escultor<dd>".$fila["sculptor"];}else{$return.="";}
			    if(!$fila["cooperation"]==""){$return.="<dt>Cooperativa<dd>".$fila["cooperation"];}else{$return.="";}
			    if(!$fila["relesed_by"]==""){$return.="<dt>Lanzada por<dd>".$fila["relesed_by"];}else{$return.="";}
			    if(!$fila["distributed_by"]==""){$return.="<dt>Lanzada por<dd>".$fila["distributed_by"];}else{$return.="";}
			    $counter++;
		    }  
		}

		// print_r($valores);

		$valores["data"] = $return;
		$valores["images"] = $obj_images;
		$to_page = json_encode($valores);
		echo $to_page;

		mysql_free_result($resultado);

	}else if($_POST["identification"] == 6){
		
		mysql_connect("localhost", "root", "") or die("No se pudo conectar: " . mysql_error());
		mysql_select_db("ajaxtests");

		$object = "";
		$return_a = array();
		$functions = "
			<script type='text/javascript'>
				
				$('.btn_delete').on('click',function(){

					$(this).closest('.row_product_container').animate({
						height:'toggle'
					},300,function(){
						var id_product = $(this).find('#id_product').val();
					
						$.ajax({
							type:'POST',
							url:'../php/default.php',
							data:{identification:7, product:id_product},
							success:function(data){
								
								// var obj = $.parseJSON(data);
								console.log(data);
							},
							error:function(){

							}
						});
					});					
				});

			</script>
		";

		$sql = "SELECT p.name, p.description, p.price, p.url, p.id 
				FROM cart AS c, products AS p  
				WHERE c.id_user=".$_SESSION["userid"]." AND p.id=c.product";
		$result = mysql_query($sql);

		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$object .= '
				<div class="row row_product_container">
					<div class="col-md-2 row_product">
						<img src="'.$row["url"].'">
					</div>
					<div class="col-md-6 row_info">
						<ul>
							<li>
								<h5>'.$row["name"].'</h5>
							</li>
							<li>
								<p>'.$row["description"].'</p>
							</li>
							<li>
								<a class="product_price">
									<div>
										<h5>$'.$row["price"].'</h5>
										<input type="hidden" id="price">
									</div>
									<a class="waves-effect waves-light btn btn_delete" id="btn_delete">
										Eliminar
									</a>
								</a>
							</li>
						</ul>									
					</div>
					<input type="hidden" id="id_product" value="'.$row["id"].'">
				</div>
			';
		}


		$object .= $functions;
		$return = json_encode($object);
		echo $return;
	}else if($_POST["identification"] == 7){
		mysql_connect("localhost", "root", "") or die("No se pudo conectar: " . mysql_error());
		mysql_select_db("ajaxtests");
		
		print_r($_POST);

		$sql = "DELETE FROM cart WHERE product=".$_POST["product"]." AND id_user=".$_SESSION["userid"];
		$result = mysql_query($sql);

		$register = 'SELECT * FROM cart WHERE id_user ='.$user['id'];
		$result = mysql_query($register); 
		$cart = mysql_num_rows($result);

		$_SESSION["cart"] = $cart;

		echo $result;

	}else if($_POST["identification"] == 8){
		mysql_connect("localhost", "root", "") or die("No se pudo conectar: " . mysql_error());
		mysql_select_db("ajaxtests");

		$sql = "SELECT * FROM cart WHERE id_user =".$_SESSION["userid"]." AND product=".$_POST["id"];
		$result = mysql_query($sql); 
		$cart = mysql_num_rows($result);

		if($cart >= 1){
			$response = false;
		}else{
			$sql = "INSERT INTO cart(
				id_user,
				product
			)VALUES(
				".$_SESSION["userid"].",
				".$_POST["id"]."
			)";
			$result = mysql_query($sql);
			$response = true; 
		}

		$return_a = array();
		$return_a["response"] = $response;
		$return_a["cart"] = $cart + 1;

		$return = json_encode($return_a);	
		echo $return;
	}
?>