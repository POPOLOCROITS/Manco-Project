<?php
	session_start();

	if($_POST["identification"] == 5){

		mysql_connect("localhost", "root", "") or die("No se pudo conectar: " . mysql_error());
		mysql_select_db("ajaxtests");


		// "SELECT p.*, pi.url_photo, pi.url_thumbnail FROM products AS p, products_images As pi WHERE p.id=".$_POST["id"]." AND pi.product_id=".$_POST["id"]
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
	}
?>