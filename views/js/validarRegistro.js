/*======================================
=            VALIDADOR AJAX            =
======================================*/
/*Utilizaremos AJAX con JQuery*/
$('#usuarioRegistro').change(function(){
	var usuario = $('#usuarioRegistro').val();
	/*console.log(usuario);*/

	var datos = new FormData();
	datos.append("validarUsuario", usuario);
	
	$.ajax({
		url:"views/modules/ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){
			//respuesta que vendra de ajax.php
			console.log(respuesta);
		},
	});
});


/*=====  End of VALIDADOR AJAX  ======*/


/*========================================
=            VALIDAR REGISTRO            =
========================================*/

function validarRegistro()
{
	var usuario = document.querySelector("#usuarioRegistro").value;
	var password = document.querySelector("#passwordRegistro").value;
	var email = document.querySelector("#emailRegistro").value;
	var terminos = document.querySelector("#terms").checked;

	/*Validacion de usuario*/
	if (usuario !="") 
	{
		var caracteres = usuario.length;
		//no incluir ningun digito especial
		var expression = /^[a-zA-Z0-9]*$/;
		//Validacion para evitar enviar formulario si es modificado por el html inspector
		if (caracteres > 20) 
		{
			document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br>Escriba por favor menos de 20 caracteres.";
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
		if (!expression.test(password))
		{
			document.querySelector("label[for='passwordRegistro']").innerHTML += "<br>Que tal si omitimos los caracteres especiales :)";
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
			document.querySelector("label[for='emailRegistro']").innerHTML += "<br>Escriba por favor mas de 6 caracteres.";
			return false;
		}
		//validacion anti-caracteres especiales
		//y anti SQL Injection del lado cliente
		if (!expressionsEmail.test(email))
		{
			document.querySelector("label[for='emailRegistro']").innerHTML += "<br>Por favor inserta un email válido :)";
			return false;
		}
	}

	/*Validacion de checkbox terminos*/
	if (!terminos) 
	{
		document.querySelector("form").innerHTML +="<br>Deberías considerar aceptar los términos y condiciones";
		
		//Para que no se nos borre el form despues de mandar un error de rellenado
		document.querySelector("#usuarioRegistro").value = usuario;
		document.querySelector("#passwordRegistro").value = password;
		document.querySelector("#emailRegistro").value = email;

		return false;
	}

	return true; 
}

/*=====  End of VALIDAR REGISTRO  ======*/
