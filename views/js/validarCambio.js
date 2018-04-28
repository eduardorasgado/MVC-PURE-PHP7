/*=============================================
=            VALIDACION DE CAMBIO            =
=============================================*/

function validarCambio()
{
	var usuario = document.querySelector("#usuarioEditar").value;
	var password = document.querySelector("#passwordComprobar").value;
	var password = document.querySelector("#passwordNew").value;
	var email = document.querySelector("#emailEditar").value;

	/*Validacion de usuario*/
	if (usuario !="") 
	{
		var caracteres = usuario.length;
		//no incluir ningun digito especial
		var expression = /^[a-zA-Z0-9]*$/;
		//Validacion para evitar enviar formulario si es modificado por el html inspector
		if (caracteres >20) 
		{
			document.querySelector("label[for='usuarioEditar]").innerHTML += "<br>Escriba por favor menos de 15 caracteres.";
			return false;
		}
		//validacion anti-caracteres especiales
		//y anti SQL Injection del lado cliente
		if (!expression.test(usuario))
		{
			document.querySelector("label[for='usuarioEditar]").innerHTML += "<br>Que tal si omitimos los caracteres especiales :)";
			return false;
		}
	}

	/*Validacion de password*/
	if (passwordNew !="") 
	{
		var caracteres = passwordNew.length;
		//no incluir ningun digito especial
		var expression = /^[a-zA-Z0-9]*$/;
		//Validacion para evitar enviar formulario si es modificado por el html inspector
		if (caracteres < 6) 
		{
			document.querySelector("label[for='passwordNew]").innerHTML += "<br>Escriba por favor mas de 6 caracteres.";
			return false;
		}
		//validacion anti-caracteres especiales
		//y anti SQL Injection del lado cliente
		if (!expression.test(passwordNew))
		{
			document.querySelector("label[for='passwordNew]").innerHTML += "<br>Que tal si omitimos los caracteres especiales :)";
			return false;
		}
	}

	if (passwordComprobar !="") 
	{
		var caracteres = passwordComprobar.length;
		//no incluir ningun digito especial
		var expression = /^[a-zA-Z0-9]*$/;
		//Validacion para evitar enviar formulario si es modificado por el html inspector
		if (caracteres < 6) 
		{
			document.querySelector("label[for='passwordComprobar]").innerHTML += "<br>Escriba por favor mas de 6 caracteres.";
			return false;
		}
		//validacion anti-caracteres especiales
		//y anti SQL Injection del lado cliente
		if (!expression.test(passwordComprobar))
		{
			document.querySelector("label[for='passwordComprobar]").innerHTML += "<br>Que tal si omitimos los caracteres especiales :)";
			return false;
		}
	}

	/*Validacion de email*/
	if (email !="") 
	{
		var caracteres = email.length;
		//no incluir ningun digito especial
		var expressionsEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
		//Validacion para evitar enviar formulario si es modificado por el html inspector
		if (caracteres < 6) 
		{
			document.querySelector("label[for='emailEditar']").innerHTML += "<br>Escriba por favor mas de 6 caracteres.";
			return false;
		}
		//validacion anti-caracteres especiales
		//y anti SQL Injection del lado cliente
		if (!expressionsEmail.test(email))
		{
			document.querySelector("label[for='emailEditar']").innerHTML += "<br>Por favor inserta un email válido :)";
			return false;
		}
	}

	return true; 
}


/*=====  End of VALIDACION DE CAMBIO  ======*/
