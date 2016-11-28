var inicioUsuarios = function()
{
	var validaUsuario = function()
	{
		var usuario = $("#txtUsuario").val();
		var clave = $("#txtClave").val();
		//preparar los parametros para AJAX
		var parametros = 	"opcion=valida"+
							"&usuario="+usuario+
							"&clave="+clave+
							"&id="+Math.random();
		//Hacemos la peticion remota
		$.AJAX({
			cache:false,
			type:"POST",
			dataType: "JSON",
			url: "php/utilerias.php",
			data:parametros,
			success: function(response)
			{

			},
			error: function(xhr, ajaxOptions, thrownError)
			{

			}
		});

		//Validadmos que no esten vacios
		if (usuario != "" && clave != "") 
		{

		}else
		{

		}
	}
	$("#btnValidUsuario").on("click", validaUsuario);
}

//Evento inicial
$(document).on("ready", inicioUsuarios);