// DOM = Modelo de objetos del documento
var inicio = function()
{

	var dameclic = function()
	{
		alert("Dame màs >o<");
	}
	$("#dameClic").on("click",dameclic);
}
//Inicializar nuestro Documento
$(document).on("ready", inicio);