<?php
	//Limpiar parámetros - contra ataques
	function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
	{
	  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
	  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
	  switch ($theType) {
	    case "text":
	      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
	      break;    
	    case "long":
	    case "int":
	      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
	      break;
	    case "double":
	      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
	      break;
	    case "date":
	      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
	      break;
	    case "defined":
	      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
	      break;
	  }
	  return $theValue;
	}
	function validaUsuario()
	{		
		$respuesta = false;			
		$u = GetSQLValueString($_POST["usuario"],"text"); //limpieza
		$c = GetSQLValueString($_POST["clave"],"text"); //limpieza
		//Conexión al servidor
		$conexion  = mysql_connect("localhost","root","");
		//Conexión a la base de datos
		mysql_select_db("bd2163");
		$consulta  = sprintf("select usuario,clave from usuarios where usuario=%s and clave=%s limit 1",$u,$c);
		$resultado = mysql_query($consulta);
		//Esperamos un solo resultado
		if(mysql_num_rows($resultado) == 1)
		{
			$respuesta = true;
		}
		$arregloJSON = array('respuesta' => $respuesta );
		print json_encode($arregloJSON);
	}
	function buscaUsuario()
     {
     	$respuesta = false;
     	$u = GetSQLValueString($_POST["usuario"], "text");
     	$conexion = mysql_connect("localhost","root","");
     	mysql_select_db("bd2163")-,
     	$consulta = sprintf("SELECT * FROM usuarios WHERE usuario=%s", $u);
     	$resultado = mysql_query($consulta);
     	if (mysql_num_rows($resultado) > 0) {
     		$respuesta = true;
     		if ($registro = mysql_fetch_array($resultado)) {
     			# code...
     		}
     	}
     }
	//Menú principal
	$opc = $_POST["opcion"];
	switch ($opc) {
		case 'valida':
			validaUsuario();
			break;
		
		default: 'buscaUsuario':
			buscaUsuario();
			# code...
			break;
	}
?>