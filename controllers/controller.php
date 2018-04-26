<?php 

class MvcController
{

	#LLAMADA A LA PLANTILLA
	#--------------------------------------------

	public function plantilla()
	{
		include("views/template.php");
	}

	#INTERACCION DEL USUARIO
	#----------------------------------------
	public function enlacesPaginasController()
	{
		$enlace = $this->checkSet();

		$response = EnlacesPaginas::enlacesPaginasModel($enlace);

		include $response;
	}

	#INTERACCCION USUARIO
	#---------------------------------------
	public function enlacesDBController()
	{
		
		$enlace = $this->checkSet();

		$response = EnlacesPaginasDB::enlacesDBModel($enlace);

		include $response;
	}

	#REGISTRO USUARIOS
	#------------------------------------
	public function registroUsuarioController()
	{
		$datosController = [
			"usuario" => $_POST["usuario"],
			"email" => $_POST["email"],
			"password" => $_POST["password"]
		];

		$response = Datos::registroUsuarioModel($datosController, "usuarios");	

		echo $response;
			
	}

	#-------------------------------------
	private function checkSet()
	{
		if (isset($_GET["action"])) 
		{
			# code...
			return $_GET["action"];
		}
		else
		{
			return $enlace = '';
		}
	}
}

 ?>