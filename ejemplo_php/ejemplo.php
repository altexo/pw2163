<h1>Alta de usuarios</h1>
<form action="registro_ejemplo.php" method="POST">
	<input type="hidden" name="txtOculto" value="guardaUsuario">
	<input type="text" name="txtUsuario" id="txtUsuario"> <br>
	<input type="text" name="txtNombre" id="txtNombre"> <br>
	<input type="password" name="txtClave" id="txtClave"> <br>
	<select name="txtTipo" id="txtTipo">
		<option value="administrador">Administrador</option>
		<option value="invitado">Invitado</option>
		<option value="colado">Colado</option>
	</select> <br>
	<input type="submit" value="Enviar">
</form>
<hr>
<?php
	//Conexion al servidor
	$Conexion = mysql_connect("localhost", "root", "");
	mysql_select_db("bd2163");
	$consulta = "SELECT * FROM usuarios ORDER BY usuario";
	$resultado = mysql_query($consulta);
	

	$tabla = "<table border='1'>";
	$tabla.= "<tr>";
	$tabla.= "<th>Usuario</th><th>Nombre</th><th>clave</th><th>Tipo</th>";
	$tabla.= "</tr>";
	while ($registro = mysql_fetch_assoc($resultado))
	{
		$tabla.="<tr>";
		$tabla.="<td>".$registro["usuario"]."</td>";
		$tabla.="<td>".$registro["nombre"]."</td>";
		$tabla.="<td>".$registro["clave"]."</td>";
		$tabla.="<td>".$registro["tipousuario"]."</td>";
		$tabla.="</tr>";
	}
	$tabla.="</table>";
	print $tabla;

?>