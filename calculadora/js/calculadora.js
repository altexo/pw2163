
//Variable global
var operandor = "";

function operadores(ope) //+, -, *, /
{
	operandor = ope;
}
function limpiar()
{
	document.calculadora.operando1.value = "0";
	document.calculadora.operando2.value = "0";
	document.calculadora.resultado.value = "0";
	operandor = "";

}
function igual()
{
	var valor1 = document.calculadora.operando1.value;
	var valor2 = document.calculadora.operando2.value;
	var resultado = 0;
	document.calculadora.resultado.value = eval(valor1+operandor+valor2)	
}


function numeros(num)
{
	if (operandor == "")
	{	
		var valor = document.calculadora.operando1.value;
		if (valor == "0") {
			document.calculadora.operando1.value = "";
		}
		document.calculadora.operando1.value = document.calculadora.operando1.value + num;
	}else//Else para escribir en el operando 2
	{
		var valor = document.calculadora.operando2.value;
		if (valor == "0") {
			document.calculadora.operando2.value = "";
		}
		document.calculadora.operando2.value = document.calculadora.operando2.value + num;
	}
}