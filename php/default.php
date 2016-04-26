<?php
	session_start();

	if($_POST["identification"] == 5){

		mysql_connect("localhost", "root", "") or die("No se pudo conectar: " . mysql_error());
		mysql_select_db("ajaxtests");

		$resultado = mysql_query("SELECT * from products WHERE id=".$_POST["id"]);
		$valores = array();
		$return = "";

		while ($fila = mysql_fetch_array($resultado, MYSQL_NUM)) {
		    

		    $valores["name"] = 			$fila[1];
		    $valores["serie"] = 		$fila[2];
		    $valores["description"] = 	$fila[6];

		    if(!$fila[7]==""){$return.="<dt>Nombre del Producto<dd>".$fila[7];}else{$return.="";}
		    if(!$fila[8]==""){$return.="<dt>Serie<dd>".$fila[8];}else{$return.="";}
		    if(!$fila[9]==""){$return.="<dt>Fabricante<dd>".$fila[9];}else{$return.="";}
		    if(!$fila[10]==""){$return.="<dt>Categoría<dd>".$fila[10];}else{$return.="";}
		    if(!$fila[11]==""){$return.="<dt>Precio<dd>$".$fila[11];}else{$return.="";}
		    if(!$fila[12]==""){$return.="<dt>Fecha de Salida<dd>".$fila[12];}else{$return.="";}
		    if(!$fila[3]==""){$return.="<dt>Altura Aproximada<dd>".$fila[3]."cm";}else{$return.="";}
		    if(!$fila[13]==""){$return.="<dt>Escultor<dd>".$fila[13];}else{$return.="";}
		    if(!$fila[14]==""){$return.="<dt>Cooperativa<dd>".$fila[14];}else{$return.="";}
		    if(!$fila[15]==""){$return.="<dt>Lanzada por<dd>".$fila[15];}else{$return.="";}
		}

		$valores["data"] = $return;
		$to_page = json_encode($valores);
		echo $to_page;

		mysql_free_result($resultado);
	}
?>