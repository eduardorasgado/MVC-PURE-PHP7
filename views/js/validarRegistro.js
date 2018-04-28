/*========================================
=            VALIDAR REGISTRO            =
========================================*/

function validarRegistro()
{
	var usuario = document.querySelector("#usuarioRegistro").value;
	var password = document.querySelector("#passwordRegistro").value;
	var email = document.querySelector("#emailRegistro").value;

	/*Validacion de usuario*/
	if (usuario !="") 
	{
		var caracteres = usuario.length;
		//no incluir ningun digito especial
		var expression = /^[a-zA-Z0-9]*$/;
		//Validacion para evitar enviar formulario si es modificado por el html inspector
		if (caracteres >15) 
		{
			document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br>Escriba por favor menos de 15 caracteres.";
			return false;
		}
		//validacion anti-caracteres especiales
		//y anti SQL Injection del lado cliente
		if (!expression.test(usuario))
		{
			document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br>Que tal si omitimos los caracteres especiales :)";
			return false;
		}
	}

	/*Validacion de password*/
	if (password !="") 
	{
		var caracteres = password.length;
		//no incluir ningun digito especial
		var expression = /^[a-zA-Z0-9]*$/;
		//Validacion para evitar enviar formulario si es modificado por el html inspector
		if (caracteres < 6) 
		{
			document.querySelector("label[for='passwordRegistro']").innerHTML += "<br>Escriba por favor mas de 6 caracteres.";
			return false;
		}
		//validacion anti-caracteres especiales
		//y anti SQL Injection del lado cliente
		if (!expression.test(usuario))
		{
			document.querySelector("label[for='passwordRegistro']").innerHTML += "<br>Que tal si omitimos los caracteres especiales :)";
			return false;
		}
	}
	return true; 
}

/*=====  End of VALIDAR REGISTRO  ======*/
