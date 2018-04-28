/*========================================
=            VALIDAR REGISTRO            =
========================================*/

function validarRegistro()
{
	var usuario = document.querySelector("#usuarioRegistro").value;
	var password = document.querySelector("#passwordRegistro").value;
	var email = document.querySelector("#emailRegistro").value;
	console.log(usuario, password, email);

	/*Validacion de usuario*/
	if (usuario !="") 
	{
		var caracteres = usuario.length;
		//Validacion para evitar enviar formulario si es modificado por el html inspector
		if (caracteres >15) 
		{
			document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br>Escriba por favor menos de 15 caracteres.";
			return false;
		}
		else
		{
			return true;
		}
	} 
}

/*=====  End of VALIDAR REGISTRO  ======*/
