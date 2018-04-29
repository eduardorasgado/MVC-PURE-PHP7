<?php 
/* AJAX CON PROGRAMACION ORIENTADA A OBJETOS EN PHP */


require_once "../../controllers/controller.php";
require_once "../../models/crud.php";

class Ajax{

	public $validarUsuario;
	public $validarEmail;
	
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

	public function validarEmailAjax(){
		$datos = $this->validarEmail;
		$response = MvcController::validarEmailController($datos);
		
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

if (isset($_POST["validarUsuario"])) {
	$a = new Ajax();
	//lo que traemos desde validarRegistro.js
	$a->validarUsuario = $_POST["validarUsuario"];
	$a->validarUsuarioAjax();
}

if (isset($_POST["validarEmail"])) {
	$b = new Ajax();
	//lo que traemos desde validarRegistro.js
	$b->validarEmail = $_POST["validarEmail"];
	$b->validarEmailAjax();
}