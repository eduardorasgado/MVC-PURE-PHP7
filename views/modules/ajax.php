<?php 
/* AJAX CON PROGRAMACION ORIENTADA A OBJETOS EN PHP */


require_once "../../controllers/controller.php";
require_once "../../models/crud.php";

class Ajax{

	public $validarUsuario;
	
	public function validarUsuarioAjax(){
		$datos = $this->validarUsuario;
		$response = MvcController::validarUsuarioController($datos);
		echo $response;
	}
}

$a = new Ajax();
//lo que traemos desde validarRegistro.js
$a->validarUsuario = $_POST["validarUsuario"];
$a->validarUsuarioAjax();