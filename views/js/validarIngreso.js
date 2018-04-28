/*=============================================
=            VALIDACION DE INGRESO            =
=============================================*/

function validarIngreso()
{
	var usuario = document.querySelector("#usuarioIngreso").value;
	var password = document.querySelector("#passwordIngreso").value;

	/*Validacion de usuario*/
	if (usuario !="") 
	{
		var caracteres = usuario.length;
		//no incluir ningun digito especial
		var expression = /^[a-zA-Z0-9]*$/;
		//Validacion para evitar enviar formulario si es modificado por el html inspector
		if (caracteres >20) 
		{
			document.querySelector("label[for='usuarioIngreso']").innerHTML += "<br>Escriba por favor menos de 15 caracteres.";
			return false;
		}
		//validacion anti-caracteres especiales
		//y anti SQL Injection del lado cliente
		if (!expression.test(usuario))
		{
			document.querySelector("label[for='usuarioIngreso']").innerHTML += "<br>Que tal si omitimos los caracteres especiales :)";
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
			document.querySelector("label[for='passwordIngreso']").innerHTML += "<br>Escriba por favor mas de 6 caracteres.";
			return false;
		}
		//validacion anti-caracteres especiales
		//y anti SQL Injection del lado cliente
		if (!expression.test(password))
		{
			document.querySelector("label[for='passwordIngreso']").innerHTML += "<br>Que tal si omitimos los caracteres especiales :)";
			return false;
		}
	}

	return true; 
}

/*=====  End of VALIDACION DE INGRESO  ======*/
