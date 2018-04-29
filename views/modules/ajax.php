<?php 
/* AJAX CON PROGRAMACION ORIENTADA A OBJETOS EN PHP */


require_once "../../controllers/controller.php";
require_once "../../models/crud.php";

class Ajax{

	public $validarUsuario;
	
	public function validarUsuarioAjax(){
		$datos = $this->validarUsuario;
		$response = MvcController::validarUsuarioController($datos);
		
		//mandamos esto a validarRegistro
		if ($response) {
			echo $datos;
		}
		else
		{
			echo "";
		}
	}
}

$a = new Ajax();
//lo que traemos desde validarRegistro.js
$a->validarUsuario = $_POST["validarUsuario"];
$a->validarUsuarioAjax();